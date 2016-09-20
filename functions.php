<?php

function apply_filters_register_sidebars() {
	register_sidebar(		
		array(			
			'id' => 'sidebar_single',			
			'name' => __( 'Sidebar Single View', 'thstlang' ),			
			'description' => __( 'This sidebar will appear on the single view of your blog.', 'thstlang' ),			
			'before_widget' => '<div id="%1$s" class="widget %2$s">',			
			'after_widget' => '</div>',			
			'before_title' => '<h3>',			
			'after_title' => '</h3>'		
		)
	);	
}
add_action( 'widgets_init', 'apply_filters_register_sidebars' );

function apply_filters_theme_init() {
	global $apply_filters_theme;
	$dir_path = dirname( __FILE__ );
	require_once $dir_path . '/class/class-apply-filters-theme.php';
	$apply_filters_theme = new Apply_Filters_Theme( $dir_path );
}
add_action( 'init', 'apply_filters_theme_init' );

function af_get_enclosure( $id ) {
	$file = get_post_meta( $id , 'enclosure' , true );
	$file = str_replace( '//applyfilters.fm', '//media.blubrry.com/applyfilters/applyfilters.fm/', $file );
	return $file;
}
