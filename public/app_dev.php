<?php

if (isset($_SERVER['HTTP_CLIENT_IP'])
  || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check ' . basename(__FILE__) . ' for more information.');
}

if (preg_match('/\.(?:png|jpg|jpeg|gif|ico|css|js|svg|ttf|eot|woff|woff2)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

if (strpos($_SERVER['REQUEST_URI'], '/api/') === 0) {
    return require __DIR__ . '/micro.php';
}

return require __DIR__ . '/index.php';