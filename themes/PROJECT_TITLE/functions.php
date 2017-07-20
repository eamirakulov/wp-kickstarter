<?php

/**
 * Returns page/post slug
 */
function the_slug()
{
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'].'_page';
	return $slug;
}

/**
 * Returns part of string
 */
function excerpt($str, $length = 500, $trailing = '...')
{
	$str = strip_tags($str);
	$length -= mb_strlen($trailing);
	if(mb_strlen($str)> $length)
		return mb_substr($str, 0, $length).$trailing;
	else 
		return $str;
}

/**
 * Add menu
 */
add_theme_support( 'menus' );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'header-menu' => 'Header Menu',
		)
	);
}

//add_theme_support( 'post-thumbnails' );

//add_action( 'init', 'create_post_type' );
//function create_post_type() {
//	register_post_type( 'test',
//		array(
//			'labels' => array(
//				'name' => __( 'Test' ),
//				'singular_name' => __( 'Test' )
//			),
//		'public' => true,
//		'has_archive' => true,
//		'supports' => array( 'title', 'editor') 
//		)
//	);
//}

