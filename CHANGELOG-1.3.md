# Release Note

## v1.3.0

### Added
- Task RouteCache (route:cache) : Cache http route file
- Task Optimization (optimize) : Add route:cache
- Compile files (compile, const, config, loader), are now able to be commited & shared
- Volt: Add csrf extension (csrf_field & csrf_token function)
- Volt: Add route function

### Changed
- Rename Middleware\Guest to Middleware\RedirectIfAuthenticated.
- Config::Session : Allow to describe multiple store for session