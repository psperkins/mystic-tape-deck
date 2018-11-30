<?php get_header(); ?>


<div class="preview shadow">
	<p>The following are the collected stories and myths regarding The Shining One.</p>
	<p>You may choose to read them from the chronological listing, or click the "timeline" tab to browse them as they lay out across a timeline.</p>
</div>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li><a href="#tab1" data-toggle="tab" class="active">List View</a></li>
    <li><a href="#tab2" data-toggle="tab">Timeline View</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
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
									$tlyear =  get_post_meta( get_the_ID(), '_timeline_year', true );
									?>
								</div>
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<ul class="postmeta">
									<li>Timeline Year: <?php echo $tlyear; ?> | </li>
									<li>Authored By: <?php the_author(); ?> | </li>
									<li><?php _e( 'Filed Under: ', 'newmtd' ); the_category(', ');?> | </li>
								</ul>
								<div class="clearfix"></div>
							</article>
						</div>
		<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</section>
    </div>
    <div class="tab-pane" id="tab2">
      <div id="timeline-embed" style="width: 100%; min-height: 600px"></div>
    </div>
  </div>
</div>

<?php
if ( function_exists( 'wp_bs_pagination' ) ) {
	wp_bs_pagination();
}
?>

<?php get_footer(); ?>
