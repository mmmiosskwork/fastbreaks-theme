<?php
/**
 * Template Name: ライブ配信（サービス詳細・LP兼用）
 * 固定ページ「ライブ配信」（スラッグ live-streaming）に自動適用。他のページでもテンプレート選択で使用可。
 */
get_header();
$show_prices = '1' === (string) fb_opt( 'show_prices' );
?>

<section class="phero phero--plain">
	<img class="phero__img" src="<?php echo has_post_thumbnail() ? esc_url( get_the_post_thumbnail_url( null, 'fb-wide' ) ) : fb_img( 'operator_court.jpg' ); ?>" alt="" fetchpriority="high">
	<div class="phero__fade" aria-hidden="true"></div>
	<div class="phero__slash" aria-hidden="true"></div>
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">Service</a><span>／</span><span>ライブ配信</span></nav>
		<p class="label">Service 01 — Creative Production</p>
		<h1 class="display phero__title">Live<br><span class="gradtext">Streaming</span></h1>
		<p class="phero__jp">試合も、セミナーも、イベントも。<br>放送品質を、SNSのスピードで。</p>
		<p class="phero__lead">年間<?php echo esc_html( fb_opt( 'fact2_value' ) ); ?>日程、最大8カメラ・5会場同時配信。関西学生バスケの全試合配信で磨いた少人数オペレーションで、スポーツ大会・セミナー・企業イベントを大阪・東京から全国へ届けます。</p>
		<div class="btn-row">
			<a class="pill pill--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お見積り・ご相談</a>
			<a class="pill pill--line" href="#plans">プランを見る</a>
		</div>
	</div>
</section>

<section class="coverage">
	<p class="ghost ghost--right" aria-hidden="true">What we stream</p>
	<div class="wrap">
		<div class="section-head"><div><p class="label">Coverage</p><p class="display display--jp section-head__en">対応できる配信</p></div></div>
		<div class="cards3">
			<div class="card"><p class="display card__en c-blue">Sports</p><p class="card__title">スポーツ大会・リーグ戦</p><p class="body-text">バスケットボールを中心に、球技全般の公式戦・大会。スコア・スタッツテロップ、リプレイ、実況席、複数会場の同時配信に対応。</p><p class="card__note">実績：関西学生バスケ連盟 / FIBA 3x3 / 3XS / JSB全国大会</p></div>
			<div class="card"><p class="display card__en c-indigo">Seminar</p><p class="card__title">セミナー・講演・学会</p><p class="body-text">登壇者とスライドの2画面構成、Zoom等との双方向連携、限定公開・有料配信、アーカイブ納品まで。1カメ少人数で低コストに。</p><p class="card__note">大学・自治体・企業研修向け</p></div>
			<div class="card"><p class="display card__en c-purple">Event</p><p class="card__title">企業イベント・発表会・ドラフト</p><p class="body-text">会場LEDとの連動演出、オープニングVTR、即日ダイジェスト。配信とSNSを同じチームで回すから、当日中に熱を拡散できます。</p><p class="card__note">実績：WKBLアジア選手ドラフト / 3XS Final</p></div>
		</div>
	</div>
</section>

<section class="plans" id="plans">
	<div class="wrap">
		<div class="section-head">
			<div><p class="label">Plans</p><p class="display display--jp section-head__en">プラン</p></div>
			<p class="section-head__lead">規模・体制に合わせて組み合わせます。<br><a class="text-link" href="<?php echo esc_url( home_url( '/broadcast/#plans' ) ); ?>">料金の目安はこちら →</a></p>
		</div>
		<div class="plans__grid">
			<div class="plan"><p class="label c-blue">Light</p><?php if ( $show_prices ) : ?><p class="plan__price display">¥80,000<small>〜 / 日</small></p><?php endif; ?><p class="plan__setup">1カメラ・スタッフ1名</p><ul class="checks"><li>固定カメラ配信</li><li>スコアテロップ</li><li>YouTube / 自社PFへの配信設定</li><li>アーカイブURL納品</li></ul><p class="plan__for">学校・部活動・セミナー・小規模大会</p></div>
			<div class="plan plan--hot"><p class="label c-indigo">Standard <span>— 人気</span></p><?php if ( $show_prices ) : ?><p class="plan__price display">¥200,000<small>〜 / 日</small></p><?php endif; ?><p class="plan__setup">2〜3カメラ・スタッフ2〜3名</p><ul class="checks"><li>スイッチング・リプレイ</li><li>スコア・スタッツテロップ</li><li>オープニングVTR</li><li>ハイライト1本付き</li></ul><p class="plan__for">連盟公式戦・地域リーグ・企業イベント</p></div>
			<div class="plan"><p class="label c-purple">Premium</p><?php if ( $show_prices ) : ?><p class="plan__price display">¥500,000<small>〜 / 日</small></p><?php endif; ?><p class="plan__setup">4〜8カメラ・スタッフ4名〜</p><ul class="checks"><li>実況・解説の手配</li><li>マルチアングル・会場LED連動</li><li>即日ダイジェスト・縦型ショート</li><li>スポンサー露出設計</li></ul><p class="plan__for">全国大会・国際大会・ファイナル</p></div>
			<div class="plan"><p class="label label--muted">Season</p><?php if ( $show_prices ) : ?><p class="plan__price display">¥60,000<small>〜 / 試合</small></p><?php endif; ?><p class="plan__setup">年間50試合以上のシーズン契約</p><ul class="checks"><li>試合数に応じた単価設定</li><li>複数会場の同時配信</li><li>シーズン通しのハイライト・SNS運用</li><li>スポンサー露出設計</li></ul><p class="plan__for">連盟・リーグ運営団体</p></div>
		</div>
	</div>
</section>

<section class="setup wrap">
	<figure class="setup__fig"><img src="<?php echo fb_img( 'switcher_closeup.jpg' ); ?>" alt="スイッチャーを操作する手元" loading="lazy"><span class="about__bar" aria-hidden="true"></span></figure>
	<div class="setup__text">
		<p class="label">Setup</p>
		<p class="display display--jp section-head__en">体制と機材</p>
		<p class="body-text">ソフトウェアベースの基幹システムで、<br>放送局水準の画作りを少人数・低コストで。<br>2020年から年間100試合超を止めずに配信してきた運用が、<br>そのまま御社の現場に入ります。</p>
		<ul class="checks checks--2col"><li>最大8カメラ（ミラーレス・PTZ）</li><li>オンタイムのリプレイ</li><li>スコア・スタッツ・選手名テロップ</li><li>実況席・ヘッドセット一式</li><li>最大5会場の同時配信</li><li>有線・IP回線のバックアップ</li><li>YouTube / 自社PF / 有料配信</li><li>大阪・東京拠点から全国出張</li></ul>
	</div>
</section>

<?php
$live_term = get_term_by( 'slug', 'live', 'work_type' );
$live_works = new WP_Query( array( 'post_type' => 'works', 'posts_per_page' => 3, 'tax_query' => $live_term ? array( array( 'taxonomy' => 'work_type', 'field' => 'slug', 'terms' => 'live' ) ) : array() ) );
if ( $live_works->have_posts() ) : ?>
<section class="works-home">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Works — Live Streaming</p><p class="display display--jp section-head__en">配信実績</p></div><a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">All works</a></div>
		<div class="works-grid works-grid--3">
			<?php while ( $live_works->have_posts() ) : $live_works->the_post(); get_template_part( 'template-parts/work-card', null, array( 'size' => 'md' ) ); endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="process wrap">
	<div class="section-head"><div><p class="label">Process</p><p class="display display--jp section-head__en">ご相談から配信まで</p></div></div>
	<ol class="steps">
		<li><span class="display c-blue">01</span><strong>ご相談</strong><span>会場・やりたいことをフォームでお知らせください。</span></li>
		<li><span class="display c-blue">02</span><strong>お見積り・プラン提案</strong><span>カメラ台数・テロップ・配信先を決めて概算をご提示。</span></li>
		<li><span class="display c-indigo">03</span><strong>下見・回線確認</strong><span>会場の電源・回線・カメラ位置を確認。遠方はオンラインで。</span></li>
		<li><span class="display c-purple">04</span><strong>当日配信</strong><span>設営から撤収まで。即日ダイジェストはその日のうちに。</span></li>
		<li><span class="display c-purple">05</span><strong>納品・レポート</strong><span>アーカイブと視聴データをお渡し。次回の改善案まで。</span></li>
	</ol>
</section>

<section class="faq wrap">
	<div class="faq__head"><p class="label">FAQ</p><p class="display display--jp section-head__en">よくある<br>ご質問</p></div>
	<dl class="faq__list">
		<div><dt>会場にインターネット回線がなくても配信できますか？</dt><dd>はい。モバイル回線を束ねるIP配信機材を持ち込みます。体育館・屋外ともに実績があります。</dd></div>
		<div><dt>有料配信や限定公開はできますか？</dt><dd>YouTubeの限定公開のほか、有料配信プラットフォームでの実績もあります。</dd></div>
		<div><dt>関西以外でも依頼できますか？</dt><dd>大阪・東京の二拠点から全国に出張しています。交通費・宿泊費は実費でお見積りに含めます。</dd></div>
		<div><dt>どのくらい前に依頼すればよいですか？</dt><dd>LIGHTは1カ月前、STANDARD以上は2カ月前を目安に。シーズン中の週末は早めにご相談ください。</dd></div>
	</dl>
</section>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( trim( get_the_content() ) ) : ?>
<section class="wrap entry-content page-extra"><?php the_content(); ?></section>
<?php endif; endwhile; endif; ?>

<?php get_template_part( 'template-parts/cta', null, array( 'en' => '配信の相談をする', 'title' => 'やりたい配信の形を、お聞かせください。', 'lead' => '規模や体制に合わせて、最適な構成をご提案します。' ) ); ?>

<?php get_footer(); ?>
