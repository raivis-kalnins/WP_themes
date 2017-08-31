<?php /* Template Name: Home Page Template */ get_header(); ?>
<main role="main" id="main-home" aria-label="Content">
	<section class="white">
		<div class="b01">
			<div class="bl-wrapper">
				<h2>…или выбирайте Актуальные туры в Великобританию от Туроператора:</h2>
				<div class="top-carousel-wrap">
					
					<!-- Latge src slider -->
					<div id="top-slider" class="owl-carousel">
						<?php
						add_action('pre_get_posts', 'filter_category_orderby');
						function filter_category_orderby( $query ){
							if( $query->is_category()){
									$query->set('orderby', 'meta_value_num');
							}
						}
						$args = array('post_type'=>'tours','cat'=>'tours');
						$loop = new WP_Query($args); 
						while ($loop->have_posts()): $loop->the_post(); ?>
						<div class="item">
							<article>
								<a href="<?php echo CFS()->get('url'); ?>" target="_blank">
									<?php the_post_thumbnail(); ?>
									<h3><?php the_title();?><br /> от <?php echo CFS()->get('price'); ?> ₽</h3>
									<h4><?php echo CFS()->get('ak'); ?></h4>
									<button>ПОДРОБНЕЕ</button>
								</a>
							</article>
						</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
					
					<!-- Mob slider -->
					<div id="top-slider-mob" class="owl-carousel">
						<?php
						add_action('pre_get_posts', 'filter_category_orderby');
						while ($loop->have_posts()): $loop->the_post(); ?>
						<div class="item">
							<article>
								<a href="<?php echo the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
									<h3><?php the_title();?><br /> от <?php echo CFS()->get('price'); ?> ₽</h3>
									<h4><?php echo CFS()->get('ak'); ?></h4>
									<button>ПОДРОБНЕЕ</button>
								</a>
							</article>
						</div>
						<?php endwhile; wp_reset_query(); ?>
					</div>
					
				</div>
				<script>
							// === // OWL top post slider === //
							$(document).ready(function($) {
								$('#top-slider, #top-slider-mob').owlCarousel({
									center: true,
									loop: true,
									margin: 16,
									items: 5,
									responsive:{	
										480: {items: 1}, // from zero to 480 screen width
										678: {items: 2},
										960: {items: 3},
										1440: {items: 4} // from 960 screen width to 1440
									},
									autoWidth: true,
									lazyLoad: true,
									autoplay: 5000, //Set AutoPlay to 5 seconds
									slideSpeed:200,
									pagination: false,
									//paginationSpeed : 400,
									singleItem:false,
									nav:true,
									navText: ["<i class='fa fa-angle-left fa-5x'></i>","<i class='fa fa-angle-right fa-5x'></i>"],
									slideBy: 1
								});
							});
					</script>
			</div>
		</div>
	</section>
	<section class="red">
		<div class="b02">
			<div class="bl-wrapper">
				<h2>Как мы работаем</h2>
					<div class="content-bl">
						<ul id="b02-list">
							<li>
								<h3>1</h3>
								<div class="img-wrap"><img class="alignnone size-full wp-image-230" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-1.svg" alt="" /></div>
								<span>Получаем Вашу заявку</span>
								<i>мгновенно</i>
							</li>
							<li>
								<h3>2</h3>
								<div class="img-wrap"><img class="alignnone size-full wp-image-231" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-2.svg" alt="" /></div>
								<span>Производим расчет тура</span>
								<i>30 минут</i>
							</li>
							<li>
								<h3>3</h3>
								<div class="img-wrap"><img class="alignnone size-full wp-image-232" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-3.svg" alt="" /></div>
								<span>Заключаем с Вами договор</span>
								<i>15 минут</i>
							</li>
							<li>
								<h3>4</h3>
								<div class="img-wrap"><img class="alignnone size-full wp-image-233" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-4.svg" alt="" /></div>
								<span>Получаем от Вас оплату</span>
								<i>в течение 3-х дней</i>
							</li>
							<li>
								<h3>5</h3>
								<div class="img-wrap"><img class="alignnone size-full wp-image-234" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-5.svg" alt="" /></div>
								<span>Выписываем документы на тур</span>
								<i>15 минут</i>
							</li>
						</ul>
						<div id="b02-mob-slider">
							<ul class="owl-carousel">
								<li>
									<h3>1</h3>
									<div class="img-wrap"><img class="alignnone size-full wp-image-230" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-1.svg" alt="" /></div>
									<span>Получаем Вашу заявку</span>
									<i>мгновенно</i>
								</li>
								<li>
									<h3>2</h3>
									<div class="img-wrap"><img class="alignnone size-full wp-image-231" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-2.svg" alt="" /></div>
									<span>Производим расчет тура</span>
									<i>30 минут</i>
								</li>
								<li>
									<h3>3</h3>
									<div class="img-wrap"><img class="alignnone size-full wp-image-232" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-3.svg" alt="" /></div>
									<span>Заключаем с Вами договор</span>
									<i>15 минут</i>
								</li>
								<li>
									<h3>4</h3>
									<div class="img-wrap"><img class="alignnone size-full wp-image-233" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-4.svg" alt="" /></div>
									<span>Получаем от Вас оплату</span>
									<i>в течение 3-х дней</i>
								</li>
								<li>
									<h3>5</h3>
									<div class="img-wrap"><img class="alignnone size-full wp-image-234" src="<?php echo get_template_directory_uri(); ?>/img/icons/p-ico-5.svg" alt="" /></div>
									<span>Выписываем документы на тур</span>
									<i>15 минут</i>
								</li>
							</ul>
						</div>
						<script>
							// === OWL 02-mob-slider === //
							$('#b02-mob-slider li').addClass('item');
							$(document).ready(function($) {
								$('#b02-mob-slider .owl-carousel').owlCarousel({
									loop: true,
									margin: 15,
									items: 1,
									autoWidth: false,
									autoplay: false,
									slideSpeed:200,
									pagination:true,
									paginationSpeed : 400,
									singleItem:true,
									nav:false
								});
							});
						</script>
					</div>
			</div>
		</div>
	</section>
	<section class="white">
		<div class="b03">
			<div class="bl-wrapper" id="coupon">
				<h2>Преимущества бронирования туров у туроператора</h2>
					<div class="content-bl">
						<ul>
							<?php echo CFS()->get('booking'); ?>
						</ul>
						<div id="email-d">
							<img src="<?php echo get_template_directory_uri(); ?>/img/icons/s-ico-email.svg" alt="" />
							<h3>Получи купон <br />на <span>скидку 5%</span></h3>
							<?php echo do_shortcode("[contact-form-7 id='235']"); ?>
						</div>
					</div>
			</div>
		</div> 
	</section>
	<section class="red">
		<div class="b04">
			<div class="bl-wrapper">
				<h2>Наши сотрудники</h2>
					<div class="content-bl">
						<?php the_content(); ?>
						<div id="b04-mob-slider">
							<div class="owl-slider">
								<?php the_content(); ?>
								<script>
									// === OWL 02-mob-slider === //
									$('#b04-mob-slider div.panel-grid-cell').addClass('owl-carousel');
									$('#b04-mob-slider div.panel-grid-cell > div.widget_simpleimage').addClass('item');
									$(document).ready(function($) {
										$('#b04-mob-slider div.panel-grid-cell').owlCarousel({
											loop: true,
											margin: 15,
											items: 1,
											autoWidth: false,
											autoplay: false,
											slideSpeed:200,
											pagination:true,
											paginationSpeed : 400,
											singleItem:true,
											nav:false
										});
									});
								</script>
							</div>
						</div>
					</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>