<?php
/**
 * トップページ
 */
get_header();
$hero_video = fb_opt( 'hero_video' );
/* PC は元の映像（サイト設定 hero_video・無圧縮のまま）、スマホだけテーマ同梱の軽量版（960px） */
$hero_sm = file_exists( get_template_directory() . '/assets/video/hero-sp.mp4' ) ? FB_THEME_URI . '/assets/video/hero-sp.mp4?v=' . FB_THEME_VER : '';
if ( ! $hero_video && file_exists( get_template_directory() . '/assets/video/hero-720.mp4' ) ) { $hero_video = FB_THEME_URI . '/assets/video/hero-720.mp4?v=' . FB_THEME_VER; }
$hero_image = fb_opt( 'hero_image' ) ? fb_opt( 'hero_image' ) : fb_img( 'hero_celebrate.jpg' );
$show_prices = '1' === (string) fb_opt( 'show_prices' );
?>

<!-- HERO -->
<section class="hero" id="top">
	<div class="hero__media" aria-hidden="true">
		<?php if ( $hero_video ) : ?>
			<video class="hero__video" autoplay muted loop playsinline preload="auto" poster="<?php echo esc_url( $hero_image ); ?>" data-src-lg="<?php echo esc_url( $hero_video ); ?>" data-src-sm="<?php echo esc_url( $hero_sm ? $hero_sm : $hero_video ); ?>"></video>
			<script>(function(v){if(!v)return;var sm=window.matchMedia('(max-width:900px)').matches;v.src=sm?v.getAttribute('data-src-sm'):v.getAttribute('data-src-lg');})(document.currentScript.previousElementSibling);</script>
		<?php endif; ?>
		<img class="hero__img" src="<?php echo esc_url( $hero_image ); ?>" alt="" fetchpriority="high">
		<div class="hero__tint hero__tint--shadow"></div>
		<div class="hero__tint hero__tint--light"></div>
		<div class="hero__tint hero__tint--glow"></div>
		<div class="hero__tint hero__tint--dark"></div>
		<div class="hero__fade"></div>
	</div>
	<div class="hero__slash" aria-hidden="true"></div>
	<div class="wrap hero__inner">
		<p class="label hero__in">Sports × Digital Contents Production</p>
		<h1 class="display hero__title"><span class="line"><span>One instance</span></span><span class="line"><span>shows <span class="gradtext">all the rest.</span></span></span></h1>
		<p class="hero__jp hero__in">確かな熱源が、そこにはある。</p>
		<p class="hero__lead hero__in">大学スポーツの最前線から、心を動かす瞬間を届ける。<br>熱と物語を形にする、コンテンツプロダクション。</p>
	</div>
	<?php if ( $hero_video ) : ?>
	<?php endif; ?>
	<div class="hero__scroll" aria-hidden="true"><span></span>SCROLL</div>
</section>

<!-- ABOUT -->
<section class="about" id="about">
	<p class="ghost" aria-hidden="true">Heat Source</p>
	<div class="wrap about__grid">
		<div class="about__text">
			<p class="label"><span class="label__idx">01</span>About us</p>
			<p class="display about__en">Digital ×<br>Sports Contents</p>
			<h2 class="about__title">挑んで、倒れて、また挑む。<br>それを繰り返す姿こそが、人を動かすと信じている。</h2>
			<p class="body-text">コロナ禍で観客が入れなくなった関西学生バスケットボールの全試合を、ゼロからライブ配信したのがFASTBREAKSの原点です。選手とチームのストーリーに焦点を当てたコンテンツは、6年間で累計7,000万回再生に。現場の熱を掘り起こし、デジタルの力で増幅させ、速攻で届ける。「記録」で終わらせない。「熱狂」に変える。</p>
			<div class="btn-row"><a class="arrow-link" href="<?php echo esc_url( home_url( '/vision/' ) ); ?>">Our vision <span aria-hidden="true">→</span></a><a class="arrow-link" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">Company <span aria-hidden="true">→</span></a></div>
		</div>
		<figure class="about__fig">
			<img src="<?php echo fb_img( 'crew_headsets.jpg' ); ?>" alt="ヘッドセットを着けた配信クルー" loading="lazy">
			<span class="about__bar" aria-hidden="true"></span>
		</figure>
	</div>
</section>

<!-- SERVICE -->
<section class="service" id="service">
	<p class="ghost ghost--right" aria-hidden="true">What we do</p>
	<div class="wrap">
		<div class="section-head">
			<div>
				<p class="label"><span class="label__idx">02</span>Service</p>
				<p class="display section-head__en">Live. Video. Social.<br><span class="gradtext">All in one team.</span></p>
			</div>
			<p class="section-head__lead">配信も、映像も、SNSも。現場を知るチームが企画から配信・分析まで一気通貫で。<?php if ( $show_prices ) : ?>価格は税別・目安です。<?php endif; ?></p>
		</div>
		<div class="service__grid">
			<figure class="service__fig">
				<img src="<?php echo fb_img( 'operator_court.jpg' ); ?>" alt="コートサイドで配信を操作するスタッフ" loading="lazy">
				<figcaption class="display">Broadcast grade,<br>SNS speed.</figcaption>
			</figure>
			<div class="service__rows">
				<a class="srow" href="<?php echo esc_url( home_url( '/service/live-streaming/' ) ); ?>">
					<span class="srow__num display">01</span>
					<span class="srow__body"><span class="srow__en display">Live Streaming &amp; Video</span><span class="srow__jp">ライブ配信・映像制作。マルチカメラ・リプレイ・リアルタイムスタッツ表示・実況解説まで少人数で完結。ハイライトからドキュメンタリーまで。</span></span>
					<?php if ( $show_prices && fb_price( 'price_live' ) ) : ?><span class="srow__price"><span class="display"><?php echo esc_html( fb_price( 'price_live' ) ); ?>〜</span><small>配信 / 1日</small></span><?php endif; ?>
					<span class="srow__arrow display" aria-hidden="true">→</span>
				</a>
				<a class="srow" href="<?php echo esc_url( home_url( '/service/sns/' ) ); ?>">
					<span class="srow__num display">02</span>
					<span class="srow__body"><span class="srow__en display">SNS &amp; Marketing</span><span class="srow__jp">SNS運用・コンテンツマーケティング。縦型ショートの即日編集、インサイト分析、BPO運用まで。</span></span>
					<?php if ( $show_prices && fb_price( 'price_sns' ) ) : ?><span class="srow__price"><span class="display"><?php echo esc_html( fb_price( 'price_sns' ) ); ?>〜</span><small>運用 / 月</small></span><?php endif; ?>
					<span class="srow__arrow display" aria-hidden="true">→</span>
				</a>
				<a class="srow" href="<?php echo esc_url( home_url( '/service/media/' ) ); ?>">
					<span class="srow__num display">03</span>
					<span class="srow__body"><span class="srow__en display">Media &amp; Sponsored</span><span class="srow__jp">自社メディア『FASTBREAKS』とスポンサードコンテンツ。Z世代に直接届くチャネルでタイアップを設計。</span></span>
					<?php if ( $show_prices && fb_price( 'price_media' ) ) : ?><span class="srow__price"><span class="display"><?php echo esc_html( fb_price( 'price_media' ) ); ?>〜</span><small>企画 / 1本</small></span><?php endif; ?>
					<span class="srow__arrow display" aria-hidden="true">→</span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- CLIENTS -->
<?php $clients = fb_clients(); if ( $clients ) : ?>
<section class="clients wrap" aria-label="取引先実績">
	<p class="label label--muted">Trusted by</p>
	<ul class="clients__list">
		<?php foreach ( $clients as $c ) : ?>
			<li><?php if ( $c['img'] ) : ?><img src="<?php echo esc_url( $c['img'] ); ?>" alt="<?php echo esc_attr( $c['name'] ); ?>" loading="lazy"><?php else : ?><span><?php echo esc_html( $c['name'] ); ?></span><?php endif; ?></li>
		<?php endforeach; ?>
	</ul>
</section>
<?php endif; ?>

<!-- WORKS -->
<?php
$featured = new WP_Query( array(
	'post_type' => 'works', 'posts_per_page' => 5,
	'meta_key' => 'fb_featured', 'meta_value' => '1',
) );
if ( ! $featured->have_posts() ) {
	$featured = new WP_Query( array( 'post_type' => 'works', 'posts_per_page' => 5 ) );
}
if ( $featured->have_posts() ) : ?>
<section class="works-home" id="works">
	<div class="wrap">
		<div class="section-head">
			<div>
				<p class="label"><span class="label__idx">03</span>Works</p>
				<p class="display section-head__en">Selected works</p>
			</div>
			<a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">All works</a>
		</div>
		<div class="works-grid works-grid--home">
			<?php $n = 0; while ( $featured->have_posts() ) : $featured->the_post(); $n++;
				get_template_part( 'template-parts/work-card', null, array( 'size' => $n <= 2 ? 'lg' : 'md', 'class' => $n <= 2 ? 'span-6' : 'span-4' ) );
			endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- FACTS -->
<section class="facts" aria-label="数字で見るFASTBREAKS">
	<div class="wrap facts__grid">
		<div class="facts__head">
			<p class="label"><span class="label__idx">04</span>Facts</p>
			<p class="display facts__en">By the<br>numbers</p>
			<p class="facts__note">2020–2025 / 2025年実績</p>
		</div>
		<ul class="facts__list">
			<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
			<li class="fact">
				<p class="fact__num display"><span class="<?php echo 1 === $i ? 'gradtext' : ''; ?>" data-count><?php echo esc_html( fb_opt( "fact{$i}_value" ) ); ?></span><span class="fact__unit"><?php echo esc_html( fb_opt( "fact{$i}_unit" ) ); ?></span></p>
				<?php $fb_lbl = (string) fb_opt( "fact{$i}_label" ); /* 設定で「|」を入れた位置だけで改行する */ ?>
				<p class="fact__label<?php echo false !== strpos( $fb_lbl, '|' ) ? ' fact__label--wbr' : ''; ?>"><?php echo implode( '<wbr>', array_map( 'esc_html', explode( '|', $fb_lbl ) ) ); ?></p>
			</li>
			<?php endfor; ?>
		</ul>
	</div>
</section>

<!-- STRENGTH -->
<section class="strength" id="strength">
	<div class="strength__slash" aria-hidden="true"></div>
	<div class="wrap strength__inner">
		<div class="strength__head">
			<p class="label"><span class="label__idx">05</span>Why FASTBREAKS</p>
			<p class="display section-head__en">Try. Fail. Fast.<br>Break. Repeat.</p>
		</div>
		<div class="strength__grid">
			<div class="str">
				<p class="str__num display">01</p>
				<p class="str__en display">Top of mind</p>
				<p class="str__title">関西学生バスケの「第一想起」</p>
				<p class="body-text">「関西の大学バスケ情報は、まずFASTBREAKSを見る」という視聴習慣。現場密着の取材が、Z世代からの信頼と拡散の初速を生みます。</p>
			</div>
			<div class="str">
				<p class="str__num display">02</p>
				<p class="str__en display">Broadcast × Speed</p>
				<p class="str__title">「放送グレード×SNSスピード」の制作体制</p>
				<p class="body-text">ソフトウェアベースの基幹システムで放送クオリティを保ちながらコストダウン。SNSコンテンツは撮影から公開までを会場で即日完結します。</p>
			</div>
			<div class="str">
				<p class="str__num display">03</p>
				<p class="str__en display">Game literacy</p>
				<p class="str__title">競技理解に基づく「競技特化」の構成力</p>
				<p class="body-text">「どこを切り取れば盛り上がるか」が分かるから、自走して高品質に。クライアントの修正コストを最小化します。</p>
			</div>
		</div>
	</div>
</section>

<!-- OUR MEDIA：ドキュメンタリー / Instagram / note -->
<?php $sig_id = fb_youtube_id( fb_opt( 'sig_video' ) ); $notes = fb_note_items( 4 ); $ig = fb_opt( 'instagram_shortcode' ); ?>
<section class="media-row" id="media">
	<div class="wrap">
		<div class="section-head section-head--tight">
			<div>
				<p class="label"><span class="label__idx">06</span>Our media</p>
				<p class="display section-head__en">Stories from <span class="gradtext">the court.</span></p>
			</div>
			<?php echo fb_sns_list( 'sns-icons--lg' ); // phpcs:ignore ?>
		</div>
		<div class="media-row__grid">
			<?php if ( $sig_id ) : ?>
			<div class="mcol mcol--doc" id="documentary">
				<p class="mcol__label">Original content</p>
				<p class="display mcol__head"><?php echo esc_html( fb_opt( 'sig_heading' ) ); ?></p>
				<div class="mcol__split">
					<div class="yt-facade" data-yt="<?php echo esc_attr( $sig_id ); ?>">
					<button type="button" class="yt-facade__btn" aria-label="動画を再生：<?php echo esc_attr( fb_opt( 'sig_title' ) ); ?>">
						<img src="https://i.ytimg.com/vi/<?php echo esc_attr( $sig_id ); ?>/maxresdefault.jpg" onerror="this.onerror=null;this.src='https://i.ytimg.com/vi/<?php echo esc_attr( $sig_id ); ?>/hqdefault.jpg'" alt="" loading="lazy">
						<span class="yt-facade__play" aria-hidden="true"></span>
					</button>
				</div>
					<div class="mcol__body">
						<?php if ( fb_opt( 'sig_series' ) ) : ?><p class="signature__series"><?php echo esc_html( fb_opt( 'sig_series' ) ); ?></p><?php endif; ?>
				<h2 class="signature__title"><?php echo esc_html( fb_opt( 'sig_title' ) ); ?></h2>
				<?php if ( fb_opt( 'sig_lead' ) ) : ?><p class="mcol__text"><?php echo esc_html( fb_opt( 'sig_lead' ) ); ?></p><?php endif; ?>
				<a class="arrow-link" href="<?php echo esc_url( 'https://www.youtube.com/watch?v=' . $sig_id ); ?>" target="_blank" rel="noopener">YouTube で見る <span aria-hidden="true">↗</span></a>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="mcol mcol--ig">
				<p class="mcol__label">Instagram</p>
				<p class="display mcol__head"><?php echo esc_html( fb_opt( 'sns_handle' ) ); ?></p>
				<?php if ( fb_opt( 'sns_followers' ) ) : ?><p class="mcol__text"><?php echo esc_html( fb_opt( 'sns_followers' ) ); ?></p><?php endif; ?>
				<?php if ( $ig ) : ?>
					<div class="media__feed"><?php echo do_shortcode( $ig ); ?></div>
				<?php else : ?>
					<div class="media__grid" aria-hidden="true">
						<?php foreach ( array( 'hero_celebrate', 'arena_wide', 'arena_purple', 'operator_court' ) as $f ) : ?>
							<img src="<?php echo fb_img( $f . '.jpg' ); ?>" alt="" loading="lazy">
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( $notes ) : ?>
			<div class="mcol mcol--note" id="note">
				<p class="mcol__label">Stories on note</p>
				<p class="display mcol__head">FASTBREAKS <span class="gradtext">note</span></p>
				<p class="mcol__text">関西学生バスケットボールの公式note。コートの外にある選手とチームのストーリーを届けています。</p>
				<ul class="note-mini">
					<?php foreach ( $notes as $n ) : ?>
					<li><a href="<?php echo esc_url( $n['link'] ); ?>" target="_blank" rel="noopener">
						<span class="note-mini__thumb"><?php if ( $n['thumb'] ) : ?><img src="<?php echo esc_url( $n['thumb'] ); ?>" alt="" loading="lazy"><?php endif; ?></span>
						<span class="note-mini__body"><time datetime="<?php echo esc_attr( gmdate( 'c', $n['date'] ) ); ?>"><?php echo esc_html( wp_date( 'Y.m.d', $n['date'] ) ); ?></time><span class="note-mini__title"><?php echo esc_html( $n['title'] ); ?></span></span>
					</a></li>
					<?php endforeach; ?>
				</ul>
				<a class="arrow-link" href="<?php echo esc_url( fb_opt( 'sns_note' ) ); ?>" target="_blank" rel="noopener">note をもっと見る <span aria-hidden="true">↗</span></a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- NEWS -->
<section class="news-solo wrap" id="news">
	<div class="news">
		<div class="section-head section-head--tight">
			<div><p class="label"><span class="label__idx">07</span>News</p><p class="display section-head__en">Latest</p></div>
			<a class="arrow-link" href="<?php echo esc_url( fb_news_url() ); ?>">Index →</a>
		</div>
		<ul class="news__list">
			<?php $news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' => fb_report_only_ids() ) );
			while ( $news->have_posts() ) : $news->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php get_template_part( 'template-parts/news-cover' ); ?><span class="news__body"><span class="news__meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php $c = get_the_category(); if ( $c ) : ?><span class="tag"><?php echo esc_html( $c[0]->name ); ?></span><?php endif; ?></span><span class="news__title"><?php the_title(); ?></span></span></a></li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<div class="recruit-boxes" id="recruit">
			<a class="rbox" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>"><span class="label">Recruit</span><span class="display">Creators wanted →</span><small>クリエイター募集</small></a>
			<a class="rbox" href="<?php echo esc_url( home_url( '/recruit/' ) ); ?>"><span class="label">Internship</span><span class="display">Students wanted →</span><small>学生インターン募集</small></a>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/cta' ); ?>

<?php get_footer(); ?>
