<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<div class="heading">
								<h1><?php single_cat_title(); ?></h1>
								<div class="descr"><?php echo category_description(); ?></div>
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
				<div class="row popular justify-content-center">
					<?php
						$my_query4 = null;
						$my_query4 = new WP_Query(
							array(
								'post_type' => 'post',
								'cat' => 7090,
								'post_status' => 'publish',
								'posts_per_page' => 10,
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

	</div>
</div>

<style>
    .title{
        margin-bottom: 0;
    }
    .popular{
        padding: 0;
    }
    .popular-item{
        flex: 0 0 20%;
        max-width: 20%;
    }
    .popular-item img{
        margin-bottom: 0;
    }
    .img{
        -webkit-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 160px;
        height: 30vh;
    }
    @media(max-width: 767px){
        .popular-item{
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>

<?php get_footer(); ?>