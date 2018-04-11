<div id="ulasan-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Membuat atau Mengubah Ulasan</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="review-form">
          <div id="status" class="form-group text-center">
            <div id="review-message"></div>
          </div>
          <div class="form-group">
            <label for="kp">Kode produk :</label>
            <input name="kp" class="form-control" type="text" id="kp" readonly="readonly">
          </div>
          <div class="form-group">
            <label for="rating">Rating :</label>
            <select id="rating" name="rating" class="form-control">
              <option value=""></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="form-group">
              <label for="comment">Komentar :</label>
              <p><textarea id="comment" name="comment" style="resize:none" rows="4" cols="50" form="toko-from" class="form-control" placeholder="Silahkan isi dengan komentar anda"></textarea></p>
          </div>
          <input name="command" value="review" type="hidden">
          <button class="btn btn-primary form-control" id="review-btn">Submit</button>
          <br>
      </form>
      </div>
    </div>
  </div>
</div>