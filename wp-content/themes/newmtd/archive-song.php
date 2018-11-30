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

?>
<article class="shadow solid archive">
	<h2><?php the_title(); ?></h2>
	<div class="article body">
	<?php the_content(); ?>
	</div>
	<div class="songmeta">
		<a href="<?php echo get_the_permalink(); ?>" class="btn btn-primary btn-sm">Lyrics & Mythology</a>
	</div>
	<div class="musiclinks clearfix">
	<?php
		foreach ($links as $key => $link) {
			if(!empty($link)) {
				echo "<a class='musiclink " . $key . "' href='" . $link . "'></a>";
			}
		}
	?>
	</div>
</article>
<?php
endwhile;
endif;

get_footer();
