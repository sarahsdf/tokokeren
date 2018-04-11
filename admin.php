<?php 
   		require 'kategoriForm.php';
   		require 'jasa_kirim.php';
   		require 'promo.php';
   ?>

<li class="form-group">
     <input type="text" class="form-control" placeholder="cari produk" style="width: 200px;">
</li>
<li>
	<a href="#" data-toggle="modal" data-target="#insertModal-kategori"><span class="glyphicon glyphicon-tags"></span>&nbsp;&nbsp;Buat Kategori &amp; SubKategori</a>
	<?php 
   		require 'kategoriForm.php';
   ?>
</li>

<li class="diratain">
    <a href="#" data-toggle="modal" data-target="#jk-modal"></span><span class="glyphicon glyphicon-transfer"></span>Buat Jasa Kirim </a>
</li>
<li class="diratain">
    <a href="#" data-toggle="modal" data-target="#promo-modal"></span><span class="glyphicon glyphicon-scissors"></span>Buat Promo </a>
</li>
<li class="diratain">
    <a href="#" data-toggle="modal" data-target="#add-produk-modal"><span class="glyphicon glyphicon-plus"></span> Tambah Produk </a>
</li>
</ul>
<ul class="nav navbar-nav navbar-right">