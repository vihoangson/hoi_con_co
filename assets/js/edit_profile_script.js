var msg_error =[];

$(document).on("click",function(event){

	if(
		$(event.target).is($("#edit_action p a")) ||
		$(event.target).is($("#edit_action p input")) ||
		$(event.target).is($("#edit_action p select")) ||
		$(event.target).is($("[href='#location']"))
		
	){
	}else{
		refesh_form_edit_profile();
	}
})

function refesh_form_edit_profile(){
	$(".form-edit").parent().remove();
	$("#autocomplete_address_form").addClass('hidden');
	$('span.value_profile').show();
	$("#edit_action p a").show();
}

$("#edit_action p[id^='edit_'] a").click(function(){

	refesh_form_edit_profile();

	var case_form = $(this).parents("p[id^='edit_']").attr("id");
	var tab_span = $(this).parents("p[id^='edit_']").children('span.value_profile');
	var text = $(this).parents("p[id^='edit_']").children('span.value_profile').html();
	tab_span.hide();
	$(this).hide();
	switch(case_form){
		case "edit_sex":
			$(this).before("\
				<div>\
				<span class='form-edit'>\
					<select class='edit-profile-input'><option>Male</option><option>Female</option></select> \
					<button class='btn btn-primary btn-sm save-button' >Save</button>\
				</span>\
				</div>\
				");
		break;
		case "edit_address":
			$("#autocomplete_address_save").val(text);
			$("#autocomplete_address_form").removeClass('hidden');
			return;
		break;
		default:
			$(this).before("\
				<div>\
					<span class='form-edit'>\
						<input type='text' class='edit-profile-input'> \
						<button class='btn btn-primary btn-sm save-button' >Save</button>\
					</span>\
				</div>\
				");
			if(case_form=="edit_birthday"){
				$(".form-edit input").datepicker({dateFormat:"mm/dd/yy"});
			}
		break;
	}
	$(this).parent().find("input").val(text);
	$(this).parent().find("input").focus();
});

$(document).on("keydown",".form-edit input",function(event){
	if(event.which==13){
		$(this).parent().children('button').trigger("click");
	}
});
$(document).on("click",".save-button",function(){
	if($(this).parent().children("input").length==0){
		value = $(this).parent().children("select").val();
	}else{
		value = $(this).parent().children("input").val();
	}
	id = $(this).parents("[id^='edit_']").attr("id");
	if(!validate_form(id,value)){
		if(msg_error["edit_email"]){
			alert(msg_error["edit_email"]);
		}
		if(msg_error["edit_birthday"]){
			alert(msg_error["edit_birthday"]);
		}
		return;
	}
	set_show = $(this).parents("[id^='edit_']").children('span.value_profile');
	$.post('/edit_profile', {field: id,value:value}, function(data, textStatus, xhr) {
		if(parseInt(data)){
			set_show.text(value);
			set_show.show();
			if(id!="edit_address"){
				$(".form-edit").parent().remove();
			}else{
				//$(".acceptSave").trigger("click");
				$("#modal-box").modal("show");
				$("#modal-box .modal-title").text("Do you want to change address ?");
				$(".modal-body").html('<div class="text-center"><button type="button" class="btn btn-primary acceptSave">Save</button> <button type="button" class="btn btn-default rejectSave">Cancel</button></div>');
			}
		}else{
			alert("error");
		}
	});
})

function validate_form(id,value){
	switch(id){
		case "edit_email":
			var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
			flag = re.test(value);
			if(flag==false){
				msg_error["edit_email"] = "Please input Email";
			}else{
				msg_error["edit_email"] = null;
			}
			return flag;
		break;
		case "edit_birthday":
			var re = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/igm;
			flag = re.test(value);
			if(flag==false){
				msg_error["edit_birthday"] = "Please input Birthday";
			}else{
				msg_error["edit_birthday"] = null;
			}
			return flag;
		break;
	}
	return true;
}
if($("#edit_fullname a").length>0){
	$(".content_introduction").click(function(){
		$(this).toggleClass('hidden');
		$(".input_introduction").toggleClass('hidden');
	});
	$(".content_introduction").blur(function(event) {
		$(this).toggleClass('hidden');
		$(".input_introduction").toggleClass('hidden');
	});
	$(".input_introduction .btn-default").click(function(){
		$(".content_introduction").toggleClass('hidden');
		$(".input_introduction").toggleClass('hidden');
	});

	$('#summernote').summernote({
		height: "200px",
		toolbar: [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']]
		]
	});
		
		
	$(".input_introduction .btn-primary").click(function(){
		id="edit_introduction";
		//value = $(".input_introduction textarea").val();
		value = $('#summernote').summernote("code");
		$.post('/edit_profile', {field: id,value:value}, function(data, textStatus, xhr) {
			json_data = (JSON.parse(data));
			if(json_data.status==1){
				$(".content_introduction").html(json_data.value);
				$(".input_introduction textarea").val(json_data.value);
				$(".content_introduction").toggleClass('hidden');
				$(".input_introduction").toggleClass('hidden');
			}else{
				alert("Error");
			}
		});
		
	})
}
