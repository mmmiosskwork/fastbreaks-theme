</main>

<footer class="site-footer">
	<div class="wrap site-footer__grid">
		<div class="site-footer__brand">
			<img src="<?php echo fb_logo( 'white' ); ?>" alt="FASTBREAKS" width="150" height="43">
			<p class="site-footer__company">
				<?php echo esc_html( fb_opt( 'company_name' ) ); ?>
			</p>
			<p class="site-footer__addr">大阪本社：<?php echo esc_html( fb_opt( 'address_osaka' ) ); ?><br>東京支社：<?php echo esc_html( fb_opt( 'address_tokyo' ) ); ?></p>
		</div>
		<nav class="site-footer__nav" aria-label="フッターナビ">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'site-footer__list',
				'fallback_cb'    => function () {
					$items = array(
						'Service' => home_url( '/service/' ), 'Works' => get_post_type_archive_link( 'works' ),
						'About' => home_url( '/company/' ), 'Vision' => home_url( '/vision/' ), 'News' => fb_news_url(), 'Partners' => home_url( '/partner/' ),
						'Recruit' => home_url( '/recruit/' ), 'Contact' => home_url( '/contact/' ),
						'Privacy' => home_url( '/privacy-policy/' ),
					);
					echo '<ul class="site-footer__list">';
					foreach ( $items as $l => $u ) { echo '<li><a href="' . esc_url( $u ) . '">' . esc_html( $l ) . '</a></li>'; }
					echo '</ul>';
				},
				'depth' => 1,
			) );
			?>
		</nav>
		<ul class="site-footer__list site-footer__sns" aria-label="SNS">
			<?php foreach ( array( 'YouTube' => 'sns_youtube', 'Instagram' => 'sns_instagram', 'TikTok' => 'sns_tiktok', 'X' => 'sns_x', 'note' => 'sns_note' ) as $label => $key ) :
				if ( $u = fb_opt( $key ) ) : ?>
				<li><a href="<?php echo esc_url( $u ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $label ); ?></a></li>
			<?php endif; endforeach; ?>
		</ul>
	</div>
	<div class="wrap site-footer__bottom">
		<p>© <?php echo esc_html( gmdate( 'Y' ) ); ?> FASTBREAKS. ALL RIGHTS RESERVED.</p>
		<p class="site-footer__tagline">TRY. FAIL. FAST. BREAK. REPEAT.</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
