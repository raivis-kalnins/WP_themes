<?php get_header(); ?>
	<main role="main">
		<!-- section -->
		<section>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<!-- post category -->
			<!--<div class="blog-category"><?php echo get_the_category()[0]->name; ?></div>-->
      <!-- /post title -->	
			<!-- post thumbnail -->
			<div id="single-tours-img"><?php if (has_post_thumbnail()) : the_post_thumbnail($post_id, "full"); endif; ?>
			  <!-- post title -->
			</div>
			<div id="title-top">
				<h1><?php the_title(); ?></h1>
				<h2><?php echo CFS()->get('ak'); ?></h2>
			</div>
			<!-- /post thumbnail -->
			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class='post-content'>	
					<!-- post content -->	
					<div id="tours-post-content">
						<h3>Программа тура:</h3>
						<?php the_content(); // Dynamic Content ?>
					</div>
					<!-- /post content -->
				</section>
			</article>
			<div id="foo-nav-s">
				<span id="single-price">от <?php echo CFS()->get('price'); ?> ₽</span><a href="<?php echo CFS()->get('url'); ?>" class="btn-single" target="_blank">ЗАБРОНИРОВАТЬ</a>
			</div>
			<!-- /article -->
		<?php endwhile; ?>
		<?php else: ?>
			<!-- article -->
			<article>
				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			</article>
			<!-- /article -->
		<?php endif; ?>
		</section>
		<!-- /section -->
	</main>
<?php get_footer(); ?>