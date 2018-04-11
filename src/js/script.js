$( document ).ready(function() {
    //popover for login
	$(function () {
  		$('[data-toggle="popover"]').popover({ html : true });
	})

	//carousel
	$('.carousel').carousel();

	//datepicker
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
		format: 'mm/dd/yyyy',
		container: container,
		todayHighlight: true,
		autoclose: true,
	};
	date_input.datepicker(options);

	$('#cf').submit(function(){
	return false;
});

	//add subcategory
	
	var i = 1;
	$("#add-more").click(function() {
	    $("#tambah-kategori").append('<div class="form-group"><label for="fitur">Subkategori ' + ++i + ':' + '</label></div>');
	    $("#tambah-kategori").append('<div class="form-group">'+'<label for="kode-subkategori" class="control-label">Kode Subkategori:</label>'+'<input type="text" class="form-control" minlength="5" maxlength="5" id="insert-kode-subkategori" name="kode-subkategori[]" placeholder="masukan 5 digit karakter kode subkategori" data-error="kode sub kategori wajib diisi! Panjang kode kategori harus 5 karakter!" required>' + '<div class="help-block with-errors"></div>' +'</div>');
	    $("#tambah-kategori").append('<div class="form-group">'+'<label for="nama-subkategori" class="control-label">Nama Subkategori:</label>'+'<input type="text" class="form-control" id="insert-nama-subkategori" name="nama-subkategori[]" placeholder=" masukan nama sub kategori" data-error="nama sub kategori wajib diisi" required >' + '<div class="help-block with-errors"></div>' +'</div>');
		$("#cf").validator("update");
	});


	$("#btnLogin").click(function() {
		alert('hello');
	});

	function navbarLoginButtonHandler() {
		alert('navbar login');
	}

	function form_validate(attr_id){
	    var result = true;
	    $('#'+attr_id).validator('validate');
	    $('#'+attr_id+' .form-group').each(function(){
	        if($(this).hasClass('has-error')){
	            result = false;
	            return false;
	        }
	    });
	    return result;
	}

	$("#submit").click(function() {

		if(form_validate('cf')){
			$.ajax({
				type: "post",
				url: "api/tambah_kategori.php",
				data: $("#cf").serialize(),
				success: function(){
					location.reload();
				}
			})
		}
		
	});


});

