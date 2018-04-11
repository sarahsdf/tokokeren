<?php
require 'header.php';
require 'menu.php';
require 'checkLogin.php';
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-3">
			</div>
			<div class="col-xs-6">
				<h2 class="text-center">FORM MEMBELI PRODUK PULSA</h2>
				<h4 class="text-center">
					<form action="submit_pulsa.php" method="post">     
						<span>Kode Produk :  </span> 
						<?php $kode = $_GET['kode_produk'];
						echo "<input type=\"text\"  value='$kode'  disabled>"; ?>
					</h4>
					<h4 class="text-center"> NO.HP/Token Listrik : </h4>
					<input type="text" class="form-control" id="nomer_hp" placeholder="Masukkan NO.HP/Token Listrik" name="nomer_hp">
				</form>
				<div class="col-md-12 text-center">				
					<button class="btn btn-default" id="jk-button" data-toggle="modal" data-target="#sd-modal">Submit</button>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
<?php
require 'footer.php';
?>
<div id="sd-modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<div class="modal-header text-center">
						<h4>STATUS : SUDAH DIBAYAR</h4>
					</div>
				</div>
			</div>
		</div>
	</div>