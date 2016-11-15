{# auth\signin.volt #}
{% extends "templates/layout.volt" %}

{% block title %}Sign in{{ super() }}{% endblock %}

{% block content %}
    <div class="container">
        <h1>Register</h1>
        {{ form('/register', 'method': 'post', 'class' : 'form-horizontal') }}
        <fieldset>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                    {{ text_field('name', 'class' :'form-control', 'placeholder': 'Username', 'required': 'true') }}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    {{ text_field('email', 'type': 'email', 'class' :'form-control', 'placeholder': 'Email', 'required': 'true') }}
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    {{ password_field('password',  'class' :'form-control', 'placeholder': '******', 'required': 'true') }}
                </div>
            </div>
            <div class="form-group">
                <label for="confirm" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                    {{ password_field('confirm',  'class' :'form-control', 'required': 'true') }}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {{ submit_button('Register',  'class' :'btn btn-default') }}
                </div>
            </div>
        </fieldset>
        {{ end_form() }}
    </div>
{% endblock %}