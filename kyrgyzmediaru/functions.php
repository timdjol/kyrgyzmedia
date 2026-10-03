<?php
//connection
function custom_scripts() {
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('main', get_template_directory_uri().'/css/main.min.css', array(), 2.9);
	wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.min.js', array(), 1.8);
}
add_action('wp_enqueue_scripts', 'custom_scripts');

//support
add_theme_support('post-thumbnails');
add_theme_support('do_shortcode');
add_theme_support( 'post-formats', array('video') );

//menu
register_nav_menus( array(
	'main-menuru' => __( 'Main Menu', 'kyrgyzmedia' ),
	'footer-menuru' => __( 'Footer Menu', 'kyrgyzmedia' )
) );

//widget
function register_my_widgets(){
	register_sidebar( array(
		'name' => "Календарь",
		'id' => 'left-sidebar',
		'description' => 'Эти виджеты будут показаны с левой колонки сайта',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );


//Excerpt
function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
add_filter('excerpt_more', function($more) {
	return ' ...';
});

//thumbnail
add_image_size( 'bigcategory', 270, 165, true);
add_image_size( 'slide', 835, 460, true);
remove_image_size( 'medium_large');
remove_image_size( 'medium');
remove_image_size( '1536x1536');
remove_image_size( '2048x2048');

// Удаляет ссылки RSS-лент записи и комментариев
remove_action( 'wp_head', 'feed_links', 2 ); 
// Удаляет ссылки RSS-лент категорий и архивов
remove_action( 'wp_head', 'feed_links_extra', 3 ); 
// Удаляет RSD ссылку для удаленной публикации
remove_action( 'wp_head', 'rsd_link' ); 
// Удаляет ссылку Windows для Live Writer
remove_action( 'wp_head', 'wlwmanifest_link' ); 
// Удаляет короткую ссылку
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0); 
// Удаляет информацию о версии WordPress
remove_action( 'wp_head', 'wp_generator' ); 
// Удаляет ссылки на предыдущую и следующую статьи
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );


//hide logo WP
function pss_remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'pss_remove_wp_logo', 999 );

//свой текст в футере админки start 
function wph_admin_footer_text () {
	echo '<i>KyrgyzMedia</i> ';
}
add_filter('admin_footer_text', 'wph_admin_footer_text');

function my_login_logo(){
	echo '
	<style type="text/css">
        #login h1 a {
            background-image: url('. get_bloginfo('template_directory') .'/img/logo.png)!important;
            background-size: cover;
            width: 333px;
            height: 90px;
        }
	</style>';
}
add_action('login_head', 'my_login_logo');

if( 'disable_gutenberg' ){ add_filter( 'use_block_editor_for_post_type', '__return_false', 100 ); add_action( 'admin_init', function(){ remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] ); add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] ); } ); }

	//view
add_action( 'pre_get_posts', 'my_view_filter' );
function my_view_filter($query){
	if ( 
		!is_admin() && 
		$query->is_main_query() && 
		( $query->is_home() || $query->is_archive() || $query->is_search() )
	) {
		if (isset($_REQUEST['orderby'])) {
			$order = $_REQUEST['orderby'];
		}
		if ( $order === 'views') {
			$query->set('meta_key', 'post_views_count');
			$query->set('orderby', 'meta_value_num');
			$query->set('order', 'DESC');
		}
	}
}

//search
function my_get_search_form() {
	do_action( 'get_search_form' );
	$form =
	'<form id="searchform" role="search" method="get" action="' . home_url( '/' ) .  '" ><input name="s" id="s" type="text" value="' . get_search_query() . '" />
	<button class="more" name="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
	</form>';
	echo apply_filters('get_search_form', $form);
}

add_action('pre_get_posts', 'search_by_cat');
function  search_by_cat() {
	global $wp_query;
	if (is_search()) {
		$cat =  intval($_GET['cat']);
		if($cat<0) $cat='';
		$wp_query->query_vars['cat'] = $cat;
	}
}

function getDateRu(){
	$monthes = array(
		1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
		5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
		9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
	);
	return ( $monthes[(date('n'))]);
}

add_action( 'init', 'blockusers_init' );
function blockusers_init() {
	global $current_user; wp_get_current_user(); 
	if ( $current_user->user_login == 'konok' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'ofchintamani' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'ofchintamanikm' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'radiomost' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'radiomosttalas' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'uchkorgon' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'nevaket' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'aosmikg' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'kyzyltoochuykm' ) { 
		wp_redirect( home_url() );
	}
	if ( $current_user->user_login == 'talasfmru' ) { 
		wp_redirect( home_url() );
	}
}

if ( function_exists( 'get_sites' ) && class_exists( 'WP_Site_Query' ) ) {
	$custom_fields = '';
	$main_blog = 1;
		switch_to_blog( $main_blog );
		$custom_fields = array(
			'covid-total' 		=> get_field('covid-total', 'options'),
			'covid-new' 		=> get_field('covid-new', 'options'),
			'covid-medic' 	=> get_field('covid-medic', 'options'),
			'covid-health' 	=> get_field('covid-health', 'options'),
			'covid-dead' => get_field('covid-dead', 'options'),
			'covid-bishkek' => get_field('covid-bishkek', 'options'),
			'covid-osh' => get_field('covid-osh', 'options'),
			'covid-batken' => get_field('covid-batken', 'options'),
			'covid-ik' => get_field('covid-ik', 'options'),
			'covid-djalal' => get_field('covid-djalal', 'options'),
			'covid-naryn' => get_field('covid-naryn', 'options'),
			'covid-talas' => get_field('covid-talas', 'options'),
			'facebook' => get_field('facebook', 'options'),
			'instagram' => get_field('instagram', 'options'),
			'youtube' => get_field('youtube', 'options'),
			'rss' => get_field('rss', 'options')
		);
			
		restore_current_blog();
	
	return $custom_fields;
}

//hsts
function tg_enable_strict_transport_security_hsts_header_wordpress() {
    header( 'Strict-Transport-Security: max-age=31536000' );
}
add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );
?>