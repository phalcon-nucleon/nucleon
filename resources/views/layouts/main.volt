
<div id="header">
    {% include "partials/header.volt" %}
</div>
<div id="content">
    {{ content() }}
</div>
<div class="flash-output container">
    {{ flash.output() }}
</div>
<div id="footer">
    {% include "partials/footer.volt" %}
</div>