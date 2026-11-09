<?php
/**
 * ニュースのカバー画像（アイキャッチがなければ共通のベーシックなカバー）
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
