<?php
/**
 * ニュース詳細
 */
get_header();
while ( have_posts() ) : the_post(); $c = get_the_category(); ?>
<article class="post-single">
	<section class="ptitle ptitle--post">
		<div class="wrap wrap--narrow">
			<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( fb_news_url() ); ?>">News</a><span>／</span><span><?php the_title(); ?></span></nav>
			<p class="post-single__meta"><time class="display" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><?php if ( $c ) : ?><span class="tag"><?php echo esc_html( $c[0]->name ); ?></span><?php endif; ?></p>
			<h1 class="post-single__title"><?php the_title(); ?></h1>
		</div>
	</section>
	<div class="wrap wrap--narrow">
		<?php if ( has_post_thumbnail() ) : ?><figure class="post-single__fig"><?php the_post_thumbnail( 'fb-wide' ); ?></figure><?php endif; ?>
		<div class="entry-content"><?php the_content(); ?></div>
		<p class="post-single__back"><a class="arrow-link" href="<?php echo esc_url( fb_news_url() ); ?>">← News index</a></p>
	</div>
</article>
<?php endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
