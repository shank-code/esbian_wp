<?php

/**
 * Plugin Name: Custom Edit Plugin
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: Plugin to add custom code to the website
 * Version: 1.0
 * Author: RedEnkollega.com
 * Author URI: http://www.mywebsite.com
 */



function pluginprefix_setup_post_type() {
   
}
add_action( 'init', 'pluginprefix_setup_post_type' );
 
function pluginprefix_install() {
    // trigger our function that registers the custom post type
    pluginprefix_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'pluginprefix_install' );

function pluginprefix_deactivation() {
    // unregister the post type, so the rules are no longer in memory
    // unregister_post_type( 'book' );
    // clear the permalinks to remove our post type's rules from the database
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivation' );


function plugin_css(){
    wp_enqueue_style( 'custon_edit_plugin', plugins_url( "style.css", __FILE__ ));
    wp_enqueue_style( 'custon_edit_fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css","all");
}
add_action( 'wp_enqueue_scripts', 'plugin_css' );