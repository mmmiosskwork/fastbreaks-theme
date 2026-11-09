<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class( 'is-lp' ); ?>>
<?php wp_body_open(); ?>
<?php if ( $gtm = fb_opt( 'gtm_id' ) ) : ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>
<a class="skip" href="#main">本文へ</a>

<?php /* LP 専用ヘッダー：会社サイトのメニューは出さず、ページ内リンクと相談ボタンだけ */ ?>
<header class="site-header lp-header" id="site-header">
	<div class="site-header__inner">
		<a class="brand" href="#top" aria-label="ページの先頭へ">
			<img src="<?php echo fb_logo( 'white' ); ?>" alt="FASTBREAKS" width="160" height="46">
		</a>
		<nav class="lp-header__nav" aria-label="ページ内リンク">
			<a href="#plans">料金</a>
			<a href="#works">実績</a>
			<a href="#faq">よくある質問</a>
		</nav>
		<a class="pill pill--accent lp-header__cta" href="#contact">お見積り・ご相談</a>
	</div>
</header>

<main id="main" class="site-main">
