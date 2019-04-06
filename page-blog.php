<?php
/**
Template name: page-blog шаблон
 */

get_header('blog');
?>


    <div class="sidebar-blog">
        <?php
            dynamic_sidebar( 'sidebar-blog' );
        ?>
    </div>
<?php
get_footer();
