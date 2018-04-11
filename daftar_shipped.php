<?php
require 'header.php';
require 'menu.php';
require 'checkLogin.php';
require 'form_berat.php';
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
  <h2 class="text-center">DAFTAR PRODUK</h2>
  <ul class="nav navbar-nav">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Fashion Wanita</a></li>
        <li><a href="#">Fashion Pria</a></li>
        <li><a href="#">Fashion Muslim</a></li>
        <li><a href="#">Fashion Anak</a></li>
        <li><a href="#">Kecantian</a></li>
        <li><a href="#">Kesehatan</a></li>
        <li><a href="#">Ibu dan Bayi Muslim</a></li>
        <li><a href="#">Fashion Muslim</a></li>
        <li><a href="#">Rumah Tangga</a></li>
        <li><a href="#">Handphone dan Tablet</a></li>
        <li><a href="#">Komputer dan Aksesoris</a></li>
        <li><a href="#">Elektronik</a></li>
        <li><a href="#">Kamera, Foto, Video</a></li>
        <li><a href="#">Otomotif</a></li>
        <li><a href="#">Olahraga</a></li>
        <li><a href="#">Film, Musik dan Game</a></li>
        <li><a href="#">Dapur</a></li>
        <li><a href="#">Office dan Stasionery</a></li>
        <li><a href="#">Souvenir, Kado dan Hadiah</a></li>
        <li><a href="#">Mainan dan Hobi</a></li>
        <li><a href="#">Makanan dan Minuman</a></li>
        <li><a href="#">Buku</a></li>                    
      </ul>
    </li>
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">SubKategori<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#">Fashion Wanita</a></li>
        <li><a href="#">Fashion Pria</a></li>
        <li><a href="#">Fashion Muslim</a></li>
        <li><a href="#">Fashion Anak</a></li>
        <li><a href="#">Kecantian</a></li>
        <li><a href="#">Kesehatan</a></li>
        <li><a href="#">Ibu dan Bayi Muslim</a></li>
        <li><a href="#">Fashion Muslim</a></li>
        <li><a href="#">Rumah Tangga</a></li>
        <li><a href="#">Handphone dan Tablet</a></li>
        <li><a href="#">Komputer dan Aksesoris</a></li>
        <li><a href="#">Elektronik</a></li>
        <li><a href="#">Kamera, Foto, Video</a></li>
        <li><a href="#">Otomotif</a></li>
        <li><a href="#">Olahraga</a></li>
        <li><a href="#">Film, Musik dan Game</a></li>
        <li><a href="#">Dapur</a></li>
        <li><a href="#">Office dan Stasionery</a></li>
        <li><a href="#">Souvenir, Kado dan Hadiah</a></li>
        <li><a href="#">Mainan dan Hobi</a></li>
        <li><a href="#">Makanan dan Minuman</a></li>
        <li><a href="#">Buku</a></li>                    
      </ul>
    </li>
  </ul>

  <table>
    <tr>
      <th>Kode Produk</th>
      <th>Nama Produk</th>
      <th>Harga</th>
      <th>Deskripsi</th>
      <th>is_asuransi</th>
      <th>Stok</th>
      <th>is_baru</th>
      <th>Harga grosir</th>
      <th>Beli</th>
    </tr>
    <tr>
      <td>P0000001</td>
      <td>Tas Flower 1</td>
      <td>75000</td>
      <td>KOSONG</td>
      <td>TRUE</td>
      <td>30</td>
      <td>TRUE</td>
      <td>60000</td>
      <th data-toggle="modal" data-target="#fb-modal"><a href="#">Beli</a></th>
    </tr>
    <tr>
      <td>P0000002</td>
      <td>Tas Flower 2</td>
      <td>80000</td>
      <td>KOSONG</td>
      <td>TRUE</td>
      <td>140</td>
      <td>TRUE</td>
      <td>70000</td>
      <th data-toggle="modal" data-target="#jk-modal"><a href="#">Beli</a></th>
    </tr>
  </table>
  <button onclick="window.location.href = 'keranjang_belanja.php'" type="button" class="btn btn-default">Lihat Keranjang Belanja</button>
</div>
<?php
require 'footer.php';
?>