<aside class="sidebar">
        <?php
            if (is_active_sidebar('sidebar')): //if sidebar widget is active it'll show
            dynamic_sidebar('sidebar');
            endif;
        ?>
</aside>