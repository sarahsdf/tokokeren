$(document).ready(function() {
	$('#jk-form').submit(function () {
		$("#jk-message").text("");
		var flag = true;
		var name = $("#jk-name-id").val();
		var time = $("#jk-lk-id").val();
		var cost = $("#jk-cost-id").val();
		if(name === null || name === undefined || name === '') {
			$("#jk-message").append("Nama jasa kirim belum diisi<br>");
			flag = false;
		}
		if(time === null || time === undefined || time === '') {
			$("#jk-message").append("Lama kirim belum diisi<br>");
			flag = false;
		}
		if(cost === null || cost === undefined || cost === '') {
			$("#jk-message").append("tarif belum diisi<br>");
			flag = false;
		}
		if(cost < 1) {
			$("#jk-message").append("tarif harus bilangan positif<br>");
			flag = false;
		}
		if(flag) {
			$.ajax({
				type: "post",
				url: "api/features.php",
				data:
				{
					command:"jk",
					name:name,
					time:time,
					cost:cost
				},
			}).done(function(data) {
				var jsonArray = JSON.parse(data);
				if(jsonArray['status'] === "sukses") {
					$("#jk-message").append("Jasa Kirim berhasil dibuat");
					$("#jk-message").css("background-color","#b3ff99");
				}
				if(jsonArray['status'] === "time-error") {
					$("#jk-message").append("Format lama kirim tidak valid, gunakan format: 00-00 atau 00");
					$("#jk-message").css("background-color","#ffcccc");
				}
				if(jsonArray['status'] === "unique-error") {
					$("#jk-message").append("Nama sudah ada, silahkan masukkan nama yang berbeda");
					$("#jk-message").css("background-color","#ffcccc");
				}
			});
		} else {
			$("#jk-message").css("background-color","#ffcccc");
		}
		return false;
	});

	$(document).on("click", ".open-review", function () {
	    var value = $(this).data('id');
	    $("#kp").val(value);
	    $.ajax({
	    	type:"post",
			url:"api/features.php",
			data:
			{
				command:'comment',
				kp:value
			},
	    }).done(function(data) {
	    	var jsonArray = JSON.parse(data);
	    	if(jsonArray['status'] === 'sukses') {
	    		$("#comment").text(jsonArray['data'][0]);
	    		$("#rating option[value='" + jsonArray['data'][1] + "']").attr("selected", "selected");
	    		$("#review-btn").text("Update");
	    	}
	    	if(jsonArray['status'] === 'failed') {
	    		$("#comment").text('');
	    		$('#rating').find('option').each(function(index,element){
	    			$(this).removeAttr("selected", "selected");
				});
	    		$("#review-btn").text("Submit");
	    	}
	    });
	});

	$("#review-form").submit(function() {
		var flag = true;
		$("#review-message").text("");
		var kp = $("#kp").val();
		var rating = $("#rating").val();
		var comment = $("#comment").val();
		if(rating === null || rating === undefined || rating === '') {
			$("#review-message").append("Rating belum diisi<br>");
			flag = false;
		}
		if(comment === null || comment === undefined || comment === '') {
			$("#review-message").append("Komentar belum diisi<br>");
			flag = false;
		}
		if(flag) {
			$.ajax({
				type:"post",
				url:"api/features.php",
				data:
				{
					command:'review',
					kp:kp,
					rating:rating,
					comment:comment
				},
			}).done(function(data) {
				var jsonArray = JSON.parse(data);
				if(jsonArray['status'] === "sukses") {
					window.location = 'index.php';
				}
			});
		} else {
			$("#review-message").css("background-color","#ffcccc");
		}
		return false;
	});

	$("#promo-category").change(function() {
		var category = $("#promo-category").val();
		var flag = true;
		if(category === null || category === undefined || category === '') {
			flag = false;
		}
		if(flag) {
			$.ajax({
				type: "post",
				url: "api/features.php",
				data: 
				{
					command:"subcategory",
					category:category
				},
			}).done(function(data) {
				var jsonArray = JSON.parse(data);
				if(jsonArray['status'] === "sukses") {
					$("#promo-subcategory").html("");
					for (var ii = 0; ii <= jsonArray["data"].length - 1; ii++) {
						$("#promo-subcategory").append("<option value='" + jsonArray["data"][ii] + "'>" + jsonArray["data"][ii] + "</option>");
					}
				}
			});
		}
		else {
			$("#promo-subcategory").html("");
		}
	});

	$("#promo-from").submit(function() {
		var flag = true;
		$("#promo-message").text("");
		var description = $("#promo-description").val().replace(/"/g, '\\"');
		var start_date = $("#promo-start-date").val();
		var finish_date = $("#promo-finish-date").val();
		var code = $("#promo-code").val();
		var category = $("#promo-category").val();
		var subcategory = $("#promo-subcategory").val();
		if(description === null || description === undefined || description === '') {
			$("#promo-message").append("Deskripsi belum diisi<br>");
			flag = false;
		}
		if(start_date === null || start_date === undefined || start_date === '') {
			$("#promo-message").append("Tanggal mulai belum diisi<br>");
			flag = false;
		}
		if(finish_date === null || finish_date === undefined || finish_date === '') {
			$("#promo-message").append("Tanggal selesai belum diisi<br>");
			flag = false;
		}
		if(code === null || code === undefined || code === '') {
			$("#promo-message").append("Kode promo belum diisi<br>");
			flag = false;
		}
		if(category === null || category === undefined || category === '') {
			$("#promo-message").append("Kategori belum diisi<br>");
			flag = false;
		}
		if(subcategory === null || subcategory === undefined || subcategory === '') {
			$("#promo-message").append("Subkategori belum diisi<br>");
			flag = false;
		}
		if(flag) {
			$.ajax({
				type: "post",
				url: "api/features.php",
				data: 
				{
					command:"promo",
					description:description,
					start_date:start_date,
					finish_date:finish_date,
					code:code,
					category:category,
					subcategory:subcategory
				},
			}).done(function(data) {
				var jsonArray = JSON.parse(data);
				if(jsonArray['status'] === "sukses") {
					window.location = 'index.php';
				}
				if(jsonArray['status'] === "date-error") {
					$("#promo-message").text("Tanggal yang dimasukkan tidak valid");
					$(".message").css("background-color","#ffcccc");
				}
				if(jsonArray['status'] === "category-error") {
					$("#promo-message").text("Kategori atau Subkategori tidak ditemukan");
					$("#promo-message").css("background-color","#ffcccc");
				}
			});
		} else {
			$("#promo-message").css("background-color","#ffcccc");
		}
		return false;
	});

	$('.date').datepicker({
		orientation: "top left"
	});
});