<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>{% block title %}Welcome!{% endblock %}</title>
  <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}"/>
  {# Import Fonts #}
  {% do assets.collection('common.css').addCss('https://fonts.googleapis.com/icon?family=Material+Icons') %}
  {% do assets.collection('common.css').addCss('https://fonts.googleapis.com/css?family=Raleway:100,600') %}
  {# Import app.css #}
  {% do assets.collection('common.css').addCss('css/app.css') %}
  {# Output common.css #}
  {% do assets.outputCss('common.css') %}

  {# Block for specific css #}
  {% block stylesheets %}{% endblock %}
  {# Output other css #}
  {% do assets.outputCss() %}

  {# Let browser know website is optimized for mobile #}
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="container">
  {% block body %}{% endblock %}
</div>

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
