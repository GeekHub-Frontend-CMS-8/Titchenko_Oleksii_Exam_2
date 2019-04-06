<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AKAD
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<meta http-equiv=»Content-Type» content=»<?php bloginfo(‘html_type’); ?>; charset=<?php bloginfo(‘charset’); ?>» />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    -->
<!--подключаю фото-->
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( '', 'MITALENT' ); ?></a>

	<header id="masthead" class="site-header">
      <div class="container">
		<div class="site-branding">
            <!--MENU-->
            <div class="header-menu-line">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-nav',
                        'menu_id'        => 'header-menu',
                    ) );
                    ?>
                </nav>
            </div>
            <!--LOGO-->
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$akad_description = get_bloginfo( 'description', 'display' );
			if ( $akad_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $akad_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div>

          <div class="header-foto">
              <img src="<?php echo get_template_directory_uri();?>/Lesson18/app/img/header/header-gerl-l.jpg" alt="foto gerl">
          </div>
          <h1 class="hero-title">Georgina Alson</h1>

      </div>
	</header>

	<div id="content" class="site-content">
