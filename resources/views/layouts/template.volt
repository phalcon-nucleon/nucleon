<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>{% block title %}Welcome!{% endblock %}</title>
  <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}"/>
  {# Import Fonts & Icons #}
  {% do assets.collection('common.css').addCss('https://fonts.googleapis.com/icon?family=Material+Icons') %}
  {% do assets.collection('common.css').addCss('https://fonts.googleapis.com/css?family=Raleway:100,300,400') %}
  {# Output common.css #}
  {% do assets.outputCss('common.css') %}

  {# Block for specific css #}
  {% block stylesheets %}
    {% do assets.addCss('/css/app.css') %}
  {% endblock %}
  {# Output other css #}
  {% do assets.outputCss() %}

  {# Let browser know website is optimized for mobile #}
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
{% block header %}
  {% include 'partials/header.volt' %}
{% endblock %}

{% block body %}{% endblock %}

{% block footer %}
  {% include 'partials/footer.volt' %}
{% endblock %}

{# Import library js #}
{% do assets.collection('common.js').addJs('https://code.jquery.com/jquery-3.3.1.min.js') %}
{% do assets.collection('common.js').addJs('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js') %}
{# Output library js #}
{% do assets.outputJs('common.js') %}

{# Block for specific js #}
{% block javascripts %}{% endblock %}
{# Output other js #}
{% do assets.outputJs() %}
</body>
</html>
