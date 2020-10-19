<?php
/*
* Template Name: Page with Sidebar
*/
get_header(); ?>

<main class="container page section with-sidebar">
    <div class="page-content">
       <?php
        //naming convention for page-loop is separated by 'template-parts/page', 'loop'
        get_template_part('template-parts/page', 'loop'); //different wordpress function for custom php file that isn't recognized by wordpress
       ?>
    </div>

    <?php
        get_sidebar(); //having a file name sidebar is recognized by wordpress
    ?>

</main>


<?php get_footer(); ?>