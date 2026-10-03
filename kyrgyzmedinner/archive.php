<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php single_cat_title(); ?></h1>
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="archive page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 left">
				<div class="lenta">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="row lenta-item">
							<div class="col-md-4">
								<?php 
								if( has_post_format( 'video' ) ) { ?>
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('category');?>
									</a>
								<?php } 
								else{
									if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('category');?>
										</a>
										<?php   
									}
									else {
										echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
										. '/img/no-image.png">';
									}
								}
								?>
							</div>
							<div class="col-md-8">
								<div class="text-wrap">
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
									<div class="time">
										<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
									</div>
									<div class="btn-wrap">
										<a href="<?php the_permalink(); ?>" class="more">Кененирээк</a>
									</div>
								</div>
							</div>
						</div>
						<?php 
					endwhile; ?>
					<!-- post navigation -->
					<?php else: ?>
						<h2>Нет новостей</h2>
					<?php endif; ?>


				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="pagination">
							<?php wp_pagenavi(); ?>
						</div>
					</div>
				</div>
			</div><!-- left -->
			<div class="col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->
		</div>
	</div>
</div>

<?php get_footer(); ?>