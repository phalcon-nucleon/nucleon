{% extends "templates/layout.volt" %}

{% block title %}Internal Server Error{{ super() }}{% endblock %}

{% block content %}
    <div class="container">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>Ooops..</strong> {{ error['type'] }}</h3>
            </div>
            <div class="panel-body">
                <pre>{{ error['message'] }}<br/>{{ error['file'] }} : {{ error['line'] }}</pre>
                <div>
                    <button class="btn btn-default">Back</button>
                </div>
            </div>
        </div>
    </div>
{% endblock %}