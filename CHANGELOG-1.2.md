# Release Note

## v1.2.0

### Added
- View
    - Configuring extensions, filters and functions to add to the compiler
    - StrExtension :
        - Allow to call all Support\Str function in volt. 
        Use `str_{name}` will generate `Neutrino\Support\Str::{name}`. 
        - Add `slug` filter (call `Neutrino\Support\Str::slug`)
        - Add `limit` filter (call `Neutrino\Support\Str::limit`)
        - Add `words` filter (call `Neutrino\Support\Str::words`)
    - MergeFilter :
        - Add `merge` filter (call `array_merge`)
    - RoundFilter :
        - Add `round` filter (call `round` | `floor` | `ceil` [@see twig\round](https://twig.symfony.com/doc/2.x/filters/round.html))
    - SliceFilter :
        - Add `slice` filter (call `array_slice`)
    - SplitFilter :
        - Add `split` filter (call `str_split` | `explode` [@see twig\split](https://twig.symfony.com/doc/2.x/filters/split.html))
- View engines : 
    - Allow to configuring multiple engines.
- Built-in Server
    - `php quark server:run` : run php built-in server
- Assets 
    - JS Compilation (via Closure API)
    - Sass Compilation (via sass)
- Debug/Profiler toolbar feature
- Debug VarDumd feature
    - use `Neutrino\Debug\VarDump::dump`
    - use in `.volt` `{{ dump(var) }}`
