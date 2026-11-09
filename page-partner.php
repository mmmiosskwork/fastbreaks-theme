<?php
/**
 * Template Name: ライブ配信パートナー
 * 固定ページ「ライブ配信パートナー」（スラッグ partner）に自動適用
 */
get_header();
$partners = fb_partners();
?>
<section class="phero phero--plain">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'arena_purple.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div>
	<div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Partners</span></nav>
		<p class="label">Live Streaming Partners — 関西学生バスケットボール</p>
		<h1 class="display phero__title">Keep the<br><span class="gradtext">game on air.</span></h1>
		<p class="phero__jp">この4年間と、あの4年間を繋ぐ。</p>
		<p class="phero__lead">学生たちの熱量を世界へ届ける関西学生バスケットボールのライブ配信は、ライブ配信パートナーの皆さまのご支援により運営されています。</p>
		<div class="btn-row"><a class="pill pill--accent" href="https://www.fastbreaks.jp/partnership2026/">詳細・お申し込み</a><a class="pill pill--line" href="#partners">パートナー一覧</a></div>
	</div>
</section>

<section class="partners" id="partners" style="border-top:0;padding-top:120px">
	<div class="wrap">
		<div class="section-head">
			<div><p class="label">Our partners</p><p class="display display--jp section-head__en">ライブ配信パートナー</p></div>
			<p class="section-head__lead">配信の継続を支えてくださっている企業・団体様（順不同）。</p>
		</div>
		<ul class="partners__list">
			<?php foreach ( $partners as $p ) : ?>
				<li><a href="<?php echo esc_url( $p['url'] ); ?>" target="_blank" rel="noopener"><span class="label label--muted">Partner</span><span class="partners__name"><?php echo esc_html( $p['name'] ); ?></span><span class="partners__url"><?php echo esc_html( $p['host'] ); ?></span></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<section class="coverage" style="padding-top:40px">
	<p class="ghost ghost--right" aria-hidden="true">Why partner</p>
	<div class="wrap">
		<div class="section-head"><div><p class="label">Why partner with us</p><p class="display display--jp section-head__en">パートナーになると</p></div></div>
		<div class="cards3">
			<div class="card"><p class="display card__en c-blue">01</p><p class="card__title">全試合のライブ配信にロゴ・CMを掲出</p><p class="body-text">関西学生バスケ1部リーグ戦をはじめとする年間100試合超のライブ配信で、配信画面・告知投稿・現場看板に露出。Z世代とその保護者層に直接届きます。</p></div>
			<div class="card"><p class="display card__en c-indigo">02</p><p class="card__title">学生アスリートの4年間を支える</p><p class="body-text">高校時代に注目された選手が大学で見られなくなる現状を変える取り組みです。ご支援は配信機材・人件費・通信費に充てられ、全試合無料配信の継続につながります。</p></div>
			<div class="card"><p class="display card__en c-purple">03</p><p class="card__title">コンテンツでのタイアップ</p><p class="body-text">配信だけでなく、SNSショート動画・インタビュー・イベント連動企画など、FASTBREAKSの制作体制を活かしたタイアップコンテンツもご提案します。</p></div>
		</div>
	</div>
</section>

<section class="wrap" style="padding:0 var(--gutter) 140px">
	<div class="cta-inline" style="border:1px solid var(--line);padding:56px;display:grid;grid-template-columns:minmax(0,1fr) auto;gap:40px;align-items:center">
		<div>
			<p class="label">Become a partner</p>
			<p class="display section-head__en" style="font-size:56px;margin-top:12px">Join the <span class="gradtext">partners.</span></p>
			<p class="body-text" style="margin-top:16px">ライブ配信パートナーの概要・お申し込みは専用ページをご覧ください。個別のご相談はお問い合わせフォームからも受け付けています。</p>
		</div>
		<div class="btn-row"><a class="pill pill--accent" href="https://www.fastbreaks.jp/partnership2026/">詳細・お申し込み</a><a class="pill pill--line" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">相談する</a></div>
	</div>
</section>

<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
