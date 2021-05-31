	<?php if( get_field('form_for_page', $post_id) == 'email' ){ ?>
		<section id="emailForm" class="purple-bg pt-5 pb-5">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1>Join Our Mailing List</h1>
						<?php echo do_shortcode('[ctct form=185]'); ?>
					</div>
				</div>
			</div>
		</section>
		
	<?php } else if( get_field('form_for_page', $post_id) == 'contact' ){ ?>	
		
		<section id="contactForm" class="purple-bg pt-5 pb-5">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1>How can we help?</h1>
						<?php echo do_shortcode('[ninja_form id=2]	'); ?>
					</div>
				</div>
			</div>
		</section>
	
	<?php } else if( get_field('form_for_page', $post_id) == 'both' ){ ?>	
	
		<section id="emailForm" class="purple-bg pt-5 pb-5">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1>Join Our Mailing List</h1>
						<?php echo do_shortcode('[ctct form=185]'); ?>
					</div>
				</div>
			</div>
		</section>
		
		<section id="contactForm" class="purple-bg pt-5 pb-5">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1>How can we help?</h1>
						<?php echo do_shortcode('[ninja_form id=2]	'); ?>
					</div>
				</div>
			</div>
		</section>
	
	<?php } ?>


<footer id="footer">
	<div class="container">
		<div class="row mb-3" id="footerMenu">
			<div class="col-12 col-md text-center text-sm-left">
				<?php dynamic_sidebar( 'footer_menu_1' ); ?>
			</div>
			<div class="col-12 col-md">
				<?php dynamic_sidebar( 'footer_menu_2' ); ?>
			</div>
			<div class="col-12 col-md">
				<?php dynamic_sidebar( 'footer_menu_3' ); ?>
			</div>
			<div class="col-12 col-md">
				<?php dynamic_sidebar( 'footer_menu_4' ); ?>
			</div>
			<div class="col-12 col-md">
				<?php dynamic_sidebar( 'footer_menu_5' ); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 text-center text-md-left">
				<strong>Find Us On Social Media</strong>
				<?php wp_nav_menu( array( 'theme_location' => 'social_nav', 'container_class' => 'social-media-nav' ) ); ?>
			</div>
			<div class="col-md-8 text-center text-md-left">
				<strong>Call Us</strong>
				<?php wp_nav_menu( array( 'theme_location' => 'phone_menu', 'container_class' => 'phone-nav' ) ); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div id="copyright">
					<small>&copy; <?php echo esc_html( date_i18n( __( 'Y', 'blankslate' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?></small>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>

<script>
	jQuery(function ($) {
	$('#launchDonate').click(function(){
		$('#donateModal').modal('show');
	});
	})
</script>

</body>
</html>