<?php get_header(); ?>

<?php if(is_page('get-help') || is_page('get-involved') || is_page('about-us')){ ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row justify-content-center">
		<?php
			$args = array(
			    'post_parent' => $post->ID,
			    'post_type' => 'page',
			    'orderby' => 'menu_order'
			);
			
			$child_query = new WP_Query( $args );
			?>
			
			<?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
			
			    <div <?php post_class('col-sm-6'); ?>> 
				    <div class="post-holder"> 
				        <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				        <?php the_excerpt(); ?>
				        <a href="<?php echo the_permalink(); ?>" class="btn btn-primary">Learn More</a>
				    </div>
			    </div>
			<?php endwhile; ?>
			
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
	</div>
</section>

<?php } else if(is_page('our-programs')) { ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row justify-content-center">
		<?php $args = array(
			  'posts_per_page' => -1,
			  'post_type' => 'page',
			  'orderby' => 'date',
			  'order' => 'ASC',
			  'category_name' => 'Our Programs'
			);
			$loop = new WP_Query( $args ); ?>
			
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			    <div <?php post_class('col-sm-6'); ?>> 
				    <div class="post-holder"> 
				        <h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				        <?php the_excerpt(); ?>
				        <a href="<?php echo the_permalink(); ?>" class="btn btn-primary">Learn More</a>
				    </div>
			    </div>
			<?php endwhile; ?>
				
		
		
		</div>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="row mt-3">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<?php the_content(); ?>	
			</div>
		</div>	
	<?php endwhile; endif; ?>	

	</div>
</section>
<section>
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
	</div>
</section>

<?php } else if(is_page('info-and-resources')){ ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container mb-3">
		<div class="row">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row mt-3">
				<?php query_posts( array(
					'cat' => 6,
					'posts_per_page' => -1,
					'orderby' => 'publish_date',
				    'order' => 'ASC'
				)); ?>
				
				<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
				<div class="col-md-6 col-lg-4">
					<a href="<?php the_permalink(); ?>">
						<div class="latest-holder text-left">
							<?php if( has_post_thumbnail( $post->ID ) ) { ?>
							<div class="latest-top" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
							<?php } ?>
							<h4><?php the_title(); ?></h4>
							<?php the_excerpt(); ?>
						</div>
					</a>
				</div>
			   <?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
	</div>
</section>


<?php } else if(is_page('our-board')){ ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container mb-3">
		<div class="row">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<h3>Our Board of Directors</h3>
				<div class="board-holder">
					<?php query_posts( array(
						'post_type' => 'board',
						'posts_per_page' => -1,
						'orderby' => 'publish_date',
					    'order' => 'ASC'
					)); ?>
					<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
						<?php if( get_field('director_or_council') == 'director' ){ ?>
							<a class="member-holder-link" href="<?php the_permalink(); ?>">
								<div class="member-holder text-center">
								<?php if(get_field('board_member_photo')){ ?>
										<?php // Not sure if this is best practice, but it works
											$image = get_field('board_member_photo');
											$size = 'thumbnail'; // thumbnail/medium/large/full/custom
										if( $image ) {
												echo wp_get_attachment_image( $image, $size ); } ?>
									<?php } ?>
									<h4 class="mb-0"><?php the_title(); ?></h4>
									<?php if(get_field('board_member_title')){ ?>
										<?php the_field('board_member_title'); ?><br>
									<?php } ?>
									<?php if(get_field('board_member_company')){ ?>
										<?php the_field('board_member_company'); ?>
									<?php } ?>
								</div>
							</a>
						<?php } ?>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="ol-md-12 col-lg-10 offset-lg-1">
				<h3>Our Advisory Council</h3>
				<div class="board-holder">
					<?php query_posts( array(
						'post_type' => 'board',
						'posts_per_page' => -1,
						'orderby' => 'publish_date',
					    'order' => 'ASC'
					)); ?>
					<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
						<?php if( get_field('director_or_council') == 'council' ){ ?>
							<a class="member-holder-link" href="<?php the_permalink(); ?>">
								<div class="member-holder text-center">
								<?php if(get_field('board_member_photo')){ ?>
									<?php // Not sure if this is best practice, but it works
										$image = get_field('board_member_photo');
										$size = 'thumbnail'; // thumbnail/medium/large/full/custom
									if( $image ) {
											echo wp_get_attachment_image( $image, $size ); } ?>
								<?php } ?>
								<h4 class="mb-0"><?php the_title(); ?></h4>
								<?php if(get_field('board_member_title')){ ?>
									<?php the_field('board_member_title'); ?><br>
								<?php } ?>
								<?php if(get_field('board_member_company')){ ?>
									<?php the_field('board_member_company'); ?>
								<?php } ?>
								</div>
							</a>
						<?php } ?>
					<?php endwhile; endif; ?>
					<?php wp_reset_query(); ?>
				</div>
				<div class="text-right"><strong>*Board Member Emeritus</strong></div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
	</div>
</section>

<?php } else if(is_page('our-sponsors')){ ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container mb-3">
		<div class="row">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
				<div class="mb-2"><strong><?php the_field('under_title_text', $post_id); ?></strong></div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col board-holder">
				<?php the_field('foundation_sponsors',$post_id); ?>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row mt-4">
			<div class="col-md-12 col-lg-10 offset-lg-1">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>	
	</div>
</section>

<?php } else { ?>

<section <?php post_class($post->post_name); ?>>
	<div class="container">
		<div class="row">
			<div class="col-12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if(!tribe_is_event_query()){ ?>
					<header class="header">
						<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
					</header>
					<?php } ?>
					<div class="entry-content">
						<?php if(get_field('under_title_text', $post_id)){ ?>
						<div class="mb-2"><strong><?php the_field('under_title_text', $post_id); ?></strong></div>
						<?php } ?>
						<?php if ( has_post_thumbnail()) { ?>
						<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
						
						<div class="featured-image-holder" style="background-image:url()">
							<img src="<?php echo $backgroundImg[0]; ?>">
						</div>
							<?php if(get_field('image_caption', $post_id)){ ?>
								<div class="mt-2 text-center"><small>
									<?php if(get_field('image_caption_link', $post_id)){ ?>
									<a href="<?php echo get_field('image_caption_link', $post_id); ?>" target="_blank"><?php the_field('image_caption', $post_id); ?></a>
									<?php } else { ?>
									
									<?php the_field('image_caption', $post_id); ?>
									<?php } ?>
									</small>
								</div>
									
							<?php } ?>
						
						<?php } ?>
						<div class="text-left">
						<?php the_content(); ?>
						</div>
						<div class="entry-links"><?php wp_link_pages(); ?></div>
					</div>
				</article>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>



<?php } ?>




<?php get_footer(); ?>