<?php get_header(); ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container">
		<div class="row">
			<div class="col">
				<article id="post-0" class="post not-found mt-5">
				<header class="header mt-5">
				<h1 class="entry-title"><?php esc_html_e( 'Not Found', 'blankslate' ); ?></h1>
				</header>
				<div class="entry-content">
				<p><?php esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?></p>
				<?php get_search_form(); ?>
				</div>
				</article>
			</div>
		</div>
	</div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>