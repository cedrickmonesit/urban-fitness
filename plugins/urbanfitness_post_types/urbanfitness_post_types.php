<?php

    /*
        Plugin Name: Urban Fitness - Post Types
        Plugin URI:
        Description: Adds a new Post Type into Wordpress
        Version: 1.0
        Author: Cedrick Monesit
        Author URI: https://cedrickmonesit.github.io/Portfolio.github.io/
        Text Domain: urbanfitness
    */

    //when creating a plugin you must provide information to wordpress with comments

    //SECURITY MEASURE
    //this stops execution if someone tries directly opening this plugin on their browser using the plugin url
    if (!defined('ABSPATH')) {
        die();
    }

// Register new Custom Post Type
function urbanfitness_class_post_type()
{
    //these labels will be displayed in the wordpress user interface
    $labels = [
        'name' => _x('Classes', 'Post Type General Name', 'urbanfitness'),
        'singular_name' => _x('Class', 'Post Type Singular Name', 'urbanfitness'),
        'menu_name' => __('Classes', 'urbanfitness'),
        'name_admin_bar' => __('Classes', 'urbanfitness'),
        'archives' => __('Archive', 'urbanfitness'),
        'attributes' => __('Attributes', 'urbanfitness'),
        'parent_item_colon' => __('Parent Class', 'urbanfitness'),
        'all_items' => __('All Classes', 'urbanfitness'),
        'add_new_item' => __('Add Class', 'urbanfitness'),
        'add_new' => __('Add Class', 'urbanfitness'),
        'new_item' => __('New Class', 'urbanfitness'),
        'edit_item' => __('Edit Class', 'urbanfitness'),
        'update_item' => __('Update Class', 'urbanfitness'),
        'view_item' => __('View Class', 'urbanfitness'),
        'view_items' => __('View Class', 'urbanfitness'),
        'search_items' => __('Search Class', 'urbanfitness'),
        'not_found' => __('Not found', 'urbanfitness'),
        'not_found_in_trash' => __('Not found in trash', 'urbanfitness'),
        'featured_image' => __('Featured Image', 'urbanfitness'),
        'set_featured_image' => __('Save Featured Image', 'urbanfitness'),
        'remove_featured_image' => __('Remove Featured Image', 'urbanfitness'),
        'use_featured_image' => __('Use as Featured Image', 'urbanfitness'),
        'insert_into_item' => __('Insert in Class', 'urbanfitness'),
        'uploaded_to_this_item' => __('Add in Class', 'urbanfitness'),
        'items_list' => __('Classes List', 'urbanfitness'),
        'items_list_navigation' => __('Navigate to Classes', 'urbanfitness'),
        'filter_items_list' => __('Filter Classes', 'urbanfitness'),
    ];
    //these are the arguements we're passing in the register function below
    $args = [
        'label' => __('Class', 'urbanfitness'),
        'description' => __('Classes for Urbanfitness Website', 'urbanfitness'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'thumbnail'], //these are shown in WP editor
        'hierarchical' => false, // False = posts - No child posts
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6, //this sets position in the wordpress panel Dashboard: position 0 Posts: position 5
        'menu_icon' => 'dashicons-welcome-learn-more', //icon used in WP panel
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        //'show_in_rest' => true; //Gutenberg support
    ];
    //passing args here
    register_post_type('urbanfitness_classes', $args); //registering custom post type
}
add_action('init', 'urbanfitness_class_post_type', 0); //wordpress hook

// Register post type for instructors
function gymfitness_instructors()
{
    $labels = [
        'name' => _x('Instructors', 'Post Type General Name', 'gymfitness'),
        'singular_name' => _x('Instructor', 'Post Type Singular Name', 'gymfitness'),
        'menu_name' => __('Instructors', 'gymfitness'),
        'name_admin_bar' => __('Instructor', 'gymfitness'),
        'archives' => __('Archive', 'gymfitness'),
        'attributes' => __('Attributes', 'gymfitness'),
        'parent_item_colon' => __('Parent Instructor', 'gymfitness'),
        'all_items' => __('All Instructors', 'gymfitness'),
        'add_new_item' => __('Add Instructor', 'gymfitness'),
        'add_new' => __('Add Instructor', 'gymfitness'),
        'new_item' => __('New Instructor', 'gymfitness'),
        'edit_item' => __('Edit Instructor', 'gymfitness'),
        'update_item' => __('Update Instructor', 'gymfitness'),
        'view_item' => __('View Instructor', 'gymfitness'),
        'view_items' => __('View Instructors', 'gymfitness'),
        'search_items' => __('Search Instructor', 'gymfitness'),
        'not_found' => __('Not Found', 'gymfitness'),
        'not_found_in_trash' => __('Not Found in Trash', 'gymfitness'),
        'featured_image' => __('Featured Image', 'gymfitness'),
        'set_featured_image' => __('Save Featured Image', 'gymfitness'),
        'remove_featured_image' => __('Remove Featured Image', 'gymfitness'),
        'use_featured_image' => __('Use as Featured Image', 'gymfitness'),
        'insert_into_item' => __('Insert in Instructor', 'gymfitness'),
        'uploaded_to_this_item' => __('Add in Instructor', 'gymfitness'),
        'items_list' => __('List Instructors', 'gymfitness'),
        'items_list_navigation' => __('Navigate to Instructors', 'gymfitness'),
        'filter_items_list' => __('Filter Instructors', 'gymfitness'),
    ];
    $args = [
        'label' => __('Instructors', 'gymfitness'),
        'description' => __('Instructors for website', 'gymfitness'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'thumbnail'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-admin-users',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    ];
    register_post_type('instructors', $args);
}
add_action('init', 'gymfitness_instructors', 0);

//urbanfitness testimonials
function gymfitness_testimonials()
{
    $labels = [
        'name' => _x('Testimonials', 'Post Type General Name', 'gymfitness'),
        'singular_name' => _x('Testimonial', 'Post Type Singular Name', 'gymfitness'),
        'menu_name' => __('Testimonials', 'gymfitness'),
        'name_admin_bar' => __('Testimonial', 'gymfitness'),
        'archives' => __('Archive', 'gymfitness'),
        'attributes' => __('Attributes', 'gymfitness'),
        'parent_item_colon' => __('Parent Testimonial ', 'gymfitness'),
        'all_items' => __('All Testimonials', 'gymfitness'),
        'add_new_item' => __('Add Testimonial', 'gymfitness'),
        'add_new' => __('Add Testimonial', 'gymfitness'),
        'new_item' => __('New Testimonial', 'gymfitness'),
        'edit_item' => __('Edit Testimonial', 'gymfitness'),
        'update_item' => __('Update Testimonial', 'gymfitness'),
        'view_item' => __('View Testimonial', 'gymfitness'),
        'view_items' => __('View Testimonials', 'gymfitness'),
        'search_items' => __('Search Testimonial', 'gymfitness'),
        'not_found' => __('Not found in Trash', 'gymfitness'),
        'featured_image' => __('Featured Image', 'gymfitness'),
        'set_featured_image' => __('Save Featured Image', 'gymfitness'),
        'remove_featured_image' => __('Remove Featured Image', 'gymfitness'),
        'use_featured_image' => __('Use as Featured Image', 'gymfitness'),
        'insert_into_item' => __('Insert Into Testimonial', 'gymfitness'),
        'uploaded_to_this_item' => __('Add At Testimonial', 'gymfitness'),
        'items_list' => __('Testimonial List', 'gymfitness'),
        'items_list_navigation' => __('Navigate toTestimonials', 'gymfitness'),
        'filter_items_list' => __('Filter Testimonials', 'gymfitness'),
    ];
    $args = [
        'label' => __('Testimonials', 'gymfitness'),
        'description' => __('Testimonials para el Sitio Web', 'gymfitness'),
        'labels' => $labels,
        'supports' => ['title', 'editor', 'thumbnail'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-editor-quote',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    ];
    register_post_type('testimonials', $args);
}
add_action('init', 'gymfitness_testimonials', 0);
