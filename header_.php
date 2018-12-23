<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?> 
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
	
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php //_e( 'Skip to content', 'isin' ); ?></a> -->

	<header id="masthead" class="site-header" role="banner">

		<?php //get_template_part( 'template-parts/header/header', 'image' ); ?>

		<?php if ( has_nav_menu( 'top' ) ) : ?>
       		<div class="navbar navbar-light fixed-top align-items-center p-3 px-md-4 mb-3 bg-transparent">
				<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
			</div><!-- .col-md-12 -->
			<div id="navbarContent" class="collapse">
				<div class="menu-mobile">
            <div class="overlay"></div>
                <div class="wrapper">
                    <nav class="main-nav">
                        <?php wp_nav_menu(array('menu' => '01 Исин')); ?>
						<?php wp_nav_menu(array('menu' => '02 Образование')); ?>
						<?php wp_nav_menu(array('menu' => '03 Среда')); ?>
						<?php wp_nav_menu(array('menu' => '04 Поступление')); ?>
							<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'isin' ); ?>">
						<?php
							wp_nav_menu(
								array(
									'menu_class'     => 'social-links-menu',
								)
							);
						?>
					</nav><!-- .social-navigation -->
                    </nav>
                </div>
        </div>
		    </div>
		<?php endif; ?>

	</header><!-- #masthead -->
	

	<div class="site-content-contain">
		<div id="content" class="site-content">
