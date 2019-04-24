<?php get_header(); ?>
<div class="row pad-y">
<div class="col-lg-8">
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
?>
<article class="shadow solid review archive">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<small>Posted <?php the_time('l, F jS, Y') ?>. <?php echo get_the_term_list( $post->ID, 'genre', 'Genres: ', ', ' ); ?>.</small>
	<hr/>
	<div class="row">
		<div class="article body">
			<div class="thumbnail">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'thumbnail' );
				}
				?>
			</div>
			<?php the_content(); ?>
		</div>
	</div>
</article>
<?php
endwhile;
endif;
?>
</div>
<div class="col-lg-4">
<?php get_sidebar(); ?>
</div>
</div>

<?php
get_footer();
