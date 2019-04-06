<?php
/**
Template name: font-page
 */

get_header();
?>
<!--section talent-->
 <section>
    <nav id="site-navigation" class="main-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'gallery-nav',
            'menu_id'        => 'gallery-nav',
        ) );
        ?>
    </nav>
     <div class="gallery_talen">
         <?php $query = new WP_Query( array( 'post-type' => 'zm_gallery' ) ) ?>
         <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
             <?php the_post_thumbnail('thumbnail'); ?>
         <?php endwhile; endif;  ?>
     </div>
 </section>

    <?php
        $out = '<dl class="gallery_photos">';
    ?>

<!-- gallery -->
<?php global $more;
while( have_posts() ) : the_post();
    $more = 1; // отображаем полностью всё содержимое поста
    the_title(); // эта функция выводит заголовок
    the_content(); // выводим контент
endwhile;
?>

<!--Latest News -->
   <?php add_action( 'pre_get_posts', 'turn_off_sticky_on_homepage' );

    function turn_off_sticky_on_homepage( $query ) {
    if ( !is_admin() && $query->is_main_query() ) {
    $query->set( 'ignore_sticky_posts', true );
    }
    }
    ?>
    <h2 class="news-section-title">Latest News</h2>
 <?php   $params = array(
    'posts_per_page' => -1, // нужно для отображения всех постов, без разделения по страницам
    'post__in'  => get_option( 'sticky_posts' ), // например Array ( [0] => 54 [1] => 1 )
    );

    $q = new WP_Query( $params );

    while ($q->have_posts()) : $q->the_post();
    // HTML-шаблон вывода поста



    endwhile; wp_reset_postdata();
    ?>



<?php
get_footer();
?>