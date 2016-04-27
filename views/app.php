<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{% block title_page %}Lesson{% endblock %}</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-hQpvDQiCJaD2H465dQfA717v7lu5qHWtDbWNPvaTJ0ID5xnPUlVXnKzq7b8YUkbN" crossorigin="anonymous">
		<link rel="stylesheet" href="/assets/vendor/summernote-0.8.1/dist/summernote.css">
		<link rel="stylesheet" href="/assets/css/style.css">
		<link rel="stylesheet" href="/assets/css/eq-height.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		{% block custom_style_header %}{% endblock %}
	</head>
	<body>
		<div class="container">
			{% embed "_includes/navbar.php" %}{% endembed %}
			{% block content %}Nội dung{% endblock %}
		</div>
		<div class="row text-center">
			<hr>
			<div class="col-sm-12"> <h2>Lesson 3</h2>
				<ul class="social-network social-circle">
					<li><a target="_blank" href="http://vihoangson.com" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
					<li><a target="_blank" href="http://fb.com/vihoangson" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
			{% if debug_mod == true %}
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Debug mode: </strong> Still on ... Time load page: {{time_load}}s <br>[ Turn off: <a href='/setting'>Setting</a>]
				</div>
			{% endif %}
		</div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="/assets/js/jquery.form.min.js"></script>
		<script src="/assets/js/script.js"></script>
		<link href="//gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
		<script src="//gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
		{% block custom_script %}{% endblock %}
	</body>
</html>

