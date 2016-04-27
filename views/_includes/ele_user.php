{% if user_info.id!=item.id %}
	{% set status_f = twig_checkfriend(user_info.id,item.id) %}
	<div class="col-sm-6" >
		<table class="table table-hover ele-user" data-id="{{item.id}}">
			<tbody>
				<tr>
					<td class="" style="padding:10px;"><a class="thumbnail" href="/profile?id={{item.id}}"><img src="{{item.avatar}}" onError="this.src='http://placehold.it/300x300'"></a></td>
					<td style="width:30%">
						<div><h3>{{item.fullname}}</h3></div>
						<div>{{item.username}}</div>
					</td>
					<td style="width:30%;" class="text-right">
						<p><a href="/profile?id={{item.id}}" class="btn btn-info"><i class="fa fa-eye"></i> View profile</a></p>
						<p>
							{% if status_f == 1 %}
								<button type="button" class="btn btn-success friend-button status-wait" data-status="wait"><i class="fa fa-check"></i> Wait for confirm</button>
							{% elseif status_f == 2 %}
								<button type="button" class="btn btn-info friend-button status-approve" data-status="approve"><i class="fa fa-check"></i> Approve</button>
							{% elseif status_f == 3 %}
								<button type="button" class="btn btn-warning friend-button status-unfriend" data-status="unfriend"><i class="fa fa-trash"></i> Unfriend</button>
							{% elseif status_f == 4 %}
								<button type="button" class="btn btn-danger friend-button status-friend" data-status="friend"><i class="fa fa-heart"></i> Make friend</button>
							{% endif %}
						</p>
						{% if buttonfollow == true %}
						<p>
							{% if twig_checkfollow(user_info.id,item.id) %}
								<button type="button" class="btn btn-default follow-button"><i class="fa fa-trash"></i> Unfollow</button>
							{% else %}
								<button type="button" class="btn btn-default follow-button"><i class="fa fa-check"></i> Follow</button>		
							{% endif %}
						</p>
						{% endif %}
					</td>
				</tr>
			</tbody>
		</table>
	</div>
{% endif %}
