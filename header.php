<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( $gtm = fb_opt( 'gtm_id' ) ) : ?>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( $gtm ); ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php endif; ?>
<a class="skip" href="#main">本文へ</a>

<header class="site-header" id="site-header">
	<div class="site-header__inner">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( fb_opt( 'company_name' ) ); ?> ホーム">
			<img src="<?php echo fb_logo( 'white' ); ?>" alt="FASTBREAKS" width="160" height="46">
		</a>
		<nav class="nav" id="nav" aria-label="グローバルナビ">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav__list',
				'fallback_cb'    => 'fb_nav_fallback',
				'depth'          => 1,
			) );
			?>
			<a class="pill pill--accent nav__cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
		</nav>
		<button class="nav-toggle" type="button" aria-controls="nav" aria-expanded="false" aria-label="メニューを開く">
			<span></span><span></span>
		</button>
	</div>
</header>

<main id="main" class="site-main">
