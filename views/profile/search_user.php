{% extends "app.php" %}

{% set buttonfollow = true %}

{% block title_page %}
Search user
{% endblock %}

{% block content %}
	{% if rs %}
		<div class="row">
			{% for item in rs %}
				{% embed "_includes/ele_user.php" %}{% endembed %}
			{% endfor %}
		</div>
	{% else %}
		<div class="text-center"><h1>No data</h1></div>
	{% endif %}
{% endblock %}

{% block custom_script %}
{% endblock %}
