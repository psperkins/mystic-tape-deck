<?php get_header(); ?>

<section id="category">
	<div class="container">
		<div class="row margin-y intro">
			<div class="col-sm-12">
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<div class="article preview shadow">
					<article>
						<div class="thumbnail">
							<?php
								if ( has_post_thumbnail() ) {
								    the_post_thumbnail( 'thumbnail' );
								}
							?>
						</div>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="clearfix"></div>
					</article>
				</div>
<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
