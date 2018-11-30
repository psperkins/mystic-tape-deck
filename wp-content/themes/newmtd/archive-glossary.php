<?php


get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$related = get_post_meta( get_the_ID(), 'related_attached_posts', true );
		$gtypes = get_the_terms( get_the_ID(), 'glossarytype');
?>
<article class="shadow solid archive">
	<h2><?php the_title(); ?></h2>
	<span class="glossary-meta">
			<?php
				foreach ($gtypes as $gtype ) :
					echo " (" . get_the_term_list( $post->ID, 'glossarytype', 'Type: ', ', ' ) . ")";
				endforeach;

			?>
	</span>
	<hr/>
	<div class="article body">
	<?php the_content(); ?>
	</div>
	<div class="related clearfix">
			<?php
			if ( ! empty( $related ) ) :
				echo '<hr/>
					<h4>Appears In:</h4>
						<ul class="appears-in">';
				foreach ( $related as $related_post ) {
					$post = get_post( $related_post );
					echo '<li><a href="' . get_permalink( $post->ID ) . '">' . esc_html( $post->post_title ) . '</a></li>';
				}
				echo '</ul>';
			endif;
			?>
		</ul>
	</div>
</article>
<?php
endwhile;
endif;

if (function_exists("wp_bs_pagination"))
    {
         //wp_bs_pagination($the_query->max_num_pages);
         wp_bs_pagination();
}

get_footer();
