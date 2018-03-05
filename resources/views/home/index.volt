{% extends 'layouts/template.volt' %}

{% block body_class %}home{% endblock %}

{% block body %}
  <div class="page-content">
    <div class="center-align">
      <div class="title">
        <img class="logo" src="{{ url('img/nucleon.svg') }}"/>
        Nucl&eacute;on
      </div>
      <div>
        <h3>
          <small>[NoModule]</small>
          Home
        </h3>
      </div>
    </div>
  </div>
{% endblock %}
