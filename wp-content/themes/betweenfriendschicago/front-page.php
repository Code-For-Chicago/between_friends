<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section id="topCTA" class="back-o cta-banner">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<a href="tel:<?php echo get_field('top_cta_link'); ?>"><h2><?php the_field('top_cta', $post_id); ?></h2></a>
			</div>
		</div>
	</div>
</section>
<section id="homeContent">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<main id="content">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content">
							<?php the_content(); ?>
							<div class="entry-links"><?php wp_link_pages(); ?></div>
						</div>
					</article>
				</main>
			</div>
		</div>
	</div>
</section>
<?php endwhile; endif; ?>
<section id="updates">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Latest updates</h1>
			</div>
		</div>
		<div class="row">
				<?php query_posts( array(
					'posts_per_page' => 3,
					'cat' => 7,
					'orderby' => 'date',
				    'order' => 'DESC',
				)); ?>
				
				<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="col-md-6 col-lg-4">
					<a href="<?php the_permalink(); ?>">
						<div class="latest-holder text-left">
							<?php if(has_post_thumbnail()){ ?>
								<div class="latest-top" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
							<?php } else { ?>
								<div class="latest-top" style="background-image: url(<?php bloginfo('template_url'); ?>/images/sunset2.jpeg)"></div>
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
<section id="emailForm" class="purple-bg pt-5 pb-5 mt-4">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1>Join Our Mailing List</h1>
				<?php echo do_shortcode('[ctct form=185]'); ?>
			</div>
		</div>
	</div>
</section>
<section class="purple-bg pt-5 pb-5 mt-2">
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<h1>How can we help?</h1>
				<?php echo do_shortcode('[ninja_form id=2]	'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>