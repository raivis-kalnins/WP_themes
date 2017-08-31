<?php 
//ini_set('display_errors', 1); // Insert this debug code before require statement.
require_once 'assets/detectdevice/detect.php';
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '; } ?><?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<?php wp_head(); ?>
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<!-- City List -->
		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBrdnani1p4p8IDmvuy7zoTKk-JhGytzcA&amp;libraries=places" type="text/javascript"></script>
		<script type="text/javascript">
			 function initialize() {
					var inputcity1 = document.getElementById('city1');
				 	//var inputcity2 = document.getElementById('city2');
					var autocomplete = new google.maps.places.Autocomplete(inputcity1);
				 	//var autocomplete = new google.maps.places.Autocomplete(inputcity2);
			 }
			 google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<!-- // City List -->
		<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter44753485 = new Ya.Metrika({ id:44753485, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/44753485" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
		<!-- /Yandex.Metrika counter -->
		<!-- Google Analytic -->
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-101372519-1', 'auto');
				ga('send', 'pageview');
			</script>
		<!-- /Google Analytic -->
	</head>
	<body id='lang-<?php if (qtrans_getLanguage() == "ru") { ?>ru<?php } else { ?>en<?php } ?>' <?php body_class(); ?> >
		<div id="full-screen-bg">
			  <div class="owl-carousel">
					<?php if (has_post_thumbnail()) : the_post_thumbnail($post_id, "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image02", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image03", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image04", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image05", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image06", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image07", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image08", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image09", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image10", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image11", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image12", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image13", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image14", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image15", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image16", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image17", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image18", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image19", NULL,  "full"); endif; ?>
					<?php if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail(get_post_type(), "image20", NULL,  "full"); endif; ?>
				</div>
				<script>
					// === OWL top bg slider === //
					$(document).ready(function($) {
						$('#full-screen-bg div.owl-carousel').owlCarousel({
							loop: true,
							margin:0,
							lazyLoad: true,
							autoWidth: true,
							autoplay: 10000, //Set AutoPlay to 5 seconds
							slideSpeed: 200,
							pagination:false,
							nav:false
						});
					});
					// === // OWL top bg slider === //
			</script>
		</div>
		<div id="bgfull-menu"></div>

		<!-- header --><?php get_random_header_image(); ?>
		<header class="header clear" style="background: url('<?php// if(is_front_page()) { echo esc_url(get_header_image()); } ?>') no-repeat;" >
			<!-- nav -->
			<button class="mob-menu-left"><span class="menu-s"></span></button>
			<nav id="header-nav" class="nav" role="navigation">
				<div id="header-nav-wrapper">
					<div id="top-nav-left">
						<!-- logo -->
						<div class="logo">
							<a href="<?php echo home_url(); ?>">
								<img src="<?php echo get_template_directory_uri(); ?>/img/icons/logo_white_on_red_small.png" alt="Logo" class="logo-img" />
								<img src="<?php echo get_template_directory_uri(); ?>/img/logo-red.svg" alt="Logo" class="logo-img-red" />
							</a>
						</div>
						<!-- /logo -->
					</div>
					<!-- <div class="GBP"><span class="price">0</span></div> -->
					<div id="top-nav-right">
						<!-- lang top -->
						<div class="lang">
							<ul class="lang-menu">
								<li>
									<div class="time-top"><i>10:00 –19:00</i> <span>Где купить тур</span></div>
									<div class="tel-top"><i>+7 (495) 783-26-25</i> <span>Заказать обратный звонок</span></div>	
									<?php// get_search_form(); ?>
								</li>
								<?php /*
								<li class="en-lang <?php if (qtrans_getLanguage() == "en") { ?>active<?php } else { } ?>"><a href="?lang=en">EN</a></li>
								<li class="ru-lang <?php if (qtrans_getLanguage() == "ru") { ?>active<?php } else { } ?>"><a href="?lang=ru">RU</a></li>
								*/ ?>
							</ul>
						</div>
						<!-- /lang top -->
					</div>
					<div id="top-nav-bottom"><?php header_nav(); ?></div>
				</div>
			</nav>
			<!-- /nav -->
			
			<div id="callbackmob">
				<i id="close-callbackmob"></i>
				<h2>Оставьте заявку на подбор тура!</h2>
				<?php echo do_shortcode('[contact-form-7 id="302" title="ПОДОБРАТЬ ТУР"]'); ?>
			</div>
		
			<div id="phone-pop">
				<i id="close-callback"></i>
				<div id="callback-phone-mob">
					<p>Наши специалисты всегда готовы проконсультировать Вас в рабочее время:</p>
					<p>ПН - ПТ, 9:00 - 18:00</p>
					<span class="">+7 (495) 783-26-25</span>
				</div>
				<div id="callback-phone">
					<h2>Заказать обратный звонок:</h2>
					<?php echo do_shortcode('[contact-form-7 id="275" title="Заказать обратный звонок"]'); ?>
					<input type="time" name="time" value="" id="callbacktime" class="form-control" placeholder="--:--" maxlength="5" onKeyPress="formatTime(this)" />
					<script type="text/javascript">
						function formatTime(objFormField){
						intFieldLength = objFormField.value.length;
						if(intFieldLength == 2 || intFieldLength == 2){
							 objFormField.value = objFormField.value + ":";
							 return false;
							} 
						}
					</script>
				</div>
			</div>
			<div id="contacts-pop">
				<i id="close-contacts"></i>
<!-- 				<h2>Офисы продаж BSI Group</h2> -->
				<ul>
					<li>
<!-- 						<h3>BSI GROUP</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/bsi_group_logo.png" alt="BSI" />
						<h4>м. Новослободская / Менделеевская</h4>
						<p>Сущёвская ул., д. 27, стр. 1, оф. 242</p> 
						<p>Часы работы: ПН-ПТ — с 10:00 до 19:00</p> 
						<p><a href="tel:+74957832625">+7 ( 495 ) 783-26-25</a></p>
						<p><a href="https://www.google.ru/maps/place/%D0%A1%D1%83%D1%89%D0%B5%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+27%D1%811,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127055/@55.7833685,37.5990769,17z/data=!3m1!4b1!4m5!3m4!1s0x46b54a1a5e5fd0b1:0x77920632e43b48b1!8m2!3d55.7833685!4d37.6012709" target="_blank" style="color:#D3494A"><u>Показать на карте</u></a></p>
					</li>
					<li>
<!-- 						<h3>Центр Туризма BSI</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/bsi_center_logo.png" alt="BSI" />
						<h4>м. Аэропорт</h4>
						<p>Ленинградский пр-т., 47, стр. 2, офис А01</p>
						<p>Часы работы: ПН-ПТ — с 10:00 до 19:00 </p>
						<p><a href="tel:+74957832625">+7 ( 495 ) 783-26-25</a></p>
						<p><a href="tel:+74959257578">+7 ( 495 ) 925-75-78</a></p>
						<p><a href="https://www.google.ru/maps/place/%D0%9B%D0%B5%D0%BD%D0%B8%D0%BD%D0%B3%D1%80%D0%B0%D0%B4%D1%81%D0%BA%D0%B8%D0%B9+%D0%BF%D1%80.,+47,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+125167/@55.7996907,37.5299563,17z/data=!3m1!4b1!4m8!1m2!2m1!1z0JvQtdC90LjQvdCz0YDQsNC00YHQutC40Lkg0L_RgC3Rgi4sIDQ3LCDRgdGC0YAuIDIsINC-0YTQuNGBINCQMDE!3m4!1s0x46b549b879abdb97:0xf5ae684c8330f875!8m2!3d55.7996907!4d37.5321503" target="_blank" style="color:#D3494A"><u>Показать на карте</u></a></p>
					</li>
					<li>
<!-- 						<h3>BSI LUXE</h3> -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/bsi_luxe_logo.png" alt="BSI" />
						<h4>м. Маяковская</h4>
						<p>1-й Тверской-Ямской пер., д. 18, офис 230</p>
						<p>Часы работы: ПН-ПТ — с 10:00 до 19:00</p> 
						<p><a href="tel:+74957832625">+7 ( 495 ) 783-26-25</a></p>
						<p><a href="tel:+74959255167">+7 ( 495 ) 925-51-67</a></p>
						<p><a href="https://www.google.ru/maps/place/1-%D0%B9+%D0%A2%D0%B2%D0%B5%D1%80%D1%81%D0%BA%D0%BE%D0%B9-%D0%AF%D0%BC%D1%81%D0%BA%D0%BE%D0%B9+%D0%BF%D0%B5%D1%80.,+18,+230,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+125047/@55.7738035,37.597073,17z/data=!3m1!4b1!4m5!3m4!1s0x46b54a3decff990f:0x399455d9e713bc65!8m2!3d55.7738035!4d37.599267" target="_blank" style="color:#D3494A"><u>Показать на карте</u></a></p>
					</li>
				</ul>
			</div>
			<div id="home-bl-top"></div>
		</header>
		<?php if(is_front_page()) { ?>
		<div id="header-wrapper">
			<div id="filter-form">
				<h1><?php the_title(); ?></h1>
				<h2>Оставьте заявку на подбор тура и мы точно найдем, что Вам предложить!</h2>
				<div class="slideForm">
					<div id="filter-form-selector">
						<?php echo do_shortcode('[contact-form-7 id="81" title="Form 1"]'); ?>
						<a href="#filter-form-selector-send" class="fancybox-inline btn-f"></a>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- /header -->
		<div class="header_mob_menu menu-left drawer">
			<div class="soc-top mob-soc-menu">
				<span class="vk-top"><a href="https://vk.com/dadobro_com" target="_blank"><span></span></a></span>
				<span class="fb-top"><a href="https://www.facebook.com/dadobrocom/" target="_blank"><span></span></a></span>
				<span class="in-top"><a href="https://www.instagram.com/dadobrocom/" target="_blank"><span></span></a></span>
			</div>
			<a href="<?php echo home_url(); ?>" class="menu-logo-img"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo"></a>
			<?php sidebar_nav(); ?>
		</div>
		<!-- wrapper -->
		<div class="wrapper">