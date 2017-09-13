<?php
/**
 * @file The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 * @package MysticTapeDeck
 */

?>

		</section>
		<?php if ( is_single() ) : ?>
		<div id='timeline-embed' style="width: 100%; min-height: 600px"></div>
		<?php endif; ?>
		<div id="footer-container">
			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php
					dynamic_sidebar( 'footer-left' );
					dynamic_sidebar( 'footer-center' );
					dynamic_sidebar( 'footer-right' );

				?>
				<?php do_action( 'foundationpress_after_footer' ); ?>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>
<?php

$list = file_get_contents( 'https://mystictapedeck.com/wp-json/timeline/v1/posts' );
$json = json_decode( $list );
$events = $json->events;
$postid = get_the_ID();
$comparr = [];

foreach ( $events as $key => $event ) {
	$pid = $event->postid;
	$comparr[ $key ] = $pid;
}

$match = array_search( $postid, $comparr );
if ( false != $match ) {
	$match = $match;
} else {
	$match = '0';
}

if ( is_single() ) :
?>

<script type="text/javascript">
	(function($) {
		var options = {
			default_bg_color: '#eaeaea',
			scale_factor: 0.5,
			height: 1280,
			timenav_height: 340,
			start_at_slide: <?php echo (int) $match + 1; ?>
		}
		var timeline = new TL.Timeline('timeline-embed','https://mystictapedeck.com/wp-json/timeline/v1/posts', options);
	})(jQuery);
</script>
<?php endif; ?>

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
