<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h1><?php the_archive_title();?></h1>
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
													<?php the_post_thumbnail('category');?>
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
										<p><?php the_excerpt(); ?></p>
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
				<div class="sticky">
					
					<div class="recom">
						<div class="row">
							<div class="col-md-12">
								<div class="covid">
									<div class="heading">
										<h2>КОРОНАВИРУС В КЫРГЫЗСТАНЕ</h2>
									</div>
									<div class="text">Общинные Медиа против COVID-19</div>
									<div class="covid-item"><h4>ОБЩЕЕ КОЛИЧЕСТВО:</h4><div class="num"><?php echo $custom_fields['covid-total']; ?></div></div>
									<div class="covid-item"><h4>НОВЫЕ СЛУЧАИ:</h4><div class="num"><?php echo $custom_fields['covid-new']; ?></div></div>
									<div class="covid-item"><h4>МЕДИКИ:</h4><div class="num"><?php echo $custom_fields['covid-medic']; ?></div></div>
									<div class="covid-item"><h4>ВСЕГО ВЫЗДОРОВЕЛИ:</h4><div class="num"><?php echo $custom_fields['covid-health']; ?></div></div>
									<div class="covid-item"><h4>ВСЕГО СМЕРТЕЙ:</h4><div class="num"><?php echo $custom_fields['covid-dead']; ?></div></div>
								</div>
							</div>
						</div>
					</div><!-- recom -->

					<div class="calendar">
						<div class="row">
							<div class="col-md-12">
								<div class="heading">
									<h2>Календарь</h2>
								</div>
								<div class="sidebar-wrap">
									<?php require('partials/calendar.php') ?>
								</div>
							</div>
						</div>
					</div><!-- calendar -->
				</div>
			</div><!-- right -->
		</div>
	</div>
</div>

<?php get_footer(); ?>