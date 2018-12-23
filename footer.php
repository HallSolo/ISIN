<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

	<?php /*	</div><!-- #content --> */ ?>


	<footer class="<?php echo check_page_style( basename(get_permalink()) )[1]; ?>">
		<div class="wrapper">
			
			<?php //echo do_shortcode( '[contact-form-7 id="5" title="Контактная форма 1"]' ); ?>
			
			<div class="form">
				<div class="form-title">заявка на обучение</div>
				<div class="form-content">
					<form name="form" action="" method="post">
						<div class="form-row req input">
							<input type="text" name="text" value="" placeholder="ФИО"/>
						</div>
						<div class="form-row req input">
							<input type="text" name="email" value="" placeholder="EMAIL"/>
						</div>
						<div class="form-row">
							<input type="text" name="phone" value="" placeholder="ТЕЛЕФОН"/>
						</div>
						<div class="form-row req select">
							<select class="form-direction chosen" name="selectname">
								<option value="">Направление обучения</option>
								<option value="1">Магистр</option>
								<option value="2">Лаборатория</option>
								<option value="3">Курс</option>
								<option value="3">Предмет</option>
								<option value="5">Лицей</option>
							</select>
						</div>
						<div class="form-row req checked">
							<div class="politika">
								<input type="checkbox" name="politika" id="politika" value=""/>
								<label for="politika">Согласен на обработку персональных данных, а также с <a href="#">политикой конфиденциальности</a></label>
							</div>

						</div>
						<div class="form-row button-up">
							<button type="submit" name="button">
								<span></span>
								<i class="arrow-but"></i>
							</button>
						</div>
					</form>
					<div class="success-form">
						<p>Спасибо!</p>
						<p>Представитель приемной комиссии перезвонит в течении часа в рабочее время</p>
						<a class="back" href="#"></a>
					</div>
				</div>
			</div>



			<div class="sitemap">
						<?php wp_nav_menu(array('menu' => 5, 'menu_class' => 'sitemap-col')); ?>
						<?php wp_nav_menu(array('menu' => 6, 'menu_class' => 'sitemap-col')); ?>
						<?php wp_nav_menu(array('menu' => 7, 'menu_class' => 'sitemap-col')); ?>
						<?php wp_nav_menu(array('menu' => 8, 'menu_class' => 'sitemap-col')); ?>

			</div>

			<div class="footer-bar">
				<div class="footer-loc">
					<address class="footer-adress">Москва, Ленинградский проспект, 17, 125040 <a href="#"><i class="arrow-right"></i></a> </address>
					<a class="footer-tel" href="tel:+78003010930"> +7 (800) 301-09-30</a>
				</div>
				<div class="footer-social">
					<a href="#" class="fc">Facebook</a>
					<a href="#" class="fc">Vkontakte</a>
					<a href="#" class="fc">Instagram</a>
					<a href="#" class="fc">Youtube</a>
				</div>
				<div class="footer-search">
					<a href="#"><i class="ico-search"></i></a>
				</div>
			</div>
		</div>
	</footer>




































<?php
/*
	</div><!-- .site-content-contain -->
</div><!-- #page -->
*/
?>
<?php wp_footer(); ?>

</body>
</html>
