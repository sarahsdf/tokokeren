<?php
    require 'membeli_produk.php';
    require 'lihat_transaksi.php';
    require 'api/is_penjual.php';
?>

<li class="form-group">
     <input type="text" class="form-control" placeholder="cari produk" style="width: 150px;">
</li>
<li>
	<a href="#" data-toggle="modal" data-target="#jk-modal"><span class="glyphicon glyphicon-credit-card"></span>&nbsp;&nbsp; Beli Produk </a>
</li>
<?php 
	if(isset($_SESSION['is_penjual'])){
		if($_SESSION['is_penjual'] == TRUE){
?>
<li class="diratain">
    <a href="#" data-toggle="modal" data-target="#jk-modal"></span><span class="glyphicon glyphicon-plus"></span>Tambah Produk </a>
</li>
<?php 
}}
?>
<li class="diratain">
    <a href="#" data-toggle="modal" data-target="#lt-modal"><span class="glyphicon glyphicon-tasks"></span> Transaksi </a>
</li>
<li class="diratain">
    <a href="daftar_tshipped.php" ><span class="glyphicon glyphicon-shopping-cart"></span>Keranjang Belanja </a>
<li class="diratain">
    <a href="#" data-toggle="modal" data-target="#add-produk-modal"><span class="glyphicon glyphicon-home"></span>Buka Toko </a>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
