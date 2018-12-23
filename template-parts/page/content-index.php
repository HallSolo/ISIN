<?php
wp_enqueue_script( 'local-slick', get_template_directory_uri() . "/assets/js/my-slick.js", array('jquery'), null, true );
wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slick.css', false, null, 'all');
wp_enqueue_style( 'slider-theme', 'https://kenwheeler.github.io/slick/slick/slick-theme.css', false, null, 'all');
?>

<section>
		<div class="wrapper">
			<h2 class="title">События</h2>
			<span class="left-slide"></span>
			<span class="right-slide"></span>
			<div class="slider clases">
                    <?php
	                $now = new DateTime();
	                $datenow = $now->format('y.m.d H:i');
	                $event = new WP_Query( array( 'post_type' => 'events', 'meta_query' => array(array('key' => 'date','value' => $datenow, 'compare' => '>=')),'order'=>'DESC') );
				//$event = new WP_Query( array( 'post_type' => 'events', 'order'=>'DESC') );
				//var_dump($event);
	                if ($event->have_posts() ) :
		                //$event->single_post_title();
		                while ( $event->have_posts() ) : $event->the_post(); ?>
				
				             <?php get_template_part( 'template-parts/post/events/slider' ); ?>

		                <?php endwhile; ?>
	                <?php endif;?>
			</div>
		</div>
	</section>

	<section class="beige">
		<div class="wrapper">
			<h2 class="title main">Программы обучения</h2>
			<div class="stady">
                <?php
				$program = new WP_Query( array( 'post_type' => 'program') );
	                            while ( $program->have_posts() ) :
		                            $program->the_post();
		                            get_template_part( 'template-parts/page/content', 'program' );
	                            endwhile;
				?>
			</div>
		</div>
	</section>

	<section class="violet">
		<div class="wrapper">
			<h2 class="title main">Лаборатории</h2>
			<div class="laborat">
				<?php
				$laboratory = new WP_Query( array( 'post_type' => 'laboratory') );
	                            while ( $laboratory->have_posts() ) :
		                            $laboratory->the_post();
				                    get_template_part('template-parts/page/content','laboratory');
	                            endwhile;
				?>
			</div>
		</div>
	</section>

	<section>
		<div class="wrapper">
			<h2 class="title main">Дополнительное образование</h2>
			<div class="additional">
				
				<?php
				$additional = new WP_Query( array( 'post_type' => 'deducation') );
	                            while ( $additional->have_posts() ) :
		                            $additional->the_post();
				                    get_template_part('template-parts/page/content','deducation');
	                            endwhile;
				?>
	
			</div>
		</div>
	</section>

	<section class="black">
		<div class="wrapper">
			<h2 class="title main">Лекторы и мастера</h2>
			<div class="masters">
				
				<?php
				$people = new WP_Query( array( 'post_type' => 'people') );
	                            while ( $people->have_posts() ) :
		                            $people->the_post();
				                    get_template_part('template-parts/page/content','people');
	                            endwhile;
				?>
				
			</div>
		</div>
	</section>

	<section class="modal" data-modal="master1">
			<div class="masters-details">
				<div class="masters-details-sidebar">
					<div class="masters-details-photo">
						<img src="img/master1.png" alt=""/>
					</div>
				</div>
				<div class="masters-details-info">
					<div class="close"></div>
					<div class="masters-details-name">Артур Аристакисян</div>
					<div class="masters-details-history">Окончил ВГИК, факультет «Режиссура документального кино. Автор фильмов «Ладони» и «Место на земле», получивших многочисленные премии на международных фестивалях. Награды и премии: Кинопремия «Ника», Приз им. Вольфганга Штаудте на Форуме молодого кино Берлинского кинофестиваля, кинофестивалей в Карловых варах, Копенгагене, Сан-Франциско, Мюнхене, Таормине, «Беллария» (Италия), участник «Двухнедельника режиссеров» на Каннском кинофестивале.</div>
					<h3 class="title-page-small">События</h3>
					<div class="related">
						<div class="related-item">
							<a href="#" class="related-photo">
								<img src="img/relat1.png" alt=""/>
							</a>
							<div class="related-date">30.10.18 / лекция</div>
							<a href="#" class="related-name non-arrow">Афрофутуризм и электронная музыка</a>
							<div class="related-info">
								<div class="related-time">19:00, Малый Зал</div>
								<div class="related-autor">спикер: Евгений Былин</div>
							</div>
						</div>
						<div class="related-item">
							<a  href="#" class="related-photo">
								<img src="img/relat1.png" alt=""/>
							</a>
							<div class="related-date">30.10.18 / лекция</div>
							<a href="#" class="related-name non-arrow" >Звуковые скульптуры</a>
							<div class="related-info">
								<div class="related-time">19:00, Малый Зал</div>
								<div class="related-autor">спикер: Евгений Былин</div>
							</div>
						</div>
						<div class="related-item">
							<a href="#" class="related-photo">
								<img src="img/relat1.png" alt=""/>
							</a>
							<div class="related-date">30.10.18 / лекция</div>
							<a href="#" class="related-name non-arrow">Психоанализ и психиатрия: что такое «безумие»?</a>
							<div class="related-info">
								<div class="related-time">19:00, Малый Зал</div>
								<div class="related-autor">спикер: Евгений Былин</div>
							</div>
						</div>
					</div>
					<h3 class="title-page-small">Курсы</h3>
					<div class="related">
						<div class="related-item">
							<a href="#" class="related-name">психосемиотика</a>
							<div class="related-decpr">Курс предназначен для психологов, лингвистов, психиатров, а также для гуманитариев широкого профиля, испытывающих интерес к неосознаваемому и зависть к точным наукам с их безусловной  доказательностью</div>
						</div>
						<div class="related-item">
							<a href="#"  class="related-name">психолингвистика и психосемиотика</a>
							<div class="related-decpr">Курс предназначен для психологов, лингвистов, психиатров, а также для гуманитариев широкого профиля, испытывающих интерес к неосознаваемому и зависть к точным наукам с их безусловной  доказательностью</div>
						</div>
					</div>
				</div>
			</div>
	</section>
