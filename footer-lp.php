</main>

<?php /* LP 専用フッター：会社情報と最小限のリンクだけ */ ?>
<footer class="site-footer lp-footer">
	<div class="wrap lp-footer__inner">
		<div class="site-footer__brand">
			<img src="<?php echo fb_logo( 'white' ); ?>" alt="FASTBREAKS" width="150" height="43">
			<p class="site-footer__company"><?php echo esc_html( fb_opt( 'company_name' ) ); ?></p>
			<p class="site-footer__addr">大阪本社：<?php echo esc_html( fb_opt( 'address_osaka' ) ); ?><br>東京支社：<?php echo esc_html( fb_opt( 'address_tokyo' ) ); ?></p>
		</div>
		<ul class="lp-footer__links">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">会社サイト</a></li>
			<li><a href="<?php echo esc_url( home_url( '/service/live-streaming/' ) ); ?>">ライブ配信サービスの詳細</a></li>
			<li><a href="<?php echo esc_url( home_url( '/works/type/live/' ) ); ?>">配信実績</a></li>
			<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">プライバシーポリシー</a></li>
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
