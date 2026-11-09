<?php
/**
 * Template Name: ビジョン
 * 固定ページ「Vision」（スラッグ vision）に自動適用
 */
get_header();
$words = array(
	array( 'Try',    '挑む。',   '勝算より先に、まず現場に立つ。関西学生バスケの全試合配信も、FIBAの国際大会も、最初は「やってみる」から始まった。' ),
	array( 'Fail',   '倒れる。', '失敗は隠さない。配信が止まった夜も、数字が伸びなかった企画も、全部が次のクリエイティブの材料になる。' ),
	array( 'Fast',   '速く。',   '試合が終わった瞬間に、ハイライトは世界へ。放送グレードのクオリティを、SNSのスピードで届ける。' ),
	array( 'Break',  '壊す。',   '「大学スポーツは誰も見ない」という前提を壊す。現場の熱と世間の認知のあいだにある壁を、映像で破壊する。' ),
	array( 'Repeat', '繰り返す。', '一度のバズでは文化にならない。124日の配信、325本の映像。積み重ねだけが、人を動かす熱源になる。' ),
);
?>
<section class="phero">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'team_huddle.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div>
	<div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Vision</span></nav>
		<p class="label">Vision — What drives FASTBREAKS</p>
		<h1 class="display phero__title">One instance<br>shows <span class="gradtext">all the rest.</span></h1>
		<p class="phero__jp">確かな熱源が、そこにはある。</p>
		<p class="phero__lead">ひとつの瞬間が、そのすべてを物語る。コートの上の一瞬に宿る熱を、私たちはカメラと配信とSNSで、世界に「速攻」で届ける。</p>
	</div>
</section>

<section class="vision-statement">
	<p class="ghost" aria-hidden="true">Vision</p>
	<div class="wrap" style="position:relative">
		<p class="label">Our statement</p>
		<p class="display vision-statement__en" style="margin-top:24px">Try. Fail. Fast.<br>Break. <span class="gradtext">Repeat.</span></p>
		<h2 class="vision-statement__jp">挑んで、倒れて、また挑む。<br>それを繰り返す姿こそが、人を動かすと信じている。</h2>
		<p class="body-text vision-statement__lead">高校時代はスーパースターとして注目された選手が、大学進学とともに世間の目から離れてしまう。現場で肌に感じる選手たちの圧倒的な熱量と、世の中の認知とのあいだにある深いギャップ。そのもどかしさが、FASTBREAKSの原点であり、いまも変わらない使命です。</p>
	</div>
</section>

<section class="words">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Five words</p><p class="display display--jp section-head__en">私たちの5つの動詞</p></div><p class="section-head__lead">スローガンではなく、現場での行動原則。採用も、制作も、営業も、この5語で判断する。</p></div>
		<div class="words__list">
			<?php foreach ( $words as $i => $w ) : ?>
			<div class="word">
				<span class="word__num">0<?php echo $i + 1; ?></span>
				<p class="display word__en"><?php echo esc_html( $w[0] ); ?></p>
				<p class="word__jp"><?php echo esc_html( $w[1] ); ?></p>
				<p class="word__text"><?php echo esc_html( $w[2] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="mvv">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Mission / Vision / Value</p><p class="display display--jp section-head__en">私たちが目指すもの</p></div></div>
		<div class="mvv__grid">
			<div class="mvv__item">
				<p class="label c-blue">Mission</p>
				<p class="display mvv__en">Dig the<br>heat.</p>
				<p class="mvv__title">スポーツの現場に眠る熱を掘り起こし、デジタルの力で増幅させ、世界へ速攻で届ける。</p>
				<p class="body-text">「記録」で終わらせず、「熱狂」に変える。心を揺さぶるコンテンツで、競技の価値を社会に接続する。</p>
			</div>
			<div class="mvv__item">
				<p class="label c-indigo">Vision</p>
				<p class="display mvv__en">Sports to<br>culture.</p>
				<p class="mvv__title">「競技」を「事業」へ。「大学スポーツ」を「カルチャー」へ。</p>
				<p class="body-text">関西学生バスケで証明した「継続可能な成功モデル」を、すべての競技・すべての地域へ。次世代のスポーツ文化を切り拓く。</p>
			</div>
			<div class="mvv__item">
				<p class="label c-purple">Value</p>
				<p class="display mvv__en">Same eyes,<br>same court.</p>
				<p class="mvv__title">選手と同じ目線で、同じ現場に立つ。</p>
				<p class="body-text">同世代だから撮れる表情がある。放送グレードの技術と、SNSネイティブの感性。その両方を一つのチームで持つことが、私たちの価値。</p>
			</div>
		</div>
	</div>
</section>

<section class="manifesto">
	<div class="manifesto__bg" aria-hidden="true"></div>
	<div class="wrap manifesto__inner">
		<div>
			<p class="label">Manifesto</p>
			<div class="manifesto__lines" style="margin-top:32px">
				<p class="manifesto__line">勝った夜だけを撮らない。</p>
				<p class="manifesto__line">負けた朝の練習を、撮る。</p>
				<p class="manifesto__line is-dim">注目されない4年間に、</p>
				<p class="manifesto__line is-dim">いちばん熱い瞬間がある。</p>
				<p class="manifesto__line">だから私たちは、そこにいる。</p>
			</div>
			<div class="btn-row" style="margin-top:48px"><a class="pill pill--accent" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社概要</a><a class="pill pill--line" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">採用情報</a></div>
		</div>
		<figure class="manifesto__fig" style="position:relative"><img src="<?php echo fb_img( 'crew_headsets.jpg' ); ?>" alt="" loading="lazy"><span class="about__bar" aria-hidden="true"></span></figure>
	</div>
</section>

<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
