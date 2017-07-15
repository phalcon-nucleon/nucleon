<div class="flex-center position-ref full-height">
    <div class="top-right links">
        {% if (auth.check()) %}
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/logout') }}">Logout</a>
        {% else %}
            <a href="{{ url('login') }}">Login</a>
            <a href="{{ url('register') }}">Register</a>
        {% endif %}
    </div>

    <div class="content">
        <div class="title m-b-md">
            <img class="logo" src="{{ url('img/nucleon.svg') }}"/>
            Nucl&eacute;on
        </div>
        <div>
            <h3>[NoModule] Home</h3>
        </div>
        <div>
            {{ (microtime(true) - _SERVER['REQUEST_TIME_FLOAT']) * 1000 }} ms
        </div>
        <div>
            {{ memory_get_peak_usage() }}
        </div>
    </div>
</div>