{% extends "templates/layout.volt" %}

{% block title %}Index{% endblock %}

{% block content %}
    <div class="page-header">
        <h1>Congratulations!</h1>
    </div>
    <p>You're now flying with Phalcon. Great things are about to happen!</p>

    <p>This page is located at <code>views/index/index.volt</code></p>

    <p>{{ content }}</p>
{% endblock %}
