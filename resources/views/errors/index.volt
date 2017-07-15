<div class="container">
    <style>
        pre.panel-body {
            border-radius: 0px;
            margin: 0;
            border: 0;
        }
    </style>
    <div class="panel panel-danger">
        <div class="panel-heading">
            <h3 class="panel-title">
                <strong>Ooops..</strong> {{ error['typeStr'] }} {{ error.isException ? ' : ' ~ get_class(error['exception']) : '' }}
            </h3>
        </div>
        <pre class="panel-body">{{ error['typeStr'] }} {{ error.isException ? ' : ' ~ get_class(error['exception']) : '' }}
            : {{ error['message'] }}<br/>{{ error['file'] }} : {{ error['line'] }}
            {% if error.isException %}
                {{ constant('PHP_EOL') }}{{ error['exception'].getTraceAsString() }}
            {% endif %}
            </pre>
    </div>
</div>