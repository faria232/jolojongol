<?php

function jol_script_enqueue(){

    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/custom.css', array(), 01, 'all');
    wp_enqueue_script('customjs' , get_template_directory_uri() . '/js/custom.js', array(), 01, true);



}


add_action('wp_enqueue_scripts', 'jol_script_enqueue');





 function jol_theme_setup() {

     add_theme_support('Menus');
     register_nav_menus( array(
         'primary' => __('Primary Menu'),
          'footer' => __('Footer Menu')
         ));
 }


 add_action('init','jol_theme_setup');


 add_theme_support('custom-background');

add_theme_support( 'post-thumbnails' );
add_image_size( 'new-custom-size', '400px', '400px', 'true'  );

add_action( 'after_setup_theme', 'joltheme_setup' );




function pw_add_image_sizes() {
    add_image_size( 'new-small', 400, 300, true );
    add_image_size( 'new-medium', 600, 400, true );
    add_image_size( 'new-large', 800, 400, true );
}
add_action( 'init', 'pw_add_image_sizes' );

function pw_show_image_sizes($sizes) {
    $sizes['new-small'] = __( '400x300', 'pippin' );
    $sizes['new-medium'] = __( '600x400', 'pippin' );
    $sizes['new-large'] = __( '800x400', 'pippin' );

    return $sizes;
}
add_filter('image_size_names_choose', 'pw_show_image_sizes');
