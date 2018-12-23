<?php
/**
 * The header for index in our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Isin
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <!-- <a class="skip-link screen-reader-text" href="#content"><?php //_e( 'Skip to content', 'isin' ); ?></a> -->

	<section class="parallax">
		<div class="wrapper">
			<div class="parallax-sed">
				<h1>Институт Свободных Искусств и Наук ММУ</h1>
				<p>Традиционно образование транслирует один взгляд на мир. ИСИН ММУ создан на базе разных школ, каждая из которых транслирует свой.  Наш выпускник – специалист, который будет не только порождать культурные проекты на пике идей своего поколения, но и развивать непосредственно сам язык культуры.</p>
				<a href="<?php echo esc_url( get_permalink(get_page_by_path( '/isin/about', OBJECT, 'page' ))); ?>" class="parallax-arrow" title="Подробнее"></a>
			</div>
		</div>
	</section>
	
    <header id="masthead" class="main site-header" role="banner">

		<div class="menu-black">
            <?php if (has_nav_menu('top')) : ?>
			<div class="wrapper">
                    <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
			</div>
			<div class="header-menu black">
				<div class="wrapper">
					<h2 class="title">Меню</h2>
					<nav class="header-menu-map">
						<?php wp_nav_menu(array('menu' => 5, 'menu_class' => 'header-menu-col')); ?>
						<?php wp_nav_menu(array('menu' => 6, 'menu_class' => 'header-menu-col')); ?>
						<?php wp_nav_menu(array('menu' => 7, 'menu_class' => 'header-menu-col')); ?>
						<?php wp_nav_menu(array('menu' => 8, 'menu_class' => 'header-menu-col')); ?>
					</nav>
						<div class="footer-bar">
							<div class="footer-loc">
								<address class="footer-adress">Москва, Ленинградский проспект, 17, 125040 <a href="#"><i class="arrow-right"></i></a></address><a class="footer-tel" href="tel:+78003010930"> +7 (800) 301-09-30</a>
							</div>
							<div class="social-navigation footer-social" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'isin'); ?>">
								<?php echo strip_tags(wp_nav_menu( array( 'menu' => 3, 'menu_class' => 'footer-social', 'container' => false, 'items_wrap' => '%3$s', 'depth' => 0, 'echo' => false ) ), '<a>' ); ?>
							</div>
							<div class="footer-search">
								<a href="#"><i class="ico-search"></i></a>
							</div>
						</div>
				</div>
			</div>
            <?php endif; ?>
		</div>		
    </header><!-- #masthead -->

    <section class="social-modal">
        <div class="wrapper">
            <div class="social-con">
                <a class="close" href="#" title="Закрыть"></a>
                <?php
                wp_nav_menu(
                    array(
                        'menu_class' => 'social-var',
                    )
                );
                ?>
            </div>
        </div>
    </section>
	

	<div class="site-content-contain">
		<div id="content" class="site-content">