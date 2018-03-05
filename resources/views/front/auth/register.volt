{% extends 'layouts/template.volt' %}

{% block body %}
<div class="page-content">
  <div class="container">
    <h1>Register</h1>
    {{ form('/register', 'method': 'post', 'class' : 'form-horizontal') }}
    <div class="row">
      <div class="input-field col s12">
        {{ text_field('name', 'class' :'form-control', 'required': 'true') }}
        <label for="email">Username</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        {{ text_field('email', 'type': 'email', 'class' :'form-control', 'required': 'true') }}
        <label for="email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        {{ password_field('password',  'class' :'form-control', 'required': 'true') }}
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        {{ password_field('confirm',  'class' :'form-control', 'required': 'true') }}
        <label for="confirm">Confirm Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        {{ submit_button('Register',  'class' :'btn btn-default') }}
      </div>
    </div>
    {{ end_form() }}
  </div>
</div>
{% endblock %}
