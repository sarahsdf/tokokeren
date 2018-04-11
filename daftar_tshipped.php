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
        <th>Nama Toko</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Total Bayar</th>
        <th>Alamat Kirim</th>
        <th>Biaya Kirim</th>
        <th>No Resi</th>
        <th>Jasa Kirim</th>
        <th>ULASAN</th>
      </tr>
    </thead>
    <?php 
    $email=$_SESSION['email'] ;
    $conn= connectDB();

    $query = "SELECT * FROM TOKOKEREN.TRANSAKSI_SHIPPED  WHERE email_pembeli = '$email'";

    $result = pg_query($conn,$query);
    $pulsa_trans = pg_num_rows($result);
    if ($pulsa_trans==0) {
      echo "<tr><td>Transaksi Tidak Ditemukan</td></tr>";
    }
    else{
      while($row = pg_fetch_assoc($result)) { 
        printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
          <td>
            <p><a class=\"button stroke orange\" href=\"daftar_pdibeli.php?no_invoice=%s\">DAFTAR PRODUK</a></p>
          </td>
        </tr>",
        $row['no_invoice'],
        $row['nama_toko'], 
        $row['waktu_bayar'],
        $row['status'],
        $row['total_bayar'],
        $row['alamat_kirim'],
        $row['biaya_kirim'],
        $row['no_resi'],
        $row['nama_jasa_kirim'],
        $row['no_invoice']

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