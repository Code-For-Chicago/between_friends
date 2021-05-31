<?php get_header(); ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container mb-3">
		<div class="row">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row mt-3 justify-content-center">
			<?php query_posts( array(
					'posts_per_page' => -1,
					'orderby' => 'date',
				    'order' => 'DESC'
				)); ?>
				
				<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="col-sm-6 col-lg-4">
					<a href="<?php the_permalink(); ?>">
						<div class="latest-holder text-left">
							<?php if( has_post_thumbnail( $post->ID ) ) { ?>
							<div class="latest-top" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
							<?php } ?>
							
							<div class="container small">
								<div class="row pt-2 pb-2 purple-bg">
									<div class="col text-light text-right"><strong><?php the_date(); ?></strong></div>
								</div>
							</div>
							<h4><?php the_title(); ?></h4>
							<?php the_excerpt(); ?>
						</div>
					</a>
				</div>
			   <?php endwhile; endif; ?>
		</div>
	</div>
</section>

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
<?php get_footer(); ?>