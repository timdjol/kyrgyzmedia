<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
				<div class="heading">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="single page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 left gallery">
				<div class="time"><?php the_time('j F Y'); echo ' в '; the_time('G:i'); ?></div>
				<div class="view"><i class="fa fa-eye"></i> Количество просмотров: <?php $view = pvc_get_post_views( $post->ID ); echo $view;?></div>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="cont"><?php the_content(); ?></div>
				<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
				<div class="share">
					<?php echo do_shortcode('[addtoany]'); ?>
				</div><!-- share -->
				<?php if(has_tag()) {?>
					<div class="tags"><i class="fa fa-tags"></i> Теги: <?php the_tags( '<ul><li>','</li><li>','</li></ul>');?></div>
				<?php }?>
				
				<a href="https://ru.kyrgyzmedia.kg/pomoch-proektu/"><div class="payment"></div></a>
				
				<div class="btn">
					<?php previous_post_link('%link', '<< Предыдущая новость', true); ?>
				</div>
				<div class="btn">
					<?php next_post_link('%link', 'Следующая новость >>', true); ?>
				</div>


				<div class="related">
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>По теме</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<?php $tags = wp_get_post_tags($post->ID);
						if ($tags) {
							$tag_ids = array();
							foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
							$args=array(
								'tag__in' => $tag_ids,       
								//'orderby'=>date,                
								'ignore_sticky_posts'=>1,            
								'post__not_in' => array($post->ID),
								'showposts' => 2                    
							);
							$my_query = new wp_query($args);
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) {
									$my_query->the_post(); ?>
									<div class="col-md-4 col-6">
										<div class="related-item">
											<?php 
											if( has_post_format( 'video' ) ) { ?>
												<a href="<?php the_permalink(); ?>">
														<?php the_post_thumbnail('category');?>
												</a>
											<?php } 
											else{
												if ( has_post_thumbnail() ) { ?>
													<a href="<?php the_permalink(); ?>">
														<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>
													</a>
													<?php   
												}
												else {
													echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
													. '/img/no-image.png">';
												}
											}
											?>
											<div class="text-wrap">
												<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											</div>
										</div>
									</div><!-- related-item -->
								<?php }
							}
							wp_reset_query();
						} ?>
					</div>
				</div><!-- related -->
				
				<div class="comments">
					<?php 
					$args = array(
	// изменяем текст кнопки отправки 
						
	// удаляем сообщение со списком разрешенных HTML-тегов из-под формы комментирования
						'comment_notes_after' => '',
	// указываем собственный HTML-код для вывода поля комментария
						'comment_field' => '<p class="comment-form-comment"><label for="comment">Ваш комментарий</label><br /><textarea rows="5" id="comment" name="comment" aria-required="true"></textarea></p>',
					);
					comment_form( $args ); ?>
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

<style>
    .img{
        -webkit-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 160px;
        height: 30vh;
    }
    .payment{
    background-image: url(https://ru.kyrgyzmedia.kg/wp-content/themes/kyrgyzmediaru/img/leyka.jpeg);
    -webkit-background-size: cover;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 30vh;
    min-height: 200px;
    margin: 20px 0;
}
</style>

<?php get_footer(); ?>