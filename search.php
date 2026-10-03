<?php get_header(); ?>

<div class="title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h1>Издөө</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="archive page search">
	<div class="container">
		<div class="row">
			<div class="col-md-9 left">
				<div class="row lenta">
				<h2>"<?php echo $_GET['s'];?>"</h2>
				<?php
				$args = array_merge( $wp_query->query, array( 'post_type' => "post") );
				query_posts($args); ?>
				<?php if ( have_posts() ) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="col-md-12 search-item">
							<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						</div>
					<?php endwhile; else: ?>
					<h3>Издөө жыйынтык берген жок</h3>
				<?php endif;?>
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

<?php get_footer(); ?>