<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h1><?php single_cat_title(); ?></h1>
				</div>
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
											<div class="video"><i class="fa fa-video-camera"></i>
												<?php the_post_thumbnail('category');?>
											</div>
										</a>
									<?php } 
									else{
										if ( has_post_thumbnail() ) { ?>
											<a href="<?php the_permalink(); ?>">
												<div class="img-wrap"><i class="fa fa-picture-o"></i>
													<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>
												</div>
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
										<?php the_excerpt(); ?>
										<div class="btn-wrap">
											<a href="<?php the_permalink(); ?>" class="more">Подробнее</a>
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
				<div class="sticky">
					
					<div class="recom">
						<div class="row">
							<div class="col-md-12">
								<div class="covid">
									<iframe width="100%" height="180" src="https://www.youtube.com/embed/<?php the_field('youtube', 4053)?>?si=R5CF8wXJjRd45CZq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
								</div>
							</div>
						</div>
					</div><!-- recom -->

				
				</div>
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