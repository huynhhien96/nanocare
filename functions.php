<?php
define('THEME_URL', get_template_directory_uri());

require_once 'customize/index.php';

function nano_theme_setup() {
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => 'Mainmenu',
		'social'  => 'Social',
        'footer'  => 'Footer'
	) );
}
add_action('after_setup_theme', 'nano_theme_setup');

function nano_scripts_styles(){}
add_action('wp_enqueue_scripts', 'nano_scripts_styles');

function nano_add_body_class($classes ){
	global $post;
	$suffix = '-nano';
	if( is_home() ){
		$classes[] = 'home'.$suffix;
	}
	if( is_page() ){
		if(in_array($post->post_name, array('dang-nhap', 'dang-ky'))){
			$classes[] = 'account' . $suffix;
		}
		if( $post->post_name === 'shop' ) $classes[] = 'product'. $suffix;
		else{
			$classes[] = $post->post_name . $suffix;
		}
	}
	if( is_singular('product') ){
		$classes[] = 'product'. $suffix;
	}
	return $classes;
}
add_filter( 'body_class', 'nano_add_body_class' );

function nano_hook_loop_posts($query){
	$sticky = get_option( 'sticky_posts' );
	if( is_category() && !empty($sticky) ){
		$query->set('post__not_in', array($sticky[0]));
	}
	return $query;
}
add_action( 'pre_get_posts', 'nano_hook_loop_posts' );

function nano_render_partial($file_name, $params = array()){
	extract( $params );
	include( get_template_directory() . "/" . $file_name . '.php' );
}