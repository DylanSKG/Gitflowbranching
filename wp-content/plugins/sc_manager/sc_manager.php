<?php
/*
Plugin Name: SC-Manager
Plugin URI:  https://deltorcorp.com/plugins/
Description: This plugin is SC-Manager template friendly addons. It conbines with SC-Manager templates to provide operational functionalities ready for use.
Version: 1.1.0
editor: DeltoroCorp
editor URI: https:facebook.com/deltorocorp
Author: Adrian Ngankou | Deltorocorp
Author URI: https://facebook.com/deltorocorp
developer: Adrian Ngankou
Copyright: (c) 2019 CreativeThemes.
Requires at least: 5.2
Requires PHP: 7.0
Tested up to: 5.5
Text Domain: deltorocorp.
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
@fs_premium_only /framework/premium/
*/

if (!defined('ABSPATH')) {
    exit;
    // Exit if accessed directly.
}
function redirect_404_page()
{
    if (is_404()) {
        wp_redirect(home_url());
        exit();
    }
}

add_action('template_redirect', 'redirect_404_page');
define('sc_dir', __FILE__);
define('sc_PLUGIN_BASE', plugin_basename(sc_dir));
define('sc_PATH', plugin_dir_path(sc_dir));
define('sc_URL', plugin_dir_url(sc_dir));
define('CSS',sc_URL."assets/css");
define('JS', sc_URL . "assets/js");
define('IMG', sc_URL . "assets/img/");

// activate plugin without throwbacks errors
add_action( 'init',
    function () {

// Function to create custom pages
function create_custom_pages() {
    $pages = array(
        array(
            'name' => 'signin',
            'shortcode' => '[login]'
        ),
        array(
            'name' => 'home',
            'shortcode' => '[welcome]'
        ),
        array(
            'name' => 'Employeasasasasasasasase',
            'shortcode' => '[emploasasasasayee]'
        ),
        array(
            'name' => 'Enterprise',
            'shortcode' => '[enterprise]'
        ),
        array(
            'name' => 'userboard',
            'shortcode' => '[userboard]'
        ),
        array(
            'name' => 'parameters',
            'shortcode' => '[sc_settings]'
        )
    );

    foreach ($pages as $page) {
        $page_title = $page['name'];
        $page_content = $page['shortcode'];
        $page_template = 'page.php'; // You can specify a custom page template if needed

        // Check if the page already exists
        $custom_page = get_page_by_title($page_title);

        if (!$custom_page) {
            // Create the page
            $custom_page_args = array(
                'post_title'    => $page_title,
                'post_content'  => $page_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'page_template' => $page_template
            );

            wp_insert_post($custom_page_args);
        }
    }
}

// Hook the function to the plugin activation event
register_activation_hook(__FILE__, 'create_custom_pages');

        // include('parts/ajax/load_data.php');
        include('parts/css.html');
        include('parts/identity.php'); // translate and display user identity
        include("sc_template.php");
        include("parts/metabox.php");
        
        // include("sc_style.css");
        // echo CSS;
        add_action('wp_enqueue_scripts', 'conditional_csss', 99);
        // echo 'Not Empty';
        function conditional_csss()
        {
            wp_enqueue_style('training-css', CSS.'/sc_style.css');
            wp_enqueue_style('training-css2', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
        }

        add_action('wp_enqueue_scripts', 'custom_scripts', 99);

        function custom_scripts(){
            wp_enqueue_script('deltoro-scripts', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js');
            wp_enqueue_script('deltoro-scripts2', JS. '/jquery-3.5.0.min.js');
            wp_enqueue_script('deltoro-scripts3', JS.'/function.js');
        }
        
    }
);

