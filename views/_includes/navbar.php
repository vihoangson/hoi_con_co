<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Lesson 3</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			{% if user_info %}
				<ul class="nav navbar-nav">
					<li><a href="/friend_list">Friend list({{ user_info.friends|length }})</a></li>
					<li><a href="/follow_list">Follow list({{ user_info.follow|length }})</a></li>
					{% if user_info.request|length > 0 %}
					<li><a href="/favorite_list">Request list <span class="alt-request">{{ user_info.request|length }}</span></a></li>
					{% endif %}
				</ul>
				<form action="/profile/search_user" class="navbar-form navbar-left" role="search" method="get">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" name="keyword">
					</div>
					<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
				</form>
			{% else %}
				<ul class="nav navbar-nav">
					<li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
					<li><a href="/register">Register</a></li>
				</ul>
			{% endif %}
			<ul class="nav navbar-nav navbar-right">				
				<li class="dropdown">
					{% if user_info %}					
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><img class="avatar-navbar" onError="http://placehold.it/200x200" src="{{user_info.avatar}}" class="img-responsive" alt=""> Hi {{user_info.username}}</b><b class="caret"></b></a>
					{% else %}
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
					{% endif %}
					
					<ul class="dropdown-menu">
						{% if user_info %}
							<li><a href="/profile"><i class="fa fa-sticky-note-o"></i> My profile</a></li>
							<li><a href="/setting"><i class="fa fa-check-square"></i> My setting</a></li>
							<li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
						{% else %}
							<li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
							<li><a href="/register">Register</a></li>
						{% endif %}
					</ul>
				</li>

			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
