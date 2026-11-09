<?php
/**
 * Template Name: ライブ配信 LP（料金・プラン）
 * 固定ページ「ライブ配信の料金・プラン」（スラッグ broadcast）に自動適用。
 * コーポレートサイト本体には価格を出さない方針のため、料金はこのページだけに載せる。
 */
get_header( 'lp' );

$fb_plans = array(
	array( 'id' => 'light',    'label' => 'Light',    'cls' => 'c-blue',     'price' => 150000, 'unit' => '日',   'setup' => '1カメラ・スタッフ1名', 'items' => array( '固定カメラ配信', 'スコアテロップ', 'YouTube / 自社PFへの配信設定', 'アーカイブURL納品' ), 'for' => '学校・部活動・セミナー・小規模大会', 'hot' => false ),
	array( 'id' => 'standard', 'label' => 'Standard', 'cls' => 'c-indigo',   'price' => 320000, 'unit' => '日',   'setup' => '2〜3カメラ・スタッフ2〜3名', 'items' => array( 'スイッチング・リプレイ', 'スコア・スタッツテロップ', 'オープニングVTR', 'ハイライト1本付き' ), 'for' => '連盟公式戦・地域リーグ・企業イベント', 'hot' => true ),
	array( 'id' => 'premium',  'label' => 'Premium',  'cls' => 'c-purple',   'price' => 500000, 'unit' => '日',   'setup' => '4〜8カメラ・スタッフ4名〜', 'items' => array( '実況・解説の手配', 'マルチアングル・会場LED連動', '即日ダイジェスト・縦型ショート', 'スポンサー露出設計' ), 'for' => '全国大会・国際大会・ファイナル', 'hot' => false ),
	array( 'id' => 'season',   'label' => 'Season',   'cls' => 'label--muted', 'price' => 150000, 'unit' => '試合', 'setup' => 'シーズンを通した複数試合の契約', 'items' => array( '試合数に応じた単価設定', '複数会場の同時配信', 'シーズン通しのハイライト・SNS運用', 'スポンサー誘致の支援' ), 'for' => '連盟・リーグ運営団体', 'hot' => false ),
);
$fb_faq = array(
	array( '会場にインターネット回線がなくても配信できますか？', 'はい。モバイル回線を束ねるIP配信機材を持ち込みます。体育館・屋外ともに実績があります。' ),
	array( '料金には何が含まれますか？', '機材・スタッフ・配信設定・アーカイブ納品までを含みます。会場までの交通費・宿泊費は実費でお見積りに含めます。カメラ台数・配信時間・テロップの内容によって金額が変わるため、内容を伺ってお見積りします。' ),
	array( '1試合だけ、小規模なセミナーだけでも依頼できますか？', 'はい。LIGHTプラン（1カメラ・スタッフ1名）から承ります。' ),
	array( '有料配信や限定公開はできますか？', 'YouTubeの限定公開のほか、有料配信プラットフォームでの実績もあります。' ),
	array( '関西以外でも依頼できますか？', '大阪・東京の二拠点から全国に出張しています。交通費・宿泊費は実費でお見積りに含めます。' ),
	array( 'どのくらい前に依頼すればよいですか？', 'LIGHTは1カ月前、STANDARD以上は2カ月前を目安にご相談ください。シーズン中の週末は早めのご連絡をおすすめします。' ),
);
?>

<section class="phero phero--plain lp-hero" id="top">
	<div class="wrap phero__inner">
		<p class="label">Live Streaming — Plans &amp; Price</p>
		<p class="display phero__title" aria-hidden="true">Broadcast grade.<br><span class="gradtext">SNS speed.</span></p>
		<h1 class="lp-hero__h1">スポーツ・イベント・セミナーの<br>ライブ配信代行</h1>
		<p class="phero__lead">撮影から配信・アーカイブまで。関西学生バスケの全試合配信で磨いた少人数オペレーションで、最大8カメラ・5会場の同時配信に対応します。大阪・東京の二拠点から全国へ。</p>
		<div class="btn-row">
			<a class="pill pill--accent" href="#contact">お見積り・ご相談</a>
			<a class="pill pill--line" href="#plans">料金を見る</a>
		</div>
	</div>
</section>

<section class="lp-stats" aria-label="実績の数字">
	<div class="wrap lp-stats__grid">
		<div><p class="display lp-stats__num">124<span>日程</span></p><p class="lp-stats__label">年間ライブ配信（2025）</p></div>
		<div><p class="display lp-stats__num">325<span>本</span></p><p class="lp-stats__label">年間動画制作（2025）</p></div>
		<div><p class="display lp-stats__num">5<span>会場</span></p><p class="lp-stats__label">最大同時配信（同日・別会場）</p></div>
		<div><p class="display lp-stats__num">8<span>カメラ</span></p><p class="lp-stats__label">1会場の最大カメラ台数</p></div>
	</div>
</section>

<section class="coverage">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Problems</p><h2 class="display display--jp section-head__en">こんなお悩みに</h2></div></div>
		<ul class="lp-problems">
			<li>配信会社に頼むと、学生や地域の大会では予算が合わない</li>
			<li>体育館や屋外の会場に、インターネット回線がない</li>
			<li>映すことはできても、スコア表示やリプレイまで手が回らない</li>
			<li>配信して終わりで、SNSで広がらない</li>
		</ul>
	</div>
</section>

<section class="coverage" style="padding-top:0">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Why FASTBREAKS</p><h2 class="display display--jp section-head__en">選ばれる理由</h2></div></div>
		<div class="cards3">
			<div class="card"><p class="display card__en c-blue">01</p><h3 class="card__title">放送グレードを、少人数・低コストで</h3><p class="body-text">独自に構築したソフトウェアベースの配信システムで、放送局水準の画作りを少人数で実現。最大8カメラ・5会場の同時配信まで対応します。</p></div>
			<div class="card"><p class="display card__en c-indigo">02</p><h3 class="card__title">競技がわかるから、見せ場を逃さない</h3><p class="body-text">2020年から関西学生バスケの公式戦を配信し続けてきたチームです。どこを切り取れば盛り上がるかが分かるので、リプレイやテロップが的確です。</p></div>
			<div class="card"><p class="display card__en c-purple">03</p><h3 class="card__title">配信とSNSを、同じチームで</h3><p class="body-text">即日ダイジェストや縦型ショートを、その日のうちに。自社メディアで年間3,352万回再生（2025）のノウハウで、配信の熱をSNSで広げます。</p></div>
		</div>
	</div>
</section>

<section class="coverage" style="padding-top:0">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Coverage</p><h2 class="display display--jp section-head__en">対応できる配信</h2></div></div>
		<div class="cards3">
			<div class="card"><p class="display card__en c-blue">Sports</p><h3 class="card__title">スポーツ大会・リーグ戦</h3><p class="body-text">バスケットボールを中心に、球技全般の公式戦・大会。スコア・スタッツテロップ、リプレイ、実況席、複数会場の同時配信に対応。</p><p class="card__note">実績：関西学生バスケットボール連盟 / FIBA 3x3 / 3XS</p></div>
			<div class="card"><p class="display card__en c-indigo">Event</p><h3 class="card__title">イベント・発表会・ドラフト会議</h3><p class="body-text">会場LEDとの連動演出、オープニングVTR、即日ダイジェスト。配信とSNSを同じチームで回すから、当日中に熱を拡散できます。</p><p class="card__note">実績：WKBL 2025-2026 アジアクォータ選手ドラフト</p></div>
			<div class="card"><p class="display card__en c-purple">Seminar</p><h3 class="card__title">セミナー・講演・企業イベント</h3><p class="body-text">登壇者とスライドの2画面構成、限定公開・有料配信、アーカイブ納品まで。1カメラ・少人数の構成で費用を抑えられます。</p><p class="card__note">大学・自治体・企業向け</p></div>
		</div>
	</div>
</section>

<section class="plans" id="plans">
	<div class="wrap">
		<div class="section-head">
			<div><p class="label">Plans &amp; Price</p><h2 class="display display--jp section-head__en">料金・プラン</h2></div>
			<p class="section-head__lead">表示は目安の金額です。会場・カメラ台数・配信時間・テロップの内容に合わせてお見積りします。交通費・宿泊費は実費です。</p>
		</div>
		<div class="plans__grid">
			<?php foreach ( $fb_plans as $p ) : ?>
			<div class="plan<?php echo $p['hot'] ? ' plan--hot' : ''; ?>">
				<p class="label <?php echo esc_attr( $p['cls'] ); ?>"><?php echo esc_html( $p['label'] ); ?><?php if ( $p['hot'] ) : ?> <span>— 人気</span><?php endif; ?></p>
				<p class="plan__price display">¥<?php echo esc_html( number_format( $p['price'] ) ); ?><small>〜 / <?php echo esc_html( $p['unit'] ); ?></small></p>
				<p class="plan__setup"><?php echo esc_html( $p['setup'] ); ?></p>
				<ul class="checks"><?php foreach ( $p['items'] as $it ) : ?><li><?php echo esc_html( $it ); ?></li><?php endforeach; ?></ul>
				<p class="plan__for"><?php echo esc_html( $p['for'] ); ?></p>
				<a class="pill pill--line lp-plan-cta" href="#contact">このプランで相談する</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="setup wrap">
	<figure class="setup__fig"><img src="<?php echo fb_img( 'switcher_closeup.jpg' ); ?>" alt="配信のスイッチャーを操作する手元" loading="lazy"><span class="about__bar" aria-hidden="true"></span></figure>
	<div class="setup__text">
		<p class="label">Setup</p>
		<h2 class="display display--jp section-head__en">体制と機材</h2>
		<p class="body-text">ソフトウェアベースの基幹システムで、<br>放送局水準の画作りを少人数・低コストで。<br>2020年から6年間、年間100試合超を止めずに配信してきた運用が、<br>そのまま御社の現場に入ります。</p>
		<ul class="checks checks--2col"><li>最大8カメラ（ミラーレス・PTZ）</li><li>オンタイムのリプレイ</li><li>スコア・スタッツ・選手名テロップ</li><li>実況席・ヘッドセット一式</li><li>最大5会場の同時配信</li><li>有線・IP回線のバックアップ</li><li>YouTube / 自社PF / 有料配信</li><li>大阪・東京拠点から全国出張</li></ul>
	</div>
</section>

<?php
$lp_works = new WP_Query( array(
	'post_type'      => 'works',
	'posts_per_page' => 6,
	'tax_query'      => array( array( 'taxonomy' => 'work_type', 'field' => 'slug', 'terms' => 'live' ) ),
	'no_found_rows'  => true,
) );
if ( $lp_works->have_posts() ) : ?>
<section class="works-home" id="works">
	<div class="wrap">
		<div class="section-head"><div><p class="label">Works — Live Streaming</p><h2 class="display display--jp section-head__en">配信実績</h2></div><a class="pill pill--line" href="<?php echo esc_url( home_url( '/works/type/live/' ) ); ?>">配信実績をすべて見る</a></div>
		<div class="works-grid works-grid--3">
			<?php while ( $lp_works->have_posts() ) : $lp_works->the_post(); get_template_part( 'template-parts/work-card', null, array( 'size' => 'md' ) ); endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="process wrap">
	<div class="section-head"><div><p class="label">Process</p><h2 class="display display--jp section-head__en">ご相談から配信まで</h2></div></div>
	<ol class="steps">
		<li><span class="display c-blue">01</span><strong>ご相談</strong><span>会場・日程・やりたいことをフォームでお知らせください。</span></li>
		<li><span class="display c-blue">02</span><strong>お見積り・プラン提案</strong><span>カメラ台数・テロップ・配信先を決めて概算をご提示。</span></li>
		<li><span class="display c-indigo">03</span><strong>下見・回線確認</strong><span>会場の電源・回線・カメラ位置を確認。遠方はオンラインで。</span></li>
		<li><span class="display c-purple">04</span><strong>当日配信</strong><span>設営から撤収まで。即日ダイジェストはその日のうちに。</span></li>
		<li><span class="display c-purple">05</span><strong>納品・レポート</strong><span>アーカイブと視聴データをお渡し。次回の改善案まで。</span></li>
	</ol>
</section>

<section class="faq wrap" id="faq">
	<div class="faq__head"><p class="label">FAQ</p><h2 class="display display--jp section-head__en">よくある<br>ご質問</h2></div>
	<dl class="faq__list">
		<?php foreach ( $fb_faq as $q ) : ?><div><dt><?php echo esc_html( $q[0] ); ?></dt><dd><?php echo esc_html( $q[1] ); ?></dd></div><?php endforeach; ?>
	</dl>
</section>

<section class="wrap contact-grid lp-contact" id="contact">
	<div class="contact-form">
		<p class="label">Contact</p>
		<h2 class="display display--jp section-head__en" style="margin:16px 0 12px">お見積り・ご相談</h2>
		<p class="body-text" style="margin:0 0 32px">日程や会場が決まっていない段階でも構いません。配信したい内容をお聞かせください。</p>
		<?php if ( $sc = fb_opt( 'contact_shortcode' ) ) : echo do_shortcode( $sc ); else : ?><p class="body-text"><a class="pill pill--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせフォームへ</a></p><?php endif; ?>
	</div>
	<aside class="contact-side">
		<p class="label">Plans</p>
		<ul class="lp-mini-plans">
			<?php foreach ( $fb_plans as $p ) : ?><li><span class="label <?php echo esc_attr( $p['cls'] ); ?>"><?php echo esc_html( $p['label'] ); ?></span><span class="display">¥<?php echo esc_html( number_format( $p['price'] ) ); ?><small>〜 / <?php echo esc_html( $p['unit'] ); ?></small></span></li><?php endforeach; ?>
		</ul>
		<p class="body-text" style="margin-top:24px">サービスの詳細は <a class="text-link" href="<?php echo esc_url( home_url( '/service/live-streaming/' ) ); ?>">ライブ配信のページ</a> へ。</p>
	</aside>
</section>

<?php
/* 構造化データ：サービスと料金、よくある質問 */
$ld = array(
	'@context' => 'https://schema.org',
	'@graph'   => array(
		array(
			'@type'       => 'Service',
			'name'        => 'ライブ配信代行（スポーツ・イベント・セミナー）',
			'serviceType' => 'ライブ配信',
			'provider'    => array( '@type' => 'Organization', 'name' => 'FASTBREAKS合同会社', 'url' => home_url( '/' ) ),
			'areaServed'  => array( '@type' => 'Country', 'name' => '日本' ),
			'url'         => get_permalink(),
			'offers'      => array_map( function ( $p ) {
				return array(
					'@type'              => 'Offer',
					'name'               => strtoupper( $p['label'] ) . 'プラン',
					'description'        => $p['setup'],
					'priceSpecification' => array( '@type' => 'UnitPriceSpecification', 'price' => $p['price'], 'priceCurrency' => 'JPY', 'minPrice' => $p['price'], 'unitText' => $p['unit'] ),
				);
			}, $fb_plans ),
		),
		array(
			'@type'      => 'FAQPage',
			'mainEntity' => array_map( function ( $q ) {
				return array( '@type' => 'Question', 'name' => $q[0], 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $q[1] ) );
			}, $fb_faq ),
		),
	),
);
echo '<script type="application/ld+json">' . wp_json_encode( $ld, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
?>

<?php get_footer( 'lp' ); ?>
