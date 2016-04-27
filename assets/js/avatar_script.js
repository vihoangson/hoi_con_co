$(".change-avatar").click(function(event) {
	$("#File_avatar").trigger("click");
});
$("#File_avatar").change(function(event) {
	if(!$('#File_avatar').val()){
		return false;
	}
	var this_s = $(this);
	var percent = $('.percent');
	percent.html("");
	$("#image_view").html("");
	$("#uploadavatar").ajaxForm({ 
		url : "/upload_avatar",
		//target: "#image_view",
		beforeSend: function() {
			var filename = this_s.val().split('\\').pop();
			if ( !(/\.(gif|jpg|jpeg|png)$/i).test( filename )) {
				alert('This URL is not a valid image type. Please use a url with the known image types gif, jpg, jpeg, or png.')
				xhr.abort();
				return false;
			}
			percent.show();
			$("#modal-box").modal();
			$(".modal-title").html("Upload img");
			$(".modal-body").html("");
			percent.html('<div class="progress">\
				<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">\
				<span class="sr-only">60% Complete</span>\
				</div>\
			</div>');
		},
		uploadProgress: function(event, position, total, percentComplete) {
			$(".progress-bar").width( percentComplete + '%');
		},
		success:function(){
			percent.hide();
			$(".progress-bar").remove();
			$("#modal-box").modal("hide");
		},
		complete: function (hr){
			if(parseInt(hr.responseText)==1){
				console.log("done");
			}else{
				data = ($.parseJSON(hr.responseText));
				if(data.status == "done"){
					console.log(data.path);
					$(".avatar-block img").attr({"src":data.path_img});
					$(".button-avt").toggleClass("change-avatar change-avatar-hidden");
					btn = $(".button-avt").clone().after("");
					btn.removeClass('button-avt change-cropper hidden');
					btn.addClass('change-cropper');
					btn.text("Save crop");
					$(".button-avt").after(btn);

					$('.avatar-block img').cropper({
						aspectRatio: 1 / 1,
						crop: function(e) {
							$(".change-cropper").attr({
								"data-x": e.x,
								"data-y": e.y,
								"data-width": e.width,
								"data-height": e.height,
							});
							// console.log(e.rotate);
							// console.log(e.scaleX);
							// console.log(e.scaleY);
						}
					});
				}
			}
			// $(".img_block").remove();
			// data = ($.parseJSON(hr.responseText));
			// $.each(data, function(index, val) {
			// 	var m = $(".form_block").clone();
			// 	if(val.liked==1){
			// 		change_button_like(m.find(".button-like"),"like");
			// 	}else{
			// 		change_button_like(m.find(".button-like"),"unlike")
			// 	}
			// 	m.removeClass('form_block');
			// 	m.removeClass('hidden');
			// 	m.addClass('img_block');						
			// 	m.data("id",val.id);
			// 	m.find("img").attr("src",val.url);
			// 	m.find("img").append(val.url);
			// 	m.appendTo(".box-img");
			// });
		}
	}).submit();
	return false;
});
$(document).on("click",".change-cropper",function(){
	this_selector = $(this);
	param ={
		url: $('.avatar-block img').attr("src"),
		x: this_selector.data("x"),
		y: this_selector.data("y"),
		width: this_selector.data("width"),
		height: this_selector.data("height"),
	};
	$.post('/ajax/crop_img', param, function(data, textStatus, xhr) {
		if(parseInt(data)==1){
			location.reload();
		}else{
			alert("Can't drop image");
			location.reload();
		}
	});

});