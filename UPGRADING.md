# UPGRADING

## 1.3 > 2.0

Follow the [upgrade guide of the framework](https://github.com/phalcon-nucleon/framework/blob/2.x/UPGRADING-2.0.md),
starting with its Rector configuration. In this skeleton, the 2.0 branch also:

- requires PHP >= 8.3, Phalcon >= 5.22, `nucleon/framework` 2.0, and in development PHPUnit 11, `phalcon/debugbar` and
  `tempest/highlight`;
- removes `config/compile.php`, `config/assets.php` and `resources/assets` (Optimizer and Assets removed: build the
  assets with your own tools; the compiled CSS of `public/css` are kept);
- writes `config/cache.php`, `log.php`, `session.php`, `auth.php`, `database.php`, `error.php` and `view.php` in the
  2.0 formats, and adds `config/http_client.php`, `security.php` and `debug.php`; `.const.ini`: `cache.store` and
  `session.store` (were `driver`), a `[redis]` section; `.const.production.ini` turns the debug off;
- no longer registers the error handler in `bootstrap/app.php`, nor passes `$argv` to the console;
- describes the `User` model with attributes; the users migration is anonymous;
- `AuthController`: `attempt()` returns a bool, the user is read with `auth->user()`;
- `ThrottledController`: `middleware(ThrottleRequest::class, 60, 60)` (the 1.3 skeleton passed an array);
- `ExampleTask`: documented with attributes, reads its arguments with `getArg()`;
- adds a `Dockerfile` (PHP-FPM, OPcache preload) and a GitHub Actions workflow.


## 1.2 > 1.3

### Config 
You must modify all paths using "\_\_DIR__", so that it now uses "BASE_PATH".

#### config/session.php
Session define now multiple stores, and a default store. 
You should move your session config in store, add a set this store has default store. 
```php
<?php
// session.php, OLD
return [
  'id' => SESSION_ID,

  'adapter' => 'Files',
];
```

```php
<?php
// session.php, NEW
return [
  'id' => SESSION_ID,

  'default' => 'files',

  'stores' => [
    'files' => [
      'adapter' => 'Files'
    ]
  ]
];
```