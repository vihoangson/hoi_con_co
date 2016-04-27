{% extends "app.php" %}

{% block title_page %}Friend list{% endblock %}

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
