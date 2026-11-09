<?php
/**
 * 共通CTA（お問い合わせ）
 * $args: title, lead, en
 */
$title = isset( $args['title'] ) ? $args['title'] : 'まずは、やりたいことをお聞かせください。';
$lead  = isset( $args['lead'] ) ? $args['lead'] : '配信・撮影・SNS運用のご相談、協賛・タイアップ、取材のご依頼はこちらから。';
$en    = isset( $args['en'] ) ? $args['en'] : "Let's change<br>the game together.";
?>
<section class="cta" id="contact-cta">
	<div class="cta__slash" aria-hidden="true"></div>
	<div class="wrap cta__inner">
		<p class="label">Contact</p>
		<p class="display cta__en <?php echo preg_match( '/[\x{3040}-\x{30ff}\x{4e00}-\x{9fff}]/u', wp_strip_all_tags( $en ) ) ? 'display--jp' : ''; ?>"><?php echo wp_kses_post( $en ); ?></p>
		<h2 class="cta__title"><?php echo esc_html( $title ); ?></h2>
		<p class="cta__lead"><?php echo esc_html( $lead ); ?></p>
		<div class="btn-row">
			<a class="pill pill--accent pill--lg" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせフォーム</a>
			<?php if ( fb_opt( 'email' ) ) : ?><a class="pill pill--line pill--lg pill--mail" href="mailto:<?php echo esc_attr( fb_opt( 'email' ) ); ?>"><?php echo esc_html( fb_opt( 'email' ) ); ?></a><?php else : ?><a class="pill pill--line pill--lg" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">採用情報</a><?php endif; ?>
		</div>
	</div>
</section>
