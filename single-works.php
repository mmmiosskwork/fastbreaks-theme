<?php
/**
 * 実績詳細
 */
get_header();
while ( have_posts() ) : the_post();
$types   = get_the_terms( get_the_ID(), 'work_type' );
$sports  = get_the_terms( get_the_ID(), 'sport' );
$client  = get_post_meta( get_the_ID(), 'fb_client', true );
$period  = get_post_meta( get_the_ID(), 'fb_period', true );
$scope   = get_post_meta( get_the_ID(), 'fb_scope', true );
$setup   = get_post_meta( get_the_ID(), 'fb_setup', true );
$video   = get_post_meta( get_the_ID(), 'fb_video', true );
$results = fb_work_results( get_the_ID() );
$yt      = fb_youtube_id( $video );
?>
<article class="work-single">
	<section class="phero phero--plain phero--work">
		<div class="wrap phero__inner">
			<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><a href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">Works</a><span>／</span><span><?php the_title(); ?></span></nav>
			<?php if ( $types && ! is_wp_error( $types ) ) : ?><div class="tags"><?php foreach ( $types as $t ) : ?><a class="tag <?php echo esc_attr( fb_type_class( $t ) ); ?>" href="<?php echo esc_url( get_term_link( $t ) ); ?>"><?php echo esc_html( $t->name ); ?></a><?php endforeach; ?></div><?php endif; ?>
			<h1 class="work-single__title"><?php the_title(); ?></h1>
			<?php if ( $client ) : ?><p class="phero__jp"><?php echo esc_html( $client ); ?></p><?php endif; ?>
		</div>
	</section>
	<?php if ( has_post_thumbnail() ) : ?><figure class="wrap work-single__fig"><?php the_post_thumbnail( 'fb-wide' ); ?></figure><?php endif; ?>

	<section class="wrap work-single__grid">
		<aside class="work-single__meta">
			<dl class="spec">
				<?php if ( $client ) : ?><div><dt>クライアント</dt><dd><?php echo esc_html( $client ); ?></dd></div><?php endif; ?>
				<?php if ( $period ) : ?><div><dt>期間</dt><dd><?php echo esc_html( $period ); ?></dd></div><?php endif; ?>
				<?php if ( $scope ) : ?><div><dt>担当範囲</dt><dd><?php echo esc_html( $scope ); ?></dd></div><?php endif; ?>
				<?php if ( $setup ) : ?><div><dt>体制・機材</dt><dd><?php echo esc_html( $setup ); ?></dd></div><?php endif; ?>
				<?php if ( $sports && ! is_wp_error( $sports ) ) : ?><div><dt>競技・分野</dt><dd><?php echo esc_html( implode( ' / ', wp_list_pluck( $sports, 'name' ) ) ); ?></dd></div><?php endif; ?>
			</dl>
			<?php if ( $results ) : ?>
			<ul class="results">
				<?php foreach ( $results as $r ) : ?><li><span class="display results__value"><?php echo esc_html( $r['value'] ); ?></span><span class="results__label"><?php echo esc_html( $r['label'] ); ?></span></li><?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</aside>
		<div class="work-single__body">
			<?php if ( $yt ) : ?>
				<div class="video"><iframe loading="lazy" src="https://www.youtube-nocookie.com/embed/<?php echo esc_attr( $yt ); ?>" title="<?php the_title_attribute(); ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
			<?php endif; ?>
			<div class="entry-content"><?php the_content(); ?></div>
		</div>
	</section>

	<?php
	$related = new WP_Query( array( 'post_type' => 'works', 'posts_per_page' => 3, 'post__not_in' => array( get_the_ID() ), 'orderby' => 'rand' ) );
	if ( $related->have_posts() ) : ?>
	<section class="works-home"><div class="wrap">
		<div class="section-head"><div><p class="label">More works</p><p class="display section-head__en">Other works</p></div><a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">All works</a></div>
		<div class="works-grid works-grid--3"><?php while ( $related->have_posts() ) : $related->the_post(); get_template_part( 'template-parts/work-card', null, array( 'size' => 'md' ) ); endwhile; wp_reset_postdata(); ?></div>
	</div></section>
	<?php endif; ?>
</article>
<?php endwhile; ?>
<?php get_template_part( 'template-parts/cta', null, array( 'en' => '同じ熱量で、<br>御社の現場も。' ) ); ?>
<?php get_footer(); ?>
