# UPGRADING

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