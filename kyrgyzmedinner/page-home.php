<?php
/***
 *Template name: Главная
 */
get_header(); ?>

<div class="archive page">

	<div class="container">
		<div class="row">
			<div class="col-md-9 left">
				<div class="row lenta">
					<?php 
					$current_page = !empty( $_GET['pages'] ) ? $_GET['pages'] : 1;
					$query = new WP_Query( array(
						'posts_per_page' => 20,
						'order' => 'DESC',
						'paged' => $current_page, // передаём текущую страницу сюда!
					) );
					while( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-6 lenta-item">
							<div class="text-wrap">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_shot_review_word(10); ?>
								<div class="time">
									<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div><!-- left -->
				<div class="row">
					<div class="col-md-12">
						<div class="paginate">
							<?php 
							echo paginate_links( array(
								'base' => site_url() . '%_%',
								'format' => '?pages=%#%',
								'total' => $query->max_num_pages,
								'current' => $current_page,
							) );

							wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->
		</div>
	</div>
</div>

<style>
	.lenta h3{
		font-weight: bold;
	}
	.lenta strong {
		font-weight: normal;
	}
	.lenta .text-wrap{
		border-radius: 4px;
		border-left: 1px solid #e5e5e5;
	}
</style>

<?php get_footer(); ?>