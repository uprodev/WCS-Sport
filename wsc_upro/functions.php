<?php 

// show_admin_bar( false );

add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-style', get_stylesheet_directory_uri() . '/css/style.css', array(), time());
	wp_enqueue_style('my-style-main', get_stylesheet_directory_uri() . '/style.css', array(), time());

	wp_enqueue_script('jquery');
	wp_enqueue_script('my-plugins', get_stylesheet_directory_uri() . '/js/plugins.js', array(), false, true);

    if(is_front_page()) wp_enqueue_script('my-landing', get_stylesheet_directory_uri() . '/js/landing.js', array(), time(), true);
    else wp_enqueue_script('my-main', get_stylesheet_directory_uri() . '/js/main.js', array(), time(), true);
    
    wp_enqueue_script('my-events', get_stylesheet_directory_uri() . '/js/events.js', array(), time(), true);
    wp_enqueue_script('my-add', get_stylesheet_directory_uri() . '/js/add.js', array(), time(), true);

    $data_add = array(
        'home_url' => get_home_url() . '/',
    );
    wp_localize_script('my-add', 'data_add', $data_add);

    $data_events = array(
        'queried_object_id' => get_queried_object_id(),
    );
    wp_localize_script('my-events', 'data_events', $data_events);
}
add_action('admin_enqueue_scripts', 'load_admin_style');
function load_admin_style() {
    wp_enqueue_style('admin', get_stylesheet_directory_uri() . '/css/admin.css');
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu'
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


add_action('acf/input/admin_head', 'my_acf_admin_head');
function my_acf_admin_head() {
    $siteURL = get_bloginfo('stylesheet_directory').'/images/acf/';
    ?>
    <style>
        .imagePreview { position:absolute; right:100%; bottom:0; z-index:999999; border:1px solid #f2f2f2; box-shadow:0 0 3px #b6b6b6; background-color:#fff; padding:20px;}
        .imagePreview img { width:500px; height:auto; display:block; }
        .acf-tooltip li:hover { background-color:#0074a9; }
    </style>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var waitForEl = function(selector, callback) {
                if (jQuery(selector).length) {
                    callback();
                } else {
                    setTimeout(function() {
                        waitForEl(selector, callback);
                    }, 100);
                }
            };
            $(document).on('click', 'a[data-name=add-layout]', function() {
                waitForEl('.acf-tooltip li', function() {
                    $('.acf-tooltip li a').hover(function() {
                        var imageTP = $(this).attr('data-layout');
                        var imageFormt = '.png';
                        $(this).append('<div class="imagePreview"><img src="<?php echo $siteURL; ?>'+ imageTP + imageFormt+'"></div>');
                    }, function() {
                        $('.imagePreview').remove();
                    });
                });
            })
        })
    </script>
    <?php
}


/*add_filter( 'upload_mimes', 'cc_mime_types' );
function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}*/


add_action('wp', 'cron_comeet');
add_action('my_hourly_event', 'get_comeet');
function cron_comeet() {
    if(!wp_next_scheduled('my_hourly_event')) {
        wp_schedule_event(time(), 'hourly', 'my_hourly_event');
    }
}
function get_comeet() {
    require dirname(__FILE__) . '/inc/api.php';
}


require 'inc/gutenberg.php';
require 'inc/ajax.php';