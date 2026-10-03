<?php
/***
 *Template name: Главная
 */
get_header(); ?>

<div class="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 left">
				<div class="slide">
					<div class="row">
						<div class="col-md-12">
							<div class="owl-carousel owl-slide">
								<a href="<?php echo get_home_url(); ?>/pomoch-proektu/">
										<div class="slide-item" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/leyka.jpeg)">
											<div class="overlay"></div>
											<div class="text-wrap">
												<h4>Поддержите общинные медиа</h4>

											</div>
										</div>
										</a>
								<?php
								$my_query = null;
								$my_query = new WP_Query(
									array(
										'post_type' => 'post',
										'cat' => 296,
										'post_status' => 'publish',
										'posts_per_page' => 3,
										'order' => 'DESC'
									)
								);
								if( $my_query->have_posts() ) {
									while ($my_query->have_posts()) : $my_query->the_post();?>
										<div class="slide-item" style="background-image: url(<?php the_post_thumbnail_url('slide'); ?>)">
											<div class="overlay"></div>
											<div class="text-wrap">
												<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
												<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
											</div>
										</div>
									<?php endwhile;
								}
								wp_reset_query();
								?>
							</div>
						</div>
					</div>
				</div><!-- last -->

				<div class="all">
					<div class="row">
						<div class="col-md-12">
							<ul class="tabs">
								<li class="tab-link current" data-tab="tab-1">Все</li>
								<li class="tab-link" data-tab="tab-2">Муниципалитеты</li>
								<li class="tab-link" data-tab="tab-3">Бизнес</li>
								<li class="tab-link" data-tab="tab-4">Образование</li>
								<li class="tab-link" data-tab="tab-5">Здоровье</li>
								<li class="tab-link" data-tab="tab-6">Культура</li>
								<li class="tab-link" data-tab="tab-7">Спорт</li>
								<li class="tab-link" data-tab="tab-8">Туризм</li>
								<li class="tab-link" data-tab="tab-9">Экология</li>
							</ul>

							<div id="tab-1" class="tab-content current">
								<div class="row">
									<?php
									$my_query = null;
									$my_query = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => array(-581,-705),
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_query->have_posts() ) {
										while ($my_query->have_posts()) : $my_query->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-2" class="tab-content">
								<div class="row">
									<?php
									$my_queryt2 = null;
									$my_queryt2 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 118,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt2->have_posts() ) {
										while ($my_queryt2->have_posts()) : $my_queryt2->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-3" class="tab-content">
								<div class="row">
									<?php
									$my_queryt3 = null;
									$my_queryt3 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 119,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt3->have_posts() ) {
										while ($my_queryt3->have_posts()) : $my_queryt3->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-4" class="tab-content">
								<div class="row">
									<?php
									$my_queryt4 = null;
									$my_queryt4 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 83,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt4->have_posts() ) {
										while ($my_queryt4->have_posts()) : $my_queryt4->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-5" class="tab-content">
								<div class="row">
									<?php
									$my_queryt5 = null;
									$my_queryt5 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 22,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt5->have_posts() ) {
										while ($my_queryt5->have_posts()) : $my_queryt5->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-6" class="tab-content">
								<div class="row">
									<?php
									$my_queryt6 = null;
									$my_queryt6 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 444,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt6->have_posts() ) {
										while ($my_queryt6->have_posts()) : $my_queryt6->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-7" class="tab-content">
								<div class="row">
									<?php
									$my_queryt7 = null;
									$my_queryt7 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 443,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt7->have_posts() ) {
										while ($my_queryt7->have_posts()) : $my_queryt7->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-8" class="tab-content">
								<div class="row">
									<?php
									$my_queryt8 = null;
									$my_queryt8 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 445,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt8->have_posts() ) {
										while ($my_queryt8->have_posts()) : $my_queryt8->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>

							<div id="tab-9" class="tab-content">
								<div class="row">
									<?php
									$my_queryt9 = null;
									$my_queryt9 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 446,
											'post_status' => 'publish',
											'posts_per_page' => 8,
											'order' => 'DESC'
										)
									);
									if( $my_queryt9->have_posts() ) {
										while ($my_queryt9->have_posts()) : $my_queryt9->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 right">
				<div class="sticky">
					
					<div class="recom">
						<div class="row">
							<div class="col-md-12">
								<div class="covid">
									<iframe width="100%" height="180" src="https://www.youtube.com/embed/<?php the_field('youtube', 4053)?>?si=R5CF8wXJjRd45CZq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
								</div>
								<a href="http://covidru.kyrgyzmedia.kg/">
									<div class="covid covid-head">
										<div class="text">Общинные Медиа против COVID-19</div>
									</div>
								</a>
							</div>
						</div>
					</div><!-- recom -->

					<!-- <div class="calendar">
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
					</div> --><!-- calendar -->

				</div>
			</div>


		</div><!-- right -->

		<div class="row">

			<div class="popular">
				<div class="row">
					<div class="col-md-12">
						<div class="heading">
							<h2>Здоровье</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					$query2 = null;
					$query2 = new WP_Query(
						array(
							'post_type' => 'post',
							'cat' => 22,
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'order' => 'DESC'
						)
					);
					if( $query2->have_posts() ) {
						while ($query2->have_posts()) : $query2->the_post(); ?>
							<div class="col-md-3 col-6 popular-item">
								<?php if ( has_post_thumbnail() ) { ?>
									<a href="<?php the_permalink(); ?>">
										<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>
									</a>
									<?php   
								}
								else { ?>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.png"></a><?php
								}
								?>
								<div class="text-wrap">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
									<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
								</div>
							</div>
						<?php endwhile;
					}
					wp_reset_query();
					?>
				</div>
			</div><!-- popular -->

			<!-- <div class="mob-right mobile-opros">
					<div class="container">
						<div class="col-md-12">
							<?php echo do_shortcode('[poll id="2"]'); ?>
						</div>
					</div>
				</div> -->

				<div class="category mediateka">
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Образование</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						$my_query3 = null;
						$my_query3 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 83,
								'post_status' => 'publish',
								'posts_per_page' => 8,
								'order' => 'DESC'
							)
						);
						if( $my_query3->have_posts() ) {
							while ($my_query3->have_posts()) : $my_query3->the_post();?>
								<div class="col-md-3 col-6 popular-item">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>">
											<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>
										</a>
										<?php   
									}
									else { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.png"></a><?php
									}
									?>
									<div class="text-wrap">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
									</div>
								</div>
							<?php endwhile;
						}
						wp_reset_query();
						?>
					</div>
				</div><!-- category -->

				<div class="work">
					<div class="row">
						<div class="col-md-12">
							<h2>Бизнес</h2>
						</div>
					</div>
					<div class="row">
						<?php
						$my_query4 = null;
						$my_query4 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 119,
								'post_status' => 'publish',
								'posts_per_page' => 8,
								'order' => 'DESC'
							)
						);
						if( $my_query4->have_posts() ) {
							while ($my_query4->have_posts()) : $my_query4->the_post();?>
								<div class="col-md-3 col-6 popular-item">
									<?php if ( has_post_thumbnail() ) { ?>
										<a href="<?php the_permalink(); ?>">
											<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>
										</a>
										<?php   
									}
									else { ?>
										<a href="<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.png"></a><?php
									}
									?>
									<div class="text-wrap">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
									</div>
								</div>
							<?php endwhile;
						}
						wp_reset_query();
						?>
					</div>
				</div><!-- work -->
			</div>
			<div class="row">
				<div class="col-md-12 right mob-right">
					<div class="sticky">

						<div class="recom">
							<div class="row">
								<div class="col-md-12">
									
									<a href="http://covidru.kyrgyzmedia.kg/">
										<div class="covid covid-head">
											<div class="text">Общинные Медиа против COVID-19</div>
										</div>
									</a>
								</div>
							</div>
						</div><!-- recom -->

					</div>
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