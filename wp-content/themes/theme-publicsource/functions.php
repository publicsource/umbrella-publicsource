<?php

define( 'INN_MEMBER', true );

/**
 * Include theme files
 *
 * Based off of how Largo loads files: https://github.com/INN/Largo/blob/master/functions.php#L358
 *
 * 1. hook function Largo() on after_setup_theme
 * 2. function Largo() runs Largo::get_instance()
 * 3. Largo::get_instance() runs Largo::require_files()
 *
 * This function is intended to be easily copied between child themes, and for that reason is not prefixed with this child theme's normal prefix.
 *
 * @link https://github.com/INN/Largo/blob/master/functions.php#L145
 */
function largo_child_require_files() {
	require_once( get_stylesheet_directory() . '/homepages/layouts/publicsource.php' );
}
add_action( 'after_setup_theme', 'largo_child_require_files' );

/**
 * Include compiled style.css
 */
function publicsource_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );
	$suffix = (LARGO_DEBUG)? '' : '.min';
	wp_enqueue_style( 'publicsource', get_stylesheet_directory_uri() . '/css/style' . $suffix . '.css' );
}
add_action( 'wp_enqueue_scripts', 'publicsource_stylesheet', 20 );

/**
 * Include TypeKit fonts
 */
function publicsource_typekit() { ?>
	<script src="https://use.typekit.net/eve5vcp.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php }
add_action( 'wp_head', 'publicsource_typekit' );


/**
 * Interstitial widget areas in story rivers
 */
function publicsource_register_sidebars() {

	$sidebars = array();
	
	$sidebars[] = array(
		'name' => __( 'Story River Interstitial 1', 'publicsource' ),
		'id' => 'story-river-interstitial-1',
		'description' => __( 'First interstitial widget area that appears on category/archive pages in the main river of stories after the 3rd story.', 'publicsource' ),
		'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widgettitle">',
		'after_title' 	=> '</h3>',
	);
	
	$sidebars[] = array(
		'name' => __( 'Story River Interstitial 2', 'publicsource' ),
		'id' => 'story-river-interstitial-2',
		'description' => __( 'Second interstitial widget area that appears on category/archive pages in the main river of stories after the 7th story.', 'publicsource' ),
		'before_widget' => '<aside id="%1$s" class="%2$s clearfix">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widgettitle">',
		'after_title' 	=> '</h3>',
	);

	foreach ( $sidebars as $sidebar ) {
		register_sidebar( $sidebar );
	}
}
add_action( 'widgets_init', 'publicsource_register_sidebars', 11); 

// hook on largo_loop_after_post_x action after posts 3 and 7
function publicsource_interstitial( $counter, $context ) {
	if ( $counter === 3 ) {
		echo '<div id="story-river-interstitial-1" class="interstitial">';
		dynamic_sidebar( 'story-river-interstitial-1' );
		echo '</div>';
	}
	if ( $counter === 7 ) {
		echo '<div id="story-river-interstitial-2" class="interstitial">';
		dynamic_sidebar( 'story-river-interstitial-2' );
		echo '</div>';
	}
}
add_action( 'largo_loop_after_post_x', 'publicsource_interstitial', 10, 2 );

