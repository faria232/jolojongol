<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_package-price',
    'title' => 'Package Price',
    'fields' => array (
      array (
        'key' => 'field_5a7a37cd9e5c3',
        'label' => 'Package price for adults',
        'name' => 'package_price_for_adults',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5a7a37f79e5c4',
        'label' => 'Package price for children',
        'name' => 'package_price_for_children',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5a7a38019e5c5',
        'label' => 'Package price for others',
        'name' => 'package_price_for_others',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5a7a39034a0c4',
        'label' => 'Package status',
        'name' => 'package_status',
        'type' => 'radio',
        'required' => 1,
        'choices' => array (
          'available' => 'Available',
          'unavailable' => 'Not Available',
        ),
        'other_choice' => 0,
        'save_other_choice' => 0,
        'default_value' => 'unavailable',
        'layout' => 'horizontal',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'package',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}

