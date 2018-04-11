<?php
	require 'connection.php';
    if (isset($_POST['insert-command-kategori'])){

        function insertKategori() {
            $db = connectDB();
            
            $kode_kategori = $_POST['kode-kategori'];
            $nama_kategori = $_POST['nama-kategori'];
            
            $sql = "INSERT INTO KATEGORI_UTAMA (kode,nama) VALUES ('$kode_kategori', '$nama_kategori')";

            $insert_kategori = pg_query($db, $sql);

            if(!$insert_kategori) {
                $_SESSION['errormsgKategori'] = "Kode Kategori Sudah ada dalam sistem! Masukan Kode Kategori baru!\n";
                // header("Location: ..\index.php");
                exit();
            }


            $kode_subkategori = $_POST['kode-subkategori'];
            $nama_subkategori = $_POST['nama-subkategori'];


            foreach ($kode_subkategori as $key => $value) {
                
                $sql2 = "INSERT INTO SUB_KATEGORI (kode,kode_kategori,nama) VALUES ('$kode_subkategori[$key]', '$kode_kategori', '$nama_subkategori[$key]')";

                $insert_subkategori = pg_query($db, $sql2);

                if(!$insert_subkategori) {
                    $_SESSION['errormsgSK'] = "Kode Sub Kategori Sudah ada dalam sistem! Masukan Kode Sub Kategori baru!\n";
                    // header("Location: ..\index.php");
                    exit();
                }
            }


            $_SESSION['successKategori'] = "Kategori dan Sub Kategori baru berhasil ditambahkan!";
            // header("Location: ..\index.php");
            
            

            pg_close($db);
            exit();
        }
	
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    		if($_POST['insert-command-kategori'] === 'insert') {
                insertKategori();
            } 
    	}
    }
	
?>