<?php
/**
 * Template Name: 採用
 * 固定ページ「採用」（スラッグ recruit）に自動適用
 */
get_header();
$intern_url = home_url( '/recruit/internship/' );
$univs = array( '大阪大学', '神戸大学', '大阪公立大学', '滋賀大学', '同志社大学', '関西大学', '関西学院大学', '立命館大学', '京都産業大学', '近畿大学', '甲南大学', '龍谷大学', '大阪経済大学', '大阪体育大学' );
?>
<section class="phero phero--plain">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'switcher_closeup.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div>
	<div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Recruit</span></nav>
		<p class="label">Recruit — Creators &amp; Student Interns</p>
		<h1 class="display phero__title">Join<br><span class="gradtext">the heat.</span></h1>
		<p class="phero__jp">本気の熱狂を、届ける側へ。</p>
		<p class="phero__lead">配信・撮影・編集・SNS運用・執筆。すべての工程で、プロフェッショナルな裁量を渡します。選手と同じ目線で現場に立ち、「一生の仕事観」を手に入れる場所です。</p>
		<div class="btn-row"><a class="pill pill--accent" href="#apply">クリエイター採用に応募</a><?php if ( $intern_url ) : ?><a class="pill pill--line" href="<?php echo esc_url( $intern_url ); ?>">学生インターンはこちら</a><?php endif; ?></div>
	</div>
</section>

<section class="coverage">
	<p class="ghost ghost--right" aria-hidden="true">Why join</p>
	<div class="wrap">
		<div class="section-head"><div><p class="label">Why FASTBREAKS</p><p class="display display--jp section-head__en">ここで働く理由</p></div></div>
		<div class="cards3">
			<div class="card"><p class="display card__en c-blue">01</p><p class="card__title">「熱狂の現場」の最前線に立てる</p><p class="body-text">関西学生バスケから FIBA 3x3 の国際大会まで、年間124日程のライブ配信と325本の映像制作。観る人の熱量を肌で感じながら、自分の仕事がその場で世の中に届く手応えがあります。</p></div>
			<div class="card"><p class="display card__en c-indigo">02</p><p class="card__title">少人数で放送品質を出す、技術の裁量</p><p class="body-text">独自に構築したソフトウェアベースの配信システムで、少人数でも放送クオリティを維持し、最大5現場を同時に運用しています。機材やワークフローの改善提案も歓迎です。</p></div>
			<div class="card"><p class="display card__en c-purple">03</p><p class="card__title">配信・映像・SNSまで、領域を広げられる</p><p class="body-text">配信オペレーション、撮影、編集、SNS運用までを自社で一気通貫。得意分野を軸にしながら、企画・ディレクションへとキャリアの幅を広げられます。</p></div>
		</div>
	</div>
</section>


<section class="plans" id="positions">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Positions</p><p class="display display--jp section-head__en">募集職種</p></div><p class="section-head__lead">募集要項の詳細（勤務地・報酬・期間）は応募後にご案内します。</p></div>
		<div class="plans__grid" style="grid-template-columns:repeat(2,minmax(0,1fr))">
			<div class="plan plan--hot"><p class="label c-blue">Movie Creators Wanted</p><p class="display display--jp plan__price" style="font-size:40px">クリエイター</p><p class="plan__setup">配信オペレーター／カメラマン／エディター（業務委託・正社員）</p><ul class="checks"><li>スポーツ配信・撮影・編集の経験、または強い意欲</li><li>週末の試合現場に入れる方（関西・関東）</li><li>Premiere Pro / DaVinci / vMix 等いずれかの経験があれば尚可</li><li>報酬：案件・経験に応じて個別にご提示</li></ul><p class="plan__for">現場で「速攻」を打てる仲間を探しています。</p><a class="pill pill--accent recruit-cta" href="#apply">クリエイター採用に応募する</a></div>
			<div class="plan"><p class="label c-purple">Internship Wanted</p><p class="display display--jp plan__price" style="font-size:40px">学生インターン</p><p class="plan__setup">配信・撮影・編集・SNS運用・記事執筆（長期・実践型）</p><ul class="checks"><li>大学1〜3回生、関西学生バスケの現場に通える方</li><li>未経験可。機材と編集はゼロから教えます</li><li>自分の企画を世に出したい方、数字で振り返れる方</li><li>期間：シーズン単位（更新あり）</li></ul><p class="plan__for">14大学から集まった先輩たちが、あなたを待っています。</p><?php if ( $intern_url ) : ?><a class="pill pill--line recruit-cta" href="<?php echo esc_url( $intern_url ); ?>">インターンの詳細・応募 →</a><?php endif; ?></div>
		</div>
	</div>
</section>

<section class="wrap contact-grid" id="apply" style="border-top:1px solid var(--line);padding-top:120px">
	<div class="contact-form">
		<p class="label">Apply — Creators</p>
		<p class="display display--jp section-head__en" style="margin:16px 0 12px">クリエイター採用 応募フォーム</p>
		<p class="body-text" style="margin:0 0 32px">配信オペレーター／カメラマン／エディター（業務委託・正社員）の応募はこちらから。<?php if ( $intern_url ) : ?><br>学生インターンへの応募は<a class="text-link" href="<?php echo esc_url( $intern_url ); ?>">インターン専用ページ</a>からお願いします。<?php endif; ?></p>
		<?php if ( $sc = fb_opt( 'recruit_shortcode' ) ) : echo do_shortcode( $sc ); else : ?><div class="notice-box"><p>採用応募フォームのショートコードを「設定 → FASTBREAKS サイト設定」に登録してください。</p></div><?php endif; ?>
	</div>
	<aside class="contact-side">
		<p class="label">Flow</p>
		<ol class="steps steps--vertical">
			<li><span class="display c-blue">01</span><strong>応募</strong><span>フォームからエントリー</span></li>
			<li><span class="display c-blue">02</span><strong>カジュアル面談</strong><span>オンラインで30分。現場の話を聞いてください</span></li>
			<li><span class="display c-indigo">03</span><strong>現場見学</strong><span>実際の配信現場に1日同行</span></li>
			<li><span class="display c-purple">04</span><strong>参加開始</strong><span>機材・編集のレクチャーから</span></li>
		</ol>
	</aside>
</section>

<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_footer(); ?>
