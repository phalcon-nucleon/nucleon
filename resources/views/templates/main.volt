{# templates/main.volt #}<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{% block title %}{% endblock %}</title>

    {% block head %}{% endblock %}
</head>
<body>
<div id="header">
    {% include "partials/header.volt" %}
</div>
<div id="content" class="container-fluid">{% block content %}{% endblock %}</div>
<div id="footer">{% block footer %}{% endblock %}</div>
{% block scripts %}{% endblock %}
</body>
</html>