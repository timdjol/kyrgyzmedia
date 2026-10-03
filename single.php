<?php get_header(); ?>

<div class="single page">
	<div class="container">
		<div class="row">
			<div class="col-md-9 left gallery">
				<div class="breadcrumbs">
					<?php if(function_exists('bcn_display'))
					{
						bcn_display();
					}?>
				</div>
				<div class="heading">
					<h1><?php the_title(); ?></h1>
				</div>
				<div class="time">
					<?php the_time('j'); echo ' '; the_time('F'); echo ' '; the_time('Y'); echo ' жыл '; the_time('G:i');?>
				</div>
				<div class="view"><i class="fa fa-eye"></i> Көрүүлөрдүн саны: <?php $view = pvc_get_post_views( $post->ID ); echo $view;?></div>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="cont"><?php the_content(); ?></div>
					<div class="code"><?php the_field('news-code'); ?></div>
					<div class="code"><?php the_field('news-code1'); ?></div>
				<?php endwhile; ?>
				<?php else: ?>
				<?php endif; ?>
				<div class="share">
					<?php echo do_shortcode('[addtoany]'); ?>
				</div><!-- share -->
				<?php if(has_tag()) {?>
					<div class="tags"><i class="fa fa-tags"></i> Теги: <?php the_tags( '<ul><li>','</li><li>','</li></ul>');?></div>
				<?php }?>
				
				
				    <a href="https://kyrgyzmedia.kg/zhamaattyk-mediany-koldoo/"><div class="payment"></div></a>
				
				
				<div class="btn">
					<?php previous_post_link('%link', '<< Мындан мурунку макала', true); ?>
				</div>
				<div class="btn">
					<?php next_post_link('%link', 'Мындан кийинки макала >>', true); ?>
				</div>

				<div class="related">
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Тема боюнча</h2>
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
													<?php the_post_thumbnail('bigcategory');?>
												</a>
											<?php } 
											else{
												if ( has_post_thumbnail() ) { ?>
													<a href="<?php the_permalink(); ?>">
														<div class="img" style="background-image: url(<?php echo get_the_post_thumbnail_url()?>)"></div>

													</a>
													<?php   
												}
												else { ?>
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/no-image.png">
													</a>
												<?php }
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
					$defaults = [
						'fields'               => [
							'author' => '<p class="comment-form-author">
							<label for="author">' . '*Атыңыз' . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>
							<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
							</p>',
							'email'  => '<p class="comment-form-email">
							<label for="email">' . __( '*Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> 
							<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
							</p>',
							'cookies' => '<p class="comment-form-cookies-consent">'.
							sprintf( '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', $consent ) .'
							<label for="wp-comment-cookies-consent">'. __( 'Save my name, email, and website in this browser for the next time I comment.' ) .'</label>
							</p>',        
						],
						'comment_field'        => '<p class="comment-form-comment">
						<label for="comment">' . '*Сиздин ой-пикириниз' . '</label>
						<textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
						</p>',
						'must_log_in'          => '<p class="must-log-in">' . 
						sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
						</p>',
						'logged_in_as'         => '<p class="logged-in-as">' . 
						sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '
						</p>',
						'comment_notes_before'  => 'Сиздин дарегиңиз же email жарыяланбайт. Милдеттүү талаалар *белгиси менен белгиленген',
						'id_form'              => 'commentform',
						'id_submit'            => 'submit',
						'class_form'           => 'comment-form',
						'class_submit'         => 'submit',
						'name_submit'          => 'submit',
						'title_reply'          => __( 'Пикир калтыруу' ),
						'title_reply_to'       => __( 'Leave a Reply to %s' ),
						'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</h3>',
						'cancel_reply_before'  => ' <small>',
						'cancel_reply_after'   => '</small>',
						'cancel_reply_link'    => __( 'Cancel reply' ),
						'label_submit'         => __( 'Пикирди жөнөтүү' ),
						'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
						'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
						'format'               => 'xhtml',
					];

					comment_form( $defaults );
					?>
				</div>
			</div><!-- left -->

			<div class="col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
			</div><!-- right -->
		</div>
		<div class="row">
			<div class="col-md-12 right mob-right">
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
    .page div.df-ui-nav, .page div{
        width: auto !important;
    }
</style>



<?php get_footer(); ?>