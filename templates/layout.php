<!DOCTYPE html>
<html>
    <head>
        <base href="{{ root_uri }}/" />
        <title>{% block page_title %} {% endblock %}</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        {% block styles %} {% endblock %}
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="topbar">
            <div class="fill">
                <div class="container">
                    <a class="brand" href="{{root_uri}}">XatTools</a>
                    {% block top_bar %} {% endblock %}

                </div>
            </div>
        </div>
        <div class="container">
            {% block content %} {% endblock %}

            <footer>
                <p>&copy; Company 2012</p>
            </footer>
        </div>
    </body>
    {% block scripts %}{% endblock %}
</html>