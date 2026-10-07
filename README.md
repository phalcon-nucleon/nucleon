<p align="center"><a href="https://phalcon-nucleon.github.io/" target="_blank"><img width="150"src="https://phalcon-nucleon.github.io/img/nucleon.svg"></a></p>

Nucleon : Phalcon extended framework. (App)
===========================================
[![CI](https://github.com/phalcon-nucleon/nucleon/actions/workflows/ci.yml/badge.svg?branch=2.x)](https://github.com/phalcon-nucleon/nucleon/actions/workflows/ci.yml)

# About
Nucleon is a web application that uses [Phalcon](https://www.phalconphp.com/)
.
Our philosophy is to make the web faster, with enjoyable development.

Nucleon, with [Phalcon](https://www.phalconphp.com/), attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine.](https://phalcon-nucleon.github.io/#!basics/routing.html)
- [Powerful dependency injection container, and simple service registration.](https://phalcon-nucleon.github.io/#!architecture-concepts/dependency-injection.html)
- Multiple back-ends for session and cache storage.
- Database agnostic [schema migration](https://phalcon-nucleon.github.io/#!database/migrations.html).
- [HMVC Structure](https://phalcon-nucleon.github.io/#!architecture-concepts/modules-concepts.html).
- [Micro & Fullstack kernel](https://phalcon-nucleon.github.io/#!architecture-concepts/kernels-concepts.html).

# Install
```
\> composer create-project nucleon/nucleon app-root
```

[Read installation documentation](https://phalcon-nucleon.github.io/#!getting-started/installation.html)

# Require
* PHP >= 8.3
* Phalcon >= 5.22 (the `phalcon` extension)
* ext-mbstring
* ext-openssl

# Development
```
php quark server:run          # PHP built-in server on public/app_dev.php
php quark migrate             # database migrations (config/database.php)
php quark ide-helper          # IDE helpers of the Facades and services
vendor/bin/phpunit
```

With `APP_DEBUG` (`.const.ini`), the errors show the debug error page, and `phalcon/debugbar` (a development
dependency) its bar on the HTML pages.

# Production
`php quark optimize --no-dev` compiles the constants, the configuration, the routes and the views, dumps an
authoritative Composer classmap and writes the OPcache preload script `bootstrap/compile/preload.php`
(`opcache.preload`). The `Dockerfile` builds a PHP-FPM image this way (`APP_ENV=production`, `.const.production.ini`).

# Upgrading from 1.3
See [`UPGRADING.md`](UPGRADING.md) and the
[upgrade guide of the framework](https://github.com/phalcon-nucleon/framework/blob/2.x/UPGRADING-2.0.md).

# Documentation
[Read the full documentation](https://phalcon-nucleon.github.io)
