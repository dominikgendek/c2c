<?php


function load_scripts()
{
	wp_enqueue_style('style', get_template_directory_uri() . '/scss/style.css');
	wp_enqueue_style('responsive', get_template_directory_uri() . '/scss/responsive.css');
	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'load_scripts');

function template_config()
{

	register_nav_menus(
		array(
			'my_main_menu' => __('Main Menu', 'themewp'),
		)
	);

	$args = array(
		'height' => 225,
		'width' => 1920
	);
	add_theme_support('custom-header', $args);
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('video', 'image'));
	add_theme_support('title-tag');
	add_theme_support('custom-logo', array(
		'height' => 110,
		'width' => 200
	));

	$textdomain = 'c2c';
	load_theme_textdomain($textdomain, get_template_directory() . '/languages/');
}
add_action('after_setup_theme', 'template_config', 0);

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Pola Ogólne',
		'menu_title'	=> 'Pola Ogólne',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Pola Nagłówka',
		'menu_title'	=> 'Nagłówek',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Pola Stopki',
		'menu_title'	=> 'Stopka',
		'parent_slug'	=> 'theme-general-settings',
	));
}


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{

	// Check function exists.
	if (function_exists('acf_register_block_type')) {

		acf_register_block_type(array(
			'name'              => 'Sekcja Główna',
			'title'             => __('Sekcja Główna'),
			'description'       => __('Tekst z wyborem tła'),
			'render_template'   => 'template-parts/blocks/main_section/main_section.php',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/main_section/main_section.css',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('main_section', 'quote'),
		));

		acf_register_block_type(array(
			'name'              => 'Kafelki',
			'title'             => __('Kafelki'),
			'description'       => __('Kafelki'),
			'render_template'   => 'template-parts/blocks/tiles/tiles.php',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/tiles/tiles.css',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('tiles', 'quote'),
		));

		acf_register_block_type(array(
			'name'              => 'Licznik',
			'title'             => __('Licznik'),
			'description'       => __('Licznik'),
			'render_template'   => 'template-parts/blocks/counter/counter.php',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/counter/counter.css',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/counter/counter.js',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('counter', 'quote'),
		));

		acf_register_block_type(array(
			'name'              => 'Blok z listą',
			'title'             => __('Blok z listą'),
			'description'       => __('Blok z listą'),
			'render_template'   => 'template-parts/blocks/block_list/block_list.php',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/block_list/block_list.css',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('block_list', 'quote'),
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'name'              => 'Faq',
			'title'             => __('Faq'),
			'description'       => __('Faq'),
			'render_template'   => 'template-parts/blocks/faq/faq.php',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/faq/faq.css',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/faq/faq.js',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('faq', 'quote'),
		));

		acf_register_block_type(array(
			'name'              => 'Tekst z przyciskiem',
			'title'             => __('Tekst z przyciskiem'),
			'description'       => __('Tekst z przyciskiem'),
			'render_template'   => 'template-parts/blocks/text_with_button/text_with_button.php',
			'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/text_with_button/text_with_button.css',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array('faq', 'quote'),
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));
	}
}

function gb_gutenberg_admin_styles()
{
	echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 95%;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 95%;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: 95%;
            }	
        </style>
    ';
}

add_action('admin_head', 'gb_gutenberg_admin_styles');
