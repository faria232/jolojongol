<?php

namespace Chhuti\Plugins\Suite;

add_action( 'init', '\Chhuti\Plugins\Suite\chhuti_register_packages_post_type', 90);

function chhuti_register_packages_post_type() {
  $labels = array(
    'name' => _x( 'Packages', 'chhuti_package' ),
    'singular_name' => _x( 'Package', 'chhuti_package' ),
    'add_new' => _x( 'Add New', 'chhuti_package' ),
    'add_new_item' => _x( 'Add new Package', 'chhuti_package' ),
    'edit_item' => _x( 'Edit Package', 'chhuti_package' ),
    'new_item' => _x( 'New Package', 'chhuti_package' ),
    'view_item' => _x( 'View Package', 'chhuti_package' ),
    'search_items' => _x( 'Search Package', 'chhuti_package' ),
    'not_found' => _x( 'No Package found', 'chhuti_package' ),
    'not_found_in_trash' => _x( 'No Package found in Trash', 'chhuti_package' ),
    'parent_item_colon' => _x( 'Parent Package:', 'chhuti_package' ),
    'menu_name' => _x( 'Package', 'chhuti_package' ),
  );

  $supports = array(
    'title',
    'editor',
    'thumbnail',
    'excerpt',
    'custom-fields',
    'author'
  );

  $capabilities = array(
    'edit_post'          => 'edit_chhuti_package',
    'edit_posts'         => 'edit_chhuti_packages',
    'edit_others_posts'  => 'edit_other_chhuti_packages',
    'publish_posts'      => 'publish_chhuti_packages',
    'read_post'          => 'read_chhuti_package',
    'read_private_posts' => 'read_private_chhuti_packages',
    'delete_post'        => 'delete_chhuti_package'
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'description' => 'Chhuti Packages',
    'supports' => $supports,
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 25,
    'menu_icon' => 'dashicons-format-aside',
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => false,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
  );

  register_post_type( 'package', $args );

}

