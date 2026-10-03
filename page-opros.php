<?php
/***
 *Template name: Опросы
 */
get_header(); ?>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 left">
				<div class="row">
					<div class="col-md-12">
						<div class="heading">
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
				</div>
				<div class="row opros">
					<?php
					if( have_rows('opros') ): 
						while ( have_rows('opros') ) : the_row(); 
							$id = get_sub_field('id');
							?>
							<div class="col-md-4 opros-item">

								<?php echo do_shortcode($id); ?>
							</div>
						<?php	endwhile; 
					endif; ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->

		</div>
	</div>

	<?php get_footer(); ?>