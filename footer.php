<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AKAD
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer-nav',
                'menu_id'        => 'footer-menu',
            ) );
            ?>
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Created by akhouad 2016. All Rights Reserved')); ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php
add_shortcode('my_social_media_icons', 'my_social_media_icons'); // Create shortcode
?>
<?php wp_footer(); ?>

</body>
</html>
