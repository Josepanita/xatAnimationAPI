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
<script type="text/javascript" src="assets/js/init.js"></script>
{% endblock %}

{% block top_bar%}
<ul class="nav">
    <li><a href="./">Overview</a></li>
    <li class="active"><a href="#">Conversor</a></li>
    <li><a href="./tester/">Tester</a></li>
    <li><a href="./aboutme/">About Me</a></li>
</ul>
{% endblock %}

{% block content %}
    <div class="content">
        <div class="page-header">
            <h1>XatTools &raquo; Conversor <small>Convert from gif animated image to animate power tile.</small></h1>
        </div>
        <div class="row">
            <div class="span10">
                <h2>Main content</h2>
                <form action="{{ root_uri }}/convert_image.php" method="post" id="form">
                    <div id="internal">
                        <div class="clearfix row">
                            <label for="file">Imagen</label>
                            <div class="input">
                                <input type="file" name="file" id="file" /> 
                            </div>
                        </div>
                        <a href="#" class="ext">¿Quieres convertir una imagen externa?</a>
                        <div id="fileQueue"></div>
                    </div>
                    <div id="external" style="display:none;">
                        <div class="clearfix row">
                            <label for="url">Url de la imagen</label>
                            <div class="input">
                                <input type="url" name="url" id="url" class="span6"/>
                            </div>
                        </div>
                        <a href="#" class="ext">¿Quieres convertir una imagen desde tu PC?</a>
                    </div>
                </form>
                
            </div>
            <div class="span6">
                <form action="#" class="form-stacked" id="prev_form">
                    <div class="row clearfix" id="previews">
                        <div class="span3">
                            <h4>Animacion Gif</h4>
                            <div id="img"><img src="./assets/img/gif.jpg" class="preview" /></div>
                        </div>
                        <div class="span3">
                            <h4>Animacion PNG</h4>
                            <div id="animHolder" class="preview">
                                <div id="animTest"><img src="./assets/img/anim.jpg" class="preview" /></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label for="jpgpath">Imagen Convertida</label>
                        <div class="clearfix">
                            <input type="text" value="" class="input span6 filepath" id="jpgpath" />
                        </div>
                    </div>
                    <div class="row">
                        <label for="gifpath">Imagen Original</label>
                        <div class="clearfix">
                            <input type="text" value="" class="input span6 filepath" placeholder="http://" id="gifpath" />
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="clearfix">
                            <a href="" class="link" id="tile">Animacion Convertida</a>
                        </div>
                        
                        <div class="clearfix">
                            <a href="" class="link" id="anim">Animacion GIF</a> 
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
{% endblock %}