<?php 
/*
 * Template Name: Книга
 * Template Post Type: post
 */
get_header(); ?>


<div class="single page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 left gallery">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
				<div class="heading">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="time">
					<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
				</div>
				<div class="view"><i class="fa fa-eye"></i> Көрүүлөрдүн саны: <?php $view = pvc_get_post_views( $post->ID ); echo $view;?></div>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!--     <div class="cont"><?php the_content(); ?></div> -->

				
					<iframe src="<?php the_field('pdf')?>" frameborder="0" width="100%" height="450px"></iframe>

				<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
		
				
				    <a href="https://kyrgyzmedia.kg/zhamaattyk-mediany-koldoo/"><div class="payment"></div></a>
				

			</div><!-- left -->

			<div class="col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->
		</div>
		<div class="row">
			<div class="col-md-12 right mob-right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->
		</div>
	</div>
</div>

<style>
    header.fixed{
        position: relative;
    }
    .df-container.df-floating>.df-ui-next, .df-container.df-floating>.df-ui-prev{
    display: none !important;
}
</style>



<?php get_footer(); ?>