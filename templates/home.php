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
    <li class="active"><a href="#">Overview</a></li>
    <li><a href="./conversor/">Conversor</a></li>
    <li><a href="./tester/">Tester</a></li>
    <li><a href="./aboutme/">About Me</a></li>
</ul>
{% endblock %}

{% block content %}
<div class="hero-unit">
    <h1>XatTools</h1>
    <p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
    <p><a class="btn primary large" href="./conversor/">Conversor &raquo;</a>
        <a class="btn info large" href="./tester/">Tester &raquo;</a></p>
</div>
{% endblock %}