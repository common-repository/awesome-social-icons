<?php
/*
Plugin Name: Awesome Social Icons
Plugin URI: http://photontechs.com/awesome-social-icons
Description: This Awesome Social Icons plugin allow you to put social icons which can be link with your social media profiles.
Version: 2.0
Author: Daniyal Ahmed
Author URI: http://www.photontechs.com
License: GNU General Public License v3.0
License URI: http://www.opensource.org/licenses/gpl-license.php
NOTE: This plugin is released under the GPLv2 license. The icons used in this plugin are the property
of their respective owners, and do not, necessarily, inherit the GPLv2 license.
*/
// Including Redux
require_once 'inc/extensions/loader.php';
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/framework/ReduxCore/framework.php' ) ) {
    require_once dirname( __FILE__ ) . '/framework/ReduxCore/framework.php';
}
// Create a helper function for easy SDK access.

if ( !function_exists( 'fs_fs' ) ) {
    // Create a helper function for easy SDK access.
    function fs_fs()
    {
        global  $fs_fs ;
        
        if ( !isset( $fs_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $fs_fs = fs_dynamic_init( array(
                'id'             => '8568',
                'slug'           => 'awesome-social-icons',
                'type'           => 'plugin',
                'public_key'     => 'pk_f2c5ff0d8db9f41a9eab007df42b3',
                'is_premium'     => true,
                'premium_suffix' => 'Awesome PRO',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'AwesomeSocialIcons',
                'support' => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $fs_fs;
    }
    
    // Init Freemius.
    fs_fs();
    // Signal that SDK was initiated.
    do_action( 'fs_fs_loaded' );
}

if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/framework/settings/awesome-config.php' ) ) {
    require_once dirname( __FILE__ ) . '/framework/settings/awesome-config.php';
}
// Creating Icons
require_once 'inc/awesome_social_sidebar_func.php';
// Getting Style for awesome icons
require_once 'inc/awesome_social_sidebar_scripts.php';
// Add settings link on plugin page
function awesome_social_dashboard_icons()
{
    wp_register_style( 'awesome-social-dash', plugin_dir_url( __FILE__ ) . '/inc/css/dashicon.css' );
    wp_enqueue_style( 'awesome-social-dash' );
}

// This example assumes the opt_name is set to redux_demo.  Please replace it with your opt_name value.
add_action( 'admin_enqueue_scripts', 'awesome_social_dashboard_icons' );
// Admin Script
function awesome_social_admin_styles()
{
    if ( !empty($_GET['page']) ) {
        if ( $_GET['page'] == "AwesomeSocialIcons" ) {
            wp_enqueue_style( 'awesome-styles', plugin_dir_url( __FILE__ ) . '/inc/css/admin.css' );
        }
    }
}

add_action( 'admin_enqueue_scripts', 'awesome_social_admin_styles' );
function awesome_general_admin_notice()
{
    global  $pagenow ;
    if ( !fs_fs()->is__premium_only() ) {
        if ( $_GET['page'] == "awesomeSoicalFloatingSidebar" ) {
            echo  '<div class="update_ssc notice notice-warning is-dismissible">
             <p>Upgrade awesome Social to add unlimited icons <a href="' . fs_fs()->get_upgrade_url() . '" class="upraf_d">Upgrade Now</a></p>
         </div>' ;
        }
    }
}

add_action( 'admin_notices', 'awesome_general_admin_notice' );
function awesome_social_settings_link( $links )
{
    $settings_link = '<a href="options-general.php?page=awesomeSoicalFloatingSidebar">Settings</a>';
    array_unshift( $links, $settings_link );
    return $links;
}

$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_{$plugin}", 'awesome_social_settings_link' );
add_shortcode( 'awesome_social_icon', 'awesome_social_sidebar');
function awesome_social_sidebar()
{   
    ob_start();
    $makeawesome_icons = new Making_awesome_Icons();
    // Getting Icons for Shortcode
    $makeawesome_icons->Create_Awesome_Icons();
    return ob_get_clean();
}