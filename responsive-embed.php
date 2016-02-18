<?php

/**
 * Plugin Name: Responsive Embed
 * Plugin URI: http://github.com/tu4mo/responsive-embed
 * Description: Drop-in solution to make YouTube embeds responsive.
 * Version: 0.1
 * Author: tu4mo
 * Author URI: tu4mo.com
 * License: ISC
 */

defined( 'ABSPATH' ) or die();

add_action( 'wp_head' , 'responsive_embed_head' );
add_action( 'wp_footer', 'responsive_embed_footer', 100 );

function responsive_embed_head() {
	?>
		<style type="text/css">
			.responsive-embed { max-width: 100%; overflow: hidden; padding-bottom: 56.25%; position: relative; }
			.responsive-embed iframe { height: 100%; left: 0; position: absolute; top: 0; width: 100%; }
		</style>
	<?php
}

function responsive_embed_footer() {
	?>
		<script type="text/javascript">
			(function(document) {
				var embeds = document.querySelectorAll('iframe[src*="youtube.com"]');
				for (var i = 0; i < embeds.length; i++) {
					embeds[i].outerHTML = '<div class="responsive-embed">' + embeds[i].outerHTML + '</div>';
				}
			})(document);
		</script>
	<?php
}
