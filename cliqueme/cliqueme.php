<?php
/**
 * @package cliqueme
 * @version 1.0.0
 *
 * Plugin Name: CliqueMe
 * Plugin URI: https://github.com/cliqueme/CliquemePress
 * Description: This plugin is for easy installation of Cliqueme on your wordpress site.
 * Author: CLiqueme Inc.
 * License: MIT
 */

 function activate_cliqueme(){
 }

function include_cliqueme() {    
    echo ("<!-- CLIQUEME INTEGRATION -->\n");
    echo ("<script src='http://static.cliqueme.com/cliqueme-latest.js'></script>\n");
    echo ("<!-- END OF CLIQUEME INTEGRATION -->\n");
}

function add_cliqueme_admin_menu(){
    //add_menu_page( 'CliqueMe Settings', 'CliqueMe', 'manage_options', 'cliqueme/admin/settings.php', '', '', 81);
}


add_action('wp_footer', 'include_cliqueme');
//add_action( 'admin_menu', 'add_cliqueme_admin_menu' );
register_activation_hook(__FILE__, 'activate_cliqueme');

?>