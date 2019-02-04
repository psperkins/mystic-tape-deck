<?php get_header(); ?>

<section id="front-page">
	<div class="row margin-y intro shadow solid">
		<div class="col-sm-12">
<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<?php echo the_content(); ?>
<?php endwhile; endif; ?>
		</div>
	</div>
<?php
	$args = array(
		'post_type' => 'feature',
		'posts_per_page' => 3,
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	?>
	<div class="feature shadow">
	<h3><?php the_title(); ?></h3>
		<div class="thumb-container pull-left">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'teaser' );
			}
		?>
		</div>
	<?php	the_content(); ?>
	<div class="clearfix"></div>
	</div>
	<?php endwhile; endif; ?>

<?php
	$args = array(
		'post_type' => 'teaser',
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		$destination = get_post_meta( get_the_ID(), '_mtdt_teaser_link', true );
?>
		<div class="row margin-y clearfix teaser shadow preview">
			<div class="img-panel col-sm-12 col-lg-4 pull-left">
				<a href="<?php echo $destination; ?>">
				<?php
					if ( has_post_thumbnail() ) {
					    the_post_thumbnail( 'teaser' );
					}
				?>
				</a>
			</div>
			<div class="col-sm-12 col-lg-8 teaser-body">
				<h2><a href="<?php echo $destination; ?>"><?php the_title(); ?></a></h2>
				<?php echo the_content(); ?>
			</div>
		</div>
<?php endwhile; endif; ?>



</section>

<?php get_footer(); ?>
