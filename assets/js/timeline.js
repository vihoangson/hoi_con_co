	$("#write-timeline").focus();
	$("#write-timeline_button").click(function(event){
		//if(event.which==13){
		if(true){
			if($("#write-timeline").val()==""){
				return false;
			}
			var params={
				value:$("#write-timeline").val(),
				id:$("#write-timeline").data('id'),
			};

			$.post('/ajax/add_timeline', params, function(data, textStatus, xhr) {
				json_data = JSON.parse(data);
				if(json_data.status==1){
					$(".body-notify").text("");
					$.each(json_data.data, function(index, val) {
						var clon = $(".sample").clone();
						clon.addClass('ele-item');
						clon.removeClass('hidden');
						clon.removeClass('sample');
						textAreaContent=val.content.replace(/\n/g,"<br>");
						clon.find(".qa-message-content").html(textAreaContent);
						$(".body-notify").append(clon);
						
					});
					$("#write-timeline").val("");
				}else{
					alert("error");
				}
			});
		}
	});