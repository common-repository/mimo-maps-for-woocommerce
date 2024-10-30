<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Mimo Cube
 * @since 1.0
 */

get_header();  




	 ?>
	<div id="primary" class="content-area">
	
		<div id="content" class="mm-single-content" role="main">


			<?php 
			$mm_map_args = array();
			$mm_map_args['map_id'] = get_the_id();
			Mimo_Maps_For_Woocommerce_Display::display_map($mm_map_args);
			Mimo_Maps_For_Woocommerce_Display::mimo_maps_for_woocommerce_map_html(); 

			?>
					
					
			<div class="clear"></div>
		</div><!-- #content -->
		<div class="clear"></div>
	</div><!-- #primary -->
	
<div class="clear"></div>



	

<?php get_footer(); ?>

