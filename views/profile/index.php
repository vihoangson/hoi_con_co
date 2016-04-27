{% extends "app.php" %}

{% block title_page %}Profile{% endblock %}

{% block custom_style_header %}
	<link rel="stylesheet" href="/assets/css/timeline.css">
	<style>
		#map-canvas {
			height: 500px;
		}
	</style>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="/assets/css/avatar_style.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/cropper/2.3.0/cropper.min.css">
	<!-- include summernote css/js-->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
{% endblock %}
{% block content %}
<div class="row">
	<div class="col-sm-3">
		<div class="thumbnail avatar-block text-center">
			<img src="{{user.avatar}}" onError="this.src='http://placehold.it/300x300'">
			{% if status_page=="owner" %}
			<button style="margin-top:5px;" type="button" class="btn btn-info hidden button-avt change-avatar">Change avatar</button>
			<form id="uploadavatar" action="" enctype="multipart/form-data" method="post">
				<input id="File_avatar" type="file" name="file_x" style="display:none;">
			</form>
			{% endif %}
		</div>
	</div>
	<div class="col-sm-9" id="edit_action" class='info_user' data-id="{{user.id}}">
		<p id="edit_fullname"><span class="value_profile">{{user.fullname}}</span>{% if status_page=="owner" %}<a href='javascript:void(0)'><i class="fa fa-pencil"></i> Edit</a>{% endif %}</p>
		<p id="edit_sex"><b>Sex: </b><span class="value_profile">{{(user.sex==1)?"Male":"Female"}}</span> {% if status_page=="owner" %}<a href='javascript:void(0)'><i class="fa fa-pencil"></i> Edit</a>{% endif %}</p>
		<p id="edit_birthday"><b>Birthday: </b><span class="value_profile">{{user.birthday|twig_formatday}}</span> {% if status_page=="owner" %}<a href='javascript:void(0)'><i class="fa fa-pencil"></i> Edit</a>{% endif %}</p>
		<p id="edit_address"><b>Address: </b><span class="value_profile">{{user.address}}</span> 
			{% if status_page=="owner" %}
			<span id="autocomplete_address_form" class="hidden" ><input id="autocomplete_address_save" class=""><button class='btn btn-primary btn-sm save-button' >Save</button></span>
			<a href='javascript:void(0)'><i class="fa fa-pencil"></i> Edit</a>
			{% endif %}
		</p>
		<p id="edit_email"><b>Email: </b><span class="value_profile">{{user.email}}</span> {% if status_page=="owner" %}<a href='javascript:void(0)'><i class="fa fa-pencil"></i> Edit</a>{% endif %}</p>
	</div>
</div>

	<div class="qa-message-list input-box" id="wallmessages">
		<div class="message-item" id="m9">
			<div class="message-inner">
				<div class="message-head clearfix hidden">
					<div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=amiya"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
					<div class="user-detail">
						<h5 class="handle">amiya</h5>
						<div class="post-meta">
							<div class="asker-meta hidden">
								<span class="qa-message-what"></span>
								<span class="qa-message-when">
									<span class="qa-message-when-data">Nov 24, 2013</span>
								</span>
								<span class="qa-message-who">
									<span class="qa-message-who-pad">by </span>
									<span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=amiya">amiya</a></span>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="qa-message-content">
					<input  class="form-control" id="write-timeline" data-id='{{user.id}}' placeholder="Write something ...">
				</div>
			</div>
		</div>
		<div class="body-notify">
			
			{% for item in data_notify %}
				<div class="message-item ele-item" id="">
					<div class="message-inner">
						<div class="message-head clearfix">
							<div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=amiya"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
							<div class="user-detail">
								<h5 class="handle">amiya</h5>
								<div class="post-meta">
									<div class="asker-meta">
										<span class="qa-message-what"></span>
										<span class="qa-message-when">
											<span class="qa-message-when-data">Nov 24, 2013</span>
										</span>
										<span class="qa-message-who">
											<span class="qa-message-who-pad">by </span>
											<span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=amiya">amiya</a></span>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="qa-message-content">
							{{item.content}}
						</div>
					</div>
				</div>
			{% endfor %}
		</div>
			<div class="message-item sample hidden" id="">
				<div class="message-inner">
					<div class="message-head clearfix">
						<div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=amiya"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
						<div class="user-detail">
							<h5 class="handle">amiya</h5>
							<div class="post-meta">
								<div class="asker-meta">
									<span class="qa-message-what"></span>
									<span class="qa-message-when">
										<span class="qa-message-when-data">Nov 24, 2013</span>
									</span>
									<span class="qa-message-who">
										<span class="qa-message-who-pad">by </span>
										<span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=amiya">amiya</a></span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="qa-message-content">
						test
					</div>
				</div>
			</div>
	</div><!-- wallmessages -->

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Box detail</h3>
	</div>
	<div class="panel-body">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs " role="tablist">
				<li role="presentation" class="active" >
					<a href="#user_introduction" aria-controls="user_introduction" role="tab" data-toggle="tab"><i class="fa fa-sticky-note"></i> Introduction</a>
				</li>
				<li role="presentation">
					<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab"><i class="fa fa-picture-o"></i> Picture</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="user_introduction"><hr><div class="content_introduction">{% if user.introduction %}{{user.introduction|raw }}{% else %}<small>[Empty]</small>{% endif %} </div>
					{% if status_page=="owner" %}
						<div class="hidden input_introduction">
							<!-- <textarea rows="13" class="form-control" >{{user.introduction}}</textarea> -->
							<div id="summernote">{{user.introduction|raw }}</div>
							<hr>
							<button type="button" class="btn btn-default">Cancel</button>
							<button type="button" class="btn btn-primary">Save</button>
						</div>
						<br>
						<small><i class="fa fa-pencil"></i> Click text to edit</small>
					{% endif %}
				</div>
				<div role="tabpanel" class="tab-pane" id="tab">
					<hr>
					<div class="row box-img">
						{% if status_page=="owner" %}
							<div class='col-sm-3'>
								<div class='thumbnail button-upload-img'><img src='/assets/img/file_add.png' onError='this.src="http://placehold.it/200x200"'></div>
								<form id="uploadpic" action="" enctype="multipart/form-data" method="post">
									<input id="File1" type="file" class="upload_picture" name="file_x[]" style="display:none;" multiple>
								</form>
							</div>
						{% endif %}
						{% if photos %}
							{% for key,item in photos %}
								<div class="col-sm-3 img_block" data-id='{{item.id}}'>
									<div class="thumbnail ele-picture text-center"><img src="{{item.url}}" onError="this.src='http://placehold.it/200x200'"></div>
									{% if (status_page=="friend" or status_page=="owner") %}
										{% if like[item.id].picture_id != item.id %}
										<button type="button" class="btn btn-sm btn-default button-like like"><i class="fa fa-thumbs-up"></i> Like</button>
										{% else %}
										<button type="button" class="btn btn-sm btn-default button-like unlike"><i class="fa fa-thumbs-down"></i> Unlike</button>
										{% endif %}
									{% endif %}
									<button type="button" class="btn btn-sm btn-default button-view"><i class="fa fa-eye"></i> View(<i class='count-view'>{{item.view}}</i>)</button>
									{% if status_page=="owner" %}<button type="button" class="btn btn-sm btn-default button-delete"><i class="fa fa-trash"></i> Delete</button>{% endif %}
								</div>
							{% endfor %}
						{% else %}
								<div class="col-sm-3 img_block hidden" data-id='{{item.id}}'>
									<div class="thumbnail ele-picture text-center"><img src="{{item.url}}" onError="this.src='http://placehold.it/200x200'"></div>
									{% if (status_page=="friend" or status_page=="owner") %}
										{% if like[item.id].picture_id != item.id %}
										<button type="button" class="btn btn-sm btn-default button-like like"><i class="fa fa-thumbs-up"></i> Like</button>
										{% else %}
										<button type="button" class="btn btn-sm btn-default button-like unlike"><i class="fa fa-thumbs-down"></i> Unlike</button>
										{% endif %}
									{% endif %}
									<button type="button" class="btn btn-sm btn-default button-view"><i class="fa fa-eye"></i> View(<i class='count-view'>{{item.view}}</i>)</button>
									{% if status_page=="owner" %}<button type="button" class="btn btn-sm btn-default button-delete"><i class="fa fa-trash"></i> Delete</button>{% endif %}
								</div>
						{% endif %}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}

{% block custom_script %}
<div class="modal fade" id="modal-box">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<div class="percent"></div><div id="image_view"></div>
			</div>
		</div>
	</div>
</div>

<script src="//code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>

<script src="/assets/js/edit_profile_script.js"></script>

<script src="/assets/js/edit_photo_profile_script.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/cropper/2.3.0/cropper.min.js"></script>

<script src="/assets/js/avatar_script.js"></script>


<script>
	$("#write-timeline").focus();
	$("#write-timeline").keydown(function(event){
		if(event.which==13){
			if($(this).val()==""){
				return false;
			}
			var params={
				value:$(this).val(),
				id:$(this).data('id'),
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
						clon.find(".qa-message-content").text(val.content);
						$(".body-notify").append(clon);
						
					});
					$("#write-timeline").val("");
				}else{
					alert("error");
				}
			});
		}
	});
</script>

{% endblock %}
