		$.fn.set_friend_button= function (status){
			switch(status){
				case "friend":
					this.html('<i class="fa fa-heart"></i> Make friend');
					this.removeClass('btn-info');
					this.removeClass('btn-danger');
					this.removeClass('btn-warning');
					this.addClass('btn-danger');

				break;
				case "unfriend":
					this.html('<i class="fa fa-trash"></i> Unfriend');
					this.removeClass('btn-info');
					this.removeClass('btn-danger');
					this.removeClass('btn-warning');
					this.addClass('btn-warning');
				break;
				case "cofirm":
					this.html('<i class="fa fa-check"></i> Approve');
					this.removeClass('btn-info');
					this.removeClass('btn-danger');
					this.removeClass('btn-warning');
					this.addClass('btn-info');
				break;
				default:
					alert("Error");
				break;
			}
		}

		var btn_approve  ='<button type="button" class="btn btn-info friend-button status-approve" data-status="approve"><i class="fa fa-check"></i> Approve</button>';
		var btn_wait     ='<button type="button" class="btn btn-success friend-button status-wait" data-status="wait"><i class="fa fa-check"></i> Wait for confirm</button>';
		var btn_friend   ='<button type="button" class="btn btn-danger friend-button status-friend" data-status="friend"><i class="fa fa-heart"></i> Make friend</button>';
		var btn_unfriend ='<button type="button" class="btn btn-warning friend-button status-unfriend" data-status="unfriend"><i class="fa fa-trash"></i> Unfriend</button>';
		var btn_unfollow = '<button type="button" class="btn btn-default follow-button"><i class="fa fa-trash"></i> Unfollow</button>';
		var btn_follow   = '<button type="button" class="btn btn-default follow-button"><i class="fa fa-check"></i> Follow</button>';

		$(document).on("click",".friend-button",function(){
			this_selector = $(this);
			this_selector_parent = $(this).parent();

			status = $(this).data("status");

			user_id_to = $(this).parents(".ele-user").data("id")

			var params = {user_id_to:user_id_to,status:status};
			this_selector.removeClass('friend-button');
			$.post('/toggle_friend', params, function(data_receive, textStatus, xhr) {
				data2 = parseInt(data_receive);
				this_selector.remove();
				switch(data2){
					case 1:
						this_selector_parent.append(btn_wait);
					break;
					case 2:
						this_selector_parent.append(btn_approve);
					//approve
					break;
					case 3:
						this_selector_parent.append(btn_unfriend);

					break;
					case 4:
						this_selector_parent.append(btn_friend);
					break;
				}
			});
		});

		$(document).on("click",".follow-button",function(){
			this_selector = $(this);
			this_selector_parent = $(this).parent();

			user_id = $(this).parents(".ele-user").data("id");
			params = {user_id:user_id};
			this_selector.removeClass("follow-button");
			$.post('/toggle_follow', params, function(data_receive, textStatus, xhr) {
				this_selector.remove();
				if(data_receive=="add"){
					this_selector_parent.append(btn_unfollow);
				}else if(data_receive=="delete"){
					this_selector_parent.append(btn_follow);
				}else{
					alert("Error");
				}
				
			});
		});
