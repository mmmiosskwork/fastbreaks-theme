<?php
/**
 * Template Name: サービス一覧
 * 固定ページ「サービス」（スラッグ service）に自動適用
 */
get_header();
$show_prices = '1' === (string) fb_opt( 'show_prices' );
$services = array(
	array( 'num' => '01', 'en' => 'Live Streaming & Video', 'jp' => 'ライブ配信・映像制作', 'desc' => 'マルチカメラ・リプレイ・リアルタイムスタッツ表示・実況解説まで少人数で完結する配信チームと、ハイライト・縦型ショート・ドキュメンタリーの制作。', 'url' => home_url( '/service/live-streaming/' ), 'img' => 'operator_court.jpg', 'price' => fb_price( 'price_live' ), 'unit' => '配信 / 1日', 'c' => 'c-blue' ),
	array( 'num' => '02', 'en' => 'SNS & Marketing', 'jp' => 'SNS運用・コンテンツマーケティング', 'desc' => '「ファンを熱狂させるメディア運営」のノウハウをBPO形式で。企画・撮影・編集・投稿・分析まで一括。', 'url' => home_url( '/service/sns/' ), 'img' => 'switcher_laptop.jpg', 'price' => fb_price( 'price_sns' ), 'unit' => '運用 / 月', 'c' => 'c-indigo' ),
	array( 'num' => '03', 'en' => 'Media & Sponsored', 'jp' => '自社メディア・スポンサードコンテンツ', 'desc' => '関西最大級の学生バスケメディア『FASTBREAKS』で、試合の熱量や選手の物語に溶け込むタイアップ企画を設計。', 'url' => home_url( '/service/media/' ), 'img' => 'team_huddle.jpg', 'price' => fb_price( 'price_media' ), 'unit' => '企画 / 1本', 'c' => 'c-purple' ),
);
?>
<section class="ptitle">
	<p class="ghost" aria-hidden="true">Service</p>
	<div class="wrap">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Service</span></nav>
		<div class="section-head"><div><p class="label">Service</p><h1 class="display ptitle__title">Live. Video.<br><span class="gradtext">Social.</span></h1><p class="phero__jp">配信も、映像も、SNSも。現場を知るチームが一気通貫で。</p></div><p class="section-head__lead">プロクラブ・連盟・大会主催者・学校・企業のスポーツコンテンツを、企画から配信・分析まで自社で完結します。<?php if ( $show_prices ) : ?>価格は税別・目安です。<?php endif; ?></p></div>
	</div>
</section>
<section class="wrap" style="padding-bottom:120px">
	<?php foreach ( $services as $i => $s ) : ?>
	<a class="svc <?php echo $i % 2 ? 'svc--rev' : ''; ?>" href="<?php echo esc_url( $s['url'] ); ?>">
		<figure class="svc__fig"><img src="<?php echo fb_img( $s['img'] ); ?>" alt="" loading="lazy"></figure>
		<div class="svc__body">
			<span class="display svc__num <?php echo esc_attr( $s['c'] ); ?>"><?php echo esc_html( $s['num'] ); ?></span>
			<span class="display svc__en"><?php echo esc_html( $s['en'] ); ?></span>
			<span class="svc__jp"><?php echo esc_html( $s['jp'] ); ?></span>
			<span class="body-text"><?php echo esc_html( $s['desc'] ); ?></span>
			<?php if ( $show_prices && $s['price'] ) : ?><span class="svc__price"><span class="display"><?php echo esc_html( $s['price'] ); ?>〜</span><small><?php echo esc_html( $s['unit'] ); ?></small></span><?php endif; ?>
			<span class="arrow-link">詳しく見る <span aria-hidden="true">→</span></span>
		</div>
	</a>
	<?php endforeach; ?>
</section>
<?php /* 旧サービスページ本文は新テンプレートで置き換え済みのため非表示 */ ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
