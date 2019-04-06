<?php
/**
 * AKAD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AKAD
 */

if ( ! function_exists( 'akad_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function akad_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on AKAD, use a find and replace
		 * to change 'akad' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'akad', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-nav' => esc_html__( 'Header Navigation', 'akad' ),
			'footer-nav' => esc_html__( 'Footer Navigation', 'akad' ),
			'blog-nav' => esc_html__( 'Blog Navigation', 'akad' ),
			'gallery-nav' => esc_html__( 'Menu Gallery', 'akad' ),

            add_image_size( 'akad_mini', 400, 400, true ),

		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'akad_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'akad_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function akad_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'akad_content_width', 640 );
}
add_action( 'after_setup_theme', 'akad_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function akad_scripts() {

//подключаем файл style.css
    wp_enqueue_style( 'akad-reset', get_template_directory_uri() . '/Lesson18/app/css/reset.css', array(), '20151215', true );

	wp_enqueue_style( 'akad-style', get_stylesheet_uri() );


//подключение файлов JS
	wp_enqueue_script( 'akad-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'akad-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'akad_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*LoftBlog Castom Code
 * */
function akad_init() {
    register_post_type( 'blog',
        array(
            'labels' => array(
                'name' => __( 'Blogs' ),
                'singular_name' => __( 'Blog' ),
                'add_new' => ('Добавить') ,
            ),
            'menu_position'=> 5,
            'suports'=> array('title', 'editor', 'thumbnail', 'post-formats', 'excerpt'),
            'public' => true,
            'has_archive' => true,
        )
    );

    register_taxonomy(
        'blog_year',
        'post',
        array(
            'label' => __( 'Year' ),
            'rewrite' => array( 'slug' => 'year' ),
            'hierarchical' => true,
        )
    );
         register_taxonomy(
             'blog_color',
             'post',
             array(
                 'label' => __( 'Color' ),
                 'rewrite' => array( 'slug' => 'color' ),
                 'hierarchical' => true,
             )
         );
}
add_action( 'init', 'akad_init' );

/*GALLERY***/
add_action( 'init', 'add_gallery_post_type' );
function add_gallery_post_type() {
    register_post_type( 'zm_gallery',
        array(
            'labels' => array(
                'name' => __( 'Gallery' ),
                'singular_name' => __( 'Gallery' ),
                'all_items' => __( 'All Images')
            ),
            'public' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'rewrite' => array('slug' => 'gallery-item'),
            'supports' => array( 'title', 'thumbnail' ),
            'menu_position' => 4,
            'show_in_admin_bar'   => false,
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => false,
            'query_var'           => false
        )
    );
}

function zm_get_backend_preview_thumb($post_ID) {
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);
    if ($post_thumbnail_id) {
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');
        return $post_thumbnail_img[0];
    }
}

function zm_preview_thumb_column_head($defaults) {
    $defaults['featured_image'] = 'Image';
    return $defaults;
}
add_filter('manage_posts_columns', 'zm_preview_thumb_column_head');

function zm_preview_thumb_column($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
        $post_featured_image = zm_get_backend_preview_thumb($post_ID);
        if ($post_featured_image) {
            echo '<img src="' . $post_featured_image . '" />';
        }
    }
}
add_action('manage_posts_custom_column', 'zm_preview_thumb_column', 10, 2);

/* SOCIAL MEDIA BUTTONS
************************************/
function my_social_media_icons(){
    ob_start();
    ?>
    </br>
    Follow me on social media:
    <ul class="social-icons">
        <li>
            <a href="https://www.facebook.com/user" target='blank'>
                <img src="/Lesson18/app/img/icon/facebook-f-24.png" alt="Facebook" />
            </a>
        </li>
        <li>
            <a href="https://twitter.com/user" target='blank'>
                <img src="/Lesson18/app/img/icon/twitter-30.png" alt="Twitter" />
            </a>
        </li>
        <li>
            <a href="https://www.instagram.com/user" target='blank'>
                <img src="/Lesson18/app/img/icon/twitter-30.png" alt="Instagram" />
            </a>
        </li>
        <li>
            <a href="https://plus.google.com/+user" target='blank'>
                <img src="//mycyberuniverse.com/wp-content/uploads/social-media-icons/google.png" alt="Google+" />
            </a>
        </li>
        <li>
            <a href="https://www.youtube.com/channel/user" target='blank'>
                <img src="/Lesson18/app/img/icon/youtube.png" alt="YouTube" />
            </a>
        </li>
        <li>
            <a href="http://user.blogspot.ru" target='blank'>
                <img src="/images/social-media-icons/blogger.png" alt="Blogger" />
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com/in/user" target='blank'>
                <img src="/images/social-media-icons/linkedin.png" alt="Linkedin" />
            </a>
        </li>
        <li>
            <a href="https://github.com/user" target='blank'>
                <img src="/images/social-media-icons/github.png" alt="Github" />
            </a>
        </li>
        <li>
            <a href="http://codepen.io/user/" target='blank'>
                <img src="/images/social-media-icons/codepen.png" alt="Codepen" />
            </a>
        </li>
        <li>
            <a href="mailto:user@gmail.com?subject=Message from website" target='blank'>
                <img src="/images/social-media-icons/mail.png" alt="Mail" />
            </a>
        </li>
        <li>
            <a href="//user.com/feed" target='blank'>
                <img src="/images/social-media-icons/rss.png" alt="RSS Feed" />
            </a>
        </li>
    </ul>
    <style>
        .social-icons {
            text-align: center;
        }
        .social-icons li {
            display:inline-block;
            list-style-type:none;
            -webkit-user-select:none;
            -moz-user-select:none;
        }
        .social-icons li a {
            border-bottom: none;
        }
        .social-icons li img {
            width:70px;
            height:70px;
            margin-right: 20px;
        }
    </style>
    </br>
    <?php
    $output = ob_get_clean();
    return $output;
}
add_shortcode('my_social_media_icons', 'my_social_media_icons'); // Create shortcode
add_filter('widget_text', 'do_shortcode');  // Allow shortcodes in widgets


  //***********************Добавим новые размеры миниатюр************************//
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 600, 9999 ); // размер миниатюры поста по умолчанию
    add_image_size( 'post_akad', 400, 300, true );
}


//*************** обрезаем текст постов**********************//
/**
 * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
 *
 * @param string/array $args Параметры.
 *
 * @return string HTML
 *
 * @ver 2.6.3
 */
function kama_excerpt( $args = '' ){
    global $post;

    if( is_string($args) )
        parse_str( $args, $args );

    $rg = (object) array_merge( array(
        'maxchar'   => 150,   // Макс. количество символов.
        'text'      => '',    // Какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
        // Если в тексте есть `<!--more-->`, то `maxchar` игнорируется и берется все до <!--more--> вместе с HTML.
        'autop'     => true,  // Заменить переносы строк на <p> и <br> или нет?
        'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'.
        'more_text' => 'Читать дальше...', // Текст ссылки `Читать дальше`.
    ), $args );

    $rg = apply_filters( 'kama_excerpt_args', $rg );

    if( ! $rg->text )
        $rg->text = $post->post_excerpt ?: $post->post_content;

    $text = $rg->text;
    $text = preg_replace( '~\[([a-z0-9_-]+)[^\]]*\](?!\().*?\[/\1\]~is', '', $text ); // убираем блочные шорткоды: [foo]some data[/foo]. Учитывает markdown
    $text = preg_replace( '~\[/?[^\]]*\](?!\()~', '', $text ); // убираем шоткоды: [singlepic id=3]. Учитывает markdown
    $text = trim( $text );

    // <!--more-->
    if( strpos( $text, '<!--more-->') ){
        preg_match('/(.*)<!--more-->/s', $text, $mm );

        $text = trim( $mm[1] );

        $text_append = ' <a href="'. get_permalink( $post ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
    }
    // text, excerpt, content
    else {
        $text = trim( strip_tags($text, $rg->save_tags) );

        // Обрезаем
        if( mb_strlen($text) > $rg->maxchar ){
            $text = mb_substr( $text, 0, $rg->maxchar );
            $text = preg_replace( '~(.*)\s[^\s]*$~s', '\\1 ...', $text ); // убираем последнее слово, оно 99% неполное
        }
    }

    // Сохраняем переносы строк. Упрощенный аналог wpautop()
    if( $rg->autop ){
        $text = preg_replace(
            array("/\r/", "/\n{2,}/", "/\n/",   '~</p><br ?/?>~'),
            array('',     '</p><p>',  '<br />', '</p>'),
            $text
        );
    }

    $text = apply_filters( 'kama_excerpt', $text, $rg );

    if( isset($text_append) )
        $text .= $text_append;

    return ( $rg->autop && $text ) ? "<p>$text</p>" : $text;
}
?>



