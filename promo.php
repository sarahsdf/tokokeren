<div id="promo-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Membuat Promo</h4>
      </div>
      <div class="modal-body">
        <form id="promo-from">
          <div id="status" class="form-group text-center">
            <div id="promo-message"></div>
          </div>
          <div class="form-group">
            <label>Deskripsi :</label>
            <p><textarea id="promo-description" style="resize:none" rows="4" cols="50" form="promo-from" class="form-control" placeholder="Deskripsi promo"></textarea></p>
          </div>
          <div class="form-group">
              <label>Periode Awal :</label>
              <div class="input-group date" data-provide="datepicker">
                  <input id="promo-start-date" type="text" class="form-control">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <label>Periode Akhir :</label>
              <div class="input-group date" data-provide="datepicker">
                  <input id="promo-finish-date" type="text" class="form-control">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
          </div>
          <div class="form-group">
              <label>Kode Promo :</label>
              <input id="promo-code" class="form-control" type="text" placeholder="silahkan isi dengan kode promo">
          </div>
          <div class="form-group">
            <label>Kategori :</label>
              <select id="promo-category" class="form-control">
                <option value=''></option>
              <?php
                  $conn = connectDB();
                  $res = pg_query($conn, "select nama from tokokeren.kategori_utama");
                  while($row = pg_fetch_assoc($res)) {
                    echo "<option value='$row[nama]'>$row[nama]</option>";
                  }
              ?>
              </select>
          </div>
          <div class="form-group">
            <label>Sub Kategori :</label>
              <select id="promo-subcategory" class="form-control">
                <option value=''></option>
              <?php
                  $conn = connectDB();
                  $res = pg_query($conn, "select nama from tokokeren.sub_kategori");
                  while($row = pg_fetch_assoc($res)) {
                    echo "<option value='$row[nama]'>$row[nama]</option>";
                  }
              ?>
              </select>
          </div>
          <button class="btn btn-primary form-control" id="promo-button">Submit</button>
          <br>
      </form>
      </div>
    </div>
  </div>
</div>