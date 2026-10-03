<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
				<div class="heading">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="single page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 left">
				<div class="time">
					<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' год '; the_time('G:i');?>
				</div>
				<div class="view"><i class="fa fa-eye"></i> Количество просмотров: <?php echo do_shortcode('[post-views]');$view = pvc_get_post_views( $post->ID );
				echo $view;?></div>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
			</div><!-- left -->

			<div class="col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->
		</div>
	</div>
</div>

<?php get_footer(); ?>