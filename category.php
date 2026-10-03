<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php $term = get_queried_object();
				$image = get_field('category-image', $term); ?>
				<?php if ($image): ?>
					<div class="row">
						<div class="col-md-2">
							<img src="<?php echo $image;?>" alt="">
						</div>
						<div class="col-md-10">
							<div class="heading">
								<h1><?php single_cat_title(); ?></h1>
							</div>
							<?= category_description() ?>
						</div>
					</div>
				
				<?php else: ?>
					<div class="heading">
								<h1><?php single_cat_title(); ?></h1>
							</div>
							<?= category_description() ?>
						<?php endif ?>
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
								<?php if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>">
										<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>
									</a>
									<?php   
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
									. '/img/no-image.png">';
								}
								?>
							</div>
							<div class="col-md-8">
								<div class="text-wrap">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p><?php the_excerpt(); ?></p>
									<div class="time">
										<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
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

<style>
    .img{
        -webkit-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 160px;
        height: 30vh;
    }
</style>

<?php get_footer(); ?>