{%- macro highlightFile(file) -%}
  {% set file = str_replace(constant('BASE_PATH') ~ constant('DIRECTORY_SEPARATOR'), '', str_replace(['\\', '/'], constant('DIRECTORY_SEPARATOR'), file)) %}

  {% if preg_match('!(\w+\.[a-z]{2,4})(?:\((\d+)\))$!', file) %}
    {{ preg_replace('!(\w+\.[a-z]{2,4})(?:\((\d+)\))$!', '<b>$1</b> (line: $2)', file) }}
  {% else %}
    {{ preg_replace('!(\w+\.[a-z]{2,4})$!', '<b>$1</b>', file) }}
  {% endif %}
{%- endmacro -%}

{%- macro highlightFunc(func) -%}
  {{ preg_replace('!(.+)->(\w+)(.+)!', '<span class="red-text text-darken-4">$1</span>-><span class="red-text text-darken-2">$2</span><span class="grey-text text-darken-1">$3</span>', func) }}
{%- endmacro -%}

{% if error['isException'] %}
  {% for exception in exceptions %}
    <div class="card grey lighten-3">
      <div class="card-content">
      <span class="card-title red-text text-accent-4">
        #{{ loop.index }} <b>{{ exception['class'] }}</b>
        <br/>
      <small class="grey-text text-darken-4">
        <b>in : </b> {{ highlightFile(exception['file']) }}
        (line: {{ exception['line'] }})
      </small>
        <pre><small class="grey-text text-darken-3">{{ exception['message'] | default('no message') }}</small></pre>
      </span>
        <div>
          <ul class="collection">
            {% for trace in exception['traces'] %}
              <li class="collection-item blue-grey lighten-3 white-text">
                <span class="grey-text text-darken-3">
                  {{ highlightFunc(trace['func']) }}
                </span>
                <br/>
                <small class="grey-text text-darken-3">
                  in :
                  {% if trace['file'] is defined %}
                    {{ highlightFile(trace['file']) }}
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
      </div>
    </div>
  {% endfor %}
{% else %}
  <div class="card grey lighten-3">
    <div class="card-content">
      <span class="card-title red-text text-accent-4">
      {{ error['typeStr'] }}
        <br/>
      <small
        class="grey-text text-darken-4"><b>in : </b> {{ highlightFile(error['file']) }}
        (line: {{ error['line'] }})</small>
        <pre><small class="grey-text text-darken-3">{{ error['message'] | default('no message') }}</small></pre>
      </span>
    </div>
  </div>
{% endif %}