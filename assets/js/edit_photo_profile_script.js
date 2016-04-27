		function create_form_block(){
			m = $(".img_block").first().clone();
			m.addClass('hidden form_block').attr({id:"form_block"});
			m.removeClass('img_block');
			m.appendTo(".box-img");
		}
		function change_button_like(this_button,status){

			if(status=="like"){
				this_button.removeClass('like');
				this_button.addClass('unlike');
				this_button.html("<i class=\"fa fa-thumbs-down\"></i> Unlike");
			}else if(status=="unlike"){

				this_button.removeClass('unlike');
				this_button.addClass('like');
				this_button.html("<i class=\"fa fa-thumbs-up\"></i> Like");
			}else{
				alert("Error");
			}
		}

		// Create block blank
		create_form_block();

		$(document).on("click",".img_block img",function(){
			$(this).parents(".img_block").find(".button-view").trigger("click");
		});

		$(document).on("click",".button-view",function(){
			var src = $(this).parents(".img_block").find("img").attr("src");
			$(".modal-title").html("Picture");
			$(".modal-body").html("<div class='text-center thumbnail'><img src='"+src+"' onError='this.src=\"http://placehold.it/400x400\"'></div>");
			$("#modal-box").modal();
			var user_id = $("#edit_action").data('id');
			var id_img = $(this).parent().data("id");
			var params= {user_id:user_id,id_img:id_img};
			this_s = $(this);
			$.post('/ajax/view_img', params, function(data, textStatus, xhr) {
				if(data!="false"){
					data=parseInt(data);
					this_s.find("i.count-view").text(data);
				}else{
					//alert("Error");
				}
			});
		});

		$(document).on("click",".button-delete",function(){
			if(!confirm("Are you sure delete this image ?")){
				return false;
			}
			id_img = $(this).parent().data("id");
			this_button = $(this);
			$.post('/do_delete_img', {id_img: id_img}, function(data, textStatus, xhr) {
				if(parseInt(data)==1){
					this_button.parent().fadeOut(200);
				}else{
					alert("error");
				}
			});
		});

		$(document).on("click",".button-like",function(){
			id_img = $(this).parent().data("id");
			this_button = $(this);
			$.post('/do_like', {id_img: id_img}, function(data, textStatus, xhr) {
				if(parseInt(data)==0){
					alert("Can't do action !");
				}else{
					change_button_like(this_button,data);
				}
			});
		})

		$(".button-upload-img").click(function(){
			$("#File1").trigger("click");
		});
	

		$('#File1').change(function() {
			if(!$('#File1').val()){
				return false;
			}
			var this_s = $(this);
			var percent = $('.percent');
			percent.html("");
			$("#image_view").html("");
			$("#uploadpic").ajaxForm({ 
				url : "/upload_img",
				//target: "#image_view",
				beforeSend: function(xhr) {
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
					if(hr.responseText=="Fail"){
						alert("Error upload file");
					}else{
						$(".img_block").remove();
						data = ($.parseJSON(hr.responseText));
						$.each(data, function(index, val) {
							var m = $(".form_block").clone();
							if(val.liked==1){
								change_button_like(m.find(".button-like"),"like");
							}else{
								change_button_like(m.find(".button-like"),"unlike")
							}
							m.removeClass('form_block');
							m.removeClass('hidden');
							m.addClass('img_block');						
							m.data("id",val.id);
							m.find("img").attr("src",val.url);
							m.find("img").append(val.url);
							m.appendTo(".box-img");
						});
					}
				}
			}).submit();
			return false;
		});