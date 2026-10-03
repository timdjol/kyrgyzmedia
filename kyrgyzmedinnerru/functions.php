<?php
//connection
function custom_scripts() {
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
	wp_enqueue_style('main', get_template_directory_uri().'/css/main.min.css', array(), 1.5);
	wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.min.js', array('jquery'), '1.5', true);
}
add_action('wp_enqueue_scripts', 'custom_scripts');

//support
add_theme_support('post-thumbnails');
add_theme_support('widgets');

//widget
function register_my_widgets(){
	register_sidebar( array(
		'name' => "Сайдбар",
		'id' => 'right-sidebar',
		'description' => 'Эти виджеты будут показаны с левой колонки сайта',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );

//ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'    => 'Контактные данные',
		'menu_title'    => 'Контактные данные',
		'menu_slug'     => 'general-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));	
}

//Excerpt
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
add_filter('excerpt_more', function($more) {
	return ' ...';
});

//thumbnail
add_image_size( 'main', 450, 310, true);
add_filter('intermediate_image_sizes_advanced', 'km_drop_heavy_image_sizes');
function km_drop_heavy_image_sizes($sizes) {
	unset($sizes['medium_large'], $sizes['1536x1536'], $sizes['2048x2048']);
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


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
	echo '<style>
    #mpd_blogschecklist li {
	display: none;
}


#clone_multisite_box p{
display: none;
}
#wp-admin-bar-my-sites{
display: none;
}
.wrap .updated {
	display: none;
}
	#message{
display: block;
}
#mpd_blogschecklist li#mpd_blog_41, #mpd_blogschecklist li#mpd_blog_1{
		display: block;
	}
</style>';
global $current_user; wp_get_current_user(); 
	if ( $current_user->user_login == 'konok' ) { 
		echo '<style>
		#mpd_blogschecklist li#mpd_blog_41{
		display: block;
	}
	</style>';
}
if ( $current_user->user_login == 'ofchintamani' ) { 
		echo '<style>
		#mpd_blogschecklist li#mpd_blog_1{
		display: none
	}
		#mpd_blogschecklist li#mpd_blog_41{
		display: block;
	}
	</style>';
}
if ( $current_user->user_login == 'nevaket' ) { 
		echo '<style>
		#mpd_blogschecklist li#mpd_blog_1{
		display: block !important;
	}
		#mpd_blogschecklist li#mpd_blog_41{
		display: block !important;
	}
	</style>';
}
if ( $current_user->user_login == 'radiomost' ) { 
		echo '<style>
		#mpd_blogschecklist li#mpd_blog_41{
		display: block;
	}
	</style>';
}
if ( $current_user->user_login == 'uchkorgon' ) { 
		echo '<style>
		#mpd_blogschecklist li#mpd_blog_41{
		display: block;
	}
	</style>';
}
if ( $current_user->user_login == 'aimak' ) { 
		echo '<style>
		#mpd_blogschecklist li#mpd_blog_41{
		display: block;
	}
	</style>';
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

function disableAutoSave(){
	wp_deregister_script('autosave');
}
add_action( 'admin_print_scripts', 'disableAutoSave' );

if( 'disable_gutenberg' ){ add_filter( 'use_block_editor_for_post_type', '__return_false', 100 ); add_action( 'admin_init', function(){ remove_action( 'admin_notices', [ 'WP_Privacy_Policy_Content', 'notice' ] ); add_action( 'edit_form_after_title', [ 'WP_Privacy_Policy_Content', 'notice' ] ); } ); }

function the_shot_review_word ($count) {
	echo wp_trim_words(get_post_field('post_content', get_the_ID()), $count, '…');
}

//hsts
function tg_enable_strict_transport_security_hsts_header_wordpress() {
	if (is_ssl()) {
		header('Strict-Transport-Security: max-age=31536000');
	}
}
add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );