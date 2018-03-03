<div class="card grey lighten-3">
  <div class="card-content">
      <span class="card-title red-text text-accent-4">
      {{ error['typeStr'] }}
        {% if isException %}
          : <b>{{ get_class(error['exception']) }}</b>
        {% endif %}
        <br/>
      <small class="grey-text text-darken-4"><b>in : </b> {{ preg_replace('!(\w+\.[a-z]{2,4})$!', '<b>$1</b>', str_replace(constant('BASE_PATH') ~ '/', '', error['file'])) }} (line: {{ error['line'] }})</small>
        <pre style="
        word-break: break-all;
        max-width:  100%;
        margin: 0;
        overflow: hidden;
        white-space: pre-line;
"><small class="grey-text text-darken-3">{{ (isException ? error['exception'].getMessage() : error['message']) | default('no message') }}</small></pre>
      </span>
    {% if isException %}
      <div>
        <ul class="collection">
          {% for trace in traces %}
            <li class="collection-item blue-grey lighten-3 white-text">
                <span class="grey-text text-darken-3">
                  {{ preg_replace('!(.+)->(\w+)(.+)!', '<span class="red-text text-darken-4">$1</span>-><span class="red-text text-darken-2">$2</span><span class="grey-text text-darken-1">$3</span>', trace['func']) }}
                </span>
              <br/>
              <small class="grey-text text-darken-3">
                in
                {% if trace['file'] is defined %}
                  {{ preg_replace('!(\w+\.[a-z]{2,4})(?:\((\d+)\))?$!', '<b>$1</b> (line: $2)', str_replace(constant('BASE_PATH') ~ '/', '', trace['file'])) }}
                  {% if trace['line'] is defined %}
                    &nbsp;(line: {{ trace['line'] }})
                  {% endif %}
                {% else %}
                  [internal function]
                {% endif %}
              </small>
            </li>
          {% endfor %}
        </ul>
      </div>
    {% endif %}
  </div>
</div>