<?php


get_header();

if( have_posts() ) : while( have_posts() ) : the_post();
	$drooble = get_post_meta( get_the_ID(), '_song_drooble_link', true );
	$bandcamp = get_post_meta( get_the_ID(), '_song_bandcamp_link', true );
	$musicoin = get_post_meta( get_the_ID(), '_song_musicoin_link', true );
	$reverb = get_post_meta( get_the_ID(), '_song_reverbnation_link', true );

	$links = [];
	$links['bc'] = $bandcamp;
	$links['dr'] = $drooble;
	$links['mc'] = $musicoin;
	$links['rn'] = $reverb;

	//echo get_the_ID(); die();
	$attached = get_post_meta( get_the_ID(), 'related_attached_posts', true );

?>
<article class="shadow solid archive">
	<h2><?php the_title(); ?></h2>
	<div class="article body">
	<?php the_content(); ?>
	</div>
	<div class="songmeta">
		<?php
			if($attached) :
				foreach ( $attached as $attached_post ) :
					$att = get_post( $attached_post );
					$plink = get_the_permalink($attached_post);
		?>
		<a href="<?php echo $plink; ?>" class="btn btn-primary btn-sm">Lyrics & Mythology</a>
	<?php endforeach; endif; ?>
	</div>
	<div class="musiclinks clearfix">
	<?php
		foreach ($links as $key => $link) {
			echo "<a class='musiclink " . $key . "' href='" . $link . "'></a>";
		}
	?>
	</div>
</article>
<?php
endwhile;
endif;

get_footer();
