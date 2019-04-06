<?php
get_header('blog');
?>

<?php
    $args = array( 'post_type' => 'blog', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();?>

   <a href="<?php the_permalink();?>" <?php the_title();?> </a>

    <?php echo '<div class="entry-content">';
    the_content();
    echo '</div>';
    endwhile;
?>

<?php
    get_footer ();
