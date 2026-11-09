<?php
/**
 * Template Name: よくある質問
 * 固定ページ「よくある質問」（スラッグ faq）に自動適用
 */
get_header();
$faqs = array(
	'ご依頼・お見積り' => array(
		array( 'どのくらい前に依頼すればよいですか？', 'ライブ配信のLIGHTプランは2週間前、STANDARD以上は1カ月前を目安にご相談ください。シーズン中（9〜12月）の週末は早めのご連絡をおすすめします。映像制作は内容により1〜2カ月前が目安です。' ),
		array( '関西以外でも依頼できますか？', 'はい。大阪・東京の二拠点から全国へ出張しています。交通費・宿泊費は実費としてお見積りに含めます。' ),
		array( '小規模な案件でも相談できますか？', 'できます。1カメラ・スタッフ1名の配信や、ショート動画1本からお受けしています。まずは日程とやりたいことをお知らせください。' ),
		array( '見積りに費用はかかりますか？', 'お見積り・ご相談は無料です。2営業日以内に概算と体制をご提案します。' ),
	),
	'ライブ配信' => array(
		array( '会場にインターネット回線がなくても配信できますか？', 'はい。モバイル回線を束ねるIP配信機材を持ち込みます。体育館・屋外ともに実績があります。' ),
		array( 'YouTube以外にも配信できますか？', '自社プラットフォーム、有料配信サービス、限定公開など配信先に合わせて対応します。複数会場の同時配信も可能です。' ),
		array( 'アーカイブは残りますか？', '配信後にアーカイブURLまたは動画データを納品します。ハイライトやショート動画への二次展開もご相談ください。' ),
	),
	'映像制作・SNS運用' => array(
		array( '制作した動画の著作権・二次利用はどうなりますか？', '納品物はご依頼主様が自由にご利用いただけます。弊社の実績としての掲載可否は、契約時に個別にご確認します。' ),
		array( 'SNS運用はアカウントを渡す必要がありますか？', '運用代行の場合は共同管理者としての権限をいただきます。投稿設計やレポートのみのサポートプランも用意しています。' ),
		array( '修正は何回までできますか？', '映像制作は通常2回までの修正を含みます。それ以上は内容に応じて別途お見積りとなります。' ),
	),
);
?>
<section class="ptitle">
	<p class="ghost" aria-hidden="true">FAQ</p>
	<div class="wrap">
		<nav class="crumbs" aria-label="パンくず"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span>／</span><span>FAQ</span></nav>
		<div class="section-head"><div><p class="label">FAQ</p><h1 class="display ptitle__title">Questions</h1><p class="phero__jp">よくあるご質問</p></div><p class="section-head__lead">ここにない質問は <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせフォーム</a> からお気軽にどうぞ。</p></div>
	</div>
</section>
<?php foreach ( $faqs as $group => $items ) : ?>
<section class="faq wrap">
	<div class="faq__head"><p class="label">Category</p><p class="display display--jp section-head__en" style="font-size:32px"><?php echo esc_html( $group ); ?></p></div>
	<dl class="faq__list">
		<?php foreach ( $items as $qa ) : ?><div><dt><?php echo esc_html( $qa[0] ); ?></dt><dd><?php echo esc_html( $qa[1] ); ?></dd></div><?php endforeach; ?>
	</dl>
</section>
<?php endforeach; ?>
<?php while ( have_posts() ) : the_post(); if ( false !== strpos( get_the_content(), 'fb-show-legacy' ) ) : ?><section class="wrap wrap--narrow entry-content page-extra"><?php the_content(); ?></section><?php endif; endwhile; ?>
<?php get_template_part( 'template-parts/cta' ); ?>
<?php get_footer(); ?>
