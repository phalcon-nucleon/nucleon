<?php

/*
 +-------------------------------------------------------------------
 | HTTP client configuration
 +-------------------------------------------------------------------
 |
 | Default options of the `httpClient` service (Http Facade), the options of Neutrino\HttpClient\Options:
 | base_uri, headers, timeout, max_duration, max_redirects, proxy, verify_peer…
 | `transport`: curl (default with ext-curl), stream, or a class implementing Neutrino\HttpClient\Transport.
 */
return [
    'timeout' => 10,
    'headers' => ['user-agent' => 'Nucleon'],
];
