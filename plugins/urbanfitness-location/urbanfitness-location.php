<?php

    /*
        Plugin Name: Urban Fitness - Location With Leaflet
        Plugin URI:
        Description: Creates a Shortcode to display the location
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

//Shortcode API
function urbanfitness_location_shortcode()
{
    $location = get_field('location'); ?>
        <div class="location">
            <input type="hidden" id="lat" value="<?php echo $location['lat']; ?>"/>
            <input type="hidden" id="lng" value="<?php echo $location['lng']; ?>"/>
            <input type="hidden" id="address" value="<?php echo $location['address']; ?>"/>
            <div id="map"></div>
        </div>
    <?php
}
add_shortcode('urbanfitness_location', 'urbanfitness_location_shortcode');
//[urbanfitness_location]

// Enqueues the CSS and JS Files
function urbanfitness_location_scripts()
{
    if ('contact-us'):

    //leaflet css
    wp_enqueue_style('leafletcss', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', [], '1.7.1');

    //leaflet JS
    wp_enqueue_script('leafletjs', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', [], '1.7.1', true);

    //urbanfitness leaflet
    wp_enqueue_script('urbanfitness-leaflet', plugins_url('/js/urbanfitness-leaflet.js', __FILE__), ['leafletjs'], '1.0.0', true);

    endif;
}
add_action('wp_enqueue_scripts', 'urbanfitness_location_scripts');
