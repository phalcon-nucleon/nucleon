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
   | The cipher of the `crypt` service (Phalcon\Encryption\Crypt). Its messages
   | are signed (HMAC). Data encrypted by Nucleon 1.3 was not: an app upgraded
   | from 1.3 sets 'crypt_signing' => false until it is re-encrypted.
   */
  'cipher' => 'aes-256-ctr',

  // 'crypt_signing' => false,
];