<?php wp_footer(); ?>
<?php if(is_category('stories')) : ?>
<script>
window.onload = function() {
	document.getElementById('tab2').addEventListener("click", loadTL());
}
function loadTL() {
	var options = {
			default_bg_color: '#a6a6a6',
			height: 200,
			initial_zoom: 0,
			slide_padding_lr: 30,
			is_embed: false,
			start_at_slide: 0
		}
	var timeline = new TL.Timeline('timeline-embed','https://mystictapedeck.com/wp-json/timeline/v1/posts', options);
}
</script>
<?php endif; ?>
</div> <!-- /container -->
	<footer>
		<div id="footer">
			<div class="container">
				<div class="fb-page" data-href="https://www.facebook.com/mystictapedeck" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/mystictapedeck" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/mystictapedeck">Mystic Tape Deck</a></blockquote></div>
				<div class="social-menu">
					 <?php
						wp_nav_menu( array(
						    'theme_location' => 'mtd_social',
						    'menu_class'	=> 'social-nav',
						    'container_class' => 'socialmenu',
						) );
					?>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>
