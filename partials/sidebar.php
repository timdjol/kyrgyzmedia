<div class="sticky">
	<div class="recom">
		<div class="row">
			<div class="col-md-12">
			    <div class="calend">
						<div class="text"><?php echo getDayKg(); echo '<br>';echo getDateKg(); ?></div>
					</div>
					
			    <div class="video d-xl-block d-lg-block d-none">
            	    <iframe width="100%" height="220" src="https://www.youtube.com/embed/<?php the_field('id_youtube', 37878);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            	</div>

				<a href="http://covid.kyrgyzmedia.kg">
					<div class="covid covid-head" style="margin-bottom: 20px">
						<div class="text">Жамааттык Медиа COVID-19 га каршы</div>
					</div>
				</a>
				
				<div class="video d-xl-block d-lg-block d-none">
            	    <iframe width="100%" height="220" src="https://www.youtube.com/embed/<?php the_field('id_youtube2', 37878);?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            	</div>
            	
            	<a href="https://kyrgyzmedia.kg/category/top10/">
            	    <div class="calend topmak"><?php the_field('top10')?></div>
            	</a>
				
			</div>
		</div>
	</div><!-- recom -->
	
	<a href="https://kyrgyzmedia.kg/pomoch-proektu/">
	    <div class="help" style="display: none;">Помочь проекту</div>
	</a>
	
	
	
	<style>
	    .help{
	        padding: 20px 0;
            text-align: center;
            background-color: #034c82;
            margin-top: 20px;
            color: #fff;
	        font-size: 20px;
	        -webkit-transition: all .3s ease;
	        -moz-transition: all .3s ease;
	        -ms-transition: all .3s ease;
	        -o-transition: all .3s ease;
	        transition: all .3s ease;
	        text-decoration: none;
	        -webkit-box-shadow: 0 0 10px rgb(0 0 0 / 54%);
	        -moz-box-shadow: 0 0 10px rgb(0 0 0 / 54%);
	        box-shadow: 0 0 10px rgb(0 0 0 / 54%);
	    }
	    .help:hover{
	        text-decoration: none;
	        background-color: #02365d;
	    }
	</style>


	<div class="opros">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">
					<h2>Сурамжылоо</h2>
				</div>
				<?php 
				$opros = get_field('opros', 'option');
				get_poll($opros); ?> 
				
				<div class="btn-wrap">
					<a href="http://kyrgyzmedia.kg/suramzhyloo/">Башка сурамжылоолор</a>
				</div>
			</div>
		</div>
	</div>

</div>

