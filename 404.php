<?php get_header(); ?>
<section class="ptitle ptitle--404">
	<p class="ghost" aria-hidden="true">404</p>
	<div class="wrap">
		<p class="label">404 Not found</p>
		<h1 class="display ptitle__title">Out of<br>bounds.</h1>
		<p class="phero__jp">お探しのページは見つかりませんでした。</p>
		<div class="btn-row"><a class="pill pill--accent" href="<?php echo esc_url( home_url( '/' ) ); ?>">トップへ戻る</a><a class="pill pill--line" href="<?php echo esc_url( get_post_type_archive_link( 'works' ) ); ?>">実績を見る</a></div>
	</div>
</section>
<?php get_footer(); ?>
