<?php
/**
 * ニュースのカバー（全記事共通のベーシックなカバーで統一）
 */
$cat = get_the_category();
?>
<span class="ncover">
	<span class="ncover__default"><img src="<?php echo fb_logo( 'white' ); ?>" alt="" loading="lazy"><span class="ncover__cat"><?php echo $cat ? esc_html( $cat[0]->name ) : 'News'; ?></span></span>
</span>
