{% extends 'front/layouts/template.volt' %}

{% block body %}
  <div class="page-content h-center v-center">
    <div class="container">
      <h1>Login</h1>
      {% include 'partials/flash.volt' %}
      {{ form('/login', 'method': 'post') }}
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">mail_outline</i>
          {{ email_field('email', 'class' :'validate', 'required': 'true') }}
          <label for="email" data-error="Please enter a valid email address.">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">lock_outline</i>
          {{ password_field('password', 'class' :'validate', 'required': 'true') }}
          <label for="password" data-error="Password can't be empty.">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          {{ submit_button('Login', 'class' :'waves-effect waves-light btn') }}
        </div>
      </div>
      {{ end_form() }}
    </div>
  </div>
{% endblock %}
