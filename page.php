<?php
/**
 * 汎用固定ページ（プライバシーポリシー・サイトマップ等）
 * 上部はお知らせ・実績の詳細と同じ黒背景＋和文タイトル。本文はサイト幅の左端に揃えた読みやすい幅で。
 */
get_header();
$fb_en_map = array( 'privacy-policy' => 'Privacy Policy', 'sitemap' => 'Sitemap' );
while ( have_posts() ) : the_post();
	$slug = get_post_field( 'post_name', get_the_ID() );
	$en   = get_post_meta( get_the_ID(), 'fb_en_title', true );
	if ( ! $en && isset( $fb_en_map[ $slug ] ) ) { $en = $fb_en_map[ $slug ]; }
	?>
<article class="page-generic">
	<section class="phero phero--plain phero--work">
		<div class="wrap phero__inner">
			<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span><?php the_title(); ?></span></nav>
			<?php if ( $en ) : ?><p class="label"><?php echo esc_html( $en ); ?></p><?php endif; ?>
			<h1 class="work-single__title"><?php the_title(); ?></h1>
		</div>
	</section>
	<div class="wrap page-generic__wrap">
		<div class="entry-content page-generic__body"><?php the_content(); ?></div>
	</div>
</article>
<?php endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
