<?php

// -1 in wordpress will retrieve all post types if there is no argument
function gymfitness_classes_list($number = -1) { ?>
    <ul class="classes-list">
        <?php
            $args = [
                'post_type' => 'urbanfitness_classes',
                'posts_per_page' => $number,
            ];
            //user WP_Query and append the results into $classes
            $classes = new WP_Query($args);

            while ($classes->have_posts()): $classes->the_post();
        ?>
        <li class="gym-class card gradient">
        <?php the_post_thumbnail('mediumsize'); ?>
        
        <div class="card-content">
            <a href="<?php the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
            </a>    
            <?php
            $start_time = get_field('start_time');
            $end_time = get_field('end_time');
            ?>
            <p><?php echo the_field('class_days').' '.$start_time.' to '.$end_time; ?></p>


        </div>


        </li>
    <?php endwhile; wp_reset_postdata(); ?>
    </ul>
    <?php
}

//displays the instructors
function urbanfitness_instructors_list() { ?>
<ul class="instructor-list">
<?php
    $args = [
        'post_type' => 'instructors',
        'posts_per_page' => 20,
    ];
    $instructors = new WP_Query($args);

    while ($instructors->have_posts()): $instructors->the_post(); ?>
    <li class="instructor">
        <?php the_post_thumbnail('mediumSize'); ?>
        <div class="content text-center">
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <div class="specialty">
            <?php
                $specialty = get_field('specialty');
                foreach ($specialty as $s): ?>
                <span class="tag"><?php echo $s; ?></span>
            <?php endforeach; ?>
        </div>
        </div>
    </li>
<?php endwhile; wp_reset_postdata(); ?>
</ul>
<?php
                }
