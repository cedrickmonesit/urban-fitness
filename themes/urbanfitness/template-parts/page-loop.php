 <!-- Wordpress loop -->
 <?php
        /* the_post() function will have the information in the wordpress posts */
        while (have_posts()): the_post();

        ?>

        <!-- this will display title we have in the wordpress editor -->
        <h1 class="text-center text-primary"><?php the_title(); ?></h1>

        <?php
            //check if image exists
            //if there's no image we can display something else
            if (has_post_thumbnail()):
                //you can pass in the size of image that you made in your functions.php
                //smaller images help load times
                //second args are attributes of an image
                the_post_thumbnail('blog', ['class' => 'featured-image']);
            endif;

            // Check the current post type
            //if it is a urbanfitness class it will display this content
            if (get_post_type() === 'urbanfitness_classes'):
                $start_time = get_field('start_time');
                $end_time = get_field('end_time');
                ?>
                <p class="content-class">
                    <?php echo the_field('class_days').' '.$start_time.' to '.$end_time; ?>
                </p>
        <?php
            endif;
        ?>
        <!-- this will display content we have in the wordpress editor -->
        <?php the_content(); ?>

        <!-- Recommended to use endwhile rather than brackets -->
        <?php endwhile; ?>