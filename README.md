<p align="center"><a href="https://phalcon-nucleon.github.io/" target="_blank"><img width="150"src="https://phalcon-nucleon.github.io/img/nucleon.svg"></a></p>

Nucleon : Phalcon extended framework. (App)
===========================================
[![Build Status](https://travis-ci.org/phalcon-nucleon/framework.svg?branch=master)](https://travis-ci.org/phalcon-nucleon/framework) 

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
* PHP 5.6 - 7.2 _(>= 5.6 & <7.3)_
* Phalcon 3 _(~3.0)_
* ext-mbstring
* ext-openssl

# Composer & Autoloading
Nucleon uses composer. So you can use all your libraries prefer as you wish!

The `php quark optimize` command will optimize autoloading using the phalcon loader (best performing autoloader !)

# Documentation
[Read the full documentation](https://phalcon-nucleon.github.io)
