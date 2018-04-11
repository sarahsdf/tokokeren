<div id="toko-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Membuat Toko</h4>
      </div>
      <div class="modal-body">
        <form id="toko-form">
          <div id="status" class="form-group text-center">
            <div class="message"></div>
          </div>
          <div class="form-group">
            <label>Nama :</label>
            <input id="toko-name" class="form-control" type="text" placeholder="Silahkan isi dengan nama toko anda" required>
          </div>
          <div class="form-group">
            <label>Deskripsi :</label>
            <p><textarea id="toko-description" style="resize:none" rows="4" cols="50" form="toko-from" class="form-control" placeholder="Silahkan isi dengan deskripsi toko anda"></textarea></p>
          </div>
          <div class="form-group">
              <label>Slogan :</label>
              <input id="toko-slogan" class="form-control" type="text" placeholder="Silahkan isi dengan slogan toko anda">
          </div>
          <div class="form-group">
              <label>Lokasi :</label>
              <input id="toko-location" class="form-control" type="text" placeholder="Silahkan ini dengan lokasi toko anda" required>
          </div>
          <div class="form-group">
            <div class="form-group" id="list-jk">
              <label>Jasa Kirim 1:</label>
              <?php
                echo '
                  <div class="form-group">
                  <input class="jk-counter" type="hidden" value="1">
                  <select class="form-control toko-jk" required>
                  <option value="JNE REGULER">JNE REGULER</option>
                  <option value="JNE YE">JNE YES</option>
                  </select>
                  </div>
                ';
              ?>
              <br>
            </div>
            <input class="btn btn-primary" id="more-jk-button" value="Tambah Jasa Kirim">
          </div>
          <button class="btn btn-primary form-control" id="toko-button">Submit</button>
          <br>
      </form>
      </div>
    </div>
  </div>
</div>