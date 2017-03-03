<p align="center"><a href="https://phalcon-nucleon.github.io/" target="_blank"><img width="150"src="https://phalcon-nucleon.github.io/img/nucleon.svg"></a></p>

Nucleon : Phalcon extended framework. (App)
===========================================
[![Build Status](https://travis-ci.org/phalcon-nucleon/framework.svg?branch=master)](https://travis-ci.org/phalcon-nucleon/framework) 

# About
Nucleon is a web application that uses [Phalcon](https://www.phalconphp.com/)
.
Our philosophy is to make the web faster, with enjoyable development.

# Install
```
\> git clone https://github.com/phalcon-nucleon/nucleon.git
\> composer install
```
_After first beta release, the_ `composer create-project` _command will be available_

# Require
* PHP >= 5.6
* ext-mbstring
* ext-openssl
* Phalcon >= 3.0

# Composer & Autoloading
Nucleon uses composer. So you can use all your libraries prefer as you wish!

The `php quark optimize` command will optimize autoloading using the phalcon loader (best performing autoloader !)

# Directory Structure
## Root Directory
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
    
## App Directory
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


# Core Concepts
## Service Container / Dependency Injection 
[See Phalcon Dependency Injection](https://docs.phalconphp.com/en/3.0.0/reference/di.html)
## Service Providers
### Register a Provider

To register a provider, you must add it to the list of provider loaded by the application.

This list is managed in the kernel, Http\Kernel, Cli\Kernel, by property $providers.

```php
use Neutrino\Foundation\Kernel\Http as HttpApplication;

class Kernel extends HttpApplication
{
    protected $providers = [
        // ...
        ExampleServiceProvider::class
    ];
}
```
### Create Providers
#### Basic Provider
Use BasicProvider to simple provide a class as string or array definition if $options is specified.

You must pass the class name of the service via the property `$class`.

You must pass the name of the service via the property `$name`.

You can make a shared service via the property `$shared`. 

You can define aliases of the service via the property `$aliases`. 

You can specify some options too add to the service definition via the property `$options`.

```php
use \Neutrino\Providers\Provider;

class ExampleServiceProvider extends BasicProvider
{
    // Class to provide
    protected $class = ExampleService::class;

    // Name of service
    protected $name = 'example';

    // Service is shared
    protected $shared = true;

    // optional, aliases
    protected $aliases = [
        ExampleService::class,
    ];

    // optional, options for build service definition
    protected $options = [
        'arguments' => [
          [
              'type' => 'service',
              'name' => Service::LOGGER
          ]
        ],
    ];
}
```

#### Own Provider
You can create more complex provider by extends the `Neutrino\Providers\Provider` class.
A provider witch extends the `Neutrino\Providers\Provider` class should contain a `register` method.

The `register` method simply return the instance to provide.

You must pass the name of the service via the property `$name`.

You can make a shared service via the property `$shared`. 

```php
use \Neutrino\Providers\Provider;

class ExampleServiceProvider extends Provider
{
    // Name of service
    protected $name = 'example';
    
    // Service is shared
    protected $shared = true;
  
    // optional aliases
    protected $aliases = [
        ExampleService::class,
    ];

    public function register()
    {
        return new ExampleService($this->getDI()->getShared(Service::LOGGER));
    }
}
```

#### Complex Provider
All providers implements the Interface `Neutrino\Interfaces\Providable`.

If you created your a provider with your own `registering` method, you can simply implement this class.

```php
use \Neutrino\Interfaces\Providable;

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

## Facades
Facades are inspired and implemented as they are in [Laravel](https://laravel.com/docs/5.3/facades).


# Http Layer
## Routing

The `routes/http.php` file defines your application routes.

This file is automatically loaded by the framework. 

### Router methods
The router allows you to register routes that respond to any HTTP verb :
```php
use Neutrino\Support\Facades\Router;

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

## Middleware
Middleware provide a convenient mechanism for filtering requests entering your application.

Middleware are managed through the Event Manager.

They can handle 4 methods : 
- init      : Initialization
- before    : Before handle the request
- after     : After handle the request
- finish    : Finalization

They 3 types of middleware :
- Application middleware
- Dispatcher middleware
- Controller middleware

### Application Middleware
Handle : 
- init : Events\Http\Application::BOOT
- before : Events\Http\Application::BEFORE_HANDLE
- after : Events\Http\Application::AFTER_HANDLE
- finish : Events\Http\Application::BEFORE_SEND_RESPONSE

_`Application Middleware can't be use directly in the http controller`_

Application middleware are register in the kernel, by property $middlewares.

```php
use Neutrino\Foundation\Kernel\Http as HttpApplication;

class Kernel extends HttpApplication
{
    protected $middleware = [
        // ...
        ExampleApplicationMiddleware::class
    ];
}
```

### Dispatcher Middleware
Handle : 
- init : Events\Dispatch::BEFORE_DISPATCH_LOOP
- before : Events\Dispatch::BEFORE_DISPATCH
- after : Events\Dispatch::AFTER_DISPATCH
- finish : Events\Dispatch::AFTER_DISPATCH_LOOP

_`Dispatcher Middleware can't be use directly in the http controller`_

Dispatcher middleware are register in the kernel, by property $middlewares.

```php
use Neutrino\Foundation\Kernel\Http as HttpApplication;

class Kernel extends HttpApplication
{
    protected $middleware = [
        // ...
        ExampleDispatcherMiddleware::class
    ];
}
```

### Controller Middleware
Handle : 
- before : Events\Dispatch::BEFORE_EXECUTE_ROUTE
- after : Events\Dispatch::AFTER_EXECUTE_ROUTE
- finish : Events\Dispatch::AFTER_DISPATCH

#### Register Middleware

##### Via the Router
Controller middleware are register directly in the route, via the attribute `middleware`.

```php
use \Neutrino\Support\Facades\Router;

Router::addGet($uri, [
    // ...
    'middleware' => [
        \Neutrino\Http\Middleware\Csrf::class,
        \Neutrino\Auth\Middleware\ThrottleLogin::class => [$max_request, $decay_seconds]
    ]
]);
```

##### Via the Controller
Controller middleware are register directly in the controller, in the `onConstruct` method.

```php
class AuthController extends ControllerBase
{
    protected function onConstruct()
    {
        $this->middleware(\Neutrino\Http\Middleware\Csrf::class);
        
        $this->middleware(\Neutrino\Http\Middleware\ThrottleRequest::class, $max_request, $decay_seconds);
    }
}
```

###### Filter Middleware

The middleware on the controllers can be filtered.

You can specify the method(s) subject to the middleware setting with the `only` function. 

Or, conversely, exclude the method(s) that will not be submitted to the middleware with the `except` function.

```php
class AuthController extends ControllerBase
{
    protected function onConstruct()
    {
        $this->middleware(\Neutrino\Http\Middleware\Csrf::class)
            // CSRF middleware only on loginAction
            ->only(['login'])
            
            // CSRF middleware expect on registerAction
            ->expect(['register'])
            ;
    }
}
```

#### Create Middleware

You can create your own middleware by inheriting ApplicationMiddleware, DispatcherMiddleware, or ControllerMiddleware.

The management of associated events does this simply by implementing the interfaces:
- Neutrino\Interfaces\Middleware\InitInterface => init
- Neutrino\Interfaces\Middleware\BeforeInterface => before
- Neutrino\Interfaces\Middleware\AfterInterface => after
- Neutrino\Interfaces\Middleware\FinishInterface => finish

```php
use Neutrino\Foundation\Middleware\Controller as ControllerMiddleware;
use Neutrino\Interfaces\Middleware\BeforeInterface;

class ExampleMiddleware extends ControllerMiddleware implements BeforeInterface
{
    public function before(Event $event, $source, $data = null)
    {
        if($success){
            return true;
        }
        
        return false;
    }
}
```

`Documentation Under Construction`
