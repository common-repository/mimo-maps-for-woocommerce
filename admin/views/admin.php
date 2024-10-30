<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Mimo_Maps_For_Woocommerce_Display
 * @author    Mimo <mail@mimo.media>
 * @license   GPL-2.0+
 * @link      http://mimo.media
 * @copyright 2015 Mimo
 */

 $mimo_maps_for_woocommerce_icons_select1 = array(

	        'art-gallery' =>  'map-icon map-icon-boating',
	        'boat-ramp' => 'map-icon map-icon-boat-ramp',
	        'boat-tour' => 'map-icon map-icon-boat-tour',
	        'canoe' => 'map-icon map-icon-canoe',
	        'diving' => 'map-icon map-icon-diving',
	        'fishing' => 'map-icon map-icon-fishing',
	        'fishing-pier' => 'map-icon map-icon-fishing-pier',
	        'fish-cleaning' => 'map-icon map-icon-fish-cleaning',
	        'jet-skiing' => 'map-icon map-icon-jet-skiing',
	        'kayaking' => 'map-icon map-icon-kayaking',
	        'marina' => 'map-icon map-icon-marina',
	        'rafting' => 'map-icon map-icon-rafting',
	        'sailing' => 'map-icon map-icon-sailing',
	        'scuba-diving' => 'map-icon map-icon-scuba-diving',
	        'surfing' => 'map-icon map-icon-surfing',
	        'swimming' => 'map-icon map-icon-swimming',
	        'waterskiing' => 'map-icon map-icon-waterskiing',
	        'whale-watching' => 'map-icon map-icon-whale-watching',
	        'chairlift' => 'map-icon map-icon-chairlift',
	        'cross-country-skiing' => 'map-icon map-icon-cross-country-skiing',
	        'ice-fishing' => 'map-icon map-icon-ice-fishing',
	        'ice-skating' => 'map-icon map-icon-ice-skating',
	        'ski-jumping' => 'map-icon map-icon-ski-jumping',
	        'skiing' => 'map-icon map-icon-skiing',
	        'sledding' => 'map-icon map-icon-sledding',
	        'snow-shoeing' => 'map-icon map-icon-snow-shoeing',
	        'snow' => 'map-icon map-icon-snow',
	        'snowboarding' => 'map-icon map-icon-snowboarding',
	        'snowmobile' => 'map-icon map-icon-snowmobile',
	        'train-station' => 'map-icon map-icon-train-station',
	        'subway-station' => 'map-icon map-icon-subway-station',
	        'bus-station' => 'map-icon map-icon-bus-station',
	        'transit-station' => 'map-icon map-icon-transit-station',
	        'icon-parking' => 'map-icon map-icon-icon-parking',
	        'gas-station' => 'map-icon map-icon-gas-station',
	        'car-rental' => 'map-icon map-icon-car-rental',
	        'car-dealer' => 'map-icon map-icon-car-dealer',
	        'car-repair' => 'map-icon map-icon-car-repair',
	        'car-wash' => 'map-icon map-icon-car-wash',
	        'airport' => 'map-icon map-icon-airport',
	        'taxi-stand' => 'map-icon map-icon-taxi-stand',
			'map-icon map-icon-art-gallery',
	        'campground' => 'map-icon map-icon-campground',
	        'bank' => 'map-icon map-icon-bank',
	        'hair-care' => 'map-icon map-icon-hair-care',
	        'gym' => 'map-icon map-icon-gym',
	        'point-of-interest' => 'map-icon map-icon-bpoint-of-interest',
	        'post-box' => 'map-icon map-icon-post-box',
	        'post-office' => 'map-icon map-icon-post-office',
	        'university' => 'map-icon map-icon-university',
	        'beauty-salon' => 'map-icon map-icon-beauty-salon',
	        'atm' => 'map-icon map-icon-atm',
	        'rv-park' => 'map-icon map-icon-rv-park',
	        'school' => 'map-icon map-icon-school',
	        'library' => 'map-icon map-icon-library',
	        'spa' => 'map-icon map-icon-spa',
	        'route' => 'map-icon map-icon-route',
	        'postal-code' => 'map-icon map-icon-postal-code',
	        'stadium' => 'map-icon map-icon-stadium',
	        'postal-code-prefix' => 'map-icon map-icon-postal-code-prefix',
	        'museum' => 'map-icon map-icon-museum',
	        'finance' => 'map-icon map-icon-finance',
			'natural-feature' => 'map-icon map-icon-natural-feature',
	        'funeral-home' => 'map-icon map-icon-funeral-home',
	        'cemetery' => 'map-icon map-icon-cemetery',
	        'park' => 'map-icon map-icon-park',
	        'lodging' => 'map-icon map-icon-lodging',
	        'female' => 'map-icon map-icon-female',
	        'male' => 'map-icon map-icon-male',
	        'unisex' => 'map-icon map-icon-unisex',
	        'toilet' => 'map-icon map-icon-toilet',
	        'bakery' => 'map-icon map-icon-bakery',
	        'cafe' => 'map-icon map-icon-cafe',
	        'restaurant' => 'map-icon map-icon-restaurant',
	        'food' => 'map-icon map-icon-food',
	        'abseiling' => 'map-icon map-icon-abseiling',
	        'archery' => 'map-icon map-icon-archery',
	        'baseball' => 'map-icon map-icon-baseball',
	        'bicycling' => 'map-icon map-icon-bicycling',
	        'golf' => 'map-icon map-icon-golf',
	        'hang-gliding' => 'map-icon map-icon-hang-gliding',
	        'horse-riding' => 'map-icon map-icon-horse-riding',
	        'inline-skating' => 'map-icon map-icon-inline-skating',
	        'motobike-trail' => 'map-icon map-icon-motobike-trail',
	        'playground' => 'map-icon map-icon-playground',
	        'skateboarding' => 'map-icon map-icon-skateboarding',
	        'tennis' => 'map-icon map-icon-tennis',
	        'walking' => 'map-icon map-icon-walking',
	        'viewing' => 'map-icon map-icon-viewing',
	        'trail-walking' => 'map-icon map-icon-trail-walking',
      	);

	
		 $mimo_maps_for_woocommerce_icons_select = array_flip($mimo_maps_for_woocommerce_icons_select1 );  

?>

<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <div class="postbox">
			
			<h3 class="hndle"><span><?php _e( 'Mimo Maps for Woocommerce', 'mimo-maps-for-woocommerce' ); ?></span></h3>
			
			<div class="inside">

				<p> <?php _e( 'If you like this plugin please rate it. find support at ', 'mimo-maps-for-woocommerce' ); ?><a href="http://www.mimo.media"><?php _e( 'mimo.media', 'mimo-maps-for-woocommerce' ); ?></a></p>

			</div>
	</div>
    <div id="tabs" class="settings-tab">
	<ul>
	    <li><a href="#tabs-1"><?php _e( 'General' ); ?></a></li>
	    <li><a href="#tabs-2"><?php _e( 'Style', 'mimo-maps-for-woocommerce' ); ?></a></li>
	    <li><a href="#tabs-3"><?php _e( 'Markers', 'mimo-maps-for-woocommerce' ); ?></a></li>
	    
	    
	</ul>
	<div id="tabs-1" class="wrap">
		<div class="postbox">
			<h3 class="hndle"><span><?php _e( 'General Settings', 'mimo-maps-for-woocommerce' ); ?></span></h3>
			<div class="inside">
		    
		
		    <?php

		    

		    $cmb = new_cmb2_box( array(

				'id' => $this->plugin_prefix . '_options',
				'hookup' => false,
				'show_on' => array( 'key' => 'options-page', 'value' => array( $this->plugin_prefix  ), ),
				'show_names' => true,
				    ) 
		    );

		    $cmb->add_field(array(

			'name' => __( 'Google API key', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Get your API key and insert it here', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_settings_api_key',
			'type' => 'text',
			'default' => '',
		    ) 
	    );

		    

		    

	    $cmb->add_field(array(

			'name' => __( 'Post Id', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Choose a post id to show only one post in this map', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_settings_post_id',
			'type' => 'text',
			'default' => '',
		    ) 
	    );

	     $cmb->add_field(array(

			'name' => __( 'Category Slug', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Choose a category slug to show only one post in this map', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_settings_category_slug',
			'type' => 'text',
			'default' => '',
		    ) 
	    );

	     $cmb->add_field(array(

			'name' => __( 'Post Locations per page', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Choose a posts_per_page value, -1 = infinite posts', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_settings_posts_per_page',
			'type' => 'text',
			'default' => '-1',
		    ) 
	    );

		    $cmb->add_field(array(

				'name' => __( 'Map Height in Px or Em', 'mimo-maps-for-woocommerce' ),
				'desc' => __( 'Give a height to the map, ie: "300px","30em"', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_height',
				'type' => 'text',
				'default' => '500px',
			    ) 

		    );

		    $cmb->add_field(array(

				'name' => __( 'Map Zoom', 'mimo-maps-for-woocommerce' ),
				'desc' => __( 'Give a zoom to the map, ie: "5","12","16"', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_zoom',
				'type' => 'text',
				'default' => '12',
			    ) 

		    );

		    $cmb->add_field(array(

			'name' => __( 'License key(comming soon)', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Get the Pro license of this plugin to get amazing features, comming soon', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_settings_mimo_key',
			'type' => 'text',
			'default' => '',
			'attributes'  => array(
				'readonly' => 'readonly',
				'disabled' => 'disabled',
			),
		    ) 
	    );
		    
		    cmb2_metabox_form( $this->plugin_prefix . '_options', $this->plugin_prefix . '_settings' ); ?>

	   		</div>
	    </div>
	</div>

	<div id="tabs-2" class="wrap">
		<div class="postbox">
			<h3 class="hndle"><span><?php _e( 'Map Style', 'mimo-maps-for-woocommerce' ); ?></span></h3>
			<div class="inside">

	    <?php
	    $cmb = new_cmb2_box( array(

			'id' => $this->plugin_prefix . '_options_style',
			'hookup' => false,
			'show_on' => array( 'key' => 'options-page', 'value' => array( $this->plugin_prefix  ), ),
			'show_names' => true,
			) 
	    );

	    $cmb->add_field( array(

				'name' => __( 'Sea', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_sea_color',
				'type' => 'colorpicker',
				'default' => '#b1ced6',
			    ) 
		    );

	    $cmb->add_field( array(

				'name' => __( 'Landscape', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_landscape_color',
				'type' => 'colorpicker',
				'default' => '#e0e0e0',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Highway Fill', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_highway_fill_color',
				'type' => 'colorpicker',
				'default' => '#b2b2b2',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Highway Stroke', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_highway_stroke_color',
				'type' => 'colorpicker',
				'default' => '#8e8e8e',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Arterial', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_arterial_color',
				'type' => 'colorpicker',
				'default' => '#aaaaaa',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Local', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_local_color',
				'type' => 'colorpicker',
				'default' => '#b2b2b2',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Poi', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_poi_color',
				'type' => 'colorpicker',
				'default' => '#b5b5b5',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Poi Park', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_poi_park_color',
				'type' => 'colorpicker',
				'default' => '#c2d6b6',
			   

			    ) 
		    );

		    

		    $cmb->add_field( array(

				'name' => __( 'Labels Stroke', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_labels_stroke_color',
				'type' => 'colorpicker',
				'default' => '#ffffff',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Labels Fill', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_labels_fill_color',
				'type' => 'colorpicker',
				'default' => '#0a0a0a',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Icon', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_icon_visible',
				'type' => 'select',
				'show_option_none' => true,
				'default' => 'off',
				'options' => array(
					'on' => 'On',
					'off' => 'Off',
					)
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Transit', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_transit_color',
				'type' => 'colorpicker',
				'default' => '#a3a3a3',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Administrative Fill', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_adm_fill_color',
				'type' => 'colorpicker',
				'default' => '#9e9e9e',
			    ) 
		    );

		    $cmb->add_field( array(

				'name' => __( 'Administrative Stroke', 'mimo-maps-for-woocommerce' ),
				'id' => $this->plugin_prefix . '_settings_adm_stroke_color',
				'type' => 'colorpicker',
				'default' => '#686868',
			    ) 
		    );
	    	

	    

	    cmb2_metabox_form( $this->plugin_prefix . '_options_style', $this->plugin_prefix . '_settings_style' );
	    ?>
	    </div>
	    </div>

	</div>

	<div id="tabs-3" class="wrap">
		<h3 class="hndle"><span><?php _e( 'Set Posts Colors and Icons', 'mimo-maps-for-woocommerce' ); ?></span></h3>

	    <?php
	    $cmb = new_cmb2_box( array(

			'id' => $this->plugin_prefix . '_options_markers',
			'hookup' => false,
			'show_on' => array( 'key' => 'options-page', 'value' => array( $this->plugin_prefix  ), ),
			'show_names' => true,
			) 
	    );

	    $group_field_id =  $cmb->add_field( array(

			'id'          => $this->plugin_prefix . '_cat_colors',
			'type'        => 'group',
			'description' => __( 'The category color', 'mimo-maps-for-woocommerce' ),
			'options'     => array(
				'group_title'   => __( 'Color {#}', 'mimo-maps-for-woocommerce' ), // {#} gets replaced by row number
				'add_button'    => __( 'Add Another Color', 'mimo-maps-for-woocommerce' ),
				'remove_button' => __( 'Remove Color', 'mimo-maps-for-woocommerce' ),
			),
		) );
	    

	    $cmb->add_group_field( $group_field_id, array(
			'name' => __( 'Category Color', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Choose a color to apply to acategory icons and info', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_cat_color',
			'type' => 'colorpicker',
			'default' => '#000000',
		    ) 
	    );

	    $cmb->add_group_field( $group_field_id, array(

			'name' => __( 'Icon Color', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Choose a color to apply to acategory icons and info', 'mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_text_color',
			'type' => 'colorpicker',
			'default' => '#ffffff',
		    ) 
	    );

	    

		    

	    $cmb->add_group_field( $group_field_id, array(

			'name' => __( 'Icon', 'mimo-maps-for-woocommerce' ),
			'desc' => __( 'Choose icon','mimo-maps-for-woocommerce' ),
			'id' => $this->plugin_prefix . '_tax_icon',
			'type' => 'select',
			'show_option_none' => true,
			'options' => $mimo_maps_for_woocommerce_icons_select,
		    ) 
	    );


	 	$cmb->add_group_field( $group_field_id, array(

			'name'             => __( 'Category', 'mimo-maps-for-woocommerce' ),
			'desc'             => __( 'Choose a category to apply settings', 'mimo-maps-for-woocommerce' ),
			'id'               => $this->plugin_prefix . '_cat_name',
			'type'             => 'select',
			'show_option_none' => true,
			'options'          => self::get_term_options(),
		    ) 
	    );
	    
	    

	    cmb2_metabox_form( $this->plugin_prefix . '_options_markers', $this->plugin_prefix . '_settings_markers' );
	    ?>

	</div>
	
	

    
</div>
