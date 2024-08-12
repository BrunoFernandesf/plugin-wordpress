<?php
/**
 * Plugin Name: Simple Contact Form
 * Description: Simple contact form plugin for wordpress
 * Author: Bruno Fernandes
 * Author URI: https://github.com/Brunofernandesf
 * Version: 1.0.0
 * Text Domain: simple-contact-form
 */

if (!defined('ABSPATH')) {
    exit; // Evita acesso direto ao arquivo
}

class SimpleContactForm {

   public function __construct()
   {
      //Create custom post type
      add_action('init', array($this, 'create_custom_post_type'));
   
      //Add assets
      add_action('wp_enqueue_scripts', array($this. 'loadAssets'));
   }

   public function create_custom_post_type(){

      $args = array(
         'public' => true,
         'has_archive' => true,
         'supports' => array('title'),
         'exclude_from_search' => true,
         'publicly_queryable' => false,
         'capability' => 'manage_options',
         'labels' => array(
            'name' => 'Contact Form',
            'singular_name' => 'Contact Form Entry'
         ),
         //Dash Icons
         'menu_icon' => 'dashicons-media-text'
      );

      register_post_type('simple_contactr_form', $args);
   }

   public function loadAssets(){
      wp_enqueue_style(
         'simple-contact-form',
         plugin_dir_url( __FILE__ ) . '/css/simple-contact-form.css',
         array(),
         1,
         'all',
      );
   }

}

new SimpleContactForm;
