<?php wp_footer(); ?>
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
