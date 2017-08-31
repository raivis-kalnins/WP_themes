<?php /* Template Name: Services Template */ 
get_header(); 
if ( get_query_var('paged') ) {
$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
$paged = get_query_var('page');
} else {
   $paged = 1;
}
query_posts(array( 'post_type' => 'post', 'paged' => $paged));
query_posts(array( 
  'post_type' => 'services', // only blog news pages
  'showposts' => 9,
	'paged' => $paged
));
?>

<h1 class="animated fadeInUpShort go" data-id="1"><?php the_title(); ?><a class="btn" href="<?php the_permalink(); ?>"><?php if (qtrans_getLanguage() == "ru") { ?>УЗНАТЬ  БОЛЬШЕ<?php } else { ?>READ MORE<?php } ?></a></h1>
<div class="carousel-item news-img"><?php echo get_the_post_thumbnail($post_id, NULL, "large"); ?></div>

<div id="blog-news-list" class="animatedParent animateOnce"  data-sequence="250" data-appear-top-offset="-50">
	<div class="bg-gray light area-page-g"  id="ajax-load">
		<section class="area-list loop animated fadeInUpShort go" data-id="2">
			<?php $i = 0; if (have_posts()): while (have_posts()) : the_post(); $nr = $i++; ?>
					<article id="list-item-<?php echo $nr; ?>">
						<div class="article-bl-content">
							<a class="view-article" href="<?php the_permalink(); ?>">
								<div class="carousel-item"><?php echo get_the_post_thumbnail($post_id, NULL, "large"); ?></div>
								<h2><?php the_title(); ?></h2>
								<p><?php echo get_the_excerpt(); ?></p>
							</a>
						</div>
						<span class="blog-news-date"><?php echo get_the_date('d.m.Y');?></span>
					</article>
			<?php endwhile; ?>
			<div class="nav-pag"><?php html5wp_pagination(); ?></div>
			<?php else: ?>	
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
		<?php endif; ?>

<!-- 		<div class="box arrow-top-left"><span>top, left</span></div>
		<div class="box arrow-top-center"><span>top, center</span></div>
		<div class="box arrow-top-right"><span>top, right</span></div>
		<div class="box-with-border arrow-top-left"><span>top, left, border</span></div>
		<div class="box-with-border arrow-top-center"><span>top, center, border</span></div>
		<div class="box-with-border arrow-top-right"><span>top, right, border</span></div>
		<br/>
		<div class="box arrow-bottom-left"><span>bottom, left</span></div>
		<div class="box arrow-bottom-center"><span>bottom, center</span></div>
		<div class="box arrow-bottom-right"><span>bottom, right</span></div>
		<div class="box-with-border arrow-bottom-left"><span>bottom, left, border</span></div>
		<div class="box-with-border arrow-bottom-center"><span>bottom, center, border</span></div>
		<div class="box-with-border arrow-bottom-right"><span>bottom, right, border</span></div>
		<br/>
		<div class="box arrow-left-top"><span>left, top</span></div>
		<div class="box arrow-left-center"><span>left, center</span></div>
		<div class="box arrow-left-bottom"><span>left, bottom</span></div>
		<div class="box-with-border arrow-left-top"><span>left, top, border</span></div>
		<div class="box-with-border arrow-left-center"><span>left, center, border</span></div>
		<div class="box-with-border arrow-left-bottom"><span>left, bottom, border</span></div>
		<br/>
		<div class="box arrow-right-top"><span>right, top</span></div>
		<div class="box arrow-right-center"><span>right, center</span></div>
		<div class="box arrow-right-bottom"><span>right, bottom</span></div>
		<div class="box-with-border arrow-right-top"><span>right, top, border</span></div>
		<div class="box-with-border arrow-right-center"><span>right, center, border</span></div>
		<div class="box-with-border arrow-right-bottom"><span>right, bottom, border</span></div> -->
			
	</section>	
	</div>
</div>
<div style="clear:both"></div>

<?php get_footer(); ?>