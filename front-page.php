<?php
/**
 * トップページ
 */
get_header();
$hero_video = fb_opt( 'hero_video' );
$hero_image = fb_opt( 'hero_image' ) ? fb_opt( 'hero_image' ) : fb_img( 'hero_celebrate.jpg' );
$show_prices = '1' === (string) fb_opt( 'show_prices' );
?>

<!-- HERO -->
<section class="hero" id="top">
	<div class="hero__media" aria-hidden="true">
		<?php if ( $hero_video ) : ?>
			<video class="hero__video" autoplay muted loop playsinline poster="<?php echo esc_url( $hero_image ); ?>">
				<source src="<?php echo esc_url( $hero_video ); ?>" type="video/mp4">
			</video>
		<?php endif; ?>
		<img class="hero__img" src="<?php echo esc_url( $hero_image ); ?>" alt="" fetchpriority="high">
		<div class="hero__tint hero__tint--shadow"></div>
		<div class="hero__tint hero__tint--light"></div>
		<div class="hero__tint hero__tint--glow"></div>
		<div class="hero__tint hero__tint--dark"></div>
		<div class="hero__fade"></div>
	</div>
	<div class="hero__slash" aria-hidden="true"></div>
	<p class="ghost ghost--hero" aria-hidden="true">FASTBREAKS</p>
	<div class="wrap hero__inner">
		<p class="label hero__in">Sports × Digital Contents Production — Osaka / Tokyo</p>
		<h1 class="display hero__title"><span class="line"><span>One instance</span></span><span class="line"><span>shows <span class="gradtext">all the rest.</span></span></span></h1>
		<p class="hero__jp hero__in">確かな熱源が、そこにはある。</p>
		<p class="hero__lead hero__in">大学スポーツの最前線から、スポーツの映像・ライブ配信・SNSをつくる。<br>関西発「映像制作×ライブ配信×SNS運用」のコンテンツプロダクション。</p>
		<div class="btn-row hero__in">
			<a class="pill pill--accent" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact us</a>
			<a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">Selected works</a>
		</div>
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
					<span class="srow__body"><span class="srow__en display">Live Streaming &amp; Video</span><span class="srow__jp">ライブ配信・映像制作。マルチカメラ・実況・テロップまで少人数で完結。ハイライトからドキュメンタリーまで。</span></span>
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
				<p class="fact__label"><?php echo esc_html( fb_opt( "fact{$i}_label" ) ); ?></p>
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
				<p class="body-text">ソフトウェアベースの基幹システムで放送クオリティを保ちながらコストダウン。撮影から公開までを会場で即日完結します。</p>
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

<!-- NOTE -->
<?php $notes = fb_note_items( 4 ); if ( $notes ) : ?>
<section class="note-feed wrap" id="note">
	<div class="section-head">
		<div>
			<p class="label">Stories on note</p>
			<p class="display section-head__en">FASTBREAKS <span class="gradtext">note</span></p>
		</div>
		<p class="section-head__lead">関西学生バスケットボールの公式note。コートの外にある選手とチームのストーリーを届けています。</p>
	</div>
	<ul class="note-feed__list">
		<?php foreach ( $notes as $n ) : ?>
		<li><a href="<?php echo esc_url( $n['link'] ); ?>" target="_blank" rel="noopener">
			<span class="note-feed__thumb"><?php if ( $n['thumb'] ) : ?><img src="<?php echo esc_url( $n['thumb'] ); ?>" alt="" loading="lazy"><?php endif; ?></span>
			<span class="note-feed__meta"><span class="note-feed__src">note</span><time datetime="<?php echo esc_attr( gmdate( 'c', $n['date'] ) ); ?>"><?php echo esc_html( wp_date( 'Y.m.d', $n['date'] ) ); ?></time></span>
			<span class="note-feed__title"><?php echo esc_html( $n['title'] ); ?></span>
			<span class="note-feed__go">note で読む <span aria-hidden="true">↗</span></span>
		</a></li>
		<?php endforeach; ?>
	</ul>
	<div class="note-feed__more"><a class="pill pill--line" href="<?php echo esc_url( fb_opt( 'sns_note' ) ); ?>" target="_blank" rel="noopener">note をもっと見る ↗</a></div>
</section>
<?php endif; ?>

<!-- MEDIA + NEWS -->
<section class="media-news wrap" id="news">
	<div class="media">
		<p class="label"><span class="label__idx">06</span>Our media</p>
		<p class="display section-head__en"><?php echo esc_html( fb_opt( 'sns_handle' ) ); ?></p>
		<p class="media__note"><?php echo esc_html( fb_opt( 'sns_followers' ) ); ?></p>
		<?php if ( $ig = fb_opt( 'instagram_shortcode' ) ) : ?>
			<div class="media__feed"><?php echo do_shortcode( $ig ); ?></div>
		<?php else : ?>
			<div class="media__grid" aria-hidden="true">
				<?php foreach ( array( 'hero_celebrate', 'arena_wide', 'arena_purple', 'operator_court', 'switcher_laptop', 'switcher_closeup' ) as $f ) : ?>
					<img src="<?php echo fb_img( $f . '.jpg' ); ?>" alt="" loading="lazy">
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<div class="btn-row">
			<?php foreach ( array( 'YouTube' => 'sns_youtube', 'Instagram' => 'sns_instagram', 'TikTok' => 'sns_tiktok', 'note' => 'sns_note' ) as $label => $key ) : if ( $u = fb_opt( $key ) ) : ?>
				<a class="pill pill--line pill--sm" href="<?php echo esc_url( $u ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $label ); ?></a>
			<?php endif; endforeach; ?>
		</div>
	</div>
	<div class="news">
		<div class="section-head section-head--tight">
			<div><p class="label"><span class="label__idx">07</span>News</p><p class="display section-head__en">Latest</p></div>
			<a class="arrow-link" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">Index →</a>
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
