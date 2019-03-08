# Release Note

## v1.3.0

### Important 
- php support 5.6 - 7.2  
Phalcon v3.x will not support php7.3 and higher.  
Nucleon v1.x, will support only php5.6 to php7.2. 
Nucleon v2.x will support php7.2 and higher, with Phalcon v4.x.

### Added
- Task RouteCache (route:cache) : Cache http route file
- Task Optimization (optimize) : Add route:cache
- Compile files (compile, const, config, loader), are now able to be commited & shared
- Volt: Add csrf extension (csrf_field & csrf_token function)
- Volt: Add route function
- Config: Add :
  - app.static_uri: Define app static uri
  - app.key, app.cipher: Used for cookie encryption

### Changed
- Rename Middleware\Guest to Middleware\RedirectIfAuthenticated.
- Config::Session : Allow to describe multiple store for session