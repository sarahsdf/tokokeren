<?php
require 'header.php';
require 'menu.php';
require 'checkLogin.php';
?>

<div class="container">
	<div class="row">
		<div class="col-xs-3">
		</div>
		<div class="col-xs-6">
			<h2 class="text-center">FORM PILIH TOKO</h2>
			<div class="form-group">
				<div class="form-group" id="list-jk">
					<label>NAMA TOKO:</label>
					<form action="form_barang.php" method="post" id="filter-toko">
						<select name="toko" class="form-control btn btn-default" id="sel1">
							<option >Semua Toko</option>
							<?php
							$conn= pg_connect("host=localhost dbname=postgres user=postgres password=ahmadbaal");
							$query = "SELECT nama FROM Tokokeren.Toko ";   			 
							$result = pg_query($conn,$query); 
							if (!$result) { 
								echo "Problem with query " . $query . "<br/>"; 
								echo pg_last_error(); 
								exit(); 
							} 
							while ($row = pg_fetch_assoc($result)) {
								echo "<option>".$row['nama']."</option>";
							}
							?>
						</select>
						<div class="col-md-12 text-center">			
							<input type="submit" name="submit" class="btn btn-default">
						</div>	    
					</form>
					<form action="form_barang.php" id="filter-toko">
						<select name="kategori" class="form-control btn btn-default" id="sel1" onchange=showSub(this.value)>
							<option>Semua Kategori</option>
							<?php
							$conn= pg_connect("host=localhost dbname=postgres user=postgres password=ahmadbaal");
							$query = "SELECT nama FROM Tokokeren.Kategori_Utama ";   			 
							$result = pg_query($conn,$query); 
							while ($row = pg_fetch_assoc($result)) {
								echo "<option>".$row['nama']."</option>";
							}
							?>
						</select>
						<select name="subkategori" class="form-control btn btn-default" id="sel2">
							<option>Semua Sub-Kategori</option>
							<?php
							$conn= pg_connect("host=localhost dbname=postgres user=postgres password=ahmadbaal");
							$query = "SELECT nama FROM TOKOKEREN.sub_kategori";   			 
							$result = pg_query($conn,$query); 
							while ($row = pg_fetch_assoc($result)) {
								echo "<option>".$row['nama']."</option>";
							}
							?> 
						</select>
						<div class="col-md-12 text-center">
							<input type="submit" name="" value="Ubah Kategori" class="btn btn-default">
						</div>	    
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

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
						<th>isAsuransi</th>
						<th>Stok</th>
						<th>isBaru</th>
						<th>Harga Grosir</th>
						<th>Beli</th>
					</tr>
				</thead>
				<?php 

				$conn= pg_connect("host=localhost dbname=postgres user=postgres password=ahmadbaal");

				if(isset($_POST['toko'])){
					echo "<h4>Menampilkan Produk dari Toko <strong>".$_POST['toko']."</strong></h4>";
					$toko = $_POST['toko'];
					$query = "SELECT * FROM tokokeren.SHIPPED_PRODUK S, tokokeren.PRODUK P WHERE S.nama_toko = '$toko' AND P.kode_produk = S.kode_produk" ;

				}else{
					$query = "SELECT * FROM tokokeren.SHIPPED_PRODUK S, tokokeren.PRODUK P WHERE P.kode_produk = S.kode_produk ";	
				}

				$result = pg_query($conn,$query);

				while($row = pg_fetch_assoc($result)) { 


					printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>
						<td>
							<p><a class=\"button stroke orange\" href=\"#\" data-toggle=\"modal\" data-target=\"#fb-modal\">Beli</a></p>
						</td>
					</tr>",
					$row['kode_produk'],
					$row['nama'], 
					$row['harga'],
					$row['deskripsi'],
					$row['is_asuransi'],
					$row['stok'],
					$row['is_baru'],
					$row['harga_grosir']

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

<div id="fb-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Mengisi Berat Total dan Jumlah Barang yang Dibeli</h4>
      </div>
      <div class="modal-body">
        <form id="tk-form">
            <div id="status" class="form-group text-center">
              <div class="message"></div>
            </div>
            <div class="form-group">
                <label>Berat Total :</label>
                <input id="berat-total" class="form-control" type="number" placeholder="silahkan isi berat total" min="0" required>
            </div>
            <div class="form-group">
                <label>Jumlah Barang :</label>
                <input id="jmlbrg" class="form-control" type="number" placeholder="silahkan isi jumlah barang" min="0" required>
            </div>
            <button class="btn btn-primary form-control" id="jk-button" data-toggle="modal" data-target="#bt-modal">Submit</button>
            <br>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="bt-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="modal-header text-center">
                <h2>DATA BERHASIL TERSIMPAN</h2>
        </div>
      </div>
    </div>
  </div>
</div>