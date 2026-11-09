<?php
/**
 * 実績カード
 * $args: size (lg|md), class
 */
$size  = isset( $args['size'] ) ? $args['size'] : 'md';
$extra = isset( $args['class'] ) ? $args['class'] : '';
$types = get_the_terms( get_the_ID(), 'work_type' );
$client = get_post_meta( get_the_ID(), 'fb_client', true );
$scope  = get_post_meta( get_the_ID(), 'fb_scope', true );
$img_size = 'lg' === $size ? 'fb-wide' : 'fb-card';
?>
<a class="work work--<?php echo esc_attr( $size ); ?> <?php echo esc_attr( $extra ); ?>" href="<?php the_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( $img_size, array( 'loading' => 'lazy', 'alt' => '' ) ); ?>
	<?php else : ?>
		<img src="<?php echo fb_img( 'arena_wide.jpg' ); ?>" alt="" loading="lazy">
	<?php endif; ?>
	<div class="work__cap">
		<?php if ( $types && ! is_wp_error( $types ) ) : ?>
			<div class="tags">
				<?php foreach ( $types as $t ) : ?><span class="tag <?php echo esc_attr( fb_type_class( $t ) ); ?>"><?php echo esc_html( $t->name ); ?></span><?php endforeach; ?>
			</div>
		<?php endif; ?>
		<span class="work__title<?php echo preg_match( '/[^\x00-\x7F]/', get_the_title() ) ? '' : ' is-en'; ?>"><?php the_title(); ?></span>
		<?php if ( $client || $scope ) : ?>
			<span class="work__meta"><?php echo esc_html( trim( $client . ( $client && $scope ? ' — ' : '' ) . $scope ) ); ?></span>
		<?php endif; ?>
	</div>
</a>
