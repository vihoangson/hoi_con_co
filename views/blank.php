<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{% block title_page %}Lesson{% endblock %}</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-hQpvDQiCJaD2H465dQfA717v7lu5qHWtDbWNPvaTJ0ID5xnPUlVXnKzq7b8YUkbN" crossorigin="anonymous">
		<link rel="stylesheet" href="/assets/vendor/summernote-0.8.1/dist/summernote.css">
		<link rel="stylesheet" href="/assets/css/style.css">
		<link rel="stylesheet" href="/assets/css/styles.css">
		<link rel="stylesheet" href="/assets/css/eq-height.css">
		{% block custom_style_header %}{% endblock %}
	</head>
	<body>
		{% block content %}Nội dung{% endblock %}
			<div class="col-sm-12 text-center"> <h2>Lesson 3</h2>
				<ul class="social-network social-circle">
					<li><a target="_blank" href="http://vihoangson.com" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
					<li><a target="_blank" href="http://vihoangson.com" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
	</body>
</html>

