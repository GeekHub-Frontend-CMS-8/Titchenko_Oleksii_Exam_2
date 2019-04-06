<?php
/**
 * Created by PhpStorm.
 * User: Alex_PC
 * Date: 28.03.2019
 * Time: 20:01
 */
?>
<!--CONTENT?>-->
<!--content page blog-->

<?php if (have_posts()) { while (have_posts()) { the_post(); ?>
    <article>
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail ('post_akad')?></a> //миниатюра фото не хочет ссылкой быть

        <h1><a href="<?php the_permalink() ?>" title=""><?php the_title() ?></a></h1>

        <?php the_excerpt(); ?> //не хочет обрезать

    </article> <!-- post end -->

<?php } //конец while
} //конец if ?>
