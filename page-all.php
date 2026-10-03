<?php
/***
 *Template name: Бардыгы
 */
get_header(); ?>

<div class="main">
	<div class="container">
		<div class="row">
		    <div class="col-md-9">
		        <div class="lenta">
		        <?php
		        global $paged;
                $curpage = $paged ? $paged : 1;
                $args = array(
                    'post_type' => 'post',
                    'cat' => array(-3353,-5657),
                    'orderby' => 'post_date',
                    'posts_per_page' => 20,
                    'paged' => $paged
                );
                $query = new WP_Query($args);
                if($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                ?>
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
endwhile;
    echo '
    <div id="wp_pagination">
        <a class="first page button" href="'.get_pagenum_link(1).'">&laquo;</a>
        <a class="previous page button" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo;</a>';
        for($i=1;$i<=$query->max_num_pages;$i++)
            echo '';
        echo '
        <a class="next page button" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'">&rsaquo;</a>
        <a class="last page button" href="'.get_pagenum_link($query->max_num_pages).'">&raquo;</a>
    </div>
    ';
    wp_reset_postdata();
endif;
?>
		        
		    </div>	
		    

    </div>

			<div class="col-lg-3 col-md-3 right">
				<?php get_template_part( 'partials/sidebar'); ?>
					<div class="col-md-12 right mob-right">
					<?php get_template_part( 'partials/sidebar'); ?>
				</div><!-- right -->
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