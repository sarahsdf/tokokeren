<?php
session_start();
$conn= pg_connect("host=localhost dbname=postgres user=postgres password=ahmadbaal");

$nomer = $_POST['nomer_hp'];
$kode = $_POST['kode_produk'];
$email= $_SESSION['email'];
$tanggal = date('Y-m-d');
$waktu = date('Y-m-d h:i:sa');


$queryRetrieve = "SELECT * FROM tokokeren.PRODUK_PULSA S, tokokeren.PRODUK P WHERE P.kode_produk = '$kode' AND P.kode_produk = S.kode_produk LIMIT 1";
$queryCount = "SELECT * FROM tokokeren.TRANSAKSI_PULSA";
$numTrans = pg_num_rows(pg_query($conn,$queryCount))+1;

$result = pg_query($conn,$queryRetrieve);
$no_invoice = 'X00000'.$numTrans.'';

while ($row = pg_fetch_assoc($result)) {
  $nominal =$row['nominal'];
  $harga = $row['harga'];
}

$queryInsert = "INSERT INTO TOKOKEREN.TRANSAKSI_PULSA(
no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nominal, nomor, kode_produk) VALUES ('".$no_invoice."', '".$tanggal."', '".$waktu."', 2, ".$harga.", '".$email."', ".$nominal.", ".$nomer.", '".$kode."')";

$resultInsert = pg_query($queryInsert); 

if ($resultInsert) { 
  header("location: daftar_tpulsa.php");  
}else{
  $errormessage = pg_last_error(); 
    echo "Error with query: " . $errormessage; 
    exit(); 
}

