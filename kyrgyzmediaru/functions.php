<?php
//connection
function custom_scripts() {
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('main', get_template_directory_uri().'/css/main.min.css', array(), 2.9);
	wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.min.js', array('jquery'), '1.8', true);
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
add_filter('intermediate_image_sizes_advanced', 'km_drop_heavy_image_sizes');
function km_drop_heavy_image_sizes($sizes) {
	unset($sizes['medium'], $sizes['medium_large'], $sizes['1536x1536'], $sizes['2048x2048']);
	return $sizes;
}

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
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if (!($query->is_home() || $query->is_archive() || $query->is_search())) {
		return;
	}
	if (!isset($_REQUEST['orderby']) || $_REQUEST['orderby'] !== 'views') {
		return;
	}
	$query->set('meta_key', 'post_views_count');
	$query->set('orderby', 'meta_value_num');
	$query->set('order', 'DESC');
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
function search_by_cat($query) {
	if (is_admin() || !$query instanceof WP_Query || !$query->is_main_query() || !$query->is_search() || !isset($_GET['cat'])) {
		return;
	}
	$cat = intval($_GET['cat']);
	$query->set('cat', $cat > 0 ? $cat : '');
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
	if (!is_admin() || wp_doing_ajax() || !is_user_logged_in()) {
		return;
	}
	$blocked = array('konok', 'ofchintamani', 'ofchintamanikm', 'radiomost', 'radiomosttalas', 'uchkorgon', 'nevaket', 'aosmikg', 'kyzyltoochuykm', 'talasfmru');
	$user = wp_get_current_user();
	if (in_array($user->user_login, $blocked, true)) {
		wp_safe_redirect(home_url('/'));
		exit;
	}
}

function km_load_main_site_fields() {
	$keys = array(
		'covid-total', 'covid-new', 'covid-medic', 'covid-health', 'covid-dead',
		'covid-bishkek', 'covid-osh', 'covid-batken', 'covid-ik', 'covid-djalal',
		'covid-naryn', 'covid-talas', 'facebook', 'instagram', 'youtube', 'rss',
	);
	$fields = array_fill_keys($keys, '');
	if (function_exists('get_field')) {
		switch_to_blog(1);
		foreach ($keys as $key) {
			$fields[$key] = get_field($key, 'options');
		}
		restore_current_blog();
	}
	$GLOBALS['custom_fields'] = $fields;
}
add_action('wp', 'km_load_main_site_fields');

//hsts
function tg_enable_strict_transport_security_hsts_header_wordpress() {
	if (is_ssl()) {
		header('Strict-Transport-Security: max-age=31536000');
	}
}
add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );