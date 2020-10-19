<?php

    /*
        Plugin Name: Urban Fitness - Widgets
        Plugin URI:
        Description: Adds a custom widget in the WordPress Panel
        Version: 1.0
        Author: Cedrick Monesit
        Author URI: https://cedrickmonesit.github.io/Portfolio.github.io/
        Text Domain: urbanfitness
    */

        //SECURITY MEASURE
    //this stops execution if someone tries directly opening this widget on their browser using the widget url
    if (!defined('ABSPATH')) {
        die();
    }

/**
 * Adds Foo_Widget widget.
 */
class UrbanFitness_Classes_Widget extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'urbanfitness_classes', // Base ID
            esc_html__('UrbanFitness Classes List', 'text_domain'), // Name
            ['description' => esc_html__('Displays different classes in the widget', 'text_domain')] // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     widget arguments
     * @param array $instance saved values from database
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        $quantity = $instance['quantity']; ?>
        <h2 class="text-primary text-center classes-header">
            <?php echo esc_html($instance['title']); ?>
        </h2>
        <ul class="sidebar-classes-list">
            <?php
                $args = [
                    'post_type' => 'urbanfitness_classes', //this can query post page or our own custom post type
                    'posts_per_page' => $quantity, //amount of posts that displays
                    'orderby' => 'rand', //shows random post of post type in this case random classes
                ];

        $classes = new WP_Query($args);
        while ($classes->have_posts()): $classes->the_post(); ?>

        <li class="sidebar-class">
            <div class="sidebar-widget-image">
                <?php the_post_thumbnail('thumbnail'); ?>
            </div>

            <div class="class-content">
            <a href="<?php the_permalink(); ?>">
                <h3 class="text-primary"><?php the_title(); ?></h3>
            </a> 
                <?php
                $start_time = get_field('start_time');
        $end_time = get_field('end_time'); ?>
                <p><?php echo the_field('class_days').' '.$start_time.' to '.$end_time; ?></p>
            </div>
            
            
            
            


        </li>

        <?php
            endwhile;
        wp_reset_postdata(); ?>
        </ul>

        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance previously saved values from database
     */

    //this is where inputs are shown for the widget in the WP panel
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('New title', 'text_domain');
        $quantity = !empty($instance['quantity']) ? $instance['quantity'] : esc_html__('1', 'text_domain'); ?>

		<p>
            <label 
            for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?>
            </label> 
            <input 
                class="widefat" 
                id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
                name="<?php echo esc_attr($this->get_field_name('title')); ?>" 
                type="text" 
                value="<?php echo esc_attr($title); ?>"
            >
        </p>
        <p>
            <label 
                for="<?php echo esc_attr($this->get_field_id('quantity')); ?>">
                <?php esc_attr_e('Amount of Classes to Display:', 'text_domain'); ?>
            </label> 
            <input 
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('quantity')); ?>" 
                name="<?php echo esc_attr($this->get_field_name('quantity')); ?>" 
                type="number" 
                value="<?php echo esc_attr($quantity); ?>"
                min="1"
            >
		</p>
		<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance values just sent to be saved
     * @param array $old_instance previously saved values from database
     *
     * @return array updated safe values to be saved
     */
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['quantity'] = (!empty($new_instance['quantity'])) ? sanitize_text_field($new_instance['quantity']) : '';

        return $instance;
    }
} // class urbanfitness_classes_widget

// register urbanfitness_classes_widget widget
function urbanfitness_classes_widget()
{
    register_widget('UrbanFitness_Classes_Widget');
}
add_action('widgets_init', 'urbanfitness_classes_widget');
