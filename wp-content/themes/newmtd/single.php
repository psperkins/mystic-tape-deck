<?php


get_header();
?>
<article class="shadow solid archive">
	<h2><?php the_title(); ?></h2>
	<?php
	if( have_posts() ) : while( have_posts() ) : the_post();
	$attached = get_post_meta( get_the_ID(), 'related_song_attached_songs', true );
	foreach ( $attached as $attached_post ) {
		$song = get_post( $attached_post );
		echo $song->post_content;
		//echo "<pre>"; var_dump($song); die();
	}
	?>
	<div class="article body">
	<?php the_content(); ?>
	</div>
</article>
<?php
endwhile;
endif;

get_footer();
