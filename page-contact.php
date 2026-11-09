<?php
/**
 * Template Name: お問い合わせ
 * 固定ページ「お問い合わせ」（スラッグ contact）に自動適用
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<section class="ptitle">
	<p class="ghost" aria-hidden="true">Contact</p>
	<div class="wrap">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Contact</span></nav>
		<div class="section-head"><div><p class="label">Contact</p><h1 class="display ptitle__title">Let's talk.</h1><p class="phero__jp">まずは、試合の日程とやりたいことを教えてください。</p></div><p class="section-head__lead">配信・撮影・SNS運用のご相談、協賛・タイアップ、取材のご依頼はこちらから。2営業日以内にご返信します。<?php if ( fb_opt( 'email' ) ) : ?>お急ぎの場合は <a href="mailto:<?php echo esc_attr( fb_opt( 'email' ) ); ?>"><?php echo esc_html( fb_opt( 'email' ) ); ?></a> へ。<?php endif; ?></p></div>
	</div>
</section>
<section class="wrap contact-grid">
	<div class="contact-form">
		<?php $content_has_form = false !== strpos( get_the_content(), '[contact-form-7' ); if ( ! $content_has_form && ( $sc = fb_opt( 'contact_shortcode' ) ) ) : echo do_shortcode( $sc ); elseif ( ! $content_has_form ) : ?>
			<div class="notice-box"><p>フォームプラグイン（Contact Form 7 など）を有効化し、「設定 → FASTBREAKS サイト設定 → お問い合わせ」にショートコードを登録すると、ここにフォームが表示されます。</p><p>それまでは <a href="mailto:<?php echo esc_attr( fb_opt( 'email' ) ); ?>"><?php echo esc_html( fb_opt( 'email' ) ); ?></a> までメールでご連絡ください。</p></div>
		<?php endif; ?>
		<?php if ( trim( get_the_content() ) ) : ?><div class="entry-content"><?php the_content(); ?></div><?php endif; ?>
	</div>
	<aside class="contact-side">
		<p class="label">Flow</p>
		<ol class="steps steps--vertical">
			<li><span class="display c-blue">01</span><strong>ご相談</strong><span>フォームから日程・やりたいことを送信</span></li>
			<li><span class="display c-blue">02</span><strong>お見積り</strong><span>2営業日以内に概算と体制をご提案</span></li>
			<li><span class="display c-indigo">03</span><strong>打ち合わせ</strong><span>オンラインまたは会場で詳細を確認</span></li>
			<li><span class="display c-purple">04</span><strong>制作・配信</strong><span>当日の運用から納品・レポートまで</span></li>
		</ol>
		<p class="label" style="margin-top:40px">Office</p>
		<p class="body-text">大阪本社：<?php echo esc_html( fb_opt( 'address_osaka' ) ); ?><br>東京支社：<?php echo esc_html( fb_opt( 'address_tokyo' ) ); ?></p>
	</aside>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>
