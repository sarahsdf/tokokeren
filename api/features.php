<?php
	require 'connection.php';

	function add_jk($name, $lk, $cost) {
		if(preg_match('/^[0-9]{1,}-[0-9]{1,}$/',$lk)) {
			$temp = explode("-", $lk);
			$time1 = (int) $temp[0];
			$time2 = (int) $temp[1];
			if($time1 >= $time2) {
				return "{\"status\":\"time-error\"}";
			}
		}
		else if(!preg_match('/^[0-9]{1,}$/',$lk)) {
				return "{\"status\":\"time-error\"}";
			}
		$conn = connectDB();
		if(pg_send_query($conn, "INSERT INTO tokokeren.jasa_kirim (nama, lama_kirim, tarif) VALUES ('$name', '$lk', '$cost')")) {
			$res = pg_get_result($conn);
			if($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				if($state === "23505") {
					return "{\"status\":\"unique-error\"}";
				}
				else {
					return "{\"status\":\"sukses\"}";
				}
			}
		}
	}

	function get_row($query, $index) {
		$conn = connectDB();
		$res = pg_query($conn, $query);
		$row = pg_fetch_row($res);
		if(is_null($row[$index])) {
			throw new Exception("Table is empty");
		}
		return $row[$index];
	}

	function insert_data($query) {
		$conn = connectDB();
		$res = pg_query($conn, $query);
		if(!$res) {
			throw new Exception("Error Processing Request", 1);
		}
	}

	function add_promo($description, $start_date, $finish_date, $code, $category, $subcategory) {
		$temp = explode("/", $start_date);
		$temp2 = explode("/", $finish_date);
		for($ii = count($temp) - 1; $ii >= 0; $ii--) {
			if($temp[$ii] > $temp2[$ii]) {
				return "{\"status\":\"date-error\"}";
			}
		}
		try {
			$temp = get_row("select id from tokokeren.promo order by id desc limit 1", 0);
			$temp =  (string)((int) substr($temp, 1, strlen($temp)) + 1);
			$newid = "";
			for($ii = 0; $ii < 6-strlen($temp); $ii++) {
				if($ii === 0) {
					$newid .= "R";
				}
				if($ii === 6-strlen($temp) - 1) {
					$newid .= $temp;
				}
				else {
					$newid .= "0";
				}
			}
			insert_data("INSERT INTO tokokeren.promo (id,deskripsi, periode_awal, periode_akhir, kode) VALUES ('$newid','$description', '$start_date','$finish_date' , '$code')");
			$catid = get_row("select kode from tokokeren.kategori_utama where nama='$category'", 0);
			$subcatid = get_row("select kode from tokokeren.sub_kategori where nama='$subcategory' and kode_kategori='$catid'", 0);
			$conn = connectDB();
			$kode_produk = pg_query($conn, "select kode_produk from tokokeren.shipped_produk where kategori='$subcatid'");
			while($row = pg_fetch_assoc($kode_produk)) {
				insert_data("INSERT INTO tokokeren.promo_produk (id_promo, kode_produk) VALUES ('$newid', '$row[kode_produk]')");
			}
			return "{\"status\":\"sukses\"}";
		}
		catch(Exception $e) {
			return "{\"status\":\"category-error\"}";
		}
	}

	function review($kp, $rating, $comment) {
		$date = date("m/d/Y");
		$email = $_SESSION['email'];
		$conn = connectDB();
		if(pg_send_query($conn, "INSERT INTO tokokeren.ulasan(email_pembeli, kode_produk, tanggal, rating, komentar) VALUES ('$email', '$kp', '$date', '$rating', '$comment')")) {
			$res = pg_get_result($conn);
			if($res) {
				$state = pg_result_error_field($res, PGSQL_DIAG_SQLSTATE);
				if($state === "23505") {
					pg_send_query($conn, "UPDATE tokokeren.ulasan set rating='$rating', komentar='$comment', tanggal='$date' where email_pembeli='$email' and kode_produk='$kp'");
					return "{\"status\":\"sukses\"}";
				}
				else {
					return "{\"status\":\"sukses\"}";
				}
			}
		}

		return "{\"status\":\"sukses\"}";
	}

	function look_subcategory($category) {
		$conn = connectDB();
		$res = pg_query($conn, "select nama from tokokeren.sub_kategori where kode in (select kategori from tokokeren.shipped_produk) and kode_kategori in (select kode from tokokeren.kategori_utama where nama = '$category')");
		$output = "{\"status\":\"sukses\", \"data\":[";
		while($row = pg_fetch_assoc($res)) {
			$nama = $row['nama'];
			$output .= "\"$nama\",";
		}
		$output = substr($output, 0, strlen($output) - 1);
		$output .= "]}";
		return $output;
	}
	
	function look_comment($kp) {
		$conn = connectDB();
		$email = $_SESSION['email'];
		try {
			$res = get_row("select komentar, rating from tokokeren.ulasan where email_pembeli='$email' and kode_produk='$kp'", 0);
			$res2 = get_row("select komentar, rating from tokokeren.ulasan where email_pembeli='$email' and kode_produk='$kp'", 1);
			$output = "{\"status\":\"sukses\", \"data\":[\"" . $res . "\",\"" . $res2 . "\"]}";
			return $output;
		}
		catch(Exception $e) {
			return "{\"status\":\"failed\"}";
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if($_POST['command'] === 'jk') {
			echo add_jk($_REQUEST['name'], $_REQUEST['time'], $_REQUEST['cost']);
  		} 
  		else if($_POST['command'] === 'promo') {
  			echo add_promo($_REQUEST['description'], $_REQUEST['start_date'], $_REQUEST['finish_date'], $_REQUEST['code'], $_REQUEST['category'], $_REQUEST['subcategory']);
  		}
  		else if($_POST['command'] === 'review') {
  			echo review($_POST['kp'], $_POST['rating'], $_POST['comment']);
  		}
  		else if($_POST['command'] === 'subcategory') {
  			echo look_subcategory($_POST['category']);
  		}
  		else if($_POST['command'] === 'comment') {
  			echo look_comment($_POST['kp']);
  		}
  	}
