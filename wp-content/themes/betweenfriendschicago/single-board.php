<?php get_header(); ?>

<section <?php post_class($post->post_name); ?>>
	<div class="container text-left">
		<div class="row">
			<div class="col-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<div class="container mb-4">
							<div class="row">
								<div class="col">
								<?php if(get_field('board_member_photo')){ ?>
										<?php
											$image = get_field('board_member_photo');
											$size = 'medium';
										if( $image ) {
												echo wp_get_attachment_image( $image, $size ); } ?>
									<?php } ?>
									<header class="header mt-3 mb-3">
										<h1 class="entry-title text-left"><?php the_title(); ?></h1>
									</header>
									<?php the_content(); ?>
								</div>
							</div>
						</div>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</div>
				</article>
				<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>


<!--
							<div class="row pt-2 pb-2 purple-bg">
								<div class="col text-center text-sm-right text-light"><strong><?php the_date(); ?></strong></div>
							</div>
-->