Luxury : Phalcon extended framework. (App)
=======
[![Build Status](https://travis-ci.org/Ark4ne/phalcon-luxury-framework.svg?branch=master)](https://travis-ci.org/Ark4ne/phalcon-luxury-framework) 

## About
Luxury is a web application that uses Phalcon.
Our philosophy is to make the web faster, with enjoyable development.

## Install
```
\> git clone https://github.com/Ark4ne/phalcon-luxury.git
\> composer install
```
_After first beta release, the_ `composer create-project` _command will be available_

## Require
* PHP >= 5.6
* ext-mbstring
* ext-openssl
* Phalcon >= 3.0

## Directory Structure
#### Root Directory
* __app/__
    - The core code of your application.
    Autoloading via PSR4.
* __bootstrap/__
    -  Files that bootstrap the framework and configure autoloading.
* __config/__
    -  Your application's configuration files.
* __public/__
    -  The entry point for all requests entering your application.
* __resources/__
    -  Your views as well as your raw, uncompiled assets such as LESS, SASS, or JavaScript.
* __routes/__
    -  All of the route definitions for your application.
* __storage/__
    -  All logs & cache & compiled files.
* __tests/__
    -  Your automated tests.
* __vendor/__
    -  The vendor directory contains your Composer dependencies.
    
#### App Directory
- __Api/__

_Currently (*v0-alpha*)_ : just a directory whose may contains your api logic.

_Version (*v1.0*)_ : Should be the directory containing your api controllers, load from the micro Phalcon Application.

- __Cli/__ : Console application

The Tasks directory contains all of the custom cli commands for your application.
This directory also houses your console kernel.

- __Constants/__

_[TODO:explain]_ This directory contains all constants you may should use in your application.

- __Facades/__

This directory contains all facades you may should use in your application.

- __Http/__

The Http directory contains your controllers, middleware, and your http kernel.

- __Models/__


The Models directory is a proposed location of your Models.

- __Providers/__

The Providers directory contains all of the service providers for your application. Service providers bootstrap your application by binding services in the service container (Phalcon\Di) without instantiating.

- __Support/__

The Support directory is a proposed location of your tools.


## Core Concepts
#### Service Container / Dependency Injection 
[See Phalcon Dependency Injection](https://docs.phalconphp.com/en/3.0.0/reference/di.html)
#### Service Providers
##### Register a Provider

To register a provider, you must add it to the list of provider loaded by the application.

This list is managed in the kernel, Http\Kernel, Cli\Kernel, by property $providers.

```php
use Luxury\Foundation\Kernel\Http as HttpApplication;

class Kernel extends HttpApplication
{
    protected $providers = [
        // ...
        ExampleServiceProvider::class
    ];
}
```
##### Create Provider
A provider should extends the `Luxury\Providers\Provider` class and contain a `register` method.

The `register` method simply return the instance to provide.

You must pass the name of the service via the property `$name`.

You can make a service shared via the property `$shared`. 

```php
use \Luxury\Providers\Provider;

class ExampleServiceProvider extends Provider
{
    protected $name = 'example';
    
    protected $shared = true;
  
    public function register()
    {
        return new ExampleService();
    }
}
```

##### Complex Provider
All providers implements the Interface `Luxury\Interfaces\Providable`.

If you created your a provider with your own `registering` method, you can simply implement this class.

```php
use \Luxury\Interfaces\Providable;

class ExampleServiceProvider implements Providable
{
    public function registering()
    {
        $this->getDI()->setShared('example', function(){
            return new ExampleService();
        });
    }
}
```

#### Facades
Facades are inspired and implemented as they are in [Laravel](https://laravel.com/docs/5.3/facades).


## Http Layer
#### Routing

The `routes/http.php` file defines your application routes.

This file is automatically loaded by the framework. 

##### Router methods
The router allows you to register routes that respond to any HTTP verb :
```php
use Luxury\Support\Facades\Router;

Router::addHead($uri, $paths);
Router::addGet($uri, $paths);
Router::addPost($uri, $paths);
Router::addPut($uri, $paths);
Router::addPatch($uri, $paths);
Router::addDelete($uri, $paths);
Router::addOptions($uri, $paths);
```

Sometimes you may need to register a route that responds to multiple HTTP verbs :
```php
Router::add($uri, $paths, ['HEAD', 'GET']);
```

#### Middleware
Middleware provide a convenient mechanism for filtering requests entering your application.

Middleware are managed through the Event Manager.

They can handle 4 methods : 
- init
- before
- after
- finish

They 3 types of middleware :
- Application middleware
- Dispatcher middleware
- Controller middleware

##### Application Middleware
Handle : 
- init : Events\Http\Application::BOOT
- before : Events\Http\Application::BEFORE_HANDLE
- after : Events\Http\Application::AFTER_HANDLE
- finish : Events\Http\Application::BEFORE_SEND_RESPONSE

_`Application Middleware can't be use directly in the http controller`_

Application middleware are register in the kernel, by property $middlewares.

```php
use Luxury\Foundation\Kernel\Http as HttpApplication;

class Kernel extends HttpApplication
{
    protected $middleware = [
        // ...
        ExampleApplicationMiddleware::class
    ];
}
```

##### Dispatcher Middleware
Handle : 
- init : Events\Dispatch::BEFORE_DISPATCH_LOOP
- before : Events\Dispatch::BEFORE_DISPATCH
- after : Events\Dispatch::AFTER_DISPATCH
- finish : Events\Dispatch::AFTER_DISPATCH_LOOP

_`Dispatcher Middleware can't be use directly in the http controller`_

Dispatcher middleware are register in the kernel, by property $middlewares.

```php
use Luxury\Foundation\Kernel\Http as HttpApplication;

class Kernel extends HttpApplication
{
    protected $middleware = [
        // ...
        ExampleDispatcherMiddleware::class
    ];
}
```

##### Controller Middleware
Handle : 
- before : Events\Dispatch::BEFORE_EXECUTE_ROUTE
- after : Events\Dispatch::AFTER_EXECUTE_ROUTE
- finish : Events\Dispatch::AFTER_DISPATCH

Controller middleware are register directly in the controller, in the `onConstruct` method.

```php
class AuthController extends ControllerBase
{
    protected function onConstruct()
    {
        $this->middleware(new \Luxury\Http\Middleware\Csrf);
    }
}
```

`Documantation Under Construction`
