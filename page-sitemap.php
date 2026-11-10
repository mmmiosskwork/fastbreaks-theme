<?php
/**
 * サイトマップ（固定ページ「サイトマップ」スラッグ sitemap に自動適用）
 * 以前は VK Blocks Pro のサイトマップブロックで出していたが、プラグイン停止に合わせてテーマで生成する。
 */
get_header();
$fb_sm = array(
	'Company' => array(
		array( 'トップ', home_url( '/' ) ),
		array( '会社概要', home_url( '/company/' ) ),
		array( 'Vision', home_url( '/vision/' ) ),
		array( 'お知らせ', fb_news_url() ),
		array( 'よくある質問', home_url( '/faq/' ) ),
		array( 'お問い合わせ', home_url( '/contact/' ) ),
	),
	'Service' => array(
		array( 'サービス一覧', home_url( '/service/' ) ),
		array( 'ライブ配信', home_url( '/service/live-streaming/' ) ),
		array( '映像制作', home_url( '/service/video/' ) ),
		array( 'SNS運用・マーケティング', home_url( '/service/sns/' ) ),
		array( '自社メディア・スポンサードコンテンツ', home_url( '/service/media/' ) ),
		array( 'ライブ配信パートナー', home_url( '/partner/' ) ),
	),
	'Recruit' => array(
		array( '採用情報', home_url( '/recruit/' ) ),
		array( '学生インターン', home_url( '/recruit/internship/' ) ),
	),
	'Policy' => array(
		array( 'プライバシーポリシー', home_url( '/privacy-policy/' ) ),
	),
);
$fb_types = get_terms( array( 'taxonomy' => 'work_type', 'hide_empty' => true ) );
$fb_works = array( array( '実績一覧', get_post_type_archive_link( 'works' ) ) );
if ( $fb_types && ! is_wp_error( $fb_types ) ) { foreach ( $fb_types as $t ) { $fb_works[] = array( $t->name . 'の実績', get_term_link( $t ) ); } }
$fb_sm = array_slice( $fb_sm, 0, 2, true ) + array( 'Works' => $fb_works ) + array_slice( $fb_sm, 2, null, true );
?>
<article class="page-generic">
	<section class="phero phero--plain phero--work">
		<div class="wrap phero__inner">
			<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>サイトマップ</span></nav>
			<p class="label">Sitemap</p>
			<h1 class="work-single__title">サイトマップ</h1>
		</div>
	</section>
	<div class="wrap page-generic__wrap">
		<div class="sitemap-grid">
			<?php foreach ( $fb_sm as $group => $links ) : ?>
			<section class="sitemap-group">
				<p class="label"><?php echo esc_html( $group ); ?></p>
				<ul><?php foreach ( $links as $l ) : ?><li><a href="<?php echo esc_url( $l[1] ); ?>"><?php echo esc_html( $l[0] ); ?></a></li><?php endforeach; ?></ul>
			</section>
			<?php endforeach; ?>
		</div>
	</div>
</article>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
