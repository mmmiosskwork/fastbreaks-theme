<?php
/**
 * ニュース詳細（実績詳細と同じ構成：上部はサイト幅の左端揃え、本文は左に日付・カテゴリ、右に本文）
 */
get_header();
while ( have_posts() ) : the_post(); $c = get_the_category(); ?>
<article class="post-single">
	<section class="phero phero--plain phero--work">
		<div class="wrap phero__inner">
			<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( fb_news_url() ); ?>">News</a><span>／</span><span><?php the_title(); ?></span></nav>
			<p class="post-single__meta"><time class="display" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php if ( $c ) : ?><span class="tag"><?php echo esc_html( $c[0]->name ); ?></span><?php endif; ?></p>
			<h1 class="work-single__title"><?php the_title(); ?></h1>
		</div>
	</section>
	<div class="wrap post-single__grid">
		<aside class="post-single__aside">
			<dl class="spec">
				<div><dt>Date</dt><dd><?php echo esc_html( get_the_date( 'Y年n月j日' ) ); ?></dd></div>
				<?php if ( $c ) : ?><div><dt>Category</dt><dd><?php echo esc_html( implode( ' / ', wp_list_pluck( $c, 'name' ) ) ); ?></dd></div><?php endif; ?>
			</dl>
			<a class="arrow-link" href="<?php echo esc_url( fb_news_url() ); ?>">← News index</a>
		</aside>
		<div class="post-single__main">
			<?php if ( has_post_thumbnail() ) : ?><figure class="post-single__fig"><?php the_post_thumbnail( 'fb-wide' ); ?></figure><?php endif; ?>
			<div class="entry-content"><?php the_content(); ?></div>
		</div>
	</div>
</article>
<?php
/* 関連記事（同じカテゴリの新しい順に3件。レポートのみの記事は除外）— ExUnit の関連記事は CSS で非表示 */
$cat_ids = wp_list_pluck( get_the_category(), 'term_id' );
$rel = new WP_Query( array(
	'post_type'           => 'post',
	'posts_per_page'      => 3,
	'post__not_in'        => array_merge( array( get_the_ID() ), fb_report_only_ids() ),
	'category__in'        => $cat_ids,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
) );
if ( $rel->have_posts() ) : ?>
<section class="wrap related">
	<div class="section-head section-head--tight"><div><p class="label">Related</p><p class="display section-head__en">More news</p></div><a class="arrow-link" href="<?php echo esc_url( fb_news_url() ); ?>">Index →</a></div>
	<ul class="news-grid">
		<?php while ( $rel->have_posts() ) : $rel->the_post(); $rc = get_the_category(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php get_template_part( 'template-parts/news-cover' ); ?><span class="news__body"><span class="news__meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php if ( $rc ) : ?><span class="tag"><?php echo esc_html( $rc[0]->name ); ?></span><?php endif; ?></span><span class="news__title"><?php the_title(); ?></span></span></a></li>
		<?php endwhile; wp_reset_postdata(); ?>
	</ul>
</section>
<?php endif; ?>
<?php endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
