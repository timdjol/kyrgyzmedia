<?php

function custom_scripts() {
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.min.css', array(), '7.5');
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), '2.5', true);
}
add_action('wp_enqueue_scripts', 'custom_scripts');

// support
add_theme_support('post-thumbnails');
add_theme_support('custom-fields');
add_theme_support('post-formats', array('video'));

// menu
register_nav_menus(array(
    'main-menu'   => __('Main Menu', 'kyrgyzmedia'),
    'footer-menu' => __('Footer Menu', 'kyrgyzmedia'),
));

// widget
function register_my_widgets() {
    register_sidebar(array(
        'name'          => 'Календарь',
        'id'            => 'left-sidebar',
        'description'   => 'Эти виджеты будут показаны с левой колонки сайта',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'register_my_widgets');

// Excerpt
function custom_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);
add_filter('excerpt_more', function ($more) {
    return ' ...';
});

// thumbnail
add_image_size('bigcategory', 270, 165, true);
add_image_size('slide', 835, 460, true);
add_filter('intermediate_image_sizes_advanced', 'km_drop_heavy_image_sizes');
function km_drop_heavy_image_sizes($sizes) {
    unset($sizes['medium'], $sizes['medium_large'], $sizes['1536x1536'], $sizes['2048x2048']);
    return $sizes;
}

// hide logo WP
function pss_remove_wp_logo($wp_admin_bar) {
    $wp_admin_bar->remove_node('wp-logo');
}
add_action('admin_bar_menu', 'pss_remove_wp_logo', 999);

// свой текст в футере админки
function wph_admin_footer_text() {
    echo '<i>KyrgyzMedia</i> ';
}
add_filter('admin_footer_text', 'wph_admin_footer_text');

// ACF options page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Контактные данные',
        'menu_title' => 'Контактные данные',
        'menu_slug'  => 'general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
}

// search
function my_get_search_form() {
    do_action('get_search_form');

    $form = '<form id="searchform" role="search" method="get" action="' . esc_url(home_url('/')) . '">
        <input name="s" id="s" type="text" value="' . esc_attr(get_search_query()) . '" />
        <button class="more" name="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
    </form>';

    echo apply_filters('get_search_form', $form);
}

add_action('pre_get_posts', 'search_by_cat');
function search_by_cat($query = null) {
    if (is_admin()) {
        return;
    }

    if (!$query instanceof WP_Query || !$query->is_main_query() || !$query->is_search() || !isset($_GET['cat'])) {
        return;
    }

    $cat = intval($_GET['cat']);
    $query->set('cat', $cat > 0 ? $cat : '');
}

function true_remove_url_field($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'true_remove_url_field', 10, 1);

function getDateRu() {
    $monthes = array(
        1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
        5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
        9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
    );

    return $monthes[(int) date('n')];
}

function disableAutoSave() {
    wp_deregister_script('autosave');
}
add_action('admin_print_scripts', 'disableAutoSave');

add_filter('use_block_editor_for_post', '__return_false');

add_action('init', 'blockusers_init');
function blockusers_init() {
    if (!is_admin() || wp_doing_ajax() || !is_user_logged_in()) {
        return;
    }

    $blocked_users = array(
        'tasma',
        'suluktu',
        'oogantalaa',
        'ofchintamani',
        'akbakai',
        'akbakaikm',
        'akkepter',
        'bakaiatafm',
        'barskoon',
        'cholpon',
        'janyjer',
        'karachiy',
        'keneshnuru',
        'konok',
        'kulanak',
        'kyzylbulak',
        'orok',
        'radiomost',
        'sarybulun',
        'suusamyr',
        'sumbulafmkm',
        'sumbulafm',
        'toktoyan',
        'meiki',
        'tunukradio',
        'uchkorgon',
        'uchkun',
        'ulahol',
        'achakayndy',
        'shapak',
        'shapak2',
        'sonkol',
        'alaarcha',
        'ottuk',
        'kochkor',
        'dilgir',
        'nevaket',
        'aimak',
        'keminfm',
        'covid',
        'covidru',
        'ofchintamanikm',
        'radiomosttalas',
        'aosmikg',
        'kyzyltoochuykm',
        'talasfm',
        'balykchy',
        'dobolu',
    );

    $current_user = wp_get_current_user();

    if (in_array($current_user->user_login, $blocked_users, true)) {
        wp_safe_redirect(home_url('/'));
        exit;
    }
}

/**
 * Безопасное получение covid-полей с главного сайта multisite
 */
function km_get_main_blog_covid_fields() {
    if (!function_exists('get_sites') || !class_exists('WP_Site_Query')) {
        return array();
    }

    if (!function_exists('get_field')) {
        return array();
    }

    $main_blog = 1;

    switch_to_blog($main_blog);

    $custom_fields = array(
        'covid-total'   => get_field('covid-total', 'options'),
        'covid-new'     => get_field('covid-new', 'options'),
        'covid-medic'   => get_field('covid-medic', 'options'),
        'covid-health'  => get_field('covid-health', 'options'),
        'covid-dead'    => get_field('covid-dead', 'options'),
        'covid-bishkek' => get_field('covid-bishkek', 'options'),
        'covid-osh'     => get_field('covid-osh', 'options'),
        'covid-batken'  => get_field('covid-batken', 'options'),
        'covid-ik'      => get_field('covid-ik', 'options'),
        'covid-djalal'  => get_field('covid-djalal', 'options'),
        'covid-naryn'   => get_field('covid-naryn', 'options'),
        'covid-talas'   => get_field('covid-talas', 'options'),
    );

    restore_current_blog();

    return $custom_fields;
}

add_action('wp', 'km_prepare_statistic_fields');
function km_prepare_statistic_fields() {
    if (!is_page_template('page-statisitic.php')) {
        return;
    }

    $GLOBALS['custom_fields'] = km_get_main_blog_covid_fields();
}

function my_login_logo() {
    echo '
    <style type="text/css">
        #login h1 a {
            background-image: url(' . esc_url(get_bloginfo('template_directory') . '/img/logo.png') . ') !important;
            background-size: cover;
            width: 333px;
            height: 90px;
        }
    </style>';
}
add_action('login_head', 'my_login_logo');

function my_admin_print_scripts() {
    ?>
    <style>
        #mceu_16, #mceu_24{
            display:block !important;
        }
    </style>
    <?php
}
add_action('admin_head', 'my_admin_print_scripts');

function getDayKg() {
    $days = array(
        'Жекшемби', 'Дүйшөмбү', 'Шейшемби', 'Шаршемби', 'Бейшемби', 'Жума', 'Ишенби'
    );

    return $days[(int) date('w')];
}

function getDateKg() {
    $monthes = array(
        1 => 'Үчтүн айы',
        2 => 'Бирдин айы',
        3 => 'Жалган куран',
        4 => 'Чын куран',
        5 => 'Бугу',
        6 => 'Кулжа',
        7 => 'Теке',
        8 => 'Баш оона',
        9 => 'Аяк оона',
        10 => 'Тогуздун айы',
        11 => 'Жетинин айы',
        12 => 'Бештин айы'
    );

    return (int) date('d') . ' ' . $monthes[(int) date('n')] . date(' Y');
}

// HSTS
function tg_enable_strict_transport_security_hsts_header_wordpress() {
    if (is_ssl()) {
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
    }
}
add_action('send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress');