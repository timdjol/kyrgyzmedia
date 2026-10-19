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
								<a href="<?php echo get_home_url(); ?>/zhamaattyk-mediany-koldoo/">
										<div class="slide-item" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/leyka.jpg)">
											<div class="overlay"></div>
											<div class="text-wrap">
												<h4>Жамааттык медиага колдоо көрсөтүңүз</h4>
											</div>
										</div>
										</a>
								<?php
								$my_query = null;
								$my_query = new WP_Query(
									array(
										'post_type' => 'post',
										'cat' => 3,
										'post_status' => 'publish',
										'posts_per_page' => 3,
										'order' => 'DESC'
									)
								);
								if( $my_query->have_posts() ) {
									while ($my_query->have_posts()) : $my_query->the_post();?>
										<a href="<?php the_permalink(); ?>">
										<div class="slide-item" style="background-image: url(<?php the_post_thumbnail_url('slide'); ?>)">
											<div class="overlay"></div>
											<div class="text-wrap">
												<h4><?php the_title(); ?></h4>
												<div class="time">
													<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
												</div>
											</div>
										</div>
										</a>
									<?php endwhile;
								}
								wp_reset_query();
								?>
							</div>
						</div>
					</div>
				</div><!-- last -->
				
				<div class="d-xl-none d-lg-none d-block">
            	    <?php km_youtube_box('id_youtube', 37878, 220); ?>
            	</div>
            	<div class="d-xl-none d-lg-none d-block">
            	    <?php km_youtube_box('id_youtube2', 37878, 220); ?>
            	</div>

				<div class="all">
					<div class="row">
						<div class="col-md-12">
							<ul class="tabs">
								<li class="tab-link current" data-tab="tab-1">Негизги</li>
								<li class="tab-link" data-tab="tab-2">Муниципалитеттер</li>
								<li class="tab-link" data-tab="tab-3">Бизнес</li>
								<li class="tab-link" data-tab="tab-4">Билим</li>
								<li class="tab-link" data-tab="tab-5">Ден соолук</li>
								<li class="tab-link" data-tab="tab-6">Маданият</li>
								<li class="tab-link" data-tab="tab-7">Айыл чарба</li>
								<li class="tab-link" data-tab="tab-8">Спорт</li>
								<li class="tab-link" data-tab="tab-9">Туризм</li>
								<li class="tab-link" data-tab="tab-10">Экология</li>
							</ul>

							<div id="tab-1" class="tab-content current">
								<div class="row">
									<?php
									$my_query = null;
									$my_query = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => array(-3353,-5657),
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_query->have_posts() ) {
										while ($my_query->have_posts()) : $my_query->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/bardygy/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-2" class="tab-content">
								<div class="row">
									<?php
									$my_queryt2 = null;
									$my_queryt2 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 23,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt2->have_posts() ) {
										while ($my_queryt2->have_posts()) : $my_queryt2->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/ky-zmattar/munitsipalitetter/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-3" class="tab-content">
								<div class="row">
									<?php
									$my_queryt3 = null;
									$my_queryt3 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 2252,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt3->have_posts() ) {
										while ($my_queryt3->have_posts()) : $my_queryt3->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/biznes/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-4" class="tab-content">
								<div class="row">
									<?php
									$my_queryt4 = null;
									$my_queryt4 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 34,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt4->have_posts() ) {
										while ($my_queryt4->have_posts()) : $my_queryt4->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/ky-zmattar/bilim-ber/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-5" class="tab-content">
								<div class="row">
									<?php
									$my_queryt5 = null;
									$my_queryt5 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 36,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt5->have_posts() ) {
										while ($my_queryt5->have_posts()) : $my_queryt5->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/ky-zmattar/den-sooluk-ky-zmattar-2/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-6" class="tab-content">
								<div class="row">
									<?php
									$my_queryt6 = null;
									$my_queryt6 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 2224,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt6->have_posts() ) {
										while ($my_queryt6->have_posts()) : $my_queryt6->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/madaniyat/" class="more">Бардыгы</a>
                                </div>
							</div>
							
							<div id="tab-7" class="tab-content">
								<div class="row">
									<?php
									$my_queryt6 = null;
									$my_queryt6 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 2764,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt6->have_posts() ) {
										while ($my_queryt6->have_posts()) : $my_queryt6->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/madaniyat/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-8" class="tab-content">
								<div class="row">
									<?php
									$my_queryt7 = null;
									$my_queryt7 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 13,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt7->have_posts() ) {
										while ($my_queryt7->have_posts()) : $my_queryt7->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/ky-zmattar/sport/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-9" class="tab-content">
								<div class="row">
									<?php
									$my_queryt8 = null;
									$my_queryt8 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 2225,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt8->have_posts() ) {
										while ($my_queryt8->have_posts()) : $my_queryt8->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/turizm/" class="more">Бардыгы</a>
                                </div>
							</div>

							<div id="tab-10" class="tab-content">
								<div class="row">
									<?php
									$my_queryt9 = null;
									$my_queryt9 = new WP_Query(
										array(
											'post_type' => 'post',
											'cat' => 2220,
											'post_status' => 'publish',
											'posts_per_page' => 10,
											'order' => 'DESC'
										)
									);
									if( $my_queryt9->have_posts() ) {
										while ($my_queryt9->have_posts()) : $my_queryt9->the_post();?>
											<div class="col-md-6 col-6 news-item">
												<div class="text-wrap">
													<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
													<div class="time">
														<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
													</div>
												</div>
											</div>
										<?php endwhile;
									}
									wp_reset_query();
									?>
								</div>
								<div class="btn-wrap">
                                    <a href="https://kyrgyzmedia.kg/category/ekologiya/" class="more">Бардыгы</a>
                                </div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->

			<div class="row">

				<div class="popular">
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Ден соолук</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						$query2 = null;
						$query2 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 36,
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
										<div class="time">
											<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
										</div>
									</div>
								</div>
							<?php endwhile;
						}
						wp_reset_query();
						?>
					</div>
				</div><!-- popular -->

				<div class="mob-right mobile-opros">
					<div class="container">
						<div class="col-md-12">
							<?php 
				$opros = get_field('opros', 'option');
				get_poll($opros); ?> 
						</div>
					</div>
				</div>

				<div class="category mediateka">
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Билим берүү</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<?php
						$my_query3 = null;
						$my_query3 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 34,
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
										<div class="time">
											<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
										</div>
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
							<h2>Ишкердик</h2>
						</div>
					</div>
					<div class="row">
						<?php
						$my_query4 = null;
						$my_query4 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 32,
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
										<div class="time">
											<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
										</div>
									</div>
								</div>
							<?php endwhile;
						}
						wp_reset_query();
						?>
					</div>
				</div><!-- work -->
				
				<div class="work" style="margin-top: 60px">
					<div class="row">
						<div class="col-md-12">
							<h2>Маданият</h2>
						</div>
					</div>
					<div class="row">
						<?php
						$my_query4 = null;
						$my_query4 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 2224,
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
										<div class="time">
											<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
										</div>
									</div>
								</div>
							<?php endwhile;
						}
						wp_reset_query();
						?>
					</div>
				</div><!-- work -->
				
				
				<div class="work" style="margin-top: 60px">
					<div class="row">
						<div class="col-md-12">
							<h2>Айыл чарба</h2>
						</div>
					</div>
					<div class="row">
						<?php
						$my_query4 = null;
						$my_query4 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 2764,
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
										<div class="time">
											<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
										</div>
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
					<?php get_template_part( 'partials/sidebar'); ?>
				</div><!-- right -->
			</div>
		</div>
	</div>
	
	<style>
	    .wp-polls form input{
	        width: auto;
	        height: auto;
	        display: inline-block;
	    }
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