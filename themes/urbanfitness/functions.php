<?php

//Link to the queries file
require get_template_directory().'/inc/queries.php';

// Creates the Menus
//add prefix when making your own functions
//functions must be hooked to wordpress
function urbanfitness_menus()
{
    // Wordpress Function
    //registering menu we created
    //pass in a associative array
    register_nav_menus([
        'main-menu' => 'Main Menu',
    ]);
}

// Hook function to Wordpress
add_action('init', 'urbanfitness_menus');

// Adds Stylesheets and JS Files
//must hook function
function urbanfitness_scripts()
{
    //Normalize CSS
    //args wp_enqueue_style($handle $src $deps $ver $media)
    //$deps can be an empty array()
    //$media can be nothing ''
    wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', [], '8.0.1');

    //if you want to add more stylesheets must copy this and make changes to the name and path
    //wp_enqueue_style('normalize', get_template_directory_uri().'/css/normalize.css', [], '8.0.1');
    wp_enqueue_style('googlefont', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', [], '1.0.0');

    //slicknav css file
    //requires jquery as dependency
    wp_enqueue_style('slicknavcss', get_template_directory_uri().'/css/slicknav.min.css', [], '1.0.10');

    //only load this file in gallery template
    //echo basename(get_page_template());
    //get_page_template() shows full path for this template
    //basename only shows the file name in this case gallery.php
    if (basename(get_page_template()) === 'gallery.php'):
        //lightbox css
        wp_enqueue_style('lightboxcss', get_template_directory_uri().'/css/lightbox.min.css', [], '2.11.3');
    endif;

    //bx slider css
    if (is_front_page()):
        wp_enqueue_style('bxslidercss', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css', [], '4.2.15');
    endif;

    // Main Stylesheet
    //we can use another wordpress function to get our main stylesheet
    //this has dependencies because we want google fonts to load first to be in our styles and normalize first
    wp_enqueue_style('style', get_stylesheet_uri(), ['normalize', 'googlefont'], '1.0.0');

    /* Load JS Files **/

    // wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
    //$in_footer arg is a boolean that is used to load the javascript eith in the footer 'true' or 'false' in the header

    //load jquery wordpress already has jquery
    wp_enqueue_script('jquery');

    //slicknav requires jquery wordpress already has jquery
    wp_enqueue_script('slicknavjs', get_template_directory_uri().'/js/jquery.slicknav.min.js', ['jquery'], '1.0.10', true);

    //only load this file in gallery template
    //echo basename(get_page_template());
    //get_page_template() shows full path for this template
    //basename only shows the file name in this case gallery.php
    if (basename(get_page_template()) === 'gallery.php'):
        //lightbox js
        wp_enqueue_script('lightboxjs', get_template_directory_uri().'/js/lightbox.min.js', ['jquery'], '2.11.3', true);
    endif;

    //bx slider JS
    if (is_front_page()):
            wp_enqueue_script('bxsliderjs', 'https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js', ['jquery'], '4.2.15', true);
    endif;

    //scripts
    wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js', ['jquery'], '1.0.0', true);
}
//this hooks scripts and stylesheets
//after hooking the function to wordpress must have wordpress function to enable in header
//put wp_head() in header
add_action('wp_enqueue_scripts', 'urbanfitness_scripts');

// Enable Feature images and other stuff

function urbanfitness_setup()
{
    // Register new image size
    //add_image_size($name, $width, $height, $crop);
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('box', 400, 375, true);
    //wordpress has a medium size for images but having a custom makes it safer if you decide to change themes
    add_image_size('mediumSize', 700, 400, true);
    add_image_size('blog', 966, 644, true);

    // Add featured image
    add_theme_support('post-thumbnails');

    //SEO Titles
    add_theme_support('title-tag');
}

//wordpress hook function
add_action('after_setup_theme', 'urbanfitness_setup'); //this hook calls urbanfitness_setup when theme is activated and ready!

// Creates a Widget Zone
function urbanfitness_widgets()
{
    //registering widget must write php code to show it
    register_sidebar([
        'name' => 'Sidebar', //widget name on wordpress panel
        'id' => 'sidebar', //we are passing this id to dynamic_widget('sidebar') must be unique for wordpress to identify
        'before_widget' => '<div class="widget">', //html before widget
        'after_widget' => '</div>', //html after widget
        'before_title' => '<h3 class="text-primary">', //html before title
        'after_title' => '</h3>', //html after title
    ]);
}
add_action('widgets_init', 'urbanfitness_widgets'); //wordpress hook

/** Display the hero image on background of the front-page **/
//passing inline css code using php wordpress functions
function ubrnafitness_hero_image()
{
    $front_page_id = get_option('page_on_front');
    $image_id = get_field('hero_image', $front_page_id);

    $image = $image_id['url'];

    // Create a "FALSE" stylesheet
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .site-header {
            background-image: linear-gradient( rgba( 0,0,0,0.75), rgba(0,0,0,0.25) ), url( $image );
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    ";
    wp_add_inline_style('custom', $featured_image_css);
}
add_action('init', 'ubrnafitness_hero_image');
