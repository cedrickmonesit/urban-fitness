<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Fitness</title>
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?> >

<header class="site-header">
    <div class="container header-grid">
        <div class="navigation-bar">
            <div class="logo">
                <a href="<?php
                    /* home_url() wordpress function that returns url of home page using echo to show the url*/
                    echo home_url();
                ?>"><img src=
                '<?php
                /*function returns the path for the theme files directory */
                echo get_template_directory_uri().'/img/logo.png';
                ?>' 
                alt="Urban Fitness Logo"/></a>
            </div><!--.logo-->
            <?php $args = [
                    'theme_location' => 'main-menu',
                    //set container that will wrap the ul to a nav tag
                    'container' => 'nav',
                    //custom class on the nav tag class="main-menu"
                    'container_class' => 'main-menu',
                ];
                wp_nav_menu($args);

                ?>
        </div><!--.navigation-bar-->
        <div class="tagline text-center">
            <h1><?php the_field('hero_tagline'); ?></h1>
            <p><?php the_field('hero_content'); ?></p>
        </div>
    </div><!--.container-->
</header>




