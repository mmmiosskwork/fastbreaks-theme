<?php
/**
 * Template Name: 学生インターン
 * 固定ページ「学生インターン」（スラッグ internship / 親：採用）に自動適用
 */
get_header();
$univs = array( '大阪大学', '神戸大学', '大阪公立大学', '滋賀大学', '同志社大学', '関西大学', '関西学院大学', '立命館大学', '京都産業大学', '近畿大学', '甲南大学', '龍谷大学', '大阪経済大学', '大阪体育大学' );
$roles = array(
	array( 'Live',    'ライブ配信',   'カメラ・スイッチャー・実況席まで。リーグ戦の配信を、チームの一員として動かします。' ),
	array( 'Camera',  '撮影',         'コートサイドから選手の表情を切り取る。試合の「一瞬」を残す仕事です。' ),
	array( 'Edit',    '編集',         'ハイライト、縦型ショート、ドキュメンタリー。撮った素材を、届く映像に変えます。' ),
	array( 'Social',  'SNS運用',      '投稿して終わりにしない。数字を見て、次の一手を自分で考えます。' ),
	array( 'Write',   '記事執筆',     '選手やチームに取材し、noteで物語として届けます。' ),
);
?>
<section class="phero phero--plain">
	<div class="wrap phero__inner">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>">Recruit</a><span>／</span><span>Internship</span></nav>
		<p class="label">Student Internship — 関西学生バスケットボール</p>
		<h1 class="display phero__title">Student<br><span class="gradtext">internship.</span></h1>
		<p class="phero__jp">本気の熱狂を、届ける側へ。</p>
		<p class="phero__lead">関西学生バスケの最前線で、「一生の仕事観」を手に入れる実践型プログラム。配信・撮影・編集・SNS運用・記事執筆まで、すべてを現場で経験します。未経験から始めた先輩がほとんどです。</p>
		<div class="btn-row"><a class="pill pill--accent" href="#apply">インターンに応募する</a><a class="pill pill--line" href="#voices">先輩の声を見る</a></div>
	</div>
</section>

<section class="coverage">
	<p class="ghost ghost--right" aria-hidden="true">What you do</p>
	<div class="wrap">
		<div class="section-head"><div><p class="label">What you do</p><p class="display display--jp section-head__en">現場でやること</p></div><p class="section-head__lead">興味のある領域から始めて、慣れてきたら他の領域にも挑戦できます。</p></div>
		<div class="roles">
			<?php foreach ( $roles as $i => $r ) : ?>
			<div class="role">
				<span class="role__num">0<?php echo $i + 1; ?></span>
				<p class="display role__en"><?php echo esc_html( $r[0] ); ?></p>
				<p class="role__jp"><?php echo esc_html( $r[1] ); ?></p>
				<p class="body-text"><?php echo esc_html( $r[2] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="wrap" style="padding:120px var(--gutter);border-top:1px solid var(--line)">
	<div class="section-head"><div><p class="label">Why intern here</p><p class="display display--jp section-head__en">ここで得られるもの</p></div></div>
	<div class="cards3">
		<div class="card"><p class="display card__en c-blue">01</p><p class="card__title">「同世代」ならではの距離感と視点</p><p class="body-text">選手と同じ大学生が制作・発信を担うから、大人には撮れない「リアルな表情」や「内輪の熱気」を捉えられる。その感性が、そのまま価値になります。</p></div>
		<div class="card"><p class="display card__en c-indigo">02</p><p class="card__title">プロ水準の機材と実務</p><p class="body-text">配信・撮影・編集・執筆の全工程で、プロと同じ現場に立ちます。OJTで、社会に出てもすぐ通用するメディアスキルが身につきます。</p></div>
		<div class="card"><p class="display card__en c-purple">03</p><p class="card__title">数字で考える、実践型SNSマーケティング</p><p class="body-text">リーチ数・維持率・保存数などのインサイトをもとに、自分で次の改善案を考える。生きたデータで学べる環境です。</p></div>
	</div>
</section>

<section class="wrap" id="voices" style="padding:120px var(--gutter);border-top:1px solid var(--line)">
	<div class="section-head"><div><p class="label">Voices</p><p class="display display--jp section-head__en">インターンの声</p></div><p class="section-head__lead">これまでの参加者の出身校：<?php echo esc_html( implode( ' / ', $univs ) ); ?></p></div>
	<div class="cards3">
		<div class="card"><p class="label">神戸大学 4回生</p><p class="card__title">自分の企画で、数百万回の記録を打ち立てる</p><p class="body-text">バスケ部のマネージャーから転身しました。自分の企画アイデアが形になり、それが数百万回という再生回数を記録することがモチベーションになりました。</p></div>
		<div class="card"><p class="label">近畿大学 3回生</p><p class="card__title">3年間の長期参加</p><p class="body-text">2回生から参加し、4回生では配信・撮影・編集・執筆まですべてを担当しました。大学時代にここまで本気で取り組めた経験は貴重です。</p></div>
		<div class="card"><p class="label">近畿大学 3回生</p><p class="card__title">進路選択のきっかけに</p><p class="body-text">FASTBREAKSの活動から、自分の将来の選択が明確になりました。チームや選手と近い距離感で撮影することで、新たな視点が生まれました。</p></div>
	</div>
</section>

<section class="wrap" style="padding:120px var(--gutter);border-top:1px solid var(--line)">
	<div class="intern-info">
		<div>
			<p class="label">Requirements</p>
			<p class="display display--jp section-head__en" style="margin:16px 0 32px">募集要項</p>
			<dl class="spec spec--table">
				<div><dt>対象</dt><dd>大学1〜3回生（学部・学科不問）<small>4回生・大学院生もご相談ください</small></dd></div>
				<div><dt>活動内容</dt><dd>ライブ配信・撮影・編集・SNS運用・記事執筆</dd></div>
				<div><dt>活動場所</dt><dd>関西の試合会場、オンライン</dd></div>
				<div><dt>期間</dt><dd>シーズン単位（更新あり）</dd></div>
				<div><dt>経験</dt><dd>未経験歓迎<small>機材の扱いや編集はゼロからお教えします</small></dd></div>
				<div><dt>こんな人に</dt><dd>スポーツが好きな人／自分の企画を世に出したい人／数字で振り返れる人</dd></div>
			</dl>
		</div>
		<aside>
			<p class="label">Flow</p>
			<ol class="steps steps--vertical" style="margin-top:24px">
				<li><span class="display c-blue">01</span><strong>応募</strong><span>このページのフォームからエントリー</span></li>
				<li><span class="display c-blue">02</span><strong>カジュアル面談</strong><span>オンラインで30分。気軽に話しましょう</span></li>
				<li><span class="display c-indigo">03</span><strong>現場見学</strong><span>実際の配信現場に1日同行</span></li>
				<li><span class="display c-purple">04</span><strong>参加開始</strong><span>機材・編集のレクチャーから</span></li>
			</ol>
		</aside>
	</div>
</section>

<section class="wrap contact-grid" id="apply" style="border-top:1px solid var(--line);padding-top:120px">
	<div class="contact-form">
		<p class="label">Apply — Student Internship</p>
		<p class="display display--jp section-head__en" style="margin:16px 0 12px">インターン応募フォーム</p>
		<p class="body-text" style="margin:0 0 32px">送信後、自動返信メールが届きます。内容を確認のうえ、カジュアル面談のご案内をお送りします。</p>
		<?php if ( $sc = fb_opt( 'intern_shortcode' ) ) : echo do_shortcode( $sc ); else : ?><div class="notice-box"><p>インターン応募フォームのショートコードを「設定 → FASTBREAKS サイト設定」に登録してください。</p></div><?php endif; ?>
	</div>
	<aside class="contact-side">
		<p class="label">Creators</p>
		<p class="body-text" style="margin-top:16px">学生ではなく、配信オペレーター・カメラマン・エディターとしてのご応募（業務委託・正社員）は<a class="text-link" href="<?php echo esc_url( home_url( '/recruit/#apply' ) ); ?>">クリエイター採用</a>からお願いします。</p>
	</aside>
</section>

<?php get_footer(); ?>
