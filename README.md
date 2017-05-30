<p align="center"><a href="https://phalcon-nucleon.github.io/" target="_blank"><img width="150"src="https://phalcon-nucleon.github.io/img/nucleon.svg"></a></p>

Nucleon : Phalcon extended framework. (App\Core)
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
- __Core/__
Contains your application core code.
    - __Constants/__
    
    _[TODO:explain]_ This directory contains all constants you may should use in your application.

    - __Facades/__
    
    This directory contains all facades you may should use in your application.

    - __Models/__
    
    The Models directory is a proposed location of your Models.
    
    - __Providers/__
    
    The Providers directory contains all of the service providers for your application. Service providers bootstrap your application by binding services in the service container (Phalcon\Di) without instantiating.
    
    - __Support/__

    The Support directory is a proposed location of your tools.

- __Kernels/__
Contains the code the different kernels (Kernel settings, Controllers, ... ).
    - __Cli/__ : Console application
    
    The Tasks directory contains all of the custom cli commands for your application.
    This directory also houses your console kernel.
    
    - __Http/__ : Http application
    
    The Http directory contains your controllers, middleware, and your http kernel.
    
    - __Micro/__ : Micro application
    
    The Micro directory contains your controllers, middleware, and your micro kernel.


# App\Core Concepts
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


# Http Kernel
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

## Modules (HMVC)
Modules is optional, and only available for the Http Kernels.

View [Phalcon Multi-Modules](https://docs.phalconphp.com/en/latest/reference/applications.html#multi-module).

### Registering Module 

Add to the Http\Kernel file : 
```php
class Kernel extends \Neutrino\Foundation\Http\Kernel
{
    // ...
    
    protected $modules = [
        'Frontend' => [
            'className' => \App\Kernels\Http\Modules\Frontend\Module::class,
            'path'      => __DIR__ . '/Modules/Frontend/Module.php'
        ],
    ];
}
```

### Routing Module

The easier way is to create a Router\Group.

Define your module's controllers namespace, and your module name. And then, add your routes.

```php
$router = $di->getShared(\Neutrino\Constants\Services::ROUTER);

$frontend = new \Phalcon\Mvc\Router\Group([
    'namespace' => 'App\Kernels\Http\Modules\Frontend\Controllers',
    'module'     => 'Frontend'
]);

$frontend->addGet('/front/index', [
    'controller' => 'index',
    'action'     => 'index',
]);

$router->mount($frontend);
```

# Micro Kernel

The micro kernel is the implementation of the phalcon micro application.

There are two ways to implement it: 
- With Http Kernel, with a specific configuration of your http server (apache/nginx/...)
- Without Http Kernel, with a change in the public/index.php file.

## Without Http Kernel :
In the public/index.php you just have to change the kernel maked : 

```php
$kernel = $bootstrap->make(App\Kernels\Http\Kernel::class);
```
Become : 
```php
$kernel = $bootstrap->make(App\Kernels\Micro\Kernel::class);
```

Or you also can change your Document root in http-server configuration, to make it pointing to public/micro.php.

## With Http Kernel :

With Http Kernel, it's means you want to work with a FullStack and a MicroStack framework 
(Because your want the lowest implement and resource consumption for your api, for example).

To made this work well, you have to separate your 'HttpKernel' route and your 'MicroKernel' route :
- example.com/* : index.php > HTTP Kernel
- example.com/api/* : micro.php > MICRO Kernel

### Nginx Example 
```
server {
    ...
    server_name example.com;
    root /data/www/example/public;
    ...
    location /api {
        index   micro.php;
        ...
    }
    location ~ \.php$ {
        index   index.php;
        ...
    }
    ...
}
```

### Apache2 Example 
```
# .htaccess
# Require mod_rewrite.c

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^/?api/(.*)$ /micro.php [QSA,L]

    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ /index.php [QSA,L]
</IfModule>
```

# Cli Kernel

## Create a Task
### Actions
#### Default Action
The default action task is "main".

```php
class MyTask extends \Neutrino\Cli\Task
{
    public function mainAction()
    {
        // do something
    }
}
```
```php
// routes\cli.php

Router::add('my-task', [
    'task' => \App\Kernels\Cli\Tasks\MyTask::class
]);
```

#### Multi Actions
You can specify many action in one Task class, you just have to specify the action to do in the route file :

```php
// routes\cli.php

Router::add('my-task', [
    'task' => \App\Kernels\Cli\Tasks\MyTask::class
    // 'action' => 'main'
]);
Router::add('my-task:send', [
    'task' => \App\Kernels\Cli\Tasks\MyTask::class,
    'action' => 'send'
]);
Router::add('my-task:dosomething', [
    'task' => \App\Kernels\Cli\Tasks\MyTask::class,
    'action' => 'dosomething'
]);
```

### Arguments

Arguments must be specified in the routes : 

```php
// routes\cli.php

Router::add('my-task (\w+)', [
    'task' => \App\Kernels\Cli\Tasks\MyTask::class,
    'arg' => 1
]);
```

Add then retrieved them in the action function : 

```php
class MyTask extends \Neutrino\Cli\Task
{
    public function mainAction(array $args)
    {
        $args === $this->getArgs();

        $args['arg'] === $this->getArg('arg');
    }
}
```

### Options
Options are retrieved directly in the action function :

```php
class MyTask extends \Neutrino\Cli\Task
{
    public function mainAction()
    {
        $this->getOptions(); // All Options
        
        $this->getOption('opt'); // retrieved the value of "opts" option
        
        $this->hasOption('o', 'opt'); // Check if 'o' or 'opt' option is passed to the cli.
    }
}
```

### Output & Decoration

#### Basic 
You can output any string with a style / coloration : 

| fn()     | do :                                 |
|----------|--------------------------------------|
| line     | Write a line, without any decoration |
| info     | Write a info                         |
| notice   | Write a notice                       |
| warn     | Write a warning                      |
| error    | Write a error                        |
| question | Write a question                     |

__/!\\__ For now, "question" is not interactive. This will be added later.

#### Table

```php
public function mainAction()
{
    $this->table([
        ['col_1' => 'c1_v1', 'col_2' => 'c2_v1'],
        ['col_1' => 'c1_v2', 'col_2' => 'c2_v2'],
    ]);
}
```

Will Output : 

```
+-------+-------+
| col_1 | col_2 |
+-------+-------+
| c1_v1 | c2_v1 |
| c1_v2 | c2_v2 |
+-------+-------+
```


### Description & Helpers
Any task could be document via the phpdoc block : 

```php
/** 
 * @description The Main Action
 * @argument arg : an argument
 * @option -o, --opt : an option
 */
public function mainAction(array $args){}
```

And then, this information can be retrieved with a "--help" or "-h" : 

```
/> php quark my-task -h
/> 
Usage :
        my-task
Description :
        The Main Action
Arguments :
        arg : an argument
Options :
        -o, --opt : an option
```

### Not Found Task/Action
Neutrino\Cli don't use "symfony\console". It's based on Phalcon\Cli, to preserve performance.

For now, when a cmd is't found, the list task is called. 

Later, it will be improved.