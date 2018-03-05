{% extends 'layouts/template.volt' %}

{% block body_class %}errors-debug grey darken-3{% endblock %}

{% block header %}
  <header class="container">
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3">
            <a class="active"
               href="#error">{{ isException ? 'Exception' : 'Fatal error' }}</a>
          </li>
          <li class="tab col s3">
            <a href="#list">Flash messages</a>
          </li>
        </ul>
      </div>
    </div>
  </header>
{% endblock %}

{% block body %}
  <div class="page-content">
    <div class="container">
      <div class="row">
        <div id="error" class="col s12">
          {% include 'errors/components/card-error.volt' %}
        </div>
        <div id="list" class="col s12">
          {% include 'errors/components/flash-list.volt' %}
        </div>
      </div>
    </div>
  </div>
{% endblock %}
