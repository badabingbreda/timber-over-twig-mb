# Timber over Twig for Meta Box

You can use Timber to render Meta Box Views by installing both Timber Library (in repo) and this plugin. It enables you to use all Timber features. Some MB Twig variables are not available, but that's because Timber does those as well.

I've thought about disabling the "Insert Field" button, but it stills holds value when available.

## Additional Filters

|Filtername|Output type|Description|Default
|---|---|---|---|
|`timber_over_twig/data`|array|Add additional variables/data to the `_context`|post/posts/Timber _context|
|`timber-over-twig/error-debug`|boolean|Show error messages|false|

## Version history

|Version|Changes|Date
|---|---|---|
|1.0.0|First release|June 9th, 2021