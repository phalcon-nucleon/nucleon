<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nucl&eacute;on</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .logo{
            display: block;
            margin: auto;
            max-width: 96px;
            max-height: 96px;
        }
    </style>
</head>
<body>
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
            {{ microtime(true) - _SERVER['REQUEST_TIME_FLOAT'] }}
        </div>
        <div>
            {{ memory_get_peak_usage() }}
        </div>
    </div>
</div>
</body>
</html>