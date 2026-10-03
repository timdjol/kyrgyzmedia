<?php
/***
 *Template name: Партнеры
 */
get_header(); ?>

<div class="page partners">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<?php
				if( have_rows('partners') ): 
					while ( have_rows('partners') ) : the_row(); ?>
						<div class="col-md-4 partners-item">
						    <a target="_blank" href="<?php the_sub_field('link');?>"><img src="<?php the_sub_field('image');?>" alt="Партнеры"></a>
						</div>
					<?php	endwhile; 
				endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>