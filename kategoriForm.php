<div class="modal fade" id="insertModal-kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="insertModalLabel">Tambah Kategori &amp; Subkategori</h5>
			</div>
			<div class="modal-body" id="kategori-form">
				<form action="api/tambah_kategori.php" method="post" enctype="multipart/form-data" data-toggle="validator" id="cf">
					<div class="form-group">
						<label for="kode-kategori" class="control-label">Kode Kategori:</label>
						<input type="text" class="form-control" minlength="3" maxlength="3" id="insert-kode-kategori" name="kode-kategori" placeholder="masukan 3 digit karakter kode kategori" data-error="kode kategori wajib diisi! Panjang kode kategori harus 3 karakter!" required>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<label for="nama-kategori" class="control-label">Nama Kategori: </label>
						<input type="text" class="form-control" id="insert-nama-kategori" name="nama-kategori" placeholder="masukan nama kategori" data-error="nama kategori wajib diisi" required >
						<div class="help-block with-errors"></div>
					</div>
					<div  id="tambah-kategori">
						<div class="form-group">
							<label for="fitur" class="control-label">Subkategori 1:</label>
						</div>
						<div class="form-group">
							<label for="kode-subkategori" class="control-label">Kode Subkategori:</label>
							<input type="text" class="form-control" minlength="5" maxlength="5" id="insert-kode-subkategori" name="kode-subkategori[]" placeholder="masukan 5 digit karakter kode subkategori" data-error="kode sub kategori wajib diisi! Panjang kode kategori harus 5 karakter!" required>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label for="nama-subkategori" class="control-label">Nama Subkategori: </label>
							<input type="text" class="form-control" id="insert-nama-subkategori" name="nama-subkategori[]" placeholder=" masukan nama sub kategori" data-error="nama sub kategori wajib diisi" required >
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<button id="add-more" class="btn btn-primary">tambah subkategori</button>
					<input type="hidden" id="insert-command-kategori" name="insert-command-kategori" value="insert">
					<button type="submit" id="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>