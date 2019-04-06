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
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'akad' ); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="site-branding">
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

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'akad' ); ?></button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'blog-nav',
                    'menu_id'        => 'blog-menu',
                ) );
                ?>
            </nav>
        </div>
    </header>

    <div id="content" class="site-content">
