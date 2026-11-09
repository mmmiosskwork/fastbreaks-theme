<?php
/**
 * 汎用固定ページ（会社概要・採用・プライバシーポリシー等）
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<article class="page-generic">
	<section class="ptitle">
		<p class="ghost" aria-hidden="true"><?php echo esc_html( get_post_meta( get_the_ID(), 'fb_en_title', true ) ?: get_the_title() ); ?></p>
		<div class="wrap">
			<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span><?php the_title(); ?></span></nav>
			<div class="section-head"><div><?php if ( $sub = get_post_meta( get_the_ID(), 'fb_label', true ) ) : ?><p class="label"><?php echo esc_html( $sub ); ?></p><?php endif; ?><h1 class="display ptitle__title"><?php echo esc_html( get_post_meta( get_the_ID(), 'fb_en_title', true ) ?: get_the_title() ); ?></h1><?php if ( get_post_meta( get_the_ID(), 'fb_en_title', true ) ) : ?><p class="phero__jp"><?php the_title(); ?></p><?php endif; ?></div></div>
		</div>
	</section>
	<div class="wrap wrap--narrow">
		<?php if ( has_post_thumbnail() ) : ?><figure class="post-single__fig"><?php the_post_thumbnail( 'fb-wide' ); ?></figure><?php endif; ?>
		<div class="entry-content"><?php the_content(); ?></div>
	</div>
</article>
<?php endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
