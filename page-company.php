<?php
/**
 * Template Name: 会社概要
 * 固定ページ「会社概要」（スラッグ company）に自動適用
 */
get_header();
$history = array(
	array( '2020.03', 'FASTBREAKS合同会社 設立' ),
	array( '2020', 'コロナ禍の無観客開催を契機に、関西学生バスケットボールリーグ戦の全試合ライブ配信を開始' ),
	array( '2021', '朝日新聞社・ABCテレビ「ブカピ」制作パートナーとしてウインターカップ等を取材・制作' ),
	array( '2022', 'Bリーグ・Jリーグクラブの公式コンテンツ制作・SNS運用を開始。プロスポーツ領域へ事業を拡大' ),
	array( '2023', '3x3国内リーグ「3XS（トライクロス）」公式ライブ配信を年間受託。東京支社を開設' ),
	array( '2024', 'ソフトウェアベースのライブ配信システムを独自に構築・導入。放送品質を保ちながら、少人数での複数会場同時配信を実現' ),
	array( '2025', '自社メディアのライブ配信・SNSコンテンツが年間3,000万回再生を突破。年間124日程の配信、325本の動画制作' ),
	array( '2026', '日本初開催の FIBA 3x3 Challenger（渋谷・上野原・愛知）、高崎ウェイメンズリースのライブ配信を担当' ),
);
?>
<section class="phero phero--plain">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'arena_wide.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div>
	<div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>About</span></nav>
		<p class="label">About — Company &amp; Vision</p>
		<h1 class="display phero__title">Heat<br><span class="gradtext">Source.</span></h1>
		<p class="phero__jp">「記録」で終わらせない。「熱狂」に変える。</p>
		<p class="phero__lead">現場にある圧倒的なドラマと、世間の認知にあるギャップ。私たちはその壁を、デジタルの力とクリエイティブで破壊する。「競技」を「事業」へ。「大学スポーツ」を「カルチャー」へ。</p>
	</div>
</section>

<section class="about" style="padding-top:140px">
	<p class="ghost" aria-hidden="true">Vision</p>
	<div class="wrap about__grid">
		<div class="about__text">
			<p class="label">Vision</p>
			<p class="display about__en">Try. Fail. Fast.<br>Break. Repeat.</p>
			<h2 class="about__title">挑んで、倒れて、また挑む。<br>それを繰り返す姿こそが、人を動かすと信じている。</h2>
			<p class="body-text">高校時代はスーパースターとして注目された選手が、大学進学とともに世間の目から離れてしまう現状。そこにある「もどかしさ」と、現場で肌に感じる選手たちの「圧倒的な熱量」。このギャップを埋め、スポーツが本来持つ社会的価値を多くの人に届けることこそが、私たちの原点であり使命です。</p>
			<p class="body-text">私たちは、ただの制作会社ではありません。スポーツの現場に眠る熱を掘り起こし、デジタルの力で増幅させ、世界へ「速攻」で届ける。心を揺さぶるコンテンツで、次世代のスポーツ文化を切り拓きます。</p>
			<a class="arrow-link" href="<?php echo esc_url( home_url( '/vision/' ) ); ?>">Our vision →</a>
		</div>
		<figure class="about__fig"><img src="<?php echo fb_img( 'crew_headsets.jpg' ); ?>" alt="配信クルー" loading="lazy"><span class="about__bar" aria-hidden="true"></span></figure>
	</div>
</section>

<section class="setup wrap" style="border-top:1px solid var(--line)">
	<div class="setup__text">
		<p class="label">Message from CEO</p>
		<p class="display section-head__en">Mio Sasaki</p>
		<p class="body-text">私たちのルーツは、2020年・コロナ禍の真っ只中にあります。「関西の大学バスケットボールを発展させ、事業化する。」その想いひとつで、ゼロから立ち上がりました。失敗を恐れずに挑んだ結果生まれた数字は、大学スポーツ界における「継続可能な成功モデル」の可能性を証明しています。</p>
		<dl class="spec">
			<div><dt>代表 / CEO</dt><dd>佐々木 未央（Sasaki Mio）</dd></div>
			<div><dt>略歴</dt><dd>1996年生、近畿大学卒。学生時代に関西学生バスケットボール連盟で学生委員長を務める。2019年 インフルエンサーマネジメント会社 取締役就任。2020年 FASTBREAKS合同会社 創業。2021年 地域リーグ所属バスケットボールチーム 理事就任。</dd></div>
		</dl>
	</div>
	<figure class="setup__fig ceo__fig"><img src="<?php echo fb_img( 'ceo.jpg' ); ?>" alt="代表 佐々木 未央" loading="lazy"><span class="about__bar" aria-hidden="true"></span></figure>
</section>

<section class="wrap" style="padding:120px var(--gutter);border-top:1px solid var(--line);display:grid;grid-template-columns:320px minmax(0,1fr);gap:80px;align-items:start">
	<div><p class="label">Company profile</p><p class="display display--jp section-head__en" style="margin-top:16px">会社概要</p></div>
	<dl class="spec spec--table">
		<div><dt>会社名</dt><dd><?php echo esc_html( fb_opt( 'company_name' ) ); ?><?php if ( $n = fb_opt( 'company_note' ) ) : ?> <small><?php echo esc_html( $n ); ?></small><?php endif; ?></dd></div>
		<div><dt>設立</dt><dd><?php echo esc_html( fb_opt( 'founded' ) ); ?></dd></div>
		<div><dt>代表</dt><dd>佐々木 未央</dd></div>
		<div><dt>資本金</dt><dd><?php echo esc_html( fb_opt( 'capital' ) ); ?></dd></div>
		<div><dt>従業者数</dt><dd><?php echo esc_html( fb_opt( 'staff' ) ); ?></dd></div>
		<div><dt>事業内容</dt><dd>クリエイティブ・プロダクション事業（ライブ配信・撮影・映像制作）／マーケティング・ソリューション事業（SNS運用・分析）／メディア・プラットフォーム事業（自社メディア『FASTBREAKS』運営）</dd></div>
		<div><dt>大阪本社</dt><dd><?php echo esc_html( fb_opt( 'address_osaka' ) ); ?></dd></div>
		<div><dt>東京支社</dt><dd><?php echo esc_html( fb_opt( 'address_tokyo' ) ); ?></dd></div>
		<?php if ( fb_opt( 'email' ) ) : ?><div><dt>メール</dt><dd><a href="mailto:<?php echo esc_attr( fb_opt( 'email' ) ); ?>"><?php echo esc_html( fb_opt( 'email' ) ); ?></a></dd></div><?php endif; ?>
	</dl>
</section>

<section class="process wrap" style="border-top:1px solid var(--line)">
	<div class="section-head"><div><p class="label">History</p><p class="display display--jp section-head__en">沿革</p></div></div>
	<ol class="history">
		<?php foreach ( $history as $h ) : ?><li><span class="display history__year"><?php echo esc_html( $h[0] ); ?></span><span class="history__text"><?php echo esc_html( $h[1] ); ?></span></li><?php endforeach; ?>
	</ol>
</section>

<section class="wrap" style="padding:120px var(--gutter);border-top:1px solid var(--line)">
	<div class="section-head"><div><p class="label">Access</p><p class="display display--jp section-head__en">アクセス</p></div></div>
	<div class="access">
		<div class="access__item">
			<p class="display access__en">Osaka</p>
			<p class="body-text"><?php echo esc_html( fb_opt( 'address_osaka' ) ); ?></p>
			<div class="map"><iframe loading="lazy" title="大阪本社 地図" src="https://www.google.com/maps?q=<?php echo rawurlencode( fb_opt( 'address_osaka' ) ); ?>&amp;output=embed" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe></div>
		</div>
		<div class="access__item">
			<p class="display access__en">Tokyo</p>
			<p class="body-text"><?php echo esc_html( fb_opt( 'address_tokyo' ) ); ?></p>
			<div class="map"><iframe loading="lazy" title="東京支社 地図" src="https://www.google.com/maps?q=<?php echo rawurlencode( fb_opt( 'address_tokyo' ) ); ?>&amp;output=embed" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe></div>
		</div>
	</div>
</section>

<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
