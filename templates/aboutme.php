{% extends 'layout.php' %}

{% block page_title %} {{ title }} {% endblock %}

{% block styles %}
<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
<style type="text/css">
    body {
        padding-top: 60px;
    }
</style>
{% endblock %}

{% block top_bar%}
<ul class="nav">
    <li><a href="./">Overview</a></li>
    <li><a href="./conversor/">Conversor</a></li>
    <li><a href="./tester/">Tester</a></li>
    <li class="active"><a href="#">About Me</a></li>
</ul>
{% endblock %}

{% block content %}
<div class="hero-unit">
    <h1>XatTools</h1>
    <p><a class="btn primary large" href="./conversor/">Follow me on Twitter</a>
        <a class="btn info large" href="./tester/">See my projects on GitHub</a></p>
</div>
{% endblock %}