{% extends "app.php" %}

{% block title_page %}Setting page{% endblock %}

{% block content %}
<!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img onError="http://placehold.it/200x200" src="{{user_info.avatar}}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{user_info.fullname}}
					</div>
					<div class="profile-usertitle-job">
						{{user_info.username}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm"><i class="fa fa-tasks"></i> Task</button>
					<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-sticky-note"></i> Note</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="javascript:void(0)">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="javascript:void(0)">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="javascript:void(0)" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="javascript:void(0)">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Setting</h3>
					</div>
					<div class="panel-body">
						<form action="" method="post" onsubmit="return postForm()">
							{% for key,item in setting %}
								<div class="row">
									<div class="col-sm-6 text-right"><h3>{{item.display_name}}:</h3></div>
									<div class="col-sm-6">
										{% if item.type=="boolean" %}
											<div class="checkbox">
												<label>
												<input type='hidden' value='0' name='setting_{{key}}'>
												<input type="checkbox" data-onstyle="success" data-toggle="toggle" name="setting_{{key}}" value="1"  {% if item.value == true %}checked{% endif %}>
												</label>
											</div>
										{% else %}
											<p><input class="form-control" type="text"name="setting_{{key}}" value="{{item.value}}"></p>
										{% endif %}
										{% if item.desc %}<div><small><i class="fa fa-question-circle"></i> {{item.desc|raw}}</small></div>{% endif %}
									</div>
								</div>
							{% endfor %}
							<div id="summernote hidden"></div>
							<textarea name="content" class="hidden"></textarea>
							<br>
							<div class="text-center">
								<button class="btn btn- btn-default" onClick="location.href='/'" type="button"><i class="fa fa-home"></i> Back to homepage</button>
								<button class="btn btn- btn-primary" type="submit"><i class="fa fa-save"></i> Save setting</button>
							</div>
						</form>
					</div>
				</div>
            </div>
		</div>
	</div>
</div>
{% endblock %}

{% block custom_script %}
{% endblock %}
