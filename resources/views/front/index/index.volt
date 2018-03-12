{% extends 'front/layouts/template.volt' %}

{% block body %}
  <div class="page-content h-center v-center">
    <div class="center-align">
      <div class="title">
        <img class="logo" src="{{ url('img/nucleon.svg') }}"/>
        Nucl&eacute;on
      </div>
      <div>
        <h3><small>[Frontend]</small> Index</h3>
      </div>
      {% include 'partials/flash.volt' %}
    </div>
  </div>
{% endblock %}
