<?php get_header(); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<main id="content">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'entry' ); ?>
				<?php comments_template(); ?>
				<?php endwhile; endif; ?>
				<?php get_template_part( 'nav', 'below' ); ?>
			</main>
		</div>
	</div>
</div>
<?php get_footer(); ?>