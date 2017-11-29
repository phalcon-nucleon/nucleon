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
\> composer create-project nucleon/nucleon app-root
```

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
    index index.php micro.php;
    ...
    location ~ /api/(.*) {
        try_files $uri $uri/ /micro.php$is_args$query_string;
    }
    location / {
        try_files $uri $uri/ /index.php$is_args$query_string;
    }

    location ~ \.php$ {
        try_files     $uri =404;
        fastcgi_pass unix:/run/php/php7.0-fpm.sock;
        // ...
    }
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

#### Block

```php
public function mainAction()
{
    $this->block([
        'Hey',
        'I\'m a block'
    ], 'notice');
}
```

Will Output : ("notice" colorized)

```
  
  Hey !
  I'm a block

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
When a task is not found, an attempt is made to find the closest match to the task list.

If one or more matches are found, they are displayed:

```
/> php quark llist

  Command "llist" not found.
  Did you mean this?
    list
```

# Migrations
Migration documentation comes from [laravel/migrations](https://laravel.com/docs/5.3/migrations). The implementation of migration is totally inspired by that of migration, the use is almost strictly the same. Only the different points have been adapted in this documentation.
## Introduction
Migrations are like version control for your database

The Neutrino `Schema\Builder` provides database agnostic support for creating and manipulating tables across all of Phalcon's supported database systems.

## Generating Migrations
To create a migration, use the `make:migration` quark command:

```
php quark make:migration create_users_table
```

The new migration will be placed in your /migrations directory. Each migration file name contains a timestamp which allows Neutrino to determine the order of the migrations.

```
php quark make:migration create_users_table --create=users

php quark make:migration add_votes_to_users_table --table=users
```

If you would like to specify a custom output path for the generated migration, you may use the `--path` option when executing the `make:migration` command. The given path should be relative to your application's base path.

## Migration Structure
A migration class contains two methods: `up` and `down`. The `up` method is used to add new tables, columns, or indexes to your database, while the `down` method should simply reverse the operations performed by the up method.

Within both of these methods you may use the Neutrino schema builder to expressively create and modify tables. To learn about all of the methods available on the `Schema builder`, [check out its documentation](#creating-table). For example, this migration example creates a `flights` table:

```php
<?php

use Neutrino\Database\Migrations\Migration;
use Neutrino\Database\Schema\Builder;
use Neutrino\Database\Schema\Blueprint;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param Neutrino\Database\Schema\Builder $builder
     *
     * @return void
     */
    public function up(Builder $builder)
    {
        $builder->create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @param Neutrino\Database\Schema\Builder $builder
     *
     * @return void
     */
    public function down(Builder $builder)
    {
        $builder->drop('flights');
    }
}
```

## Running Migrations
To run all of your outstanding migrations, execute the `migrate` quark command:
```
php quark migrate
```

__Forcing Migrations To Run In Production__  
Some migration operations are destructive, which means they may cause you to lose data. In order to protect you from running these commands against your production database, you will be prompted for confirmation before the commands are executed. To force the commands to run without a prompt, use the --force flag:
```
php quark migrate --force
```

### Rolling Back Migrations

To rollback the latest migration operation, you may use the `rollback` command. This command rolls back the last "batch" of migrations, which may include multiple migration files:
```
php quark migrate:rollback
```
You may rollback a limited number of migrations by providing the `step` option to the `rollback` command. For example, the following command will rollback the last five migrations:
```
php quark migrate:rollback --step=5
```
The `migrate:reset` command will roll back all of your application's migrations:
```
php quark migrate:reset
```

__Rollback & Migrate In Single Command__  
The `migrate:refresh` command will roll back all of your migrations and then execute the `migrate` command. This command effectively re-creates your entire database:

```
php quark migrate:refresh
```

You may rollback & re-migrate a limited number of migrations by providing the `step` option to the `refresh` command. For example, the following command will rollback & re-migrate the last five migrations:

```
php quark migrate:refresh --step=5
```

__Drop All Tables & Migrate__  
The `migrate:fresh` command will drop all tables from the database and then execute the `migrate` command:

```
php quark migrate:fresh
```

## Tables
### Creating Tables
To create a new database table, use the `create` method on the `Schema\Builder`. The `create` method accepts two arguments. The first is the name of the table, while the second is a `Closure` which receives a `Blueprint` object that may be used to define the new table:

```php
<?php
use \Neutrino\Database\Schema;

$builder = new Schema\Builder();

$builder->create('users', function (Schema\Blueprint $table) {
    $table->increments('id');
});
```
Of course, when creating the table, you may use any of the schema builder's column methods to define the table's columns.

__Checking For Table / Column Existence__  
You may easily check for the existence of a table or column using the `hasTable` and `hasColumn` methods:

```php
if ($builder->hasTable('users')) {
    //
}
if ($builder->hasColumn('users', 'email')) {
    //
}
```

__Table Options__  
You may use the following commands on the schema builder to define the table's options:

| Command                                           | Description                                            |
|---------------------------------------------------|--------------------------------------------------------|
| `$table->option('engine', 'InnoDB');`             | Specify the table storage engine (MySQL).              |
| `$table->option('charset', 'utf8');`              | Specify a default character set for the table (MySQL). |
| `$table->option('collation', 'utf8_unicode_ci');` | Specify a default collation for the table (MySQL).     |
| `$table->temporary();`                            | Create a temporary table (except SQL Server).          |

### Renaming / Dropping Tables
To rename an existing database table, use the `rename` method:
```php
$builder->rename($from, $to);
```
To drop an existing table, you may use the `drop` or `dropIfExists` methods:
```php
$builder->drop('users');

$builder->dropIfExists('users');
```

__Renaming Tables With Foreign Keys__
Before renaming a table, you should verify that any foreign key constraints on the table have an explicit name in your migration files instead of letting Neutrino assign a convention based name. Otherwise, the foreign key constraint name will refer to the old table name.

## Columns
### Creating Columns
The `table` method on the `Schema\Builder` may be used to update existing tables. Like the `create` method, the `table` method accepts two arguments: the name of the table and a `Closure` that receives a `Blueprint` instance you may use to add columns to the table:
```php
$builder->table('users', function (Blueprint $table) {
    $table->string('email');
});
```

__Available Column Types__  
Of course, the schema builder contains a variety of column types that you may specify when building your tables

| Command                                  | Description                                                                         |
|--------------------------------------------|-------------------------------------------------------------------------------------|
| `$table->bigIncrements('id');`             | Incrementing ID (primary key) using a "UNSIGNED BIG INTEGER" equivalent.            |
| `$table->bigInteger('votes');`             | BIGINT equivalent for the database.                                                 |
| `$table->binary('data');`                  | BLOB equivalent for the database.                                                   |
| `$table->boolean('confirmed');`            | BOOLEAN equivalent for the database.                                                |
| `$table->char('name', 4);`                 | CHAR equivalent with a length.                                                      |
| `$table->date('created_at');`              | DATE equivalent for the database.                                                   |
| `$table->dateTime('created_at');`          | DATETIME equivalent for the database.                                               |
| `$table->dateTimeTz('created_at');`        | DATETIME (with timezone) equivalent for the database.                               |
| `$table->decimal('amount', 5, 2);`         | DECIMAL equivalent with a precision and scale.                                      |
| `$table->double('column', 15, 8);`         | DOUBLE equivalent with precision, 15 digits in total and 8 after the decimal point. |
| `$table->enum('choices', ['foo', 'bar']);` | ENUM equivalent for the database.                                                   |
| `$table->float('amount', 8, 2);`           | FLOAT equivalent for the database, 8 digits in total and 2 after the decimal point. |
| `$table->increments('id');`                | Incrementing ID (primary key) using a "UNSIGNED INTEGER" equivalent.                |
| `$table->integer('votes');`                | INTEGER equivalent for the database.                                                |
| `$table->ipAddress('visitor');`            | IP address equivalent for the database.                                             |
| `$table->json('options');`                 | JSON equivalent for the database.                                                   |
| `$table->jsonb('options');`                | JSONB equivalent for the database.                                                  |
| `$table->longText('description');`         | LONGTEXT equivalent for the database.                                               |
| `$table->macAddress('device');`            | MAC address equivalent for the database.                                            |
| `$table->mediumIncrements('id');`          | Incrementing ID (primary key) using a "UNSIGNED MEDIUM INTEGER" equivalent.         |
| `$table->mediumInteger('numbers');`        | MEDIUMINT equivalent for the database.                                              |
| `$table->mediumText('description');`       | MEDIUMTEXT equivalent for the database.                                             |
| `$table->morphs('taggable');`              | Adds unsigned INTEGER taggable_id and STRING  taggable_type.                        |
| `$table->nullableMorphs('taggable');`      | Nullable versions of the morphs() columns.                                          |
| `$table->nullableTimestamps();`            | Nullable versions of the timestamps() columns.                                      |
| `$table->rememberToken();`                 | Adds remember_token as VARCHAR(100) NULL.                                           |
| `$table->smallIncrements('id');`           | Incrementing ID (primary key) using a "UNSIGNED SMALL INTEGER" equivalent.          |
| `$table->smallInteger('votes');`           | SMALLINT equivalent for the database.                                               |
| `$table->softDeletes();`                   | Adds nullable deleted_at column for soft deletes.                                   |
| `$table->string('email');`                 | VARCHAR equivalent column.                                                          |
| `$table->string('name', 100);`             | VARCHAR equivalent with a length.                                                   |
| `$table->text('description');`             | TEXT equivalent for the database.                                                   |
| `$table->time('sunrise');`                 | TIME equivalent for the database.                                                   |
| `$table->timeTz('sunrise');`               | TIME (with timezone) equivalent for the database.                                   |
| `$table->tinyInteger('numbers');`          | TINYINT equivalent for the database.                                                |
| `$table->timestamp('added_on');`           | TIMESTAMP equivalent for the database.                                              |
| `$table->timestampTz('added_on');`         | TIMESTAMP (with timezone) equivalent for the database.                              |
| `$table->timestamps();`                    | Adds nullable created_at and updated_at columns.                                    |
| `$table->timestampsTz();`                  | Adds nullable created_at and updated_at (with timezone) columns.                    |
| `$table->unsignedBigInteger('votes');`     | Unsigned BIGINT equivalent for the database.                                        |
| `$table->unsignedInteger('votes');`        | Unsigned INT equivalent for the database.                                           |
| `$table->unsignedMediumInteger('votes');`  | Unsigned MEDIUMINT equivalent for the database.                                     |
| `$table->unsignedSmallInteger('votes');`   | Unsigned SMALLINT equivalent for the database.                                      |
| `$table->unsignedTinyInteger('votes');`    | Unsigned TINYINT equivalent for the database.                                       |
| `$table->uuid('id');`                      | UUID equivalent for the database.                                                   |

### Column Modifiers
In addition to the column types listed above, there are several column "modifiers" you may use while adding a column to a database table. For example, to make the column "nullable", you may use the `nullable` method:
```php
$builder->create('users', function (Schema\Blueprint $table) {
    $table->string('email')->nullable();
});
```

Below is a list of all the available column modifiers. This list does not include the index modifiers:

| `Modifier`                       | Description                                                     |
|----------------------------------|-----------------------------------------------------------------|
| `->after('column')`              | Place the column "after" another column (MySQL)                 |
| `->autoIncrement()`              | Set INTEGER columns as auto-increment (primary key)             |
| `->comment('my comment')`        | Add a comment to a column (MySQL)                               |
| `->default($value)`              | Specify a "default" value for the column                        |
| `->first()`                      | Place the column "first" in the table (MySQL)                   |
| `->nullable($value = true)`      | Allows (by default) NULL values to be inserted into the column  |
| `->unsigned()`                   | Set INTEGER columns as UNSIGNED (MySQL)                         |


### Modifying Columns
__Updating Column Attributes__  
The modification is implicit, when you redefine a column in an update, it will be modified.
For example, you may want to increase the size of a string column. increase the size of the name column from 25 to 50:
```php
$builder->create('users', function (Schema\Blueprint $table) {
    $table->string('name', 25);
});
$builder->table('users', function (Schema\Blueprint $table) {
    $table->string('name', 50);
});
```

We could also modify a column to be nullable:
```php
$builder->table('users', function (Schema\Blueprint $table) {
    $table->string('name', 50)->nullable();
});
```

__Renaming Columns__  
To rename a column, you may use the `renameColumn` method on the `Schema\Builder`.
```php
$builder->table('users', function (Schema\Blueprint $table) {
    $table->renameColumn('from', 'to');
});
```

### Dropping Columns
To drop a column, use the `dropColumn` method on the `Schema\Builder`. To drop many column in one line, use the `dropColumns` method.
```php
$builder->table('users', function (Schema\Blueprint $table) {
    $table->dropColumn('votes');
    $table->dropColumns(['votes', 'avatar', 'location']);
});
```

__Available Command Aliases__  

| Command                      | Description                                 |
|--------------------------------|---------------------------------------------|
| `$table->dropRememberToken();` | Drop the remember_token column.             |
| `$table->dropSoftDeletes();`   | Drop the deleted_at column.                 |
| `$table->dropSoftDeletesTz();` | Alias of dropSoftDeletes() method.          |
| `$table->dropTimestamps();`    | Drop the created_at and updated_at columns. |
| `$table->dropTimestampsTz();`  | Alias of dropTimestamps() method.           |

## Indexes
### Creating Indexes
The schema builder supports several types of indexes. First, let's look at an example that specifies a column's values should be unique. To create the index, we can simply chain the `unique` method onto the column definition:
```php
$table->string('email')->unique();
```

Alternatively, you may create the index after defining the column. For example:
```php
$table->unique('email');
```

You may even pass an array of columns to an index method to create a compound (or composite) index:
```php
$table->index(['account_id', 'created_at']);
```

Neutrino will automatically generate a reasonable index name, but you may pass a second argument to the method to specify the name yourself:
```php
$table->unique('email', 'unique_email');
```

__Available Index Types__  

| Command                               | Description          |
|-----------------------------------------|----------------------|
| `$table->primary('id');`                | Adds a primary key.  |
| `$table->primary(['id', 'parent_id']);` | Adds composite keys. |
| `$table->unique('email');`              | Adds a unique index. |
| `$table->index('state');`               | Adds a plain index.  |

### Dropping Indexes
To drop an index, you must specify the index's name. By default, Neutrino automatically assigns a reasonable name to the indexes. Simply concatenate the table name, the name of the indexed column, and the index type. Here are some examples:

| Command                                  | Description                                 |
|---------------------------------------------|---------------------------------------------|
| `$table->dropPrimary('users_id_primary');`  | Drop a primary key from the "users" table.  |
| `$table->dropUnique('users_email_unique');` | Drop a unique index from the "users" table. |
| `$table->dropIndex('geo_state_index');`     | Drop a basic index from the "geo" table.    |

If you pass an array of columns into a method that drops indexes, the conventional index name will be generated based on the table name, columns and key type:
```php
$builder->table('geo', function (Schema\Blueprint $table) {
     $table->dropIndex(['state']); // Drops index 'geo_state_index'
});
```

### Foreign Key Constraints
Neutrino also provides support for creating foreign key constraints, which are used to force referential integrity at the database level. For example, let's define a `user_id` column on the posts table that references the `id` column on a `users` table:

```php
$builder->table('posts', function (Schema\Blueprint $table) {
    $table->integer('user_id')->unsigned();

    $table->foreign('user_id')->references('id')->on('users');
});
```

You may also specify the desired action for the "on delete" and "on update" properties of the constraint:
```php
$table->foreign('user_id')
    ->references('id')->on('users')
    ->onDelete('cascade');
```

To drop a foreign key, you may use the `dropForeign` method. Foreign key constraints use the same naming convention as indexes. So, we will concatenate the table name and the columns in the constraint then suffix the name with "_foreign":
```php
$table->dropForeign('posts_user_id_foreign');
```

You may enable or disable foreign key constraints within your migrations by using the following methods:

```php
$builder->enableForeignKeyConstraints();

$builder->disableForeignKeyConstraints();
```

# Config and Environment

To work, nucleon, and neutrino, need to have 3 constants defined :
- BASE_PATH : Application base path
- APP_DEBUG : Application debug mode
- APP_ENV : Application environment (debug, test, staging, production)

Neutrino introduce Dotconst. It allow load any constants from .ini files. 

It work like Dotenv, the constants can be erased (at the load) with the "APP_ENV" variable. See [neutrino\dotconst](https://github.com/pn-neutrino/dotconst)

You are not obliged to use dotconst. You can very well define its variables yourself, and use Dotenv, or something else to manage your environment variables.

