<?php
	require 'connection.php';
    if (isset($_POST['insert-command'])){

        function insertUser() {
        $db = connectDB();
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $no_telp = $_POST['telp'];
        $tgl_lahir = $_POST['date'];
        $alamat = $_POST['address'];
        $sql = "INSERT INTO PENGGUNA (email,password,nama,jenis_kelamin,tgl_lahir,no_telp,alamat) VALUES ('$email', '$password', '$name', '$gender', '$tgl_lahir', '$no_telp', '$alamat')";
        $sql2 = "INSERT INTO PELANGGAN (email, is_penjual, nilai_reputasi, poin) VALUES ('$email', 'f', 0.0, 0)";

        
        if(pg_query($db, $sql) && pg_query($db, $sql2)) {
            $_SESSION['success'] = "SELAMAT! Akun anda telah terdaftar ke dalam sistem!";
            if(!isset($_SESSION['role'])){
                $_SESSION['email'] = $email;
                $_SESSION['role'] = 'user';
            }
            header("Location: ..\index.php");
        } else {
            $_SESSION['errormsg'] = "EMAIL YANG ANDA INPUT SUDAH TERDAFTAR. HARAP GUNAKAN EMAIL LAIN";
            header("Location: ..\/register.php");
        }
        pg_close($db);
        }
	
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    		if($_POST['insert-command'] === 'insert') {
                insertUser();
            } 
    	}
    }
	
?>