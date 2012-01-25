{% extends 'layout.php' %}
{% block page_title %} {{ title }} {% endblock %}
{% block styles %}
<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
<link href="assets/css/docs.css" rel="stylesheet"/>
<link href="assets/css/uploadify.css" rel="stylesheet"/>
<link href="assets/css/style.css" rel="stylesheet"/>
<style type="text/css">
    body {
        padding-top: 60px;
    }
</style>
{% endblock %}
{% block scripts %}
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/swfobject.js"></script>
<script type="text/javascript" src="assets/js/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="assets/js/anim-tester.js"></script>
{% endblock %}
{% block top_bar%}
<ul class="nav">
    <li><a href="./index.php">Overview</a></li>
    <li><a href="./conversor/">Conversor</a></li>
    <li class="active"><a href="./tester/">Tester</a></li>
    <li><a href="./aboutme/">About Me</a></li>
</ul>
{% endblock %}
{% block content %}
<div class="content">
    <div class="page-header">
        <h1>XatTools &raquo; Tester <small>Test your animations </small></h1>
    </div>
    <div class="row">
        <div class="span10">
            <h2>Test Your Animated Tiles</h2>
            <form action="#" method="post" id="form">
                <div class="clearfix row">
                    <label for="url">Url de la imagen</label>
                    <div class="input">
                        <input type="url" name="url" id="url" class="span5" />
                        <button class="btn primary" id="send">Enviar</button>
                    </div>
                </div>
                <a href="./conversor/">Quieres convertir una imagen desde tu PC?</a>
            </form>
        </div>
        <div class="span6">
            <div class="row">
                <div class="span3 offset2">
                    <h4>Animation</h4>
                    <div id="animHolder" class="preview">
                        <div id="animTest"><img src="./assets/img/anim.jpg" class="preview" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{% endblock %}