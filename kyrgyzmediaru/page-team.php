<?php
/***
 *Template name: Команда
 */
get_header(); ?>

<div class="page team">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="row">
			<?php
				if( have_rows('team') ): 
					while ( have_rows('team') ) : the_row(); ?>
						<div class="col-md-4 team-item">
						    <img src="<?php the_sub_field('image');?>" alt="Команда">
						    <h3><?php the_sub_field('name');?></h3>
						    <?php the_sub_field('descr');?>
						</div>
					<?php	endwhile; 
				endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>