{% extends 'layouts/template.volt' %}

{% block title %}Internal Server Error{% endblock %}

{% block body %}
  <div class="page-content h-center v-center">
    <div class="center-align">
      <h1 style="font-family:Roboto; font-size: 15rem;height: 16rem;">
        5<img style="height: 180px" src="{{ url('/img/nucleon.svg') }}"/>x
      </h1>
    </div>
  </div>
{% endblock %}
