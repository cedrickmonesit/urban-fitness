<footer class="site-footer container">
    <div class="footer-content">
        <?php
            $args = [
                'theme_location' => 'main-menu',
                //set container that will wrap the ul to a nav tag
                'container' => 'nav',
                //custom class on the nav tag class="main-menu"
                'container_class' => 'footer-menu',
            ];
            wp_nav_menu($args);

        ?>
        <p class="copyright">All Rigthts Reserved. <?php echo get_bloginfo('title').' '.date('Y'); ?></p>
    </div>

</footer>
<!-- load javascript files in the footer -->
<?php wp_footer(); ?>



</body>
</html>