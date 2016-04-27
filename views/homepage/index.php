{% extends "app.php" %}

{% block title_page %}
	Lesson 3
{% endblock %}
{% block custom_style_header %}
<link rel="stylesheet" href="/assets/css/timeline.css">
{% endblock %}
{% block content %}
<div class="container">
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
					<input  class="form-control" id="write-timeline" data-id='{{id}}' placeholder="Write something ...">
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
	</div>
</div>
{% endblock %}

{% block custom_script %}
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
