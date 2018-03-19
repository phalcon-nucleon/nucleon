{% set uri = router.getRewriteUri() %}

<nav>
  <div class="nav-wrapper">
    <ul class="left">
      <li {{ uri == '/' ? 'class="active"' : '/'}}>
        <a href="{{ url('/') }}">Home</a>
      </li>
      <li {{ uri == '/index' ? 'class="active"' : ''}}>
        <a href="{{ url('/index') }}">Frontend</a>
      </li>
      <li {{ uri == '/back/index/index' ? 'class="active"' : ''}}>
        <a href="{{ url('/back/index/index') }}">Backend</a>
      </li>
    </ul>
    <ul class="right">
      {% if (auth.check()) %}
        <li><a href="{{ url('/logout') }}">Logout</a></li>
      {% else %}
        <li {{ uri == '/login' ? 'class="active"' : ''}}>
          <a href="{{ url('/login') }}">Login</a>
        </li>
        <li {{ uri == '/register' ? 'class="active"' : ''}}>
          <a href="{{ url('/register') }}">Register</a>
        </li>
      {% endif %}
    </ul>
  </div>
</nav>
