<?php
/**
 * 実績一覧（/works/ とタクソノミーアーカイブ共用）
 */
get_header();
$current_type  = is_tax( 'work_type' ) ? get_queried_object()->slug : '';
$current_sport = is_tax( 'sport' ) ? get_queried_object()->slug : '';
$types  = get_terms( array( 'taxonomy' => 'work_type', 'hide_empty' => true ) );
$sports = get_terms( array( 'taxonomy' => 'sport', 'hide_empty' => true ) );
$total  = $wp_query->found_posts;
?>
<section class="ptitle">
	<p class="ghost" aria-hidden="true">Works</p>
	<div class="wrap">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>Works</span></nav>
		<div class="section-head">
			<div><p class="label">Works</p><h1 class="display ptitle__title">Selected<br>works</h1></div>
			<p class="section-head__lead">FIBA 3x3の国際大会から、関西学生リーグまで。</p>
		</div>
		<div class="filters">
			<?php if ( $types && ! is_wp_error( $types ) ) : ?>
			<div class="filters__row"><span class="label label--muted">Type</span>
				<a class="pill pill--sm <?php echo '' === $current_type ? 'is-on' : ''; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">All</a>
				<?php foreach ( $types as $t ) : ?><a class="pill pill--sm <?php echo $current_type === $t->slug ? 'is-on' : ''; ?>" href="<?php echo esc_url( get_term_link( $t ) ); ?>"><?php echo esc_html( $t->name ); ?></a><?php endforeach; ?>
			</div>
			<?php endif; ?>
			<?php if ( $sports && ! is_wp_error( $sports ) ) : ?>
			<div class="filters__row"><span class="label label--muted">Sport</span>
				<a class="pill pill--sm <?php echo '' === $current_sport ? 'is-on' : ''; ?>" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">All</a>
				<?php foreach ( $sports as $t ) : ?><a class="pill pill--sm <?php echo $current_sport === $t->slug ? 'is-on' : ''; ?>" href="<?php echo esc_url( get_term_link( $t ) ); ?>"><?php echo esc_html( $t->name ); ?></a><?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="wrap works-archive">
	<?php if ( have_posts() ) : ?>
		<div class="works-grid works-grid--archive">
			<?php $n = 0; while ( have_posts() ) : the_post(); $n++;
				$cls = ( 1 === $n && ! is_paged() ) ? 'span-8' : ( ( 2 === $n && ! is_paged() ) ? 'span-4' : 'span-4' );
				get_template_part( 'template-parts/work-card', null, array( 'size' => ( 1 === $n && ! is_paged() ) ? 'lg' : 'md', 'class' => $cls ) );
			endwhile; ?>
		</div>
		<div class="pager"><?php the_posts_pagination( array( 'prev_text' => '← Prev', 'next_text' => 'Next →', 'mid_size' => 1 ) ); ?></div>
	<?php else : ?>
		<p class="body-text">該当する実績はまだありません。</p>
	<?php endif; ?>
</section>

<?php get_template_part( 'template-parts/cta', null, array( 'en' => '同じ熱量で、<br>御社の現場も。' ) ); ?>
<?php get_footer(); ?>
