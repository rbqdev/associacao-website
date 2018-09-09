<?php

if ( ! function_exists( 'vasta_setup' ) ) :

	function vasta_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
            'primary'   => esc_html__( 'Menu Principal', 'vasta' ),
            'footer'    => esc_html__( 'Menu Footer', 'vasta' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	}
endif;
add_action( 'after_setup_theme', 'vasta_setup' );

// Verifica se é pagina de blog
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_singular()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}

/**
 * Enqueue scripts and styles.
 */
function vasta_scripts() {
    wp_enqueue_style( 'general-style', get_stylesheet_uri() );
    wp_enqueue_script( 'general-script', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20120206', true );

    //  Homepage
	if( is_front_page() ){
        wp_enqueue_style( 'homepage-css', get_template_directory_uri() . '/assets/css/homepage.css' );
        wp_enqueue_script( 'homepage-js', get_template_directory_uri() . '/assets/js/homepage.js', array( 'jquery' ), '20120206', true );
    }

    //  Horarios e Rotas
	if( is_page('horarios-e-rotas') || is_page_template('templates/rotas.php') ){
        wp_enqueue_style( 'rotas', get_template_directory_uri() . '/assets/css/rotas.css' );
        wp_enqueue_script( 'rotas', get_template_directory_uri() . '/assets/js/rotas.js', array( 'jquery' ), '20120206', true );
    }

    // Template Contato
	if( is_page('contato') || is_page('cadastro-online') ){
        wp_enqueue_style( 'contato-css', get_template_directory_uri() . '/assets/css/contato.css' );
    }

    // Tempalte Diretoria
	if( is_page('diretoria') || is_page_template('templates/diretoria.php') ){
        wp_enqueue_style( 'diretoria-css', get_template_directory_uri() . '/assets/css/diretoria.css' );
        // wp_enqueue_script( 'homepage-js', get_template_directory_uri() . '/assets/js/homepage.js', array( 'jquery' ), '20120206', true );
    }

    //  Template Faq
	if( is_page('duvidas-frequentes') || is_page_template('templates/faq.php') ){
        wp_enqueue_style( 'faq-css', get_template_directory_uri() . '/assets/css/faq.css' );
        wp_enqueue_script( 'faq-js', get_template_directory_uri() . '/assets/js/faq.js', array( 'jquery' ), '20120206', true );
    }

    //  Blog Page
    if( is_blog() ) {
        wp_enqueue_style( 'blog-css', get_template_directory_uri() . '/assets/css/blog.css' );
    }

}
add_action( 'wp_enqueue_scripts', 'vasta_scripts' );

/**
 * Const Variables
 */
define( 'URL_SITE', get_home_url() );
define( 'URL_TEMPLATE', get_bloginfo('template_url') );

/*
	Options Pages
*/

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Opções Gerais',
        'menu_title'	=> 'Opções Gerais',
        'menu_slug' 	=> 'general-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Dúvidas Frequentes',
        'menu_title'	=> 'Dúvidas Frequentes',
        'parent_slug'	=> 'general-settings',
        'menu_slug'		=> 'duvidas-frequentes'
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Diretoria',
        'menu_title'	=> 'Diretoria',
        'parent_slug'	=> 'general-settings',
        'menu_slug'		=> 'diretoria'
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Parceiros',
        'menu_title'	=> 'Parceiros',
        'parent_slug'	=> 'general-settings',
        'menu_slug'		=> 'parceiros'
    ));

}

/**
 * Init functions
 * Remove unecessary wordpress's functions
 */
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function speed_stop_loading_wp_embed() {
	if (!is_admin()) {
	    wp_deregister_script('wp-embed');
	}
}
add_action('init', 'speed_stop_loading_wp_embed');

// Remove dashicons Style
function wpdocs_dequeue_dashicon() {
	if (current_user_can( 'update_core' )) { 
	    return;
 	}
 	wp_deregister_style('dashicons');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );

// Function for change [...] for link to Read More in blog - posts
function custom_ex_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'custom_ex_more' );

function get_excerpt($limit, $source = null){
    if($source == "content" ? ($excerpt = get_the_content()) : ($excerpt = get_the_excerpt()));
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt .= '...';
    return $excerpt;
}

// Remove scripsts and style version
function _remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Remove Emojis
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );
add_filter( 'emoji_svg_url', '__return_false' );

// Disable Feed
function wpb_disable_feed() {
	wp_die( __('No feed available,please visit our <a href="'. get_bloginfo('url') .'">Homepage</a>!') );
}

// Remove unecessary links on header
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link    ( OPTIONAL )
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link  ( OPTIONAL )
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links  ( OPTIONAL )
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // ( OPTIONAL )
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
add_action('do_feed', 'wpb_disable_feed', 1);
add_action('do_feed_rdf', 'wpb_disable_feed', 1);
add_action('do_feed_rss', 'wpb_disable_feed', 1);
add_action('do_feed_rss2', 'wpb_disable_feed', 1);
add_action('do_feed_atom', 'wpb_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpb_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpb_disable_feed', 1);

/* CUSTOM POST TYPES */

function create_post_type() {
    register_post_type( 'contas',
      array(
        'labels' => array(
          'name' => __( 'Contas' ),
          'singular_name' => __( 'conta' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-clipboard'        
      )
    );

    register_post_type( 'faq',
    array(
      'labels' => array(
        'name' => __( 'FAQ' ),
        'singular_name' => __( 'faq' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-format-status'
    )
  );

  }
  add_action( 'init', 'create_post_type' );