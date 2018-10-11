<?php

return [
  /*
   +---------------------------------------------------------------
   | Application base uri
   +---------------------------------------------------------------
   |
   | This value define the application base uri.
   | It is useful for router & url service.
   */
  'base_uri' => APP_URL . '/',

  /*
   +---------------------------------------------------------------
   | Application static uri
   +---------------------------------------------------------------
   |
   | This value is used by assets manager.
   | It allow to specify a different domain for static
   | resource (like a cdn).
   */
  'static_base_uri' => APP_STATIC_URL . '/',

  /*
   +--------------------------------------------------------------------------
   | Encryption Key
   +--------------------------------------------------------------------------
   |
   | This key is used by the Phalcon encrypter service and should be set
   | to a random, 32 character string, otherwise these encrypted strings
   | will not be safe. Please do this before deploying an application!
   */
  'key' => APP_KEY,

  /*
   +--------------------------------------------------------------------------
   | Encryption Algorithm
   +--------------------------------------------------------------------------
   | The `aes-256-gcm' is the preferable cipher, but it is not usable until
   | the openssl library is upgraded, which is available in PHP 7.1.
   |
   | The `aes-256-ctr' is arguably the best choice for cipher
   | algorithm in these days.
   */
  'cipher' => 'aes-256-ctr'
];