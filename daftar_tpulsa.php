<?php
require 'header.php';
require 'menu.php';
require 'checkLogin.php';
?>

<div class="content">
 <div class="container">
  <div class="table-responsive">
   <table class="table">
    <thead>
      <tr>
        <th>No Invoice</th>
        <th>Nama Produk</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Total Bayar</th>
        <th>Nominal</th>
        <th>Nomor</th>
      </tr>
    </thead>
    <?php 
    $email=$_SESSION['email'] ;
    $conn= connectDB();

    $query = "SELECT no_invoice, nama, tanggal, status, total_bayar, nominal, nomor FROM TOKOKEREN.PRODUK P, TOKOKEREN.TRANSAKSI_PULSA T WHERE P.kode_produk = T.kode_produk AND T.email_pembeli = '$email'";

    $result = pg_query($conn,$query);
    $pulsa_trans = pg_num_rows($result);
    if ($pulsa_trans==0) {
      echo "<tr><td>Transaksi Tidak Ditemukan</td></tr>";
    }
    else{
      while($row = pg_fetch_assoc($result)) { 
        printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
        </tr>",
        $row['no_invoice'],
        $row['nama'],
        $row['tanggal'], 
        $row['status'],
        $row['total_bayar'],
        $row['nominal'],
        $row['nomor']

        );
      }
    }

    ?> 
  </table> 
</div>
</div>
</div>

<?php
require 'footer.php';
?>