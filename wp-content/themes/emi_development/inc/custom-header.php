<?php
/**
 * Custom header implementation
 */

function emi_development_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'emi_development_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'emi_development_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'emi_development_custom_header_setup' );

if ( ! function_exists( 'emi_development_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see emi_development_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'emi_development_header_style' );
function emi_development_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        #masthead{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'emi_development-basic-style', $custom_css );
	endif;
}
endif; // emi_development_header_style
