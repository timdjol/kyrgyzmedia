<?php
/***
 *Template name: Подкаст
 */
get_header(); ?>

<style>
    .podcast-item{
        margin: 40px 0;
    }
</style>

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
				    <?php
				if( have_rows('podcast') ): 
					while ( have_rows('podcast') ) : the_row(); ?>
						<div class="row podcast-item">
						    <div class="col-md-12">
						        <h3><?php the_sub_field('title');?></h3>
						        <div class="row">
						        <?php
            				if( have_rows('video') ): 
            					while ( have_rows('video') ) : the_row(); ?>
            						<div class="col-md-6">
            						    <iframe width="100%" height="280" src="https://www.youtube.com/embed/<?php the_sub_field('youtube');?>?si=R5CF8wXJjRd45CZq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            						</div>
            					<?php	endwhile; 
            				endif; ?>
						    </div>
						    </div>
						    
						</div>
					<?php	endwhile; 
				endif; ?>
			</div>
			<div class="col-lg-3 col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->

		</div>
	</div>

	<?php get_footer(); ?>