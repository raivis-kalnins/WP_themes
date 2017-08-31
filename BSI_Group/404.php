<?php get_header(); ?>
	<main role="main">
		<!-- section -->
		<section>
			<!-- article -->
			<article id="post-404">
					<h1><?php if (qtrans_getLanguage() == "ru") { ?>404 Ошибка. Данная страница не найдена<?php } elseif (qtrans_getLanguage() == "en") { ?>404 Page not found<?php } ?></h1>
					<a href="<?php echo home_url(); ?>" class="bt404"><?php if (qtrans_getLanguage() == "ru") { ?>ГЛАВНАЯ СТРАНИЦА<?php } elseif (qtrans_getLanguage() == "en") { ?>Home page<?php } ?></a>
			</article>
			<!-- /article -->
		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>