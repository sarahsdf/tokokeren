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
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Deskripsi</th>
        <th>Nominal</th>
        <th>Beli</th>
      </tr>
    </thead>
    <?php 

    $conn= pg_connect("host=localhost dbname=postgres user=postgres password=ahmadbaal");

    $query = "SELECT * FROM tokokeren.PRODUK_PULSA S, tokokeren.PRODUK P WHERE P.kode_produk = S.kode_produk ";

    $result = pg_query($conn,$query);

    while($row = pg_fetch_assoc($result)) { 


      printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
        <td>
          <p><a class=\"button stroke orange\" href=\"form_pulsa.php?kode_produk=%s\">Beli</a></p>
        </td>
      </tr>",
      $row['kode_produk'],
      $row['nama'], 
      $row['harga'],
      $row['deskripsi'],
      $row['nominal'],
      $row['kode_produk']

      );
    }

    ?> 
  </table> 
</div>
</div>
</div>

<?php
require 'footer.php';
?>