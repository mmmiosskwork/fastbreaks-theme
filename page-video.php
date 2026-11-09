<?php
/**
 * Template Name: 映像制作（サービス詳細）
 * 固定ページ スラッグ video に自動適用
 */
get_header();
$show_prices = '1' === (string) fb_opt( 'show_prices' );
$menu = array(
	array( '試合ハイライト', '3〜5分。配信素材から編集、テロップ・BGM込み', '¥50,000〜', '本' ),
	array( '縦型ショート動画', '15〜60秒。即日納品対応。月10本パックあり', '¥30,000〜', '本' ),
	array( 'インタビュー・プロモーション動画', '企画・撮影半日・編集。2〜5分', '¥250,000〜', '本' ),
	array( 'ドキュメンタリー', '長期密着・20〜40分。ショート・記事への展開込み', '¥800,000〜', '本' ),
	array( '大会・イベントの記録撮影', 'スチル＋動画、1日', '¥100,000〜', '日' ),
);
?>
<section class="phero">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'team_huddle.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div><div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">Service</a><span>／</span><span>映像制作</span></nav>
		<p class="label">Service 01 — Creative Production</p>
		<h1 class="display phero__title">Video<br><span class="gradtext">Production</span></h1>
		<p class="phero__jp">ひとつの熱源を、多様な物語に展開する。</p>
		<p class="phero__lead">ライブ配信素材を起点に、YouTube長尺・縦型ショート・note記事へ多層的に展開。縦型ショート1本で300万回再生、長尺ドキュメンタリーがシグネチャーコンテンツになる——競技文脈とSNSトレンドを掛け合わせた構成力で、ファンを獲得します。</p>
		<div class="btn-row"><a class="pill pill--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">ご相談・お見積り</a><a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">制作実績</a></div>
	</div>
</section>
<section class="coverage"><p class="ghost ghost--right" aria-hidden="true">What we make</p><div class="wrap">
	<div class="section-head"><div><p class="label">Menu</p><p class="display display--jp section-head__en">制作メニュー<?php if ( $show_prices ) : ?>と価格<?php endif; ?></p></div><?php if ( $show_prices ) : ?><p class="section-head__lead">価格はすべて税別・目安です。撮影日数・納期・二次利用範囲により変動します。</p><?php endif; ?></div>
	<div class="service__rows" style="border-bottom:1px solid var(--line)">
		<?php foreach ( $menu as $i => $m ) : ?>
		<a class="srow" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><span class="srow__num display"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span><span class="srow__body"><span class="srow__en display display--jp" style="font-size:24px"><?php echo esc_html( $m[0] ); ?></span><span class="srow__jp"><?php echo esc_html( $m[1] ); ?></span></span><?php if ( $show_prices ) : ?><span class="srow__price"><span class="display"><?php echo esc_html( $m[2] ); ?></span><small>／ <?php echo esc_html( $m[3] ); ?></small></span><?php endif; ?><span class="srow__arrow display" aria-hidden="true">→</span></a>
		<?php endforeach; ?>
	</div>
</div></section>
<section class="wrap" style="padding:120px var(--gutter);border-top:1px solid var(--line)">
	<div class="section-head"><div><p class="label">Strengths</p><p class="display display--jp section-head__en">コンテンツ制作の特徴</p></div></div>
	<div class="cards3">
		<div class="card"><p class="display card__en c-blue">01</p><p class="card__title">競技文脈×トレンドのナラティブな演出</p><p class="body-text">「なぜ勝ったのか（構造批評）」と「選手がどんな想いだったのか（個人ストーリー）」を掛け合わせ、SNSトレンドやプラットフォームに合わせて最適化します。</p></div>
		<div class="card"><p class="display card__en c-indigo">02</p><p class="card__title">企画から分析まで独力で完結</p><p class="body-text">企画・撮影からSNS戦略、分析まで自社で完結。撮影→即日編集→投稿→横展開のテンプレ化で、最速のPDCAを回します。</p></div>
		<div class="card"><p class="display card__en c-purple">03</p><p class="card__title">動画から記事、ショートまでマルチチャネル</p><p class="body-text">YouTube長尺・縦型ショート・note記事へ、ひとつの熱源を多層展開。拡散による認知拡大からコア層のエンゲージメント醸成まで設計します。</p></div>
	</div>
</section>
<?php $vid = get_term_by( 'slug', 'video', 'work_type' ); $q = new WP_Query( array( 'post_type' => 'works', 'posts_per_page' => 3, 'tax_query' => $vid ? array( array( 'taxonomy' => 'work_type', 'field' => 'slug', 'terms' => 'video' ) ) : array() ) ); if ( $q->have_posts() ) : ?>
<section class="works-home"><div class="wrap"><div class="section-head"><div><p class="label">Works — Video</p><p class="display display--jp section-head__en">制作実績</p></div><a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">All works</a></div><div class="works-grid works-grid--3"><?php while ( $q->have_posts() ) : $q->the_post(); get_template_part( 'template-parts/work-card', null, array( 'size' => 'md' ) ); endwhile; wp_reset_postdata(); ?></div></div></section>
<?php endif; ?>
<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta', null, array( 'en' => '映像の相談をする', 'title' => '撮りたいもの、届けたい相手を教えてください。', 'lead' => '企画段階からご一緒します。概算は2営業日以内にお返しします。' ) ); ?>
<?php get_footer(); ?>
