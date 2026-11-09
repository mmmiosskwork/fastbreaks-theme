<?php
/**
 * Template Name: SNS運用（サービス詳細）
 * 固定ページ スラッグ sns に自動適用
 */
get_header();
$show_prices = '1' === (string) fb_opt( 'show_prices' );
?>
<section class="phero">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'switcher_laptop.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div><div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">Service</a><span>／</span><span>SNS運用</span></nav>
		<p class="label">Service 02 — Marketing Solution</p>
		<h1 class="display phero__title">SNS &amp;<br><span class="gradtext">Marketing</span></h1>
		<p class="phero__jp">「ファンを熱狂させるメディア運営」を、御社のアカウントで。</p>
		<p class="phero__lead">自社メディアで年間3,352万回再生・フォロワー総数39,436を生んだ運用設計を、プロクラブ・連盟・企業にBPO形式で提供します。企画・撮影・編集・投稿・分析まで一括、または運用サポートのみ。</p>
		<div class="btn-row"><a class="pill pill--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">ご相談・お見積り</a></div>
	</div>
</section>
<section class="facts" aria-label="自社メディアの実績"><div class="wrap facts__grid">
	<div class="facts__head"><p class="label">Proof</p><p class="display facts__en">Our own<br>numbers</p><p class="facts__note">自社メディア『FASTBREAKS』2025年実績</p></div>
	<ul class="facts__list">
		<li class="fact"><p class="fact__num display"><span class="gradtext">3,352</span><span class="fact__unit">万</span></p><p class="fact__label">年間再生回数（2025）</p></li>
		<li class="fact"><p class="fact__num display">39,436<span class="fact__unit"></span></p><p class="fact__label">フォロワー総数・前年比+78%</p></li>
		<li class="fact"><p class="fact__num display">300<span class="fact__unit">万</span></p><p class="fact__label">縦型ショート1本の最高再生回数</p></li>
		<li class="fact"><p class="fact__num display">No.1<span class="fact__unit"></span></p><p class="fact__label">大学バスケ連盟公式アカウント 国内登録者数</p></li>
	</ul>
</div></section>
<section class="plans"><div class="wrap">
	<div class="section-head"><div><p class="label">Plans</p><p class="display display--jp section-head__en">プラン</p></div><p class="section-head__lead">規模・体制に合わせて組み合わせます。お見積りはお問い合わせください。</p></div>
	<div class="plans__grid" style="grid-template-columns:repeat(3,minmax(0,1fr))">
		<div class="plan"><p class="label c-blue">Support</p><?php if ( $show_prices ) : ?><p class="plan__price display">¥150,000<small>〜 / 月</small></p><?php endif; ?><p class="plan__setup">運用サポート</p><ul class="checks"><li>月内投稿設計・カレンダー</li><li>サムネイル・テキストの制作</li><li>月次レポートと改善提案</li></ul><p class="plan__for">自社で投稿できるが、設計と分析が欲しいチーム</p></div>
		<div class="plan plan--hot"><p class="label c-indigo">BPO <span>— 人気</span></p><?php if ( $show_prices ) : ?><p class="plan__price display">¥350,000<small>〜 / 月</small></p><?php endif; ?><p class="plan__setup">運用代行（企画〜分析まで一括）</p><ul class="checks"><li>企画・撮影・編集・投稿を一括</li><li>月ショート8〜12本込み</li><li>インサイト分析・翌月の改善</li><li>試合日の即日投稿体制</li></ul><p class="plan__for">プロクラブ・実業団・連盟</p></div>
		<div class="plan"><p class="label c-purple">Sponsored</p><?php if ( $show_prices ) : ?><p class="plan__price display">¥300,000<small>〜 / 企画</small></p><?php endif; ?><p class="plan__setup">スポンサードコンテンツ</p><ul class="checks"><li>自社メディア『FASTBREAKS』でのタイアップ</li><li>試合の熱量・選手の物語に溶け込む企画</li><li>配信・ショート・記事への横展開</li></ul><p class="plan__for">協賛・採用ブランディングを検討する企業</p></div>
	</div>
</div></section>
<section class="wrap" style="padding:120px var(--gutter);border-top:1px solid var(--line)">
	<div class="section-head"><div><p class="label">Method</p><p class="display display--jp section-head__en">再現可能な成長を生む運用設計</p></div></div>
	<div class="cards3">
		<div class="card"><p class="display card__en c-blue">01</p><p class="card__title">撮影→即日編集→投稿→横展開のテンプレ化</p><p class="body-text">伸びを「アタリ企画」や「バズ」で片付けず、分業とテンプレ化で継続的に回る量産体制を構築。どのプラットフォームでも世界観がブレません。</p></div>
		<div class="card"><p class="display card__en c-indigo">02</p><p class="card__title">構造批評×個人ストーリー</p><p class="body-text">スコア速報から脱却し、「なぜ勝ったのか」と「選手の想い」を掛け合わせた独自コンテンツで、コアなファンの信頼を獲得します。</p></div>
		<div class="card"><p class="display card__en c-purple">03</p><p class="card__title">広告として成立するスポンサー設計</p><p class="body-text">「枠売り」ではなく文脈に接続する企画として、視聴者に受け入れられる広告体験を実現。スポンサー価値を創出できるメディア運営です。</p></div>
	</div>
</section>
<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta', null, array( 'en' => 'SNSの相談をする', 'title' => '伸ばしたいアカウントと、いまの課題を教えてください。', 'lead' => '現状のインサイトを拝見したうえで、プランをご提案します。' ) ); ?>
<?php get_footer(); ?>
