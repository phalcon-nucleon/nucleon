{% extends "templates/skeleton.volt" %}

{% block title %}Internal Server Error{{ super() }}{% endblock %}

{% block head %}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
{% endblock %}

{% block content %}
    <style>
        pre.panel-body {
            border-radius: 0px;
            margin: 0;
            border: 0;
        }
    </style>
    <div class="container">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <strong>Ooops..</strong> {{ error['typeStr'] }} {{ error.isException ? ' : ' ~ get_class(error['exception']) : '' }}
                </h3>
            </div>
            <pre class="panel-body">{{ error['typeStr'] }} {{ error.isException ? ' : ' ~ get_class(error['exception']) : '' }} : {{ error['message'] }}<br/>{{ error['file'] }} : {{ error['line'] }}
                {% if error.isException %}
                    {{ constant('PHP_EOL') }}{{ error['exception'].getTraceAsString() }}
                {% endif %}
            </pre>
        </div>
    </div>
{% endblock %}