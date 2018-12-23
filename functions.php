<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function isin_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/isin
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'isin' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'isin' );

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

	add_image_size( 'isin-featured-image', 2000, 1200, true );

	add_image_size( 'isin-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	//$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'isin' ),
			'social' => __( 'Social Links Menu', 'isin' ),
			'bottom-menu' => __('Нижнее меню', 'isin'),
			'bottom-menu 2' => __('Нижнее меню 2', 'isin'),
			'bottom-menu 3' => __('Нижнее меню 3', 'isin'),
			'bottom-menu 4' => __('Нижнее меню 4', 'isin'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo', array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
	add_editor_style( array( 'assets/css/editor-style.css', isin_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'isin' ),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'isin' ),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'isin' ),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'isin' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'isin' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'isin_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'isin_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function isin_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( isin_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'isin_content_width', $content_width );
}
add_action( 'template_redirect', 'isin_content_width', 0 );

/**
 * Register custom fonts.
 */
function isin_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'isin' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function isin_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'isin-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'isin_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function isin_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'isin' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'isin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'isin' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'isin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
		register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'isin' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'isin' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'isin_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function isin_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'isin' ), get_the_title( get_the_ID() ) )
	);
	return ' --> ' . $link;
}
add_filter( 'excerpt_more', 'isin_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function isin_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'isin_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function isin_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'isin_pingback_header' );

/**
 * Display custom color CSS.
 */
function isin_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	$customize_preview_data_hue = '';
	if ( is_customize_preview() ) {
		$customize_preview_data_hue = 'data-hue="' . $hue . '"';
	}
?>
	<style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
		<?php echo isin_custom_colors_css(); ?>
	</style>
<?php
}
add_action( 'wp_head', 'isin_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function isin_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'isin-fonts', isin_fonts_url(), array(), null );
	wp_enqueue_style( 'isin-fonts', get_theme_file_uri('/css/fonts.css'), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'isin-style', get_theme_file_uri('/css/main.css') );
	wp_enqueue_style( 'isin-style-media', get_theme_file_uri('/css/media.css') );
	wp_enqueue_style( 'isin-style-chosen', get_theme_file_uri('/css/chosen.css') );
	wp_enqueue_style( 'jquery-modal-style', get_template_directory_uri() .  '/assets/css/jquery.modal.min.css', array(), ' ' );
	wp_enqueue_style( 'othermytheme-style', get_template_directory_uri() .  '/assets/css/style.css', array(), ' ' );
	//wp_enqueue_style( 'mytheme-style', get_theme_file_uri('/css/style.css'), array(), '' );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'isin-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'isin-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'isin-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'isin-style' ), '1.0' );
		wp_style_add_data( 'isin-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'isin-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'isin-style' ), '1.0' );
	wp_style_add_data( 'isin-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'isin-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$isin_l10n = array(
		'quote' => isin_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'isin-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$isin_l10n['expand']   = __( 'Expand child menu', 'isin' );
		$isin_l10n['collapse'] = __( 'Collapse child menu', 'isin' );
		$isin_l10n['icon']     = isin_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script( 'isin-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-validate', get_theme_file_uri( '/assets/js/jquery.validate.min.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-chosen', get_theme_file_uri( '/assets/js/chosen.jquery.js' ), array( 'jquery' ), '', true );
	wp_enqueue_script( 'isin-slick', get_theme_file_uri( '/assets/js/slick.min.js' ), array( 'jquery' ), '', true );
	wp_enqueue_script( 'jquery-sticky', get_theme_file_uri( '/assets/js/jquery.sticky-kit.min.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'jquery-modal', get_theme_file_uri( '/assets/js/jquery.modal.min.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'isin-main', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery' ), '1.0', true );

	wp_localize_script( 'isin-skip-link-focus-fix', 'isinScreenReaderText', $isin_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'isin_scripts' );


function isin_bootstrap(){
	// Bootstrap stylesheet.
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css', array(), ' ' );
 
   //Mytheme stylesheet.
   wp_enqueue_style( 'mytheme-style', get_template_directory_uri() .  '/css/style.css', array(), ' ' );
//   wp_enqueue_style( 'othermytheme-style', get_template_directory_uri() .  '/assets/css/style.css', array(), ' ' );
 
   //Bootstrap js
   wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), ' ' );
}
//add_action('wp_enqueue_scripts', 'isin_bootstrap');


function isin_slidebar_stickly(){

   //Sticky slidebar js
   wp_enqueue_script( 'sticky-sidebar-js', get_template_directory_uri() . '/libs/sticky-sidebar/js/jquery.sticky-sidebar.min.js', array('jquery'), ' ' );
	
   //Mytheme stylesheet.   //Sticky slidebar js
   wp_enqueue_script( 'my-sticky-slidebar-js', get_template_directory_uri() . '/js/sticky-sidebar.js', array('jquery','sticky-sidebar-js'), ' ', true );
 

}
//add_action('wp_enqueue_scripts', 'isin_slidebar_stickly');

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function isin_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'isin_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function isin_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'isin_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function isin_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'isin_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function isin_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'isin_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function isin_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'isin_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

//faculties
function isin_register_post_type_program() {
	$labels = array(
		'name' => 'Программы обучения',
		'singular_name' => 'Программа',
		'add_new' => 'Добавить новую',
		'add_new_item' => 'Добавить новую',
		'edit_item' => 'Редактировать',
		
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-admin-home',
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'thumbnail', 'category')
	);
	register_post_type('program', $args);
}
add_action( 'init', 'isin_register_post_type_program' ); 

//faculties
function isin_register_post_type_deducation() {
	$labels = array(
		'name' => 'Доп.образование',
		'singular_name' => 'Курс',
		'add_new' => 'Добавить новый',
		'add_new_item' => 'Добавить новый',
		'edit_item' => 'Редактировать',
		
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-admin-home',
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'thumbnail', 'category')
	);
	register_post_type('deducation', $args);
}

add_action( 'init', 'isin_register_post_type_deducation' ); 

//faculties
function isin_register_post_type_laboratory() {
	$labels = array(
		'name' => 'Лаборатории',
		'singular_name' => 'Лаборатория',
		'add_new' => 'Добавить новую',
		'add_new_item' => 'Добавить новую',
		'edit_item' => 'Редактировать',
		
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-admin-home',
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'thumbnail', 'category')
	);
	register_post_type('laboratory', $args);
}

add_action( 'init', 'isin_register_post_type_laboratory' );

//teachers
function isin_register_post_type_people() {
	$labels = array(
		'name' => 'Лекторы и мастера',
		'singular_name' => 'Преподаватель',
		'add_new' => 'Добавить',
		'add_new_item' => 'Добавить',
		'edit_item' => 'Редактировать',
		
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'category')
	);
	register_post_type('people', $args);
}

add_action( 'init', 'isin_register_post_type_people' );

//events
function isin_register_post_type_events() {
	$labels = array(
		'name' => 'События',
		'singular_name' => 'События',
		'add_new' => 'Добавить новое',
		'add_new_item' => 'Добавить новое',
		'edit_item' => 'Редактировать',

	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-businessman',
		'menu_position' => 20,
		'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'category'),
		'taxonomies'  => array( 'category' ),
	);
	register_post_type('events', $args);
}

add_action( 'init', 'isin_register_post_type_events' );


/**
 * настройка связи "события" - "факультеты"
*/

function my_connection_types() {
	// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'laboratory_to_people',
		'from' => 'laboratory',
		'to' => 'people',
		'sortable' => 'any',
		'fields' => array(
			'role' => array( 
				'title' => 'Role',
				'type' => 'select',
				'values' => array( 'Куратор', 'Преподаватель' )
			)
		)
	) );
	
	// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'laboratory_to_events',
		'from' => 'events',
		'to' => 'laboratory',
		'sortable' => 'any'
	) );
	
		// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'program_to_laboratory',
		'from' => 'program',
		'to' => 'laboratory',
		'sortable' => 'any'
	) );
	
	// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'program_to_events',
		'from' => 'program',
		'to' => 'events',
		'sortable' => 'any'
	) );
	
		// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'events_to_people',
		'from' => 'events',
		'to' => 'people',
		'sortable' => 'any'
	) );
	
	// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'deducation_to_people',
		'from' => 'deducation',
		'to' => 'people',
		'sortable' => 'any'
	) );
	
	// Событие - факультет
	p2p_register_connection_type( array(
		'name' => 'program_to_people',
		'from' => 'program',
		'to' => 'people',
		'sortable' => 'any'
	) );
	
	p2p_register_connection_type( array(
        'name' => 'event_to_lyceum',
        'from' => 'page',
        'to' => 'lyceum',
        'sortable' => 'any'
    ) );
	
	
	
}


add_action( 'p2p_init', 'my_connection_types' );













function check_page_style($name=null){
/*
grey
violet
blue
beige
purple
darkblue
red - только первым параметром
*/
	$styles = array(
		'about' => array('body'=>'blue','footer'=>'blue','header'=>''),
		'manifest' => array('body'=>'red','footer'=>'grey','header'=>''),
		'lyceum' => array('body'=>'purple','footer'=>'purple','header'=>''),
		'program' => array('body'=>'beige','footer'=>'beige','header'=>''),
		'events' => array('body'=>'grey','footer'=>'grey','header'=>'grey'),
		'laboratory' => array('body'=>'violet','footer'=>'violet','header'=>'violet')
		
	);
		
	
	 $pageu = str_replace("/",NULL,parse_url('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], PHP_URL_PATH));

	if(!$styles[$pageu]){
		return array('body'=>'grey','footer'=>'darkblue','header'=>'grey');
	}else{
		if($name) return $styles[$pageu][$name];
		else return $styles[$pageu];
	}
	
}


class mainMenuWalker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {

		$attributesclass[] = 'dev-link';

		if($_SERVER['REQUEST_URI'] == $item->url) $attributesclass[] = 'active';

		$attributes = ' class="'.@implode(' ',$attributesclass).'" ';

		// назначаем атрибуты a-элементу
		$attributes.= !empty( $item->url ) ? ' href="' .esc_attr($item->url). '"' : '';
		$item_output = $args->before;

		// проверяем, на какой странице мы находимся
		$current_url = (is_ssl()?'https://':'http://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$item_url = esc_attr( $item->url );
		if ( $item_url != $current_url ) $item_output.= '<a'. $attributes .'>'.$item->title.'</a>';
		else $item_output.= $item->title;

		// заканчиваем вывод элемента
		$item_output.= $args->after;
		$output.= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}			
}





add_post_type_support( 'page', array('excerpt') );



