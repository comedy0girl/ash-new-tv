<?php

	
	add_action( 'after_setup_theme', 'setup' );

	add_action( 'init', 'register_my_menus' );

	add_filter( 'use_default_gallery_style', '__return_false' );
	add_shortcode('gallery', 'gallery_shortcode');

		// widgets and sidebars 
		if ( function_exists('register_sidebar') ) {
		    register_sidebar(array(
		   'name' => 'hello_sidebar',
		   'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   'after_widget' => '</div>',
		   'before_title' => '<h2>',
		   'after_title' => '</h2>'
		   ));  
		}
		// widgets and sidebars 
		if ( function_exists('register_sidebar') ) {
		    register_sidebar(array(
		   'name' => 'footer_sidebar',
		   'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   'after_widget' => '</div>',
		   'before_title' => '<h5>',
		   'after_title' => '</h5>'
		   ));  
		}
		// widgets and sidebars 
		if ( function_exists('register_sidebar') ) {
		    register_sidebar(array(
		   'name' => 'blog_sidebar',
		   'before_widget' => '<div id="%1$s" class="widget %2$s">',
		   'after_widget' => '</div>',
		   'before_title' => '<h2>',
		   'after_title' => '</h2>'
		   ));  
		}

		function setup() {

			add_theme_support( 'post-thumbnails' );
			add_image_size( 'homepage-posts', 400, 260, true );
			add_image_size( 'gallery', 175, 175, true );

			add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );

			function custom_image_sizes_choose( $sizes ) {
			    $custom_sizes = array(
			        'homepage-posts' => 'Home Page Posts',
			        'gallery' => 'Gallery'
			    );
			    return array_merge( $sizes, $custom_sizes );
			}
		}	

	 	function register_my_menus() {
		  register_nav_menus(
			    array(
			    	'header-menu' => __( 'Header Menu' ),
			      	'footer-menu' => __( 'Footer Menu' ),
			      	'social-menu' => __( 'Social Menu' ),
			      	'additional-menu' => __( 'Additional Menu' )
			    )
		  );
		}

		class CSS_Menu_Walker extends Walker {

	var $db_fields = array('parent' => 'menu_item_parent', 'id' => 'db_id');
	
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
	}
	
	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}
	
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
	
		global $wp_query;
		$indent = ($depth) ? str_repeat("\t", $depth) : '';
		$class_names = $value = '';
		$classes = empty($item->classes) ? array() : (array) $item->classes;
		
		/* Add active class */
		if (in_array('current-menu-item', $classes)) {
			$classes[] = 'active';
			unset($classes['current-menu-item']);
		}
		
		/* Check for children */
		$children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
		if (!empty($children)) {
			$classes[] = 'has-sub';
		}
		
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
		
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
		
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</span></a>';
		$item_output .= $args->after;
		
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}







?>