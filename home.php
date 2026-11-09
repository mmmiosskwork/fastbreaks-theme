<?php
/**
 * ニュース一覧・その他のフォールバック
 */
get_header(); ?>
<section class="ptitle">
	<p class="ghost" aria-hidden="true">News</p>
	<div class="wrap">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>News</span></nav>
		<div class="section-head"><div><p class="label">News</p><h1 class="display ptitle__title"><?php echo is_category() ? esc_html( single_cat_title( '', false ) ) : 'Latest news'; ?></h1></div></div>
		<?php $cats = get_categories( array( 'hide_empty' => true ) ); if ( $cats ) : ?>
		<div class="filters"><div class="filters__row"><span class="label label--muted">Category</span><a class="pill pill--sm <?php echo is_category() ? '' : 'is-on'; ?>" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">All</a><?php foreach ( $cats as $c ) : if ( 'report' === $c->slug ) { continue; } ?><a class="pill pill--sm <?php echo is_category( $c->term_id ) ? 'is-on' : ''; ?>" href="<?php echo esc_url( get_category_link( $c ) ); ?>"><?php echo esc_html( $c->name ); ?></a><?php endforeach; ?></div></div>
		<?php endif; ?>
	</div>
</section>
<section class="wrap news-archive">
	<?php if ( have_posts() ) : ?>
	<ul class="news-grid">
		<?php while ( have_posts() ) : the_post(); $c = get_the_category(); ?>
		<li><a href="<?php the_permalink(); ?>"><?php get_template_part( 'template-parts/news-cover' ); ?><span class="news__body"><span class="news__meta"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php if ( $c ) : ?><span class="tag"><?php echo esc_html( $c[0]->name ); ?></span><?php endif; ?></span><span class="news__title"><?php the_title(); ?></span></span></a></li>
		<?php endwhile; ?>
	</ul>
	<div class="pager"><?php the_posts_pagination( array( 'prev_text' => '← Prev', 'next_text' => 'Next →', 'mid_size' => 1 ) ); ?></div>
	<?php else : ?><p class="body-text">記事はまだありません。</p><?php endif; ?>
</section>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
