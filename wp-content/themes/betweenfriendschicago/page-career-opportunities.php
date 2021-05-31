<?php get_header(); ?>
<section <?php post_class($post->post_name); ?>>
	<div class="container mb-3">
		<div class="row">
			<div class="col-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 mb-1">
				<strong>Full Time Employment Opportunities</strong>
			</div>
				<?php query_posts( array(
					'post_type' => 'jobs',
					'posts_per_page' => -1,
					'orderby' => 'publish_date',
				    'order' => 'ASC',
				    'tax_query' => array(
					    array(
					      'taxonomy' => 'employment',
					      'field' => 'id',
					      'terms' => 37 // Where term_id of Term 1 is "1".
					    )
					  )
				)); ?>
				<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<div class="col-12">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
					</a>
				</div>
			   <?php endwhile; else: ?>
			   <div class="col-12">
				   There are no positions of this type currently open. Check back soon.
			   </div>
			   
			   <?php endif; ?>
		</div>
	</div>
		<div class="row mt-3 ">
			<div class="col-12 mb-1">
				<strong>Part Time Employment Opportunities</strong>
			</div>
				<?php query_posts( array(
					'post_type' => 'jobs',
					'posts_per_page' => -1,
					'orderby' => 'publish_date',
				    'order' => 'ASC',
				    'tax_query' => array(
					    array(
					      'taxonomy' => 'employment',
					      'field' => 'id',
					      'terms' => 35 // Where term_id of Term 1 is "1".
					    )
					  )
				)); ?>
				<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<div class="col-12">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
					</a>
				</div>
			   <?php endwhile; else: ?>
			   <div class="col-12">
				   There are no positions of this type currently open. Check back soon.
			   </div>
			   
			   <?php endif; ?>
			
		</div>
		<div class="row mt-3">
			<div class="col-12 mb-1">
				<strong>Internship Opportunities</strong>
			</div>
				<?php query_posts( array(
					'post_type' => 'jobs',
					'posts_per_page' => -1,
					'orderby' => 'publish_date',
				    'order' => 'ASC',
				    'tax_query' => array(
					    array(
					      'taxonomy' => 'employment',
					      'field' => 'id',
					      'terms' => 38 // Where term_id of Term 1 is "1".
					    )
					  )
				)); ?>
				<?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
				<div class="col-12">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title(); ?></h4>
					</a>
				</div>
			   <?php endwhile; else: ?>
			   <div class="col-12">
				   There are no positions of this type currently open. Check back soon.
			   </div>
			   
			   <?php endif; ?>
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