		</div>
		<!-- /wrapper -->

		<!-- footer -->
		<footer class="footer" role="contentinfo">
			<div id="foo-wrapper">
				<!-- logo -->
				<div class="logo">
					<a href="<?php echo home_url(); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/img/icons/bsi_logo_grey_small.png" alt="Logo" class="logo-img">
					</a>
				</div>
				<!-- /logo -->
				<!-- nav -->
				<nav class="nav" role="navigation">
					<?php footer_nav(); ?>
				</nav>
				<!-- /nav -->
				<p id="copy">
				BSI Group &copy;1990 — <?php echo date('Y'); ?> Все права защищены.
				<br />Использование любых материалов разрешено только со ссылкой на источник.Информация, представленная на сайте, является документом для служебного пользования и не является публичной офертой для потребителя или публичной офертой, обязательной к исполнению.
				</p>
			</div>
		</footer>
		<!-- /footer -->
		<?php wp_footer(); ?>

		<?php if ( wp_is_mobile() && Detect::isAndroidOS() ) { /* Display and echo mobile specific stuff here */ //echo Detect::os(); ?>
			<script>
				var $ = jQuery.noConflict();
				$(document).ready(function() {
					setTimeout(function(){
						$('.menu-left.drawer.Android.IceCreamSandwich, .menu-left.drawer.Android.JellyBean, .menu-left.drawer.Android.KitKat').css({'top':'0','transform':'inherit','transition':'inherit','min-height':'540px','margin-left':'0','min-width':'320px','z-index':'999'});
					}, 2000);	
				});
			</script>
		<?php	}	?>
	</body>
</html>
