<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AKAD
 */

if ( ! is_active_sidebar( 'sidebar-blog' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'sidebar-blog' ); ?>
</aside><!-- #secondary -->
