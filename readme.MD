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
|`timber-over-twig/views-locations`|array|Add views locations|theme/views directory<br>child-theme/views directory|
|`timber-over-twig/do-shortcodes`|boolean|Run remaining shortcodes after template render|true
|`timber-over-twig/do-blocks`|boolean|Do blocks after template render|true
|`timber-over-twig/error-debug`|boolean|Show error messages|false|


## Examples

### Adding a view location
You can add twig-template directories to the paths where Timber will look for a match. Be aware that whenever that the first match that has been found will be used; This means that if you have the same twig-template path/filename in multiple locations, the one found in the first location from the $locations array will be used. 

    add_filter( 'timber-over-twig/views-locations' , 'myplugin_add_twig_templates' , 50, 1 ); 

    function myplugin_add_twig_templates( $locations ) { 
        // ADD a subdirectory from plugin-folder as a new view-location after the existing ones, reverse if new location is more important
        return array_merge( $locations, plugin_dir_path( __FILE__ ) . 'twig-templates/' ) ;
    }



---
## Version history

|Version|Changes|Date
|---|---|---|
|1.0.0|First release|June 9th, 2021