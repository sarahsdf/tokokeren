<?php
require 'header.php';
require 'menu.php';
require 'checkLogin.php';
require 'ulasan.php';
?>

<div class="content">
 <div class="container">
  <div class="table-responsive">
    <h4><span>No Invoice :  </span> 
      <?php $no_invoice = $_GET['no_invoice'];
      echo "<input type=\"text\"  value='$no_invoice'  disabled>"; ?>
    </h4>
    <table class="table">
      <thead>
        <tr>
          <th>Nama Produk</th>
          <th>Berat</th>
          <th>Kuantitas</th>
          <th>Harga</th>
          <th>Subtotal</th>
          <th>ULASAN</th>
        </tr>
      </thead>
      <?php 
      $email=$_SESSION['email'] ;
      $conn= connectDB();

      $query = "SELECT DISTINCT * FROM TOKOKEREN.TRANSAKSI_SHIPPED T, TOKOKEREN.KERANJANG_BELANJA KB, TOKOKEREN.PRODUK P  WHERE T.email_pembeli = '$email' AND KB.kode_produk = P.kode_produk";

      $result = pg_query($conn,$query);
      $pulsa_trans = pg_num_rows($result);
      if ($pulsa_trans==0) {
        echo "<tr><td>Transaksi Tidak Ditemukan</td></tr>";
      }
      else{
        while($row = pg_fetch_assoc($result)) {
          printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
            <td>
            <p><a class=\"btn btn-warning open-review\" data-id=\"%s\" data-toggle=\"modal\" data-target=\"#ulasan-modal\">ULAS</a></p>
            </td>
          </tr>",
          $row['nama'],
          $row['berat'], 
          $row['kuantitas'],
          $row['harga'],
          $row['sub_total'],
          $row['kode_produk']
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