{% extends "app.php" %}
{% block content %}
<style>
.panel-heading {
    padding: 5px 15px;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}

.profile-img {
	width: 96px;
	height: 96px;
	margin: 0 auto 10px;
	display: block;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
}	

</style>
    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="/do_login" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img class="profile-img" src="http://www.best.rs/sc15/en/wp-content/uploads/2015/05/12-512.png" alt="">
									</div>
									{% if error %}
										<div class="text-center"><span class="label label-danger">{{error}}</span></div>
									{% endif %}
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Don't have an account! <a href="/register" onClick=""> Sign Up Here </a>
					</div>
                </div>
			</div>
		</div>
	</div>


	{% if debug_mod == true %}
		<h2>Login as - This part use for Debug</h2>
		<div class="row">
				{% for key,item in users %}
					<div class="col-sm-3 text-center ">
						<a href="/auth/login_as?id={{item.id}}">
							
						
						<p class="thumbnail"><img style="height:50px;width:50px;" src="{{item.avatar}}" onError="this.src='http://placehold.it/50x50'"></p>
						<p><button  class="btn btn-info ">{{item.username}}</button></p>
						</a>
					</div>
				{% endfor %}
		</div>
	{% endif %}
{% endblock %}


{% block custom_script %}
<script>
	window.setTimeout(function(){
		$(".label-danger").fadeOut();
	},1000);
</script>
{% endblock %}
