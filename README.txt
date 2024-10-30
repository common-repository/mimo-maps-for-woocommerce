===  Mimo Maps for Woocommerce ===
Contributors: mimothemes
Donate link: http://mimo.media/
Tags: maps, product, 
Requires at least: 4.3
Tested up to: 4.5.1
Stable tag: 2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Show a Google Map with your products locations, custom markers linked to your products and custom colors.

== Description ==

Google Maps easy in your site. This plugin gives a you a shortcode to show your color customized Google Map with no coding knowledge.. Just set your locations, map colors, height and zoom and show your customized maps easily in your pages and posts, give a location to any of your products and it will appear in the map linked to your product single view page





With this Google Maps Plugin you can:
<ul>
	<li>Add locations to products</li>
	<li>Easy to use, no coding required</li>
	<li>100% Responsive Maps</li>
	<li>Google Maps Streetview supported</li>
	<li>UTF-8 character support</li>
	<li>Choose Zoom and Height of your map</li>
	<li>Markers show your products images and descriptions</li>
	<li>Customize markers colors and icons for each products category</li>
	<li>Create Routes</li>
	<li>Customize map colors easily</li>
</ul>




== Installation ==



= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'mimo-maps-for-woocommerce'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `mimo-maps-for-woocommerce.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `mimo-maps-for-woocommerce.zip`
2. Extract the `mimo-maps-for-woocommerce` directory to your computer
3. Upload the `mimo-maps-for-woocommerce` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard


== Frequently Asked Questions ==

None by the moment.

== Screenshots ==


== Upgrade Notice == 

No upgrades yet

== Changelog ==


= 1.0 =

First Version

= 2.0 =

Added map icon font
Added error message when no locations found in posts
Deleted Locations post type


== Usage instructions ==

Set category icons and colors in plugin Settings, Goto Settings/Mimo Maps for Woocommerce</br>

Use [mimo-maps-for-woocommerce] shortcode to show the map with all locations(all posts or products locations), using shortcode:

[mimo-maps-for-woocommerce post_id="id of post" ] Shows only one post

[mimo-maps-for-woocommerce category_slug="slug" ] Shows locations from one category

[mimo-maps-for-woocommerce category_slug="slug" posts_per_page="2" ]



Shortcode atributtes:



<ul>
	<li><strong>post_id</strong> = Id of post to show(only one post), default empty</li>
	<li><strong>category_slug</strong> = slug of category to show, default empty</li>
	<li><strong>posts_per_page</strong> = Number of posts to show(only posts with locations), default -1</li>
</ul>



== Developer instructions ==



You can pass your options to the opstions array:

<code>

$args = array(
'post_id' => '',
'category_slug' => '',
'posts_per_page' => '',

);


if (  class_exists('Mimo_Maps_For_Woocommerce_Display')  ) Mimo_Maps_For_Woocommerce_Display::display_map( $args );</br>

</code>


Find plugin and issues solved at http://mimo.media