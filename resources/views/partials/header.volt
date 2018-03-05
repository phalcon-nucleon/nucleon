<header>
    <a class="left" href="{{ url('/') }}">Home</a>
    <a class="left" href="{{ url('/index') }}">Frontend</a>
    <a class="left" href="{{ url('/back/index/index') }}">Backend</a>
  {% if (auth.check()) %}
      <a href="{{ url('/') }}">Home</a>
      <a href="{{ url('/logout') }}">Logout</a>
  {% else %}
      <a href="{{ url('login') }}">Login</a>
      <a href="{{ url('register') }}">Register</a>
  {% endif %}
</header>
