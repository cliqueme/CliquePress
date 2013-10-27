<?php
/**
 * @package cliqueme
 * @version 1.0.0
 *
 * Plugin Name: CliqueMe
 * Plugin URI: https://github.com/cliqueme/wordpress-plugin
 * Description: This plugin is for easy installation of Cliqueme on your wordpress site.
 * Author: CLiqueme Inc.
 * License: MIT
 */

 function activate_cliqueme(){
     update_option('cliqueme_selector', 'a:has(img)');
 }

function include_cliqueme() {    
    $site_id = get_option('cliqueme_site_id');
    $selector = get_option('cliqueme_selector');
    $custom_css = get_option('cliqueme_custom_css');

    if ($site_id && $selector){
        echo "<!-- cliqueme integration code -->\n";
        echo "<script src='http://static.cliqueme.com/app/built/cliqueme-latest.js'></script>\n";
        echo "<script type='text/javascript'>
                window.clique =
                {
                    site_id: '$site_id',
                    target_selector: '$selector'
                };
            </script>\n";
        echo ("<!-- cliqueme custom css -->\n");
        echo ("<style type='text/css'>$custom_css</style>\n\n ");
    }
}

function add_cliqueme_admin_menu(){
    add_menu_page( 'CliqueMe Settings', 'CliqueMe', 'manage_options', 'cliqueme/admin/settings.php', '', '', 81);
}


add_action('wp_footer', 'include_cliqueme');
add_action( 'admin_menu', 'add_cliqueme_admin_menu' );
register_activation_hook(__FILE__, 'activate_cliqueme');

?>