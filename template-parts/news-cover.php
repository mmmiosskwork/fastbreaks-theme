<?php
/**
 * ニュースのカバー：記事のアイキャッチ（元の設定）を使用。未設定の記事だけ共通のベーシックなカバー
 */
$cat = get_the_category();
?>
<span class="ncover">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'fb-card', array( 'loading' => 'lazy' ) ); ?>
	<?php else : ?>
		<span class="ncover__default"><img src="<?php echo fb_logo( 'white' ); ?>" alt="" loading="lazy"><span class="ncover__cat"><?php echo $cat ? esc_html( $cat[0]->name ) : 'News'; ?></span></span>
	<?php endif; ?>
</span>
