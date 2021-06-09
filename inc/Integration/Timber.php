<?php

namespace TimberOverTwig\Integration;

use TimberOverTwig\Proxy;

class Timber {

    public function __construct() {

        add_action( 'plugins_loaded' , __CLASS__ . '::check_for_timber' );

    }
    
    /**
     * check_for_timber
     * 
     * action hook that checks if Timber is active before continueing
     *
     * @return void
     */
    public static function check_for_timber() {

		if ( !class_exists( '\Timber' ) ) return;

        // register a filter for MB Views so it uses Timber
		add_filter( 'mbv_render_output' , __CLASS__ . '::render' , 10 , 3 ) ;

		/**
		 * add plugin twig filters
		 */
		add_filter( 'timber/twig' 						, __CLASS__ . '::add_twig_filters' );

    }
	
	/**
	 * add_twig_filters
     * 
     * adds Globals to the Twig render enginegithub
	 *
	 * @param  mixed $twig
	 * @return void
	 */
	public static function add_twig_filters( $twig ) {

	    $twig->addExtension( new \Twig_Extension_StringLoader() );

	    $twig->addGlobal( 'GETvars' , $_GET );

		$twig->addGlobal( 'mb', new Proxy );

		return $twig;

	}    

	/**
	 * Alternative render function for MB Views
	 *
	 * @param  [type] $content [description]
	 * @param  [type] $_view   [description]
	 * @param  [type] $_data   [description]
	 * @return [type]          [description]
	 */
	public static function render( $content , $_view , $_data ) {

        // Get view by ID.
        if ( is_numeric( $_view ) ) {
            $_view = get_post( $_view );
        }
        // Get view by slug.
        elseif ( is_string( $_view ) ) {
            $_view = get_page_by_path( $_view, OBJECT, 'mb-views' );
        }
        
		$data = \Timber::get_context();

		$data = array_merge( $data , $_data );

		if( is_singular() ){
			// current post
			$data['post'] = new \TimberPost();
		} else if( is_archive() ) {
			$data['post'] = false;

			global $wp_query;
			// get the wp_query->query_vars
			$args = $wp_query->query_vars;

			$data['posts'] = new \Timber\PostQuery( $args );

		} else {
			$data[ 'post' ] = false;
		}

		// filter the data, maybe add custom variables to use
		$data = apply_filters( 'timber-over-twig/data' , $data );

		try {

			ob_start();
			// return the template
			\Timber::render_string( $_view->post_content , $data );

			return ob_get_clean();

		} catch (Exception $e) {
			if ( apply_filters( 'timber-over-twig/error-debug' , false ) ) return '[ error handling twig template ] ' . $e->getMessage();
		}


	}

}