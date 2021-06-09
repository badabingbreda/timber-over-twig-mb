# Timber over Twig for Meta Box

You can use Timber to render Meta Box Views by installing both Timber Library (in repo) and this plugin. It enables you to use all Timber features. Some MB Twig variables are not available, but that's because Timber does those as well.

---
## Meta Box variables not working

Let's start with the bad news (maybe). Because we are now rendering Templates using Timber, instead of the Twig engine that comes with MB Views, the code editor variables are probably no good. Some may be similar to the ones Timber registers in the _context (where variables exist) but there's no guarantee.

I've thought about disabling the "Insert Field" button, but it stills holds value when available.

## File templates available

By default Timber tries to register two locations and searches for Twig templates. It will look in both `'THEMEFOLDER/views/'` and `'CHILDTHEMEFOLDER/views/'` for a matching Twig template when using either include, macro or block. You can use subdirectories as well and include those when calling a template.

## Read up on Timber

I think you should read up on Timber to get to know it's capabilities. [You can find the docs here.](https://timber.github.io/docs/)

---
## Additional Filter Hooks

|Filtername|Output type|Description|Default
|---|---|---|---|
|`timber-over-twig/data`|associative array|Add additional variables/data to the `_context`|post/posts/Timber _context|
|`timber-over-twig/do-shortcodes`|boolean|Run remaining shortcodes after template render|true
|`timber-over-twig/do-blocks`|boolean|Do blocks after template render|true
|`timber-over-twig/error-debug`|boolean|Show error messages|false|

---
## Version history

|Version|Changes|Date
|---|---|---|
|1.0.0|First release|June 9th, 2021