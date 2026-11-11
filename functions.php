<?php
/**
 * FASTBREAKS Theme — functions.php
 * 構成：テーマ設定 / アセット読み込み / カスタム投稿「実績」 / サイト設定画面 / ヘルパー
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define('FB_THEME_VER','1.7.57');
define( 'FB_THEME_URI', get_template_directory_uri() );
define( 'FB_THEME_DIR', get_template_directory() );

/* -------------------------------------------------------------------------
 * 1. テーマ基本設定
 * ---------------------------------------------------------------------- */
add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'fastbreaks' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 300, 'flex-width' => true ) );
	add_image_size( 'fb-card', 1000, 800, true );
	add_image_size( 'fb-wide', 1500, 1200, true );
	add_image_size( 'fb-square', 600, 600, true );
	register_nav_menus( array(
		'primary' => 'グローバルナビ',
		'footer'  => 'フッターナビ',
	) );
} );

/* 不要な出力を削る */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );

/* -------------------------------------------------------------------------
 * 2. CSS / JS
 * ---------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {
	// フォント：公開後に woff2 を assets/fonts に置いて自サーバー配信へ切り替え可
	wp_enqueue_style( 'fb-fonts', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@700&family=Noto+Sans+JP:wght@300;400;500;700;900&display=swap', array(), null );
	wp_enqueue_style( 'fb-style', get_stylesheet_uri(), array( 'fb-fonts' ), FB_THEME_VER );
	wp_enqueue_script( 'fb-main', FB_THEME_URI . '/assets/js/main.js', array(), FB_THEME_VER, true );
} );

add_action( 'wp_head', function () {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<meta name="theme-color" content="#06070F">' . "\n";
}, 1 );

/* -------------------------------------------------------------------------
 * 3. カスタム投稿タイプ「実績（works）」とタクソノミー
 * ---------------------------------------------------------------------- */
add_action( 'init', function () {
	/* タクソノミーを先に登録（/works/type/〇〇/ が実績の個別ページと誤認されて 404 になるのを防ぐ） */
	register_taxonomy( 'work_type', 'works', array(
		'labels'            => array( 'name' => '種別', 'singular_name' => '種別' ),
		'hierarchical'      => true,
		'public'            => true,
		'rewrite'           => array( 'slug' => 'works/type' ),
		'show_in_rest'      => true,
		'show_admin_column' => true,
	) );

	register_taxonomy( 'sport', 'works', array(
		'labels'            => array( 'name' => '競技・分野', 'singular_name' => '競技・分野' ),
		'hierarchical'      => true,
		'public'            => true,
		'rewrite'           => array( 'slug' => 'works/sport' ),
		'show_in_rest'      => true,
		'show_admin_column' => true,
	) );

	register_post_type( 'works', array(
		'labels' => array(
			'name'          => '実績',
			'singular_name' => '実績',
			'add_new_item'  => '実績を追加',
			'edit_item'     => '実績を編集',
			'all_items'     => '実績一覧',
		),
		'public'       => true,
		'has_archive'  => true,
		'rewrite'      => array( 'slug' => 'works', 'with_front' => false ),
		'menu_icon'    => 'dashicons-format-video',
		'menu_position'=> 5,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
		'show_in_rest' => true,
	) );
} );

/* テーマ更新時に一度だけパーマリンクを更新（URL ルールの変更を反映） */
add_action( 'init', function () {
	if ( get_option( 'fb_rewrite_ver' ) !== FB_THEME_VER ) {
		flush_rewrite_rules( false );
		update_option( 'fb_rewrite_ver', FB_THEME_VER );
	}
}, 99 );

/* テーマ有効化時に初期タームを登録し、パーマリンクを更新 */
add_action( 'after_switch_theme', function () {
	$types  = array( 'ライブ配信' => 'live', '映像制作' => 'video', 'SNS運用' => 'sns', 'イベント' => 'event' );
	$sports = array( 'バスケットボール' => 'basketball', '3x3' => '3x3', 'その他競技' => 'other-sports', 'セミナー・イベント' => 'seminar-event' );
	foreach ( $types as $name => $slug ) {
		if ( ! term_exists( $slug, 'work_type' ) ) { wp_insert_term( $name, 'work_type', array( 'slug' => $slug ) ); }
	}
	foreach ( $sports as $name => $slug ) {
		if ( ! term_exists( $slug, 'sport' ) ) { wp_insert_term( $name, 'sport', array( 'slug' => $slug ) ); }
	}
	flush_rewrite_rules();
} );

/* 実績の追加項目（メタボックス） */
function fb_work_fields() {
	return array(
		'client'   => array( 'label' => 'クライアント名', 'type' => 'text' ),
		'period'   => array( 'label' => '期間（例：2020年〜 / 2026年4月）', 'type' => 'text' ),
		'scope'    => array( 'label' => '担当範囲（例：ライブ配信・ハイライト制作・SNS運用）', 'type' => 'text' ),
		'setup'    => array( 'label' => '体制・機材（例：7カメラ・スタッフ6名・LED連動）', 'type' => 'text' ),
		'results'  => array( 'label' => '成果数字（1行に「ラベル|値」例：年間配信試合数|120試合）', 'type' => 'textarea' ),
		'video'    => array( 'label' => '動画URL（YouTube）', 'type' => 'url' ),
		'featured' => array( 'label' => 'トップページに表示する', 'type' => 'checkbox' ),
	);
}

add_action( 'add_meta_boxes', function () {
	add_meta_box( 'fb_work_meta', '実績の詳細情報', function ( $post ) {
		wp_nonce_field( 'fb_work_meta', 'fb_work_meta_nonce' );
		echo '<table class="form-table">';
		foreach ( fb_work_fields() as $key => $f ) {
			$val = get_post_meta( $post->ID, 'fb_' . $key, true );
			echo '<tr><th><label for="fb_' . esc_attr( $key ) . '">' . esc_html( $f['label'] ) . '</label></th><td>';
			if ( 'textarea' === $f['type'] ) {
				echo '<textarea id="fb_' . esc_attr( $key ) . '" name="fb_' . esc_attr( $key ) . '" rows="4" class="large-text">' . esc_textarea( $val ) . '</textarea>';
			} elseif ( 'checkbox' === $f['type'] ) {
				echo '<label><input type="checkbox" name="fb_' . esc_attr( $key ) . '" value="1" ' . checked( $val, '1', false ) . '> はい</label>';
			} else {
				echo '<input type="' . esc_attr( $f['type'] ) . '" id="fb_' . esc_attr( $key ) . '" name="fb_' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" class="large-text">';
			}
			echo '</td></tr>';
		}
		echo '</table>';
	}, 'works', 'normal', 'high' );
} );

add_action( 'save_post_works', function ( $post_id ) {
	if ( ! isset( $_POST['fb_work_meta_nonce'] ) || ! wp_verify_nonce( $_POST['fb_work_meta_nonce'], 'fb_work_meta' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
	foreach ( fb_work_fields() as $key => $f ) {
		$name = 'fb_' . $key;
		if ( 'checkbox' === $f['type'] ) {
			update_post_meta( $post_id, $name, isset( $_POST[ $name ] ) ? '1' : '' );
		} elseif ( 'textarea' === $f['type'] ) {
			update_post_meta( $post_id, $name, isset( $_POST[ $name ] ) ? sanitize_textarea_field( wp_unslash( $_POST[ $name ] ) ) : '' );
		} elseif ( 'url' === $f['type'] ) {
			update_post_meta( $post_id, $name, isset( $_POST[ $name ] ) ? esc_url_raw( wp_unslash( $_POST[ $name ] ) ) : '' );
		} else {
			update_post_meta( $post_id, $name, isset( $_POST[ $name ] ) ? sanitize_text_field( wp_unslash( $_POST[ $name ] ) ) : '' );
		}
	}
} );

/* 実績一覧の表示件数 */
add_action( 'pre_get_posts', function ( $q ) {
	if ( is_admin() || ! $q->is_main_query() ) { return; }
	if ( $q->is_post_type_archive( 'works' ) || $q->is_tax( array( 'work_type', 'sport' ) ) ) {
		$q->set( 'posts_per_page', 12 );
	}
} );

/* -------------------------------------------------------------------------
 * 4. サイト設定画面（設定 → FASTBREAKS サイト設定）
 * ---------------------------------------------------------------------- */
function fb_settings_fields() {
	return array(
		'会社情報' => array(
			'company_name' => array( 'FASTBREAKS合同会社', '会社名' ),
			'company_note' => array( '', '会社名の注記（不要なら空欄）' ),
			'address_osaka'=> array( '〒540-0035 大阪市中央区釣鐘町1丁目2-2 BLDG土屋3階', '大阪本社' ),
			'address_tokyo'=> array( '〒191-0012 東京都日野市日野1034-1', '東京支社' ),
			'email'        => array( '', 'お問い合わせメール（サイトに表示する場合のみ。空欄＝非表示）' ),
			'founded'      => array( '2020年3月10日', '設立' ),
			'capital'      => array( '5,000千円', '資本金' ),
			'staff'        => array( '12名（業務委託含む）', '従業者数' ),
		),
		'SNS' => array(
			'sns_youtube'   => array( '', 'YouTube URL（空欄なら非表示）' ),
			'sns_instagram' => array( 'https://www.instagram.com/fastbreaks_jp/', 'Instagram URL' ),
			'sns_tiktok'    => array( 'https://www.tiktok.com/@fastbreaks_jp', 'TikTok URL' ),
			'sns_x'         => array( 'https://x.com/fastbreaks_jp', 'X URL' ),
			'sns_note'      => array( 'https://note.com/fastbreaks', 'note URL（トップに最新記事を自動表示）' ),
			'sns_handle'    => array( '@fastbreaks_jp', 'SNSアカウント名（表示用）' ),
			'sns_followers' => array( 'フォロワー総数 39,436 ／ 年間3,352万回再生（2025）', 'SNS実績の一行' ),
			'instagram_shortcode' => array( '', 'Instagram表示プラグインのショートコード（例：[instagram-feed]）' ),
		),
		'トップページ：数字（FACTS）' => array(
			'fact1_value' => array( '8,230', '数字1' ), 'fact1_unit' => array( '万', '単位1' ), 'fact1_label' => array( '累計再生回数', 'ラベル1' ),
			'fact2_value' => array( '124', '数字2' ),   'fact2_unit' => array( '日程', '単位2' ), 'fact2_label' => array( '年間ライブ配信（2025）', 'ラベル2' ),
			'fact3_value' => array( '325', '数字3' ),   'fact3_unit' => array( '本', '単位3' ),  'fact3_label' => array( '年間動画コンテンツ制作（2025）', 'ラベル3' ),
			'fact4_value' => array( '5', '数字4' ),     'fact4_unit' => array( '現場', '単位4' ), 'fact4_label' => array( '最大同時運用現場数（同日・別会場）', 'ラベル4' ),
		),
		'トップページ：シグネチャーコンテンツ' => array(
			'sig_video'   => array( 'https://www.youtube.com/watch?v=mEiY09HDUsQ', 'YouTube の動画 URL（空欄ならセクションごと非表示）' ),
			'sig_heading' => array( 'Documentary', '大きな英字の見出し' ),
			'sig_series'  => array( 'DOG FIGHT. 倒すべきは強者。', 'シリーズ名' ),
			'sig_title'   => array( '【密着】EP.1 竹野明倫監督と唯一の4回生が果たす下剋上。', '動画のタイトル' ),
			'sig_lead'    => array( '阪南大学バスケットボール部に密着したドキュメンタリー。', '説明文' ),
		),
		'トップページ：ヒーロー・取引先' => array(
			'hero_video'   => array( '', 'ヒーロー背景動画のURL（MP4・5MB以下推奨。空欄なら静止画）' ),
			'partners'     => array( '', 'ライブ配信パートナー（1行1件「名称|URL」。空欄なら既定の7社）' ),
			'hero_image'   => array( '', 'ヒーロー静止画URL（空欄ならテーマ同梱の写真）' ),
			'clients'      => array( "Panasonic|client-panasonic.png\nSoftBank|client-softbank.png\nSony Pictures|client-sony-pictures.png\nDaiwa House|client-daiwa-house.png\n三井不動産|client-mitsui-fudosan.png\n資生堂|client-shiseido.png\n朝日新聞|client-asahi-shimbun.png\nABCテレビ|client-abc-tv.png\nMBS|client-mbs.png\nMGスポーツ|client-mg-sports.png\n東映アニメーション|client-toei-animation.png\nCyberAgent|client-cyberagent.png\n大阪エヴェッサ|client-osaka-evessa.png\n京都ハンナリーズ|client-kyoto-hannaryz.png\n日本社会人バスケットボール連盟|client-jsb.png\nセレッソ大阪|client-cerezo-osaka.png\n近畿大学|client-kindai.png\n京都大学|client-kyoto-u.png", '取引先（1行に1社。ロゴを使う場合は「社名|ロゴのファイル名」。ロゴはメディアライブラリにアップロード）' ),
		),
		'価格（最低価格の表示）' => array(
			'price_live'  => array( '80,000', 'ライブ配信 最低価格（円／日）' ),
			'price_sns'   => array( '150,000', 'SNS運用 最低価格（円／月）' ),
			'price_media' => array( '300,000', 'タイアップ企画 最低価格（円／企画）' ),
			'show_prices' => array( '', '価格をサイトに表示する（通常は空欄＝非表示。価格はLPで案内）' ),
		),
		'お問い合わせ' => array(
			'contact_shortcode' => array( '', 'お問い合わせフォームのショートコード（例：[contact-form-7 id="123" title="お問い合わせ"]）' ),
			'recruit_shortcode' => array( '', '採用応募フォームのショートコード' ),
			'intern_shortcode' => array( '', '学生インターン応募フォームのショートコード' ),
			'gtm_id'            => array( '', 'Google タグマネージャー ID（GTM-XXXXXXX）' ),
		),
	);
}

function fb_opt( $key, $default = '' ) {
	$opts = get_option( 'fb_settings', array() );
	// 一度でも保存された項目は空欄も尊重する（空欄＝非表示にできる）
	if ( is_array( $opts ) && array_key_exists( $key, $opts ) ) { return $opts[ $key ]; }
	foreach ( fb_settings_fields() as $group ) {
		if ( isset( $group[ $key ] ) ) { return $group[ $key ][0]; }
	}
	return $default;
}

add_action( 'admin_menu', function () {
	add_options_page( 'FASTBREAKS サイト設定', 'FASTBREAKS サイト設定', 'manage_options', 'fb-settings', function () {
		?>
		<div class="wrap">
			<h1>FASTBREAKS サイト設定</h1>
			<p>トップページの数字・取引先・価格・SNS・会社情報をここで管理します。コードを触る必要はありません。</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'fb_settings_group' ); ?>
				<?php foreach ( fb_settings_fields() as $group_label => $fields ) : ?>
					<h2 class="title"><?php echo esc_html( $group_label ); ?></h2>
					<table class="form-table">
						<?php foreach ( $fields as $key => $def ) :
							$val = fb_opt( $key );
							$is_long = in_array( $key, array( 'clients', 'partners' ), true ) || false !== strpos( $key, 'shortcode' );
						?>
						<tr>
							<th scope="row"><label for="fb_<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $def[1] ); ?></label></th>
							<td>
								<?php if ( in_array( $key, array( 'clients', 'partners' ), true ) ) : ?>
									<textarea id="fb_<?php echo esc_attr( $key ); ?>" name="fb_settings[<?php echo esc_attr( $key ); ?>]" rows="8" class="large-text code"><?php echo esc_textarea( $val ); ?></textarea>
								<?php else : ?>
									<input type="text" id="fb_<?php echo esc_attr( $key ); ?>" name="fb_settings[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $val ); ?>" class="<?php echo $is_long ? 'large-text' : 'regular-text'; ?>">
								<?php endif; ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				<?php endforeach; ?>
				<?php submit_button( '保存する' ); ?>
			</form>
		</div>
		<?php
	} );
} );

add_action( 'admin_init', function () {
	register_setting( 'fb_settings_group', 'fb_settings', array(
		'type' => 'array',
		'sanitize_callback' => function ( $input ) {
			$out = array();
			if ( ! is_array( $input ) ) { return $out; }
			foreach ( $input as $k => $v ) {
				$k = sanitize_key( $k );
				if ( in_array( $k, array( 'clients', 'partners' ), true ) ) {
					$out[ $k ] = sanitize_textarea_field( $v );
				} elseif ( false !== strpos( $k, 'shortcode' ) ) {
					$out[ $k ] = wp_kses_post( $v );
				} elseif ( 0 === strpos( $k, 'sns_' ) && 'sns_handle' !== $k && 'sns_followers' !== $k ) {
					$out[ $k ] = esc_url_raw( $v );
				} elseif ( in_array( $k, array( 'hero_video', 'hero_image', 'sig_video' ), true ) ) {
					$out[ $k ] = esc_url_raw( $v );
				} else {
					$out[ $k ] = sanitize_text_field( $v );
				}
			}
			return $out;
		},
	) );
} );

/* GTM */
add_action( 'wp_head', function () {
	$id = fb_opt( 'gtm_id' );
	if ( ! $id ) { return; }
	echo "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','" . esc_js( $id ) . "');</script>\n";
}, 2 );

/* -------------------------------------------------------------------------
 * 5. ヘルパー
 * ---------------------------------------------------------------------- */
/* 画像はメディアライブラリ優先（同名ファイルがあればそちら）。なければテーマ同梱 */
function fb_img( $file ) {
	$slug = sanitize_title( pathinfo( $file, PATHINFO_FILENAME ) );
	$map  = get_transient( 'fb_img_map' );
	if ( ! is_array( $map ) ) { $map = array(); }
	if ( ! array_key_exists( $slug, $map ) ) {
		$url = '';
		$q = get_posts( array( 'post_type' => 'attachment', 'name' => $slug, 'post_status' => 'inherit', 'posts_per_page' => 1, 'fields' => 'ids' ) );
		if ( $q ) { $url = (string) wp_get_attachment_url( $q[0] ); }
		$map[ $slug ] = $url;
		set_transient( 'fb_img_map', $map, DAY_IN_SECONDS );
	}
	if ( $map[ $slug ] ) { return esc_url( $map[ $slug ] ); }
	return esc_url( FB_THEME_URI . '/assets/img/' . $file . ( 0 === strpos( $file, 'logo_' ) ? '?v=' . FB_THEME_VER : '' ) );
}
add_action( 'add_attachment', function () { delete_transient( 'fb_img_map' ); } );
add_action( 'delete_attachment', function () { delete_transient( 'fb_img_map' ); } );
add_action( 'after_switch_theme', function () { delete_transient( 'fb_img_map' ); } );

function fb_logo( $variant = 'white' ) {
	if ( 'white' === $variant && has_custom_logo() ) {
		$id = get_theme_mod( 'custom_logo' );
		$src = wp_get_attachment_image_src( $id, 'full' );
		if ( $src ) { return esc_url( $src[0] ); }
	}
	return fb_img( 'logo_' . $variant . '.png' );
}

/** 取引先リストを配列で返す：[ ['name'=>..., 'img'=>...], ... ] */
function fb_clients() {
	$lines = preg_split( '/\r\n|\r|\n/', (string) fb_opt( 'clients' ) );
	$out = array();
	foreach ( $lines as $line ) {
		$line = trim( $line );
		if ( '' === $line ) { continue; }
		$parts = array_map( 'trim', explode( '|', $line ) );
		$img = isset( $parts[1] ) ? $parts[1] : '';
		if ( $img && false === strpos( $img, '/' ) ) {
			/* ファイル名だけ: メディアライブラリ優先 → テーマ同梱 assets/img/clients/ */
			$media = fb_img( $img );
			$img   = ( false === strpos( $media, FB_THEME_URI ) || ! file_exists( get_template_directory() . '/assets/img/clients/' . $img ) ) ? $media : esc_url( FB_THEME_URI . '/assets/img/clients/' . $img );
		}
		$out[] = array( 'name' => $parts[0], 'img' => $img );
	}
	return $out;
}

/** 実績の成果数字 textarea を配列に */
function fb_work_results( $post_id ) {
	$raw = get_post_meta( $post_id, 'fb_results', true );
	$out = array();
	foreach ( preg_split( '/\r\n|\r|\n/', (string) $raw ) as $line ) {
		if ( false === strpos( $line, '|' ) ) { continue; }
		list( $label, $value ) = array_map( 'trim', explode( '|', $line, 2 ) );
		$out[] = array( 'label' => $label, 'value' => $value );
	}
	return $out;
}

/** 種別タームに応じたタグ色クラス */
function fb_type_class( $term ) {
	$map = array( 'live' => 'is-live', 'video' => 'is-video', 'sns' => 'is-sns', 'event' => 'is-event' );
	return isset( $map[ $term->slug ] ) ? $map[ $term->slug ] : '';
}

/** YouTube URL → 埋め込みID */
function fb_youtube_id( $url ) {
	if ( preg_match( '~(?:youtu\.be/|v=|/embed/|/shorts/)([A-Za-z0-9_-]{11})~', (string) $url, $m ) ) { return $m[1]; }
	return '';
}

/** 価格の整形 */
function fb_price( $key ) {
	$v = trim( (string) fb_opt( $key ) );
	return $v ? '¥' . $v : '';
}

/** 抜粋の長さ */
add_filter( 'excerpt_length', function () { return 60; } );
add_filter( 'excerpt_more', function () { return '…'; } );

/** body クラス */
add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'fb';
	return $classes;
} );

/* ナビのフォールバック（メニュー未設定時） */
function fb_nav_fallback() {
	$items = array(
		'Service' => home_url( '/service/' ),
		'Works'   => get_post_type_archive_link( 'works' ),
		'About'   => home_url( '/company/' ),
		'Vision'  => home_url( '/vision/' ),
		'News'    => fb_news_url(),
		'Partners' => home_url( '/partner/' ),
		'Recruit' => home_url( '/recruit/' ),
	);
	echo '<ul class="nav__list">';
	foreach ( $items as $label => $url ) {
		echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
	}
	echo '</ul>';
}

/* JSON-LD（Organization） */
add_action( 'wp_head', function () {
	if ( ! is_front_page() ) { return; }
	$data = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => fb_opt( 'company_name' ),
		'url'      => home_url( '/' ),
		'logo'     => fb_logo( 'white' ),
		'address'  => array( '@type' => 'PostalAddress', 'streetAddress' => fb_opt( 'address_osaka' ), 'addressCountry' => 'JP' ),
		'sameAs'   => array_values( array_filter( array( fb_opt( 'sns_youtube' ), fb_opt( 'sns_instagram' ), fb_opt( 'sns_tiktok' ), fb_opt( 'sns_x' ), fb_opt( 'sns_note' ) ) ) ),
	);
	if ( fb_opt( 'email' ) ) { $data['email'] = fb_opt( 'email' ); }
	echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
} );

/* -------------------------------------------------------------------------
 * 6. 移行ツール（ツール → FASTBREAKS 移行）
 *    A) コピー：レポート投稿を「実績」に複製（元の投稿はそのまま → 旧サイトに影響なし。プレビュー用）
 *    B) 本番切替後：コピー元のレポート投稿を下書きに戻す（重複を防ぐ）／ 元に戻す
 *    C) やり直し：コピーした実績をすべて削除
 * ---------------------------------------------------------------------- */
function fb_guess_work_type( $title ) {
	if ( preg_match( '/配信|LIVE|ライブ/iu', $title ) ) { return 'live'; }
	if ( preg_match( '/SNS|ショート|TikTok|Instagram/iu', $title ) ) { return 'sns'; }
	if ( preg_match( '/制作|撮影|編集|ドキュメンタリー|密着|コンテンツ/iu', $title ) ) { return 'video'; }
	if ( preg_match( '/イベント|ドラフト|THE LAST MIX/iu', $title ) ) { return 'event'; }
	return '';
}

function fb_report_posts( $status = 'any' ) {
	$cat = get_category_by_slug( 'report' );
	if ( ! $cat ) { return array(); }
	return get_posts( array( 'post_type' => 'post', 'category' => $cat->term_id, 'posts_per_page' => -1, 'post_status' => $status, 'orderby' => 'date', 'order' => 'DESC' ) );
}
function fb_copied_works() {
	return get_posts( array( 'post_type' => 'works', 'posts_per_page' => -1, 'post_status' => 'any', 'meta_key' => 'fb_source_post_id' ) );
}

add_action( 'admin_menu', function () {
	add_management_page( 'FASTBREAKS 移行', 'FASTBREAKS 移行', 'manage_options', 'fb-migrate', function () {
		if ( ! current_user_can( 'manage_options' ) ) { return; }
		$msg = '';
		if ( isset( $_POST['fb_migrate_action'] ) && check_admin_referer( 'fb_migrate' ) ) {
			$action = sanitize_key( $_POST['fb_migrate_action'] );
			$n = 0;
			if ( 'copy' === $action ) {
				$done = array();
				foreach ( fb_copied_works() as $w ) { $done[ (int) get_post_meta( $w->ID, 'fb_source_post_id', true ) ] = true; }
				foreach ( fb_report_posts( 'publish' ) as $p ) {
					if ( isset( $done[ $p->ID ] ) ) { continue; }
					$new_id = wp_insert_post( array(
						'post_type'    => 'works',
						'post_status'  => 'publish',
						'post_title'   => $p->post_title,
						'post_name'    => $p->post_name,
						'post_content' => $p->post_content,
						'post_excerpt' => $p->post_excerpt,
						'post_date'    => $p->post_date,
						'post_date_gmt'=> $p->post_date_gmt,
						'post_author'  => $p->post_author,
					), true );
					if ( is_wp_error( $new_id ) ) { continue; }
					update_post_meta( $new_id, 'fb_source_post_id', $p->ID );
					$thumb = get_post_thumbnail_id( $p->ID );
					if ( $thumb ) { set_post_thumbnail( $new_id, $thumb ); }
					$type = fb_guess_work_type( $p->post_title );
					if ( $type ) { wp_set_object_terms( $new_id, $type, 'work_type', false ); }
					$n++;
				}
				flush_rewrite_rules();
				$msg = sprintf( '%d 件のレポート記事を「実績」にコピーしました（元の投稿はそのままです）。', $n );
			} elseif ( 'unpublish_sources' === $action ) {
				foreach ( fb_copied_works() as $w ) {
					$src = (int) get_post_meta( $w->ID, 'fb_source_post_id', true );
					/* お知らせ等にも属する記事はニュースに残す（レポートのみの記事だけ下書きに） */
					if ( $src && 'publish' === get_post_status( $src ) && 1 === count( wp_get_post_categories( $src ) ) ) {
						wp_update_post( array( 'ID' => $src, 'post_status' => 'draft' ) );
						update_post_meta( $src, 'fb_unpublished_by_migration', '1' );
						$n++;
					}
				}
				$msg = sprintf( 'コピー元のレポート記事（レポートのみの記事）%d 件を下書きに戻しました（旧URLは /works/ に301リダイレクトされます）。', $n );
			} elseif ( 'republish_sources' === $action ) {
				$drafts = get_posts( array( 'post_type' => 'post', 'posts_per_page' => -1, 'post_status' => 'draft', 'meta_key' => 'fb_unpublished_by_migration', 'meta_value' => '1' ) );
				foreach ( $drafts as $d ) { wp_update_post( array( 'ID' => $d->ID, 'post_status' => 'publish' ) ); delete_post_meta( $d->ID, 'fb_unpublished_by_migration' ); $n++; }
				$msg = sprintf( 'レポート記事 %d 件を再公開しました。', $n );
			} elseif ( 'delete_copies' === $action ) {
				foreach ( fb_copied_works() as $w ) { wp_delete_post( $w->ID, true ); $n++; }
				$msg = sprintf( 'コピーした実績 %d 件を削除しました。', $n );
			}
		}
		$report_pub = count( fb_report_posts( 'publish' ) );
		$copies     = count( fb_copied_works() );
		$drafts     = count( get_posts( array( 'post_type' => 'post', 'posts_per_page' => -1, 'post_status' => 'draft', 'fields' => 'ids', 'meta_key' => 'fb_unpublished_by_migration', 'meta_value' => '1' ) ) );
		?>
		<div class="wrap">
			<h1>FASTBREAKS 移行ツール</h1>
			<?php if ( $msg ) : ?><div class="notice notice-success"><p><?php echo esc_html( $msg ); ?></p></div><?php endif; ?>
			<table class="widefat" style="max-width:760px">
				<tr><th>公開中のレポート記事（カテゴリー「レポート」）</th><td><?php echo (int) $report_pub; ?> 件</td></tr>
				<tr><th>コピー済みの実績</th><td><?php echo (int) $copies; ?> 件</td></tr>
				<tr><th>移行で下書きに戻したレポート記事</th><td><?php echo (int) $drafts; ?> 件</td></tr>
			</table>
			<form method="post" style="margin-top:24px;display:flex;flex-direction:column;gap:14px;max-width:760px">
				<?php wp_nonce_field( 'fb_migrate' ); ?>
				<div><button class="button button-primary" name="fb_migrate_action" value="copy" onclick="return confirm('レポート記事を「実績」にコピーします。元の投稿はそのまま残ります。よろしいですか？');">STEP 1：レポート → 実績 にコピー（旧サイトは変わりません）</button><p class="description">プレビュー中に何度押しても、コピー済みの記事は重複しません。</p></div>
				<div><button class="button" name="fb_migrate_action" value="unpublish_sources" <?php disabled( $copies, 0 ); ?> onclick="return confirm('コピー元のレポート記事を下書きに戻します。新テーマに切り替えた後に実行してください。よろしいですか？');">STEP 2（本番切替後）：コピー元のレポート記事を下書きに戻す</button><p class="description">重複コンテンツを防ぎます。旧URLは自動で /works/ の実績へ301リダイレクトされます。</p></div>
				<div><button class="button" name="fb_migrate_action" value="republish_sources" <?php disabled( $drafts, 0 ); ?>>元に戻す：下書きにしたレポート記事を再公開</button></div>
				<div><button class="button button-link-delete" name="fb_migrate_action" value="delete_copies" <?php disabled( $copies, 0 ); ?> onclick="return confirm('コピーした実績をすべて削除します（元のレポート記事には影響しません）。よろしいですか？');">やり直し：コピーした実績をすべて削除</button></div>
			</form>
			<p style="margin-top:24px;color:#666">コピー後は「実績」メニューから種別と詳細情報（クライアント・担当範囲・体制・成果）を整えてください。タイトルから推定した種別を自動で付けています。</p>
		</div>
		<?php
	} );
} );

/* 旧URL（/投稿スラッグ/）→ 新URL（/works/スラッグ/）への301。移行後のリンク切れを防ぐ */
add_action( 'template_redirect', function () {
	if ( ! is_404() ) { return; }
	$path = trim( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( '' === $path || false !== strpos( $path, 'wp-' ) ) { return; }
	$segments = explode( '/', $path );
	$slug = rawurldecode( end( $segments ) );
	$found = get_posts( array( 'name' => $slug, 'post_type' => array( 'works', 'post', 'page' ), 'posts_per_page' => 1, 'post_status' => 'publish' ) );
	if ( $found ) {
		wp_safe_redirect( get_permalink( $found[0]->ID ), 301 );
		exit;
	}
	// 旧「ライブ配信パートナー」→ ライブ配信ページ
	if ( 'partner' === $slug ) {
		$page = get_page_by_path( 'service/live-streaming' );
		if ( $page ) { wp_safe_redirect( get_permalink( $page->ID ), 301 ); exit; }
	}
} );

/* お知らせ一覧では「レポートのみ」の記事を除外（お知らせ等にも属する記事は残す。レポートは実績側で表示） */
function fb_report_only_ids() {
	$ids = get_transient( 'fb_report_only_ids' );
	if ( false !== $ids ) { return (array) $ids; }
	$ids = array();
	$cat = get_category_by_slug( 'report' );
	if ( $cat ) {
		$posts = get_posts( array( 'post_type' => 'post', 'category' => $cat->term_id, 'posts_per_page' => -1, 'fields' => 'ids', 'post_status' => 'publish' ) );
		foreach ( $posts as $pid ) {
			$cats = wp_get_post_categories( $pid );
			if ( 1 === count( $cats ) ) { $ids[] = $pid; }
		}
	}
	set_transient( 'fb_report_only_ids', $ids, 10 * MINUTE_IN_SECONDS );
	return $ids;
}
add_action( 'save_post', function () { delete_transient( 'fb_report_only_ids' ); } );
add_action( 'pre_get_posts', function ( $q ) {
	if ( is_admin() || ! $q->is_main_query() ) { return; }
	if ( $q->is_home() || ( $q->is_category() && ! $q->is_category( 'report' ) ) ) {
		$q->set( 'post__not_in', array_merge( (array) $q->get( 'post__not_in' ), fb_report_only_ids() ) );
		$q->set( 'posts_per_page', 12 );
	}
} );

/* ライブ配信パートナー一覧（設定「partners」= 1行1件「名称|URL」。空欄なら既定値） */
function fb_partners() {
	$raw = fb_opt( 'partners' );
	if ( ! trim( (string) $raw ) ) {
		$raw = "大報特殊金網株式会社|https://taiho-meshbelt.co.jp/\n株式会社ウィル|https://will-sports.co.jp/company\n甲南防災株式会社|https://www.konanbousai.com/\nVAYoreLA（バイオレーラ）|https://vayorela.jp/\n株式会社 SAI|https://www.sai-oh.jp/\nともやん【レイクレ】|https://www.youtube.com/@tomoyan6\n垂井レイザーバックス|https://tarui-razorbacks.com/";
	}
	$out = array();
	foreach ( preg_split( '/\r\n|\r|\n/', $raw ) as $line ) {
		$line = trim( $line );
		if ( ! $line ) { continue; }
		$parts = array_map( 'trim', explode( '|', $line ) );
		$url   = isset( $parts[1] ) ? $parts[1] : '';
		$host  = $url ? preg_replace( '#^https?://(www\.)?#', '', rtrim( $url, '/' ) ) : '';
		if ( false !== strpos( $host, 'youtube.com/' ) ) { $host = 'YouTube ' . substr( $host, strrpos( $host, '/' ) + 1 ); }
		$out[] = array( 'name' => $parts[0], 'url' => $url, 'host' => $host );
	}
	return $out;
}

/* -------------------------------------------------------------------------
 * GitHub からのテーマ更新（mmmiosskwork/fastbreaks-theme の main ブランチ）
 * style.css の Version が上がると「ダッシュボード → 更新」に表示され、標準の更新機能で反映される
 * ------------------------------------------------------------------------- */
define( 'FB_GH_REPO', 'mmmiosskwork/fastbreaks-theme' );
define( 'FB_GH_BRANCH', 'main' );
add_filter( 'pre_set_site_transient_update_themes', function ( $t ) {
	if ( empty( $t->checked ) ) { return $t; }
	$remote = get_transient( 'fb_gh_remote_version' );
	if ( false === $remote ) {
		$remote = '';
		/* GitHub API（CDN キャッシュなし）を優先し、失敗したら raw にフォールバック */
		$r = wp_remote_get( 'https://api.github.com/repos/' . FB_GH_REPO . '/contents/style.css?ref=' . FB_GH_BRANCH, array( 'timeout' => 8, 'headers' => array( 'Accept' => 'application/vnd.github.raw', 'User-Agent' => 'fastbreaks-theme-updater' ) ) );
		if ( is_wp_error( $r ) || 200 !== wp_remote_retrieve_response_code( $r ) ) {
			$r = wp_remote_get( 'https://raw.githubusercontent.com/' . FB_GH_REPO . '/' . FB_GH_BRANCH . '/style.css?t=' . time(), array( 'timeout' => 8, 'headers' => array( 'Cache-Control' => 'no-cache' ) ) );
		}
		if ( ! is_wp_error( $r ) && 200 === wp_remote_retrieve_response_code( $r ) && preg_match( '/^\s*Version:\s*(.+)$/mi', wp_remote_retrieve_body( $r ), $m ) ) {
			$remote = trim( $m[1] );
		}
		set_transient( 'fb_gh_remote_version', $remote, 10 * MINUTE_IN_SECONDS );
		/* zip のキャッシュで古い版が入るのを防ぐため、最新コミットの SHA を取得して固定 */
		$sha = '';
		$c = wp_remote_get( 'https://api.github.com/repos/' . FB_GH_REPO . '/commits/' . FB_GH_BRANCH, array( 'timeout' => 8, 'headers' => array( 'Accept' => 'application/vnd.github.sha', 'User-Agent' => 'fastbreaks-theme-updater' ) ) );
		if ( ! is_wp_error( $c ) && 200 === wp_remote_retrieve_response_code( $c ) ) {
			$body = trim( wp_remote_retrieve_body( $c ) );
			if ( preg_match( '/^[0-9a-f]{40}$/', $body ) ) { $sha = $body; }
		}
		set_transient( 'fb_gh_remote_sha', $sha, 10 * MINUTE_IN_SECONDS );
	}
	$sha = (string) get_transient( 'fb_gh_remote_sha' );
	$local = wp_get_theme( 'fastbreaks' )->get( 'Version' );
	if ( $remote && $local && version_compare( $remote, $local, '>' ) ) {
		$t->response['fastbreaks'] = array(
			'theme'       => 'fastbreaks',
			'new_version' => $remote,
			'url'         => 'https://github.com/' . FB_GH_REPO,
			'package'     => 'https://codeload.github.com/' . FB_GH_REPO . '/zip/' . ( $sha ? $sha : 'refs/heads/' . FB_GH_BRANCH ),
		);
	} else {
		unset( $t->response['fastbreaks'] );
	}
	return $t;
} );
/* GitHub の zip は「fastbreaks-theme-main/」で展開されるのでフォルダ名を fastbreaks に直す */
add_filter( 'upgrader_source_selection', function ( $source, $remote_source, $upgrader, $hook_extra ) {
	if ( empty( $hook_extra['theme'] ) || 'fastbreaks' !== $hook_extra['theme'] ) { return $source; }
	global $wp_filesystem;
	$target = trailingslashit( $remote_source ) . 'fastbreaks/';
	if ( untrailingslashit( $source ) !== untrailingslashit( $target ) && $wp_filesystem->move( $source, $target ) ) { return $target; }
	return $source;
}, 10, 4 );
/* 更新チェックのキャッシュをすぐ消すリンク（ダッシュボード → 更新 → 「再確認」でも可） */
add_action( 'admin_init', function () {
	if ( isset( $_GET['fb-check-update'] ) && current_user_can( 'update_themes' ) ) {
		delete_transient( 'fb_gh_remote_version' );
		delete_site_transient( 'update_themes' );
		wp_safe_redirect( admin_url( 'update-core.php' ) );
		exit;
	}
} );

/* -------------------------------------------------------------------------
 * note の最新記事（設定「note URL」の /rss を1時間キャッシュ）
 * ------------------------------------------------------------------------- */
function fb_note_items( $limit = 4 ) {
	$base = untrailingslashit( (string) fb_opt( 'sns_note' ) );
	if ( ! preg_match( '#^https://note\.com/[A-Za-z0-9_]+$#', $base ) ) { return array(); }
	$key   = 'fb_note_' . md5( $base );
	$items = get_transient( $key );
	if ( false === $items ) {
		$items = array();
		$r = wp_remote_get( $base . '/rss', array( 'timeout' => 8 ) );
		if ( ! is_wp_error( $r ) && 200 === wp_remote_retrieve_response_code( $r ) ) {
			$prev = libxml_use_internal_errors( true );
			$xml  = simplexml_load_string( wp_remote_retrieve_body( $r ) );
			libxml_use_internal_errors( $prev );
			if ( $xml && isset( $xml->channel->item ) ) {
				foreach ( $xml->channel->item as $it ) {
					$media = $it->children( 'http://search.yahoo.com/mrss/' );
					$items[] = array(
						'title' => wp_strip_all_tags( (string) $it->title ),
						'link'  => esc_url_raw( (string) $it->link ),
						'date'  => strtotime( (string) $it->pubDate ),
						'thumb' => esc_url_raw( (string) $media->thumbnail ),
					);
					if ( count( $items ) >= 12 ) { break; }
				}
			}
		}
		set_transient( $key, $items, $items ? HOUR_IN_SECONDS : 10 * MINUTE_IN_SECONDS );
	}
	return array_slice( $items, 0, $limit );
}

/* お知らせ一覧の URL（「投稿ページ」に設定された固定ページのパーマリンク。スラッグ変更に追従） */
function fb_news_url() {
	$id = (int) get_option( 'page_for_posts' );
	return $id ? get_permalink( $id ) : home_url( '/news/' );
}

/* ファビコン（テーマ同梱）。WordPress の「サイトアイコン」設定より優先 */
remove_action( 'wp_head', 'wp_site_icon', 99 );
remove_action( 'admin_head', 'wp_site_icon' );
remove_action( 'login_head', 'wp_site_icon', 99 );
function fb_favicon_links() {
	$u = FB_THEME_URI . '/assets/img/icon/';
	$v = '?v=' . FB_THEME_VER;
	echo '<link rel="icon" href="' . esc_url( $u . 'favicon.ico' . $v ) . '" sizes="any">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $u . 'favicon-32.png' . $v ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="192x192" href="' . esc_url( $u . 'icon-192.png' . $v ) . '">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . esc_url( $u . 'apple-touch-icon.png' . $v ) . '">' . "\n";
	echo '<meta name="msapplication-TileImage" content="' . esc_url( $u . 'icon-512.png' . $v ) . '">' . "\n";
}
add_action( 'wp_head', 'fb_favicon_links', 99 );
add_action( 'admin_head', 'fb_favicon_links' );
add_action( 'login_head', 'fb_favicon_links' );

/* -------------------------------------------------------------------------
 * シェア時の表示（OGP / Twitter カード / description）
 * AIOSEO と ExUnit の両方が og: を出していて内容が食い違っていたため、
 * wp_head の出力から og:・twitter:・description をいったん取り除き、テーマで一本化して出し直す。
 * ------------------------------------------------------------------------- */
function fb_front_title() { return 'FASTBREAKS｜スポーツのライブ配信・映像制作・SNS運用のコンテンツプロダクション'; }
add_filter( 'aioseo_title', function ( $t ) {
	if ( is_front_page() ) { return fb_front_title(); }
	$o = fb_seo_override();
	return ( $o && ! empty( $o['title'] ) ) ? $o['title'] : $t;
}, 20 );
add_filter( 'pre_get_document_title', function ( $t ) {
	if ( is_front_page() ) { return fb_front_title(); }
	$o = fb_seo_override();
	return ( $o && ! empty( $o['title'] ) ) ? $o['title'] : $t;
}, 20 );

/* ページごとのタイトル・説明文（検索結果とシェアで使う）。本文が空のテンプレートページや自動生成の一覧ページ向け */
function fb_seo_override() {
	$s = ' | FASTBREAKS';
	$pages = array(
		'service'        => array( 'サービス｜ライブ配信・映像制作・SNS運用を一気通貫で' . $s, '配信も、映像も、SNSも。現場を知るチームが、企画から配信・分析まで自社で完結。プロクラブ・連盟・大会主催者・学校・企業のスポーツコンテンツを手がけます。' ),
		'live-streaming' => array( 'ライブ配信｜スポーツ・セミナー・イベントの配信代行' . $s, '試合も、セミナーも、イベントも。関西学生バスケで年間124日程を配信してきた少人数オペレーションで、最大8カメラ・5会場の同時配信まで対応します。' ),
		'video'          => array( '映像制作｜スポーツのハイライト・縦型ショート・PR映像' . $s, 'ひとつの熱源を、多様な物語に展開する。ライブ配信の素材を起点に、YouTube 長尺・縦型ショート・PR 映像まで。縦型ショート1本で300万回再生を生んだ構成力で、ファンを獲得します。' ),
		'sns'            => array( 'SNS運用代行｜スポーツチーム・大会・企業のSNSマーケティング' . $s, '「ファンを熱狂させるメディア運営」を、御社のアカウントで。自社メディアで年間3,352万回再生を生んだ運用設計を、企画・撮影・編集・投稿・分析まで一括で提供します。' ),
		'media'          => array( '自社メディア・スポンサードコンテンツ｜関西最大級の学生バスケメディア' . $s, '「関西の大学バスケ情報は、まずFASTBREAKSを見る」。第一想起を獲得した学生バスケメディアで、Z世代・学生層に届くスポンサードコンテンツやタイアップを設計します。' ),
		'vision'         => array( 'Vision｜確かな熱源が、そこにはある。' . $s, 'ひとつの瞬間が、そのすべてを物語る。Try. Fail. Fast. 挑んで、倒れて、また挑む。「競技」を「事業」へ、「大学スポーツ」を「カルチャー」へ変える、FASTBREAKS のビジョン。' ),
		'company'        => array( '会社概要｜FASTBREAKS合同会社', '「記録」で終わらせない。「熱狂」に変える。大学スポーツのライブ配信・映像制作・SNS運用を手がける FASTBREAKS合同会社の会社概要、代表メッセージ、沿革、大阪・東京の拠点。' ),
		'partner'        => array( 'ライブ配信パートナー募集｜関西学生バスケットボール' . $s, 'この4年間と、あの4年間を繋ぐ。関西学生バスケのライブ配信は、パートナーの皆さまのご支援で運営されています。学生アスリートの4年間を支える、配信パートナーのご案内です。' ),
		'recruit'        => array( '採用情報｜配信・撮影・編集・SNSのクリエイター募集' . $s, '本気の熱狂を、届ける側へ。配信・撮影・編集・SNS運用・執筆のすべての工程で、プロフェッショナルな裁量を渡します。クリエイターと学生インターンを募集中。' ),
		'internship'     => array( '学生インターン募集｜関西学生バスケの現場で学ぶ' . $s, '本気の熱狂を、届ける側へ。関西学生バスケの最前線で、配信・撮影・編集・SNS運用・記事執筆を実践。未経験から始めた先輩がほとんどの、長期の学生インターンです。' ),
		'contact'        => array( 'お問い合わせ｜ライブ配信・映像制作のご相談' . $s, 'まずは、やりたいことをお聞かせください。ライブ配信・撮影・映像制作・SNS運用のご相談、協賛・タイアップ、取材のご依頼はこちらのフォームから。' ),
		'broadcast'      => array( 'ライブ配信の料金・プラン｜スポーツ・イベント・セミナーの配信代行' . $s, 'スポーツ大会・イベント・セミナーのライブ配信代行。LIGHT 15万円〜／日、STANDARD 32万円〜／日、PREMIUM 50万円〜／日。年間124日程を配信するチームが、最大8カメラ・5会場まで大阪・東京から全国対応。' ),
		'faq'            => array( 'よくある質問｜ライブ配信・映像制作のご依頼について' . $s, 'ライブ配信・映像制作のご依頼について、依頼の時期、対応エリア、配信先などのよくある質問をまとめました。' ),
		'privacy-policy' => array( 'プライバシーポリシー' . $s, 'FASTBREAKS合同会社の個人情報保護方針。お問い合わせ・応募フォームでお預かりする個人情報の取り扱いについて定めています。' ),
		'sitemap'        => array( 'サイトマップ' . $s, 'FASTBREAKS のサイトマップ。サービス、実績、会社情報、採用情報など、各ページへのご案内です。' ),
	);
	if ( is_page() ) {
		$slug = get_post_field( 'post_name', get_queried_object_id() );
		if ( isset( $pages[ $slug ] ) ) { return array( 'title' => $pages[ $slug ][0], 'desc' => $pages[ $slug ][1] ); }
		return null;
	}
	if ( is_home() ) {
		return array( 'title' => 'お知らせ' . $s, 'desc' => 'ライブ配信の実施情報、大会・イベントのレポート、採用情報など、FASTBREAKS の最新情報をお届けします。' );
	}
	if ( is_post_type_archive( 'works' ) ) {
		return array( 'title' => '実績｜ライブ配信・映像制作・SNS運用の事例' . $s, 'desc' => 'FIBA 3x3 の国際大会から関西学生バスケのリーグ戦まで。年間124日程のライブ配信と325本の動画制作で積み上げてきた、FASTBREAKS の制作事例です。' );
	}
	if ( is_tax( array( 'work_type', 'sport' ) ) ) {
		$n = single_term_title( '', false );
		return array( 'title' => $n . 'の実績' . $s, 'desc' => 'FASTBREAKS の「' . $n . '」の実績一覧です。' );
	}
	if ( is_category() ) {
		$n = single_cat_title( '', false );
		return array( 'title' => $n . 'のお知らせ' . $s, 'desc' => 'FASTBREAKS の「' . $n . '」に関するお知らせ一覧です。' );
	}
	if ( is_tag() ) {
		$n = single_tag_title( '', false );
		return array( 'title' => '「' . $n . '」の記事' . $s, 'desc' => 'FASTBREAKS の「' . $n . '」に関する記事一覧です。' );
	}
	return null;
}
add_action( 'wp_head', function () { if ( ! is_admin() ) { ob_start(); } }, 0 );
add_action( 'wp_head', function () {
	if ( is_admin() ) { return; }
	$html = ob_get_clean();
	if ( false === $html ) { return; }
	/* 既存の description を拾っておく（最初のもの＝AIOSEO の設定値） */
	$desc = '';
	if ( preg_match( '/<meta\s+name="description"\s+content="([^"]*)"/i', $html, $m ) ) { $desc = html_entity_decode( $m[1], ENT_QUOTES, 'UTF-8' ); }
	/* ExUnit の OGP ブロック、og: / twitter: / article: / fb: と description をすべて除去 */
	$html = preg_replace( '#<!-- \[ VK All in One Expansion Unit (OGP|twitter card) \] -->.*?<!-- \[ / VK All in One Expansion Unit (OGP|twitter card) \] -->#s', '', $html );
	$html = preg_replace( '#<meta\s+(property|name)="(og:|twitter:|article:|fb:)[^"]*"[^>]*>\s*#i', '', $html );
	$html = preg_replace( '#<meta\s+name="description"[^>]*>\s*#i', '', $html );
	echo $html; // phpcs:ignore
	echo fb_meta_tags( $desc ); // phpcs:ignore
}, 9999 );

function fb_meta_tags( $desc = '' ) {
	$site  = 'FASTBREAKS';
	$fix   = array( '関西大学バスケ' => '関西学生バスケ' );
	$front = '「確かな熱源が、そこにはある。」大学スポーツの最前線から、熱と物語を形にするコンテンツプロダクション。ライブ配信、SNSコンテンツで、その瞬間を届けます。';
	$type  = 'website';
	$image = FB_THEME_URI . '/assets/img/ogp.jpg?v=' . FB_THEME_VER;
	$w = 1200; $h = 630;
	if ( is_front_page() ) {
		$title = fb_front_title();
		$desc  = $front;
		$url   = home_url( '/' );
	} else {
		$ov    = fb_seo_override();
		$title = wp_get_document_title();
		if ( $ov && ! empty( $ov['desc'] ) ) { $desc = $ov['desc']; }
		$req   = isset( $GLOBALS['wp']->request ) ? (string) $GLOBALS['wp']->request : '';
		$url   = is_singular() ? get_permalink() : home_url( $req ? user_trailingslashit( $req ) : '/' );
		if ( $cs = fb_works_canonical_source() ) { $url = $cs; }
		if ( is_singular() ) {
			$p = get_queried_object();
			if ( ( ! $desc && ! ( $ov && ! empty( $ov['desc'] ) ) ) || is_singular( array( 'post', 'works' ) ) ) {
				$src  = has_excerpt( $p ) ? $p->post_excerpt : wp_strip_all_tags( strip_shortcodes( $p->post_content ) );
				$text = trim( preg_replace( '/\s+/u', ' ', $src ) );
				if ( $text ) { $desc = mb_strimwidth( $text, 0, 220, '…', 'UTF-8' ); }
			}
			if ( is_singular( array( 'post', 'works' ) ) ) { $type = 'article'; }
			/* 固定ページは旧サイトのアイキャッチが残っているため使わず、共通のシェア画像に統一 */
			if ( ! is_page() && has_post_thumbnail( $p ) ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id( $p ), 'large' );
				if ( $img ) { $image = $img[0]; $w = (int) $img[1]; $h = (int) $img[2]; }
			}
		}
		if ( ! $desc ) { $desc = $front; }
	}
	$desc = strtr( $desc, $fix );
	if ( false !== strpos( $desc, '掲載内容 / 掲載料' ) || false !== strpos( $desc, '新テーマのテンプレート' ) ) { $desc = $front; }
	$t = array(
		array( 'name', 'description', $desc ),
		array( 'property', 'og:locale', 'ja_JP' ),
		array( 'property', 'og:site_name', $site ),
		array( 'property', 'og:type', $type ),
		array( 'property', 'og:title', $title ),
		array( 'property', 'og:description', $desc ),
		array( 'property', 'og:url', $url ),
		array( 'property', 'og:image', $image ),
		array( 'property', 'og:image:width', (string) $w ),
		array( 'property', 'og:image:height', (string) $h ),
		array( 'name', 'twitter:card', 'summary_large_image' ),
		array( 'name', 'twitter:site', '@fastbreaks_jp' ),
		array( 'name', 'twitter:title', $title ),
		array( 'name', 'twitter:description', $desc ),
		array( 'name', 'twitter:image', $image ),
	);
	$out = "<!-- FASTBREAKS meta -->\n";
	foreach ( $t as $r ) { $out .= '<meta ' . $r[0] . '="' . esc_attr( $r[1] ) . '" content="' . esc_attr( $r[2] ) . '">' . "\n"; }
	return $out;
}

/* SNS アイコン（フッター等）。アカウントは「設定 → FASTBREAKS サイト設定」の URL */
function fb_sns_links() {
	$items = array(
		'sns_instagram' => 'Instagram',
		'sns_x'         => 'X',
		'sns_tiktok'    => 'TikTok',
		'sns_youtube'   => 'YouTube',
		'sns_note'      => 'note',
	);
	$out = array();
	foreach ( $items as $key => $label ) {
		$u = trim( (string) fb_opt( $key ) );
		/* ドメインだけの仮URL（https://x.com/ など）は表示しない */
		if ( ! $u || preg_match( '#^https?://(www\.)?[^/]+/?$#', $u ) ) { continue; }
		$out[ $key ] = array( 'url' => $u, 'label' => $label );
	}
	return $out;
}
function fb_sns_icon( $key ) {
	switch ( $key ) {
		case 'sns_x':
			return '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>';
		case 'sns_tiktok':
			return '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>';
		case 'sns_instagram':
			return '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2.5" y="2.5" width="19" height="19" rx="5.5" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4.4" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="17.6" cy="6.4" r="1.3" fill="currentColor"/></svg>';
		case 'sns_youtube':
			return '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="1.5" y="4.5" width="21" height="15" rx="4.5" fill="currentColor"/><path d="M10 8.8v6.4l5.6-3.2z" fill="#06070F"/></svg>';
		case 'sns_note':
			return '<svg viewBox="0 0 24 24" aria-hidden="true"><text x="12" y="16" text-anchor="middle" font-family="Helvetica Neue, Helvetica, Arial, sans-serif" font-size="10" font-weight="700" fill="currentColor">note</text></svg>';
	}
	return '';
}
function fb_sns_list( $class = '' ) {
	$links = fb_sns_links();
	if ( ! $links ) { return ''; }
	$h = '<ul class="sns-icons ' . esc_attr( $class ) . '" aria-label="SNS">';
	foreach ( $links as $key => $l ) {
		$h .= '<li><a href="' . esc_url( $l['url'] ) . '" target="_blank" rel="noopener" aria-label="' . esc_attr( 'FASTBREAKS の ' . $l['label'] ) . '" title="' . esc_attr( $l['label'] ) . '">' . fb_sns_icon( $key ) . '</a></li>';
	}
	return $h . '</ul>';
}


/* 実績にコピーした記事のうち、お知らせとしても公開中のもの（9件）は重複コンテンツになるため、
   実績側の正規URL（canonical）を元のお知らせ記事に向ける */
function fb_works_canonical_source() {
	if ( ! is_singular( 'works' ) ) { return ''; }
	$src = (int) get_post_meta( get_queried_object_id(), 'fb_source_post_id', true );
	return ( $src && 'publish' === get_post_status( $src ) ) ? get_permalink( $src ) : '';
}
add_filter( 'aioseo_canonical_url', function ( $url ) {
	$c = fb_works_canonical_source();
	return $c ? $c : $url;
} );

/* ExUnit が本文の後ろに足す関連記事（h1 を含む）を取り除く。関連記事は single.php で出している */
add_filter( 'the_content', function ( $c ) {
	if ( false === strpos( $c, 'veu_relatedPosts' ) ) { return $c; }
	return preg_replace( '#<aside[^>]*class="[^"]*veu_relatedPosts[^"]*"[^>]*>.*?</aside>#s', '', $c );
}, 9999 );

/* -------------------------------------------------------------------------
 * reCAPTCHA の「保護されています」バッジ
 * Google の規約上、バッジを隠す場合はフォームの近くに reCAPTCHA の利用表記を出す必要があるため、
 * バッジは非表示にして、フォームの送信ボタンの下に表記を入れる。
 * また、フォームの無いページでは reCAPTCHA のスクリプト自体を読み込まない（表示速度の改善）。
 * ------------------------------------------------------------------------- */
function fb_page_has_form() {
	if ( is_page( array( 'contact', 'recruit', 'internship', 'broadcast' ) ) ) { return true; }
	if ( is_singular() ) {
		$c = (string) get_post_field( 'post_content', get_queried_object_id() );
		if ( false !== strpos( $c, 'contact-form-7' ) ) { return true; }
	}
	return false;
}
add_action( 'wp_enqueue_scripts', function () {
	if ( fb_page_has_form() ) { return; }
	wp_dequeue_script( 'google-recaptcha' );
	wp_dequeue_script( 'wpcf7-recaptcha' );
}, 100 );
add_filter( 'wpcf7_form_elements', function ( $html ) {
	return $html . '<p class="recaptcha-note">このフォームは reCAPTCHA で保護されており、Google の<a href="https://policies.google.com/privacy" target="_blank" rel="noopener">プライバシーポリシー</a>と<a href="https://policies.google.com/terms" target="_blank" rel="noopener">利用規約</a>が適用されます。</p>';
} );

