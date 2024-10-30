<?php

/**
 * Mimo Maps for Woocommerce.
 *
 * @package   Mimo_Maps_For_Woocommerce_Display
 * @author    Mimo <mail@mimo.media>
 * @license   GPL-2.0+
 * @link      http://mimo.media
 * @copyright 2015 Mimo
 */

/**
 *
 * @package Mimo_Maps_For_Woocommerce_Display
 * @author  Mimo <mail@mimo.media>
 */
class Mimo_Maps_For_Woocommerce_Display {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '1.0.0';

	/**
	 	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected static $plugin_slug = 'mimo-maps-for-woocommerce';
	protected static $plugin_prefix = 'mimo_maps_for_woocommerce';

	/**
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected static $plugin_name = 'Mimo Maps for Woocommerce';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Array of cpts of the plugin
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected $cpts = array( 'mimo_maps_for_woocommerce_location' );

	/**
	 * Array of capabilities by roles
	 * 
	 * @since 1.0.0
	 * 
	 * @var array
	 */


	protected static $plugin_roles = array(
		'editor' => array(
			'edit_demo' => true,
			'edit_others_demo' => true,
		),
		'author' => array(
			'edit_demo' => true,
			'edit_others_demo' => false,
		),
		'subscriber' => array(
			'edit_demo' => false,
			'edit_others_demo' => false,
		),
	);

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {
		// Load plugin text domain
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Activate plugin when new blog is added
		add_action( 'wpmu_new_blog', array( $this, 'activate_new_site' ) );

		// Create Custom Post Type https://github.com/jtsternberg/CPT_Core/blob/master/README.md
		

		

		add_filter( 'body_class', array( $this, 'add_pn_class' ), 10, 3 );

		//Override the template hierarchy for load /templates/content-demo.php
		add_filter( 'template_include', array( $this, 'load_content_demo' ) );

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_js_vars' ) );
		
		add_filter('get_posts', array( $this, 'mimo_maps_for_woocommerce_location') );
		add_shortcode( 'mimo-maps-for-woocommerce', array( $this, 'mimo_maps_for_woocommerce_map_shortcode' ) );
		add_image_size( 'mimo-maps-for-woocommerce-thumb', 200, 100, true );
	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return self::$plugin_slug;
	}

	public function get_plugin_prefix() {
		return self::$plugin_prefix;
	}

	/**
	 * Return the plugin name.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin name variable.
	 */
	public function get_plugin_name() {
		return self::$plugin_name;
	}

	/**
	 * Return the version
	 *
	 * @since    1.0.0
	 *
	 * @return    Version const.
	 */
	public function get_plugin_version() {
		return self::VERSION;
	}

	/**
	 * Return the cpts
	 *
	 * @since    1.0.0
	 *
	 * @return    Cpts array
	 */
	public function get_cpts() {
		return $this->cpts;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	
	/**
	 * Fired when the plugin is activated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Activate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       activated on an individual blog.
	 */
	public static function activate( $network_wide ) {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_activate();

					restore_current_blog();
				}
			} else {
				self::single_activate();
			}
		} else {
			self::single_activate();
		}
	}

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 *
	 * @param    boolean    $network_wide    True if WPMU superadmin uses
	 *                                       "Network Deactivate" action, false if
	 *                                       WPMU is disabled or plugin is
	 *                                       deactivated on an individual blog.
	 */
	public static function deactivate( $network_wide ) {
		if ( function_exists( 'is_multisite' ) && is_multisite() ) {

			if ( $network_wide ) {

				// Get all blog ids
				$blog_ids = self::get_blog_ids();

				foreach ( $blog_ids as $blog_id ) {

					switch_to_blog( $blog_id );
					self::single_deactivate();

					restore_current_blog();
				}
			} else {
				self::single_deactivate();
			}
		} else {
			self::single_deactivate();
		}
	}

	/**
	 * Fired when a new site is activated with a WPMU environment.
	 *
	 * @since    1.0.0
	 *
	 * @param    int    $blog_id    ID of the new blog.
	 */
	public function activate_new_site( $blog_id ) {
		if ( 1 !== did_action( 'wpmu_new_blog' ) ) {
			return;
		}

		switch_to_blog( $blog_id );
		self::single_activate();
		restore_current_blog();
	}

	/**
	 * Fired when a new site is activated to see if it is licensed.
	 *
	 * @since    1.0.0
	 *
	 * @param    int    $blog_id    ID of the new blog.
	 */
	public function is_licensed(  ) {
		$general_settings = get_option( self::$plugin_prefix . '_settings' );
    	
    	$mimo_maps_for_woocommerce_settings_api_key = $general_settings[self::$plugin_prefix . '_settings_mimo_key'];
    	if($mimo_maps_for_woocommerce_settings_api_key) { $is_licensed =  true ; } else {$is_licensed =  true ;};
    	return $is_licensed;
	}
	
	/**
	 * Add support for custom CPT on the search box
	 *
	 * @since    1.0.0
	 *
	 * @param    object    $query   
	 */
	public function filter_search( $query ) {
		//if ( $query->is_search ) {
			//Mantain support for post
			//$this->cpts[] = 'post';
			//$query->set( 'post_type', $this->cpts );
		//}
		//return $query;
	}

	/**
	 * Get all blog ids of blogs in the current network that are:
	 * - not archived
	 * - not spam
	 * - not deleted
	 *
	 * @since    1.0.0
	 *
	 * @return   array|false    The blog ids, false if no matches.
	 */
	private static function get_blog_ids() {

		global $wpdb;

		// get an array of blog ids
		$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

		return $wpdb->get_col( $sql );
	}

	/**
	 * Fired for each blog when the plugin is activated.
	 *
	 * @since    1.0.0
	 */
	private static function single_activate() {
		//Requirements Detection System - read the doc/example in the library file
		require_once( plugin_dir_path( __FILE__ ) . 'includes/requirements.php' );
		new Wpmaps_Requirements( self::$plugin_name, self::$plugin_slug, array(
			'WP' => new WordPress_Requirement( '4.1.0' )
				) );

		//Define activation functionality here
		
		global $wp_roles;
		if ( !isset( $wp_roles ) ) {
			$wp_roles = new WP_Roles;
		}

		foreach ( $wp_roles->role_names as $role => $label ) {
			//if the role is a standard role, map the default caps, otherwise, map as a subscriber
			$caps = ( array_key_exists( $role, self::$plugin_roles ) ) ? self::$plugin_roles[ $role ] : self::$plugin_roles[ 'subscriber' ];

			//loop and assign
			foreach ( $caps as $cap => $grant ) {
				//check to see if the user already has this capability, if so, don't re-add as that would override grant
				if ( !isset( $wp_roles->roles[ $role ][ 'capabilities' ][ $cap ] ) ) {
					$wp_roles->add_cap( $role, $cap, $grant );
				}
			}
		}
		//Clear the permalinks
		
	}

	/**
	 * Fired for each blog when the plugin is deactivated.
	 *
	 * @since    1.0.0
	 */
	private static function single_deactivate() {
		//Clear the permalinks
		
	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		$domain = 'mimo-maps-for-woocommerce';
		$locale = apply_filters( 'plugin_locale', get_locale(), $domain );

		load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
		load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_prefix . '-style', plugins_url( 'assets/css/mimo-maps-for-woocommerce-public.min.css', __FILE__ ), array(), self::VERSION );
		

	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script('jquery'); 
	    wp_enqueue_script('jquery-effects-core');
	    wp_enqueue_script('jquery-ui-accordion');

		
	}

	/**
	 * Single View for CPT Maps
	 *
	 * @since    1.0.0
	 */
	/* Filter the single_template with our custom function*/
	public static function search($id, $array) {
		$i = 0;
		   foreach ( $array as $key => $val) {
		       if ($key === $id) {
		           return $val;
		       }
		   }
		   return null;
		   $i++;
		}


	

	/* Include Html markup */
	public static function mimo_maps_for_woocommerce_map_html($echo = true) {
		if( ! get_post_type('mimo_maps_for_woocommerce_map') ):
		 echo '<div class="mimo-maps-for-woocommerce-container"><div id="mimo-maps-for-woocommerce"></div></div>';
		endif;
	}

	// TODO Include General Map for full website
	public static function mimo_maps_for_woocommerce_full_map() {
		 
					$args = array();
					//TODO : Finish this function to get a full map


					self::display_map($args );
					self::mimo_maps_for_woocommerce_map_html();
				
	}

	public static function mimo_maps_for_woocommerce_has_location(){
			global $wp_query;
		 	$query = $wp_query;

		 		if(is_single() ) {
		 			global $post;
					$id = get_post_meta(get_the_id(), 'mimo_maps_for_woocommerce_item_location',true);
		 			if ($id !== '') {
						return true; 

					} else {
							return false;
						}

		 		} else if( $query->is_main_query() ){

					global $posts;
					$id = wp_list_pluck( $posts, 'mimo_maps_for_woocommerce_item_location', $index_key = null );
					if (count(array_filter($id)) > 0) {
						return true; 

					} else {
							return false;
						}
		 		}
		 		
		 		
					


			

	}

	public static function mimo_maps_for_woocommerce_get_location($the_id){
			
		$location = get_post_meta($the_id, 'mimo_maps_for_woocommerce_item_location',true);
		 			
		return $location;		
	}

	/**
	 * Add class in the body on the frontend
	 *
	 * @since    1.0.0
	 */
	public function add_pn_class( $classes ) {
		$classes[] = $this->get_plugin_slug();
		return $classes;
	}

	//TODO Set default values in function to be overwritten by developers
	public static function display_map(  $args ) {

		if(! class_exists('Woocommerce')) {
	    		echo esc_html(__('Woocommerce is not installed or activated -  Error 5, please install and activate Woocommerce' , 'mimo-maps-for-woocommerce'));
	 		return;
	    	}
		
		
		$defaults = wp_parse_args(array(

			'post_id' => '',
		    'category_slug' => '',
		    'posts_per_page' => '-1',

		));


	
	// Parse incoming $args into an array and merge it with $defaults
		$args = wp_parse_args( $args, $defaults );
    	
    	//Prepare
  
   		$i = 0;
   		$mimo_maps_for_woocommerce_css = '';
   		$i2 = 0;

   		//Colors arrays
   		$mimo_maps_for_woocommerce_cat_color_array = array();
		$mimo_maps_for_woocommerce_cat_array = array();
		$mimo_maps_for_woocommerce_color_array = array();
		$mimo_maps_for_woocommerce_icon_array = array();


   		//Get Settings
   		
   		$general_settings = get_option( self::$plugin_prefix . '_settings' );
   		$settings_style = get_option( self::$plugin_prefix . '_settings_style' );
   		$settings_markers = get_option( self::$plugin_prefix . '_settings_markers' );
    	
    	if (isset($settings_markers[self::$plugin_prefix . '_cat_colors' ] ) ) $entries_post = $settings_markers[self::$plugin_prefix . '_cat_colors' ];
    	$mimo_maps_for_woocommerce_settings_api_key = $general_settings[self::$plugin_prefix . '_settings_api_key'];

	    	if($mimo_maps_for_woocommerce_settings_api_key == '') {
	    		echo esc_html(__('Sorry no Google Maps API Key found Error 4, please go to Mimo Maps for Woocommerce Settings and insert your Google Maps API Key' , 'mimo-maps-for-woocommerce'));
	 		return;
	    	}
       
   		
	   $post_id = $args['post_id'];
	   $category_slug = $args['category_slug'];
	   $posts_per_page = $args['posts_per_page'];

	   if(isset($args['post_id'])) {$post_id = $args['post_id'];} else {$post_id = null;}
	   
    	// If id of map CPT is not defined take general options
	   
		//Set $post_id
			
			if ( null === $post_id || $post_id === '' ) { 

				if(isset($general_settings[self::$plugin_prefix . '_settings_post_id'])) {
					$post_id = $general_settings[self::$plugin_prefix . '_settings_post_id'];
				} else {
					$post_id = null;
				} 

			} else {

				$post_id = $args['post_id'];

			} ;

			//Set $category_slug
			
			if ( null === $category_slug || $category_slug === '' ) { 

				if(isset($general_settings[self::$plugin_prefix . '_settings_category_slug'])) {
					$category_slug = $general_settings[self::$plugin_prefix . '_settings_category_slug'];
				} else {
					$category_slug = null;
				} 

			} else {

				$category_slug = $args['category_slug'];

			} ;

			//Set $category_slug
			
			if ( null === $posts_per_page || $posts_per_page === '' ) { 

				if(isset($general_settings[self::$plugin_prefix . '_settings_posts_per_page'])) {
					$posts_per_page = $general_settings[self::$plugin_prefix . '_settings_posts_per_page'];
				} else {
					$posts_per_page = '-1';
				} 

			} else {

				$posts_per_page = $args['posts_per_page'];

			} ;

			 	// Opened map or closed, you need to use a button to initialize it, explained in documentation
			
			$height = $general_settings[self::$plugin_prefix . '_settings_height'];
		    $zoom =  $general_settings[self::$plugin_prefix . '_settings_zoom'];

	    	
	   		
	   		//Id is defined so take map options

		
		// use a custom field on the map page to setup the zoom
	    
	    if ( ! $zoom ) $zoom = '12';
	     if ( ! $height ) $height = '500px';

		
	    
		
   		

		

		if(isset($entries_post)) :

		
			foreach( (array) $entries_post as $key => $entry){

				if ( isset( $entry[self::$plugin_prefix . '_cat_name'] ) ) {	$mimo_maps_for_woocommerce_cat_name = esc_html( $entry[self::$plugin_prefix . '_cat_name'])  ; 	} else {  	$mimo_maps_for_woocommerce_cat_name = '' ; };
		    	if ( isset( $entry[self::$plugin_prefix . '_cat_color'] ) ) {	$mimo_maps_for_woocommerce_cat_color = esc_html( $entry[self::$plugin_prefix . '_cat_color'] ) ;	} else {  	$mimo_maps_for_woocommerce_cat_color = '#606060' ; };
		    	if ( isset( $entry[self::$plugin_prefix . '_text_color'] ) ) {	$mimo_maps_for_woocommerce_text_color = esc_html( $entry[self::$plugin_prefix . '_text_color']  ) ;	} else {  	$mimo_maps_for_woocommerce_text_color = '#ffffff' ; };
		    	if ( isset( $entry[self::$plugin_prefix . '_tax_icon'] ) ) {	$mimo_maps_for_woocommerce_cat_post_icon = esc_html( $entry[self::$plugin_prefix . '_tax_icon']  ) ;	} else {  	$mimo_maps_for_woocommerce_cat_post_icon = '' ; };

		    	$mimo_maps_for_woocommerce_cat_array[] = $mimo_maps_for_woocommerce_cat_name ;
		    	$mimo_maps_for_woocommerce_color_array[] = $mimo_maps_for_woocommerce_cat_color;
		    	$mimo_maps_for_woocommerce_icon_array[] = $mimo_maps_for_woocommerce_cat_post_icon;

		    	
				
				
			$i2++;

			}

		endif;


		$mimo_maps_for_woocommerce_cat_color_array = array_combine($mimo_maps_for_woocommerce_color_array, $mimo_maps_for_woocommerce_cat_array);
		$mimo_maps_for_woocommerce_cat_icon_array = array_combine($mimo_maps_for_woocommerce_icon_array, $mimo_maps_for_woocommerce_cat_array);
	    
		// Prepare Query Args
	    $map_data = array();
		$lats  = array();
		$longs = array();
		$mimo_maps_for_woocommerce_args =  wp_parse_args(array());
		$mimo_maps_for_woocommerce_args['ignore_sticky_posts'] = true;

	    if($post_id) $mimo_maps_for_woocommerce_args['post__in'] = array($post_id);

	   

		if($category_slug  )  : $mimo_maps_for_woocommerce_args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat' ,
					'field'    => 'slug',
					'terms'    => $category_slug,
				),
			);
		endif;

	    $mimo_maps_for_woocommerce_args['posts_per_page'] = $posts_per_page;
	    $mimo_maps_for_woocommerce_args['post_type'] = 'product';
	   	// Query with args
		$map_query = new WP_Query( $mimo_maps_for_woocommerce_args );
		//Set taxonomy depending on Post Type to use
		$mimo_maps_for_woocommerce_taxonomy_post_type = 'product_cat';
		
		
		
	    $n = 1;
	    // Loop
	    if ( $map_query->have_posts() ) : 
	        while( $map_query->have_posts() ) : $map_query->the_post();
			    //Get the category slug
	    		$n = 0;
	    		$key = '';

	    		
	    		$categories = wp_get_post_terms ( get_the_id(), $mimo_maps_for_woocommerce_taxonomy_post_type );
			    foreach($categories as $category) {
					$key =  $category->slug;
					$n++;
					if($n = 1) break;
					}
				
				
			  	$result =  array_search($key, $mimo_maps_for_woocommerce_cat_color_array);
			  	$mimo_maps_for_woocommerce_tax_icon =  array_search($key, $mimo_maps_for_woocommerce_cat_icon_array);

			  	//if post type location get meta_coords else is product or post then get id of location attached and show location with produtc or post title and link

			  	$meta_coords = get_post_meta( get_the_id(), self::$plugin_prefix . '_item_location', true );
			  	$travel_mode = get_post_meta( get_the_id(), self::$plugin_prefix . '_travel_mode', true );
			  	
	            $product_cats = get_the_terms( get_the_id(), $mimo_maps_for_woocommerce_taxonomy_post_type );
	            if( $product_cats) $single_cat = array_shift( $product_cats );
	            if($single_cat) $mimo_maps_for_woocommerce_term_id = $single_cat->term_id;
	           
	           	if( get_post_meta( get_the_id(), '_sale_price', true) && class_exists('Woocommerce') ) { 
	           		
	           		global $product;
	           		
	           		$mimo_maps_for_woocommerce_sale_price = 'Custom Price';
	           		
	           		if( $product->get_price_html() ) :
		           		$mimo_maps_for_woocommerce_sale_price = $product->get_price_html();
		           	endif;

	           	} else { 

	           		$mimo_maps_for_woocommerce_sale_price = ''; 

	           	};
	           //var_dump($map_query);
	            if( isset($meta_coords) && '' !==  $meta_coords  ) {

	            		$startvalue = array_values($meta_coords)[0];
	            		$coords=explode(",",$startvalue);
						$startlat = $coords[0]; // latitude
						$startlon = $coords[1]; // longitud
			           
	 			};



	 				if( count($meta_coords) > 1  ) {

	 					$allwaypointsandend = array_shift ( $meta_coords );
	 					$lastmarker = end($meta_coords);
	 					$endcoords=explode(",",$lastmarker);
						$endlat = $endcoords[0]; 
						$endlon = $endcoords[1];

						

	 					if (count($meta_coords) > 1) $waypoints = array_slice($meta_coords, 0, -1); 

	 					 
	 				} else {
	 					$endlat = $endlon = $waypoints = false;
	 				};
	 				if( $meta_coords  ) :
			           	if( $startlat !== ''  ) :

			              

			               $map_data[] = array( 
				               	get_the_title(),  //0
				               	$startlat, //1
				               	$startlon, //2
				               	get_the_permalink(), //3
				               	$map_id, //4
				                $mimo_maps_for_woocommerce_tax_icon, //5
				               	$single_cat->slug, //6
				               	$endlat,//7
				               	$endlon,//8
				               	$result,//9
				               	get_the_excerpt(),//10
				               	get_the_post_thumbnail(get_the_id(),'mimo-maps-for-woocommerce-thumb' ),//11
				               	$mimo_maps_for_woocommerce_sale_price,//12
				               	$waypoints,//13
				               	plugins_url('mimo-maps-for-woocommerce'),//14
				               	__('Read more','mimo-maps-for-woocommerce'),//15
				               	$travel_mode,//16
				               	$single_cat->name,//17

			               	);

			           endif;
	           	 endif;
	          
	    $n++;
	    endwhile;  // End Loop
	    wp_reset_postdata();
	    if(! empty($map_data)) {
	    	$map_data1 = json_encode($map_data);
	    } else {

	    	echo '<p class="mimo-maps-for-woocommerce-error-message">' . esc_html( 'Sorry no locations found. Error 3' , 'mimo-maps-for-woocommerce' ) . '</p>';

	    	return;
	    	
	    }
	    $map_data1 = json_encode($map_data);
	    $mimo_maps_for_woocommerce_settings_style = json_encode($settings_style);
	    
	    
	    
	    
	    wp_enqueue_script(self::$plugin_prefix . '_googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $mimo_maps_for_woocommerce_settings_api_key,  'jquery' ,"", true );
		
	    
	    wp_enqueue_script( self::$plugin_prefix, plugins_url( 'assets/js/mimo-maps-for-woocommerce.min.js', __FILE__ ), array( 'jquery' ), self::VERSION );
	    wp_localize_script( self::$plugin_prefix , 'map_data', $map_data1 );
	    
	    $mimo_maps_for_woocommerce_colors = array();
	    
		wp_localize_script( self::$plugin_prefix , 'mimo_maps_for_woocommerce_settings_style' , $mimo_maps_for_woocommerce_settings_style );
		wp_localize_script( self::$plugin_prefix , 'mimo_maps_for_woocommerce_height' , $height );
		wp_localize_script( self::$plugin_prefix , 'mimo_maps_for_woocommerce_zoom' , $zoom );

		
		wp_enqueue_style( self::$plugin_prefix . '_plugin_mimo_maps_for_woocommerce_styles', plugins_url( 'assets/css/mimo-maps-for-woocommerce-custom-styles.css', __FILE__ ), array(), self::VERSION );
		$mimo_maps_for_woocommerce_css .= '

		';
		wp_add_inline_style( self::$plugin_prefix . '_plugin_mimo_maps_for_woocommerce_styles', $mimo_maps_for_woocommerce_css );

		add_action( 'wp_enqueue_scripts',  'display_map'  );
		else:
			
			return;
		endif;

		

}	
	
	public function enqueue_js_vars() {
		
	}
	/**
	 * Example for override the template system on the frontend
	 *
	 * @since    1.0.0
	 */
	public function load_content_demo( $original_template ) {
		if ( 'mimo_maps_for_woocommerce_map' == get_post_type(get_the_id()) ) {
			return mimo_maps_for_woocommerce_get_template_part( 'single', 'map', false );
		} else {
			return $original_template;
		}
	}
	// check the current post for the existence of a short code
	public function has_shortcode($shortcode = '') {
	     
	    $post_to_check = get_post(get_the_id());
	     
	    // false because we have to search through the post content first
	    $found = false;
	     
	    // if no short code was provided, return false
	    if (!$shortcode) {
	        return $found;
	    }
	    // check the post content for the short code
	    if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
	        // we have found the short code
	        $found = true;
	    }
	     
	    // return our final results
	    return $found;
	}


	/**
	 * NOTE:  Actions are points in the execution of a page or process
	 *        lifecycle that WordPress fires.
	 *
	 *        Actions:    http://codex.wordpress.org/Plugin_API#Actions
	 *        Reference:  http://codex.wordpress.org/Plugin_API/Action_Reference
	 *
	 * @since    1.0.0
	 */


	public function action_method_name() {
		// Define your action hook callback here
	}

	/**
	 * NOTE:  Filters are points of execution in which WordPress modifies data
	 *        before saving it or sending it to the browser.
	 *
	 *        Filters: http://codex.wordpress.org/Plugin_API#Filters
	 *        Reference:  http://codex.wordpress.org/Plugin_API/Filter_Reference
	 *
	 * @since    1.0.0
	 */


	public function filter_method_name() {
		// Define your filter hook callback here
	}


	public static function mimo_maps_for_woocommerce_single_cat_icon( $category = ''){
		
		$settings_style = get_option( self::$plugin_slug . '_settings_style' );
		$entries = $settings_style[self::$plugin_slug . '_cat_colors' ];
		$i = 0;
		
		$mimo_maps_for_woocommerce_cat_color_array = array();
		
		$mimo_maps_for_woocommerce_echo = '';
		foreach( (array) $entries as $key => $entry){

			if ( isset( $entry[self::$plugin_slug . '_cat_name'] ) ) {	$mimo_maps_for_woocommerce_cat_name = esc_html( $entry[self::$plugin_slug . '_cat_name'])  ; 	} else {  	$mimo_maps_for_woocommerce_cat_name = '' ; };
			if ( isset( $entry[self::$plugin_slug . '_cat_color'] ) ) {	$mimo_maps_for_woocommerce_cat_color = esc_html( $entry[self::$plugin_slug . '_cat_color'] ) ;	} else {  	$mimo_maps_for_woocommerce_cat_color = '' ; };
			if ( isset( $entry[self::$plugin_slug . '_text_color'] ) ) {	$mimo_maps_for_woocommerce_text_color = esc_html( $entry[self::$plugin_slug . '_text_color']  ) ;	} else {  	$mimo_maps_for_woocommerce_text_color = '' ; };
			if ( isset( $entry[self::$plugin_slug . '_tax_icon'] ) ) {	$mimo_maps_for_woocommerce_cat_icon = esc_html( $entry[self::$plugin_slug . '_tax_icon']  ) ;	} else {  	$mimo_maps_for_woocommerce_cat_icon = '' ; };

			if($mimo_maps_for_woocommerce_cat_name !== '') $mimo_maps_for_woocommerce_cat_array[] = $mimo_maps_for_woocommerce_cat_name ;
			if($mimo_maps_for_woocommerce_cat_color !== '') $mimo_maps_for_woocommerce_color_array[] = $mimo_maps_for_woocommerce_cat_color;
			if($mimo_maps_for_woocommerce_cat_icon !== '') $mimo_maps_for_woocommerce_icon_array[] = $mimo_maps_for_woocommerce_cat_icon;

			$i++;
		}
		if( isset( $mimo_maps_for_woocommerce_cat_array ) && isset($mimo_maps_for_woocommerce_color_array)) :
		$mimo_maps_for_woocommerce_cat_color_array = array_combine($mimo_maps_for_woocommerce_color_array, $mimo_maps_for_woocommerce_cat_array);
		$mimo_maps_for_woocommerce_cat_icon_array = array_combine($mimo_maps_for_woocommerce_icon_array, $mimo_maps_for_woocommerce_cat_array);
		
		$mimo_maps_for_woocommerce_term_id = $category;
			$mimo_maps_for_woocommerce_tax_icon =  array_search($mimo_maps_for_woocommerce_term_id, $mimo_maps_for_woocommerce_cat_icon_array);
			if($mimo_maps_for_woocommerce_tax_icon !== false) :

				 $mimo_maps_for_woocommerce_echo .= '<i class="mimo-maps-for-woocommerce-' . esc_html($mimo_maps_for_woocommerce_term_id) . ' '  . esc_html($mimo_maps_for_woocommerce_tax_icon) . '"></i>';
			
			endif; 
			

		endif;
		return $mimo_maps_for_woocommerce_echo;
	}

	/**
	 *
	 *        Reference:  http://codex.wordpress.org/Shortcode_API
	 *
	 * @since    1.0.0
	 */


	public function mimo_maps_for_woocommerce_map_shortcode($atts) {
		// Shortcode that shows the map
		
		 extract( shortcode_atts( array(

			'post_id' => '',
		    'category_slug' => '',
		    'posts_per_page' => '-1',

		) , $atts ) );

		 $args = array();


	
	// Parse incoming $args into an array and merge it with $defaults
		$args = wp_parse_args( $atts );

		 	self::display_map($args );

		  	self::mimo_maps_for_woocommerce_map_html();
             

	}

}
