{% extends 'layouts/template.volt' %}

{% block body %}
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active" href="#error">{{ isException ? 'Exception' : 'Fatal error' }}</a></li>
        <li class="tab col s3"><a href="#list">Errors list</a></li>
      </ul>
    </div>
    <div id="error" class="col s12">
      {% include 'errors/components/card-error.volt' %}
    </div>
    <div id="list" class="col s12">
      {% include 'errors/components/flash-list.volt' %}
    </div>
  </div>
{% endblock %}
