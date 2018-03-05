<footer>
  <span>
    {{ ((microtime(true) - _SERVER['REQUEST_TIME_FLOAT']) * 1000) | round(3) }} ms
  </span>
  <span>
    {{ (memory_get_peak_usage() / 1024) | round(3) }} kb
  </span>
</footer>
