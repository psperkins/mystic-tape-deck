<?php
get_header();
if( have_posts() ) : while( have_posts() ) : the_post();
?>
<article class="shadow solid archive">
	<h2><?php the_title(); ?></h2>
	<div class="article body">
	<?php the_content(); ?>
	</div>
</article>
<?php
endwhile;
endif;
get_footer();
