<?php
require 'header.php';
require 'menu.php';
require 'checkLogin.php';
?>

  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
<div class="container">
  <h2 class="text-center">DAFTAR SHIPPED PRODUK</h2>
  <table>
    <tr>
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <th>Berat</th>
      <th>Kuantitas</th>
      <th>Harga</th>
      <th>Subtotal</th>
    </tr>
    <tr>
      <td>P0000001</td>
      <td>Tas Flower 1</td>
      <td>4</td>
      <td>4</td>
      <td>75000</td>
      <th>300000</th>
    </tr>
    <tr>
      <td>P0000002</td>
      <td>Tas Flower 2</td>
      <td>3</td>
      <td>3</td>
      <td>80000</td>
      <th>240000</th>
    </tr>
  </table>
  <div class="form-group">
    <label for="address">Alamat:</label>
    <input type="text" class="form-control" id="insert-address" name="address" required>
  </div>
  <div class="form-group">
    <div class="form-group" id="list-jk">
    <label>Jasa Kirim :</label>
      <?php
      echo '
      <div class="form-group">
        <input class="jk-counter" type="hidden" value="1">
        <select class="form-control toko-jk" required>
          <option value="JNE REGULER">JNE REGULER</option>
          <option value="JNE YES">JNE YES</option>
        </select>
      </div>
      ';
      ?>
      <br>
    </div>
    <button onclick="window.location.href = 'index.php'"type="button" class="btn btn-default">CheckOut</button>
  </div>
</div>
<?php
require 'footer.php';
?>