<?php
/**
 * Template Name: ビジョン
 * 固定ページ「Vision」（スラッグ vision）に自動適用
 * 構成：Philosophy（ヒーロー）→ Our statement（原点）→ Mission / Vision / Values → Five words（行動原則）→ Manifesto
 */
get_header();
$words = array(
	array( 'Try',    'まず、踏み出す。',           array( '前例の有無で、可能性を決めない。', '現場で確かめ、小さく試し、必要なものは自分たちでつくる。', '「できるだろうか」を、「どうすればできるか」に変えていく。' ) ),
	array( 'Fail',   '失敗から、学ぶ。',           array( '挑んだ結果を引き受け、うまくいかなかった理由を確かめる。', '失敗を個人の経験で終わらせず、チームの学びに変える。', '次の現場の判断と仕組みに、改善を残す。' ) ),
	array( 'Fast',   '熱のあるうちに、動く。',     array( '迷う時間を、つくる時間に変える。', '確かめるべきことを押さえ、判断から実行までを短くする。', '届けるべきタイミングを逃さず、返ってきた反応を次の一手につなげる。' ) ),
	array( 'Break',  '届け方の限界を、越える。',   array( '「これまでこうだった」で、考えることを止めない。', '表現も、技術も、運営の仕組みも見直す。', 'スポーツの魅力が届く道を、自分たちの手で増やしていく。' ) ),
	array( 'Repeat', '続けるたびに、磨く。',       array( '一度の発信、一度の成功を、次につなげる。', '現場の声と見る人の反応を確かめ、表現と仕組みを磨き続ける。', 'その積み重ねで、信頼と応援が続く土台をつくる。' ) ),
);
$mvv = array(
	array(
		'label' => 'Mission', 'jp' => '私たちの使命', 'color' => 'c-blue',
		'en'    => 'Unleash the<br>passion.',
		'title' => '熱と物語を形にし、スポーツと社会をつなぐ。',
		'body'  => array( 'スポーツの現場にある熱を捉え、その背景にある物語を伝える。', 'クリエイティブとデジタルの力で、競技や選手の魅力に触れる機会をつくり、見る人の関心と共感を広げていく。' ),
	),
	array(
		'label' => 'Vision', 'jp' => '私たちが目指す未来', 'color' => 'c-indigo',
		'en'    => 'Let sport<br>thrive.',
		'title' => '応援が、次の挑戦を支えるスポーツ文化へ。',
		'body'  => array( '競技や地域、知名度にかかわらず、挑む姿が人々に届く。ファンや企業の応援が現場の力となり、活動の継続と新たな挑戦を支えていく。', '大学スポーツを起点に、その循環が社会に根づく未来を目指す。' ),
	),
	array(
		'label' => 'Values', 'jp' => '私たちが大切にする姿勢', 'color' => 'c-purple',
		'en'    => 'Close to the game.<br>True to the story.',
		'title' => '現場に根ざし、伝わるところまで向き合う。',
		'body'  => array( '選手やチームへの敬意を持ち、競技への理解を深め、現場との信頼を積み重ねる。そこで培った視点に、確かな制作技術とデジタルの発想を掛け合わせる。', '企画から制作、発信、仕組みづくりまで。誰に、何が、どう届くのか。その先まで考え、形にする。' ),
	),
);
?>
<section class="phero phero--plain">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'team_huddle.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div>
	<div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Vision</span></nav>
		<p class="label">Philosophy — What drives FASTBREAKS</p>
		<h1 class="display phero__title">One moment<br>tells <span class="gradtext">it all.</span></h1>
		<p class="phero__jp">確かな熱源が、そこにはある。</p>
		<p class="phero__lead">ひとつの瞬間が、すべてを物語る。<br>大学スポーツの最前線から、熱と物語を形にして届ける。</p>
	</div>
</section>

<!-- OUR STATEMENT：原点 -->
<section class="vision-statement">
	<p class="ghost" aria-hidden="true">Vision</p>
	<div class="wrap statement" style="position:relative">
		<div class="statement__head">
			<p class="label">Our statement — 私たちの原点</p>
			<h2 class="vision-statement__jp">この熱には、<br>まだ届いていない場所がある。</h2>
		</div>
		<div class="statement__body">
			<p>高校時代に注目を集めた選手が、大学進学とともに、伝えられる機会を失っていくことがある。<br>まだ広く知られていない選手にも、積み重ねてきた日々と、その人だけの物語がある。</p>
			<p>大学スポーツの現場には、心を動かす姿があふれている。<br>けれど、その熱量に見合うほど、世の中には届いていない。</p>
			<p class="statement__quote">こんなにも熱く、面白いのに、<br>なぜ届かないのか。</p>
			<p>現場で感じる熱と、世の中の認知との隔たり。<br>そのもどかしさが、FASTBREAKSの原点になった。</p>
			<p>ひとつのプレーに、努力の積み重ねがにじむ。<br>試合後のひと言に、その人が歩んできた時間が見える。</p>
			<p>私たちは、その瞬間と、そこに至る物語を見つめる。<br>競技を知り、現場に通い、選手の言葉に耳を傾ける。<br>そこで受け取ったものを、心に届くコンテンツへと変えていく。</p>
			<p class="statement__close">知ることが、応援の始まりになる。<br>その応援が、次の挑戦を支えていく。<br>大学スポーツの最前線から、私たちはそのつながりをつくり続ける。</p>
		</div>
	</div>
</section>

<!-- MISSION / VISION / VALUES -->
<section class="mvv">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Mission / Vision / Values</p><p class="display display--jp section-head__en">使命・未来・大切にする姿勢</p></div></div>
		<div class="mvv__grid">
			<?php foreach ( $mvv as $m ) : ?>
			<div class="mvv__item">
				<p class="label <?php echo esc_attr( $m['color'] ); ?>"><?php echo esc_html( $m['label'] ); ?><span class="mvv__jp-label"><?php echo esc_html( $m['jp'] ); ?></span></p>
				<p class="display mvv__en"><?php echo wp_kses( $m['en'], array( 'br' => array() ) ); ?></p>
				<p class="mvv__title"><?php echo esc_html( $m['title'] ); ?></p>
				<?php foreach ( $m['body'] as $b ) : ?><p class="body-text"><?php echo esc_html( $b ); ?></p><?php endforeach; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- FIVE WORDS：行動原則 -->
<section class="words">
	<div class="wrap">
		<div class="words__head">
			<div>
				<p class="label">Five words — 私たちの5つの行動原則</p>
				<p class="display words__en">Try. Fail. <span class="gradtext">Fast.</span><br><span class="gradtext">Break.</span> Repeat.</p>
			</div>
			<div class="words__intro">
				<p class="words__lead">挑み、失敗から学び、速く動き、壁を越え、磨き続ける。</p>
				<p class="body-text">5つの言葉の真ん中にあるのは、「Fast Break（速攻）」の精神。機会を捉え、素早く判断し、チームで前へ進む。</p>
				<p class="body-text">制作も、発信も、事業づくりも、採用も。この5つを、日々の判断と行動の基準にする。</p>
			</div>
		</div>
		<div class="words__list">
			<?php foreach ( $words as $i => $w ) : ?>
			<div class="word">
				<span class="word__num">0<?php echo $i + 1; ?></span>
				<p class="display word__en"><?php echo esc_html( $w[0] ); ?></p>
				<p class="word__jp"><?php echo esc_html( $w[1] ); ?></p>
				<p class="word__text"><?php echo implode( '<br>', array_map( 'esc_html', $w[2] ) ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- MANIFESTO -->
<section class="manifesto">
	<div class="manifesto__bg" aria-hidden="true"></div>
	<div class="wrap manifesto__inner">
		<div>
			<p class="label">Manifesto</p>
			<p class="manifesto__title">光が当たる前から、<br>物語は始まっている。</p>
			<div class="manifesto__verse">
				<p>歓声のない体育館にも、熱は確かにある。<br>繰り返した練習。交わした言葉。踏み出した一歩。<br>その積み重ねが、ある日の一瞬にあらわれる。</p>
				<p>勝利の歓喜も、届かなかった悔しさも、<br>そこに至るまでの日々も。</p>
				<p>私たちは、現場に立ち、その姿を見つめる。<br>熱を捉え、物語を形にし、<br>まだ出会っていない誰かへ届ける。</p>
				<p>その出会いが、応援になる。<br>その応援が、次の挑戦につながっていく。</p>
			</div>
			<p class="manifesto__sign"><span class="gradtext">確かな熱源が、そこにはある。</span><img class="manifesto__logo" src="<?php echo fb_logo( 'white' ); ?>" alt="FASTBREAKS" width="200" height="58" loading="lazy"></p>
			<div class="btn-row" style="margin-top:48px"><a class="pill pill--accent" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社概要</a><a class="pill pill--line" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">採用情報</a></div>
		</div>
		<figure class="manifesto__fig" style="position:relative"><img src="<?php echo fb_img( 'crew_headsets.jpg' ); ?>" alt="" loading="lazy"><span class="about__bar" aria-hidden="true"></span></figure>
	</div>
</section>

<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
