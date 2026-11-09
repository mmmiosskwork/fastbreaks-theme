# FASTBREAKS テーマ — 導入手順

## 1. インストール（5分）
1. WordPress管理画面 → 外観 → テーマ → 新規追加 → テーマのアップロード → `fastbreaks.zip` を選択 → 有効化
2. 設定 → パーマリンク → 「投稿名」を選んで保存（実績URLを有効にするため必須）
3. 設定 → 表示設定 → 「固定ページ」を選択。ホームページ＝「ホーム」、投稿ページ＝「ニュース」（固定ページは手順2で作成）

## 2. 固定ページを作る（スラッグが重要）
| ページ名 | スラッグ | 親 | テンプレート |
| --- | --- | --- | --- |
| ホーム | home | — | （自動：front-page） |
| サービス | service | — | 自動適用（page-service） |
| ライブ配信 | live-streaming | サービス | 自動適用（page-live-streaming） |
| 映像制作 | video | サービス | 標準（本文を自由に） |
| SNS運用 | sns | サービス | 標準 |
| 自社メディア | media | サービス | 標準 |
| 会社概要 | company | — | 標準 |
| 採用 | recruit | — | 標準 |
| ニュース | news | — | 空ページ（投稿一覧用） |
| お問い合わせ | contact | — | 自動適用（page-contact） |
| プライバシーポリシー | privacy | — | 標準 |

標準テンプレートのページは、カスタムフィールド `fb_en_title`（英字見出し）と `fb_label`（小ラベル）を追加すると見出しが英字巨大タイポになります。

## 3. サイト設定
設定 → FASTBREAKS サイト設定 で以下を入力：数字（FACTS）／取引先／価格／SNS／会社情報／フォームのショートコード／GTM ID。

## 4. 実績を登録
実績 → 実績を追加。アイキャッチ画像（横1600px推奨）、種別・競技を選択、「実績の詳細情報」にクライアント・期間・担当範囲・体制・成果数字を入力。「トップページに表示する」にチェックで最大5件がトップに出ます。

## 5. メニュー
外観 → メニュー → 「グローバルナビ」「フッターナビ」に割り当て。未設定でも自動でメニューが出ます。英字表記（Service / Works / About / News / Recruit）を推奨。

## 6. 推奨プラグイン
- Contact Form 7 ＋ Flamingo（フォーム・送信履歴）、reCAPTCHA v3
- SEO SIMPLE PACK（title/description/OGP）
- Redirection（旧URLの301）
- EWWW Image Optimizer（WebP化）
- UpdraftPlus（バックアップ）、SiteGuard WP Plugin（ログイン保護）
- Smash Balloon Instagram Feed（既存を継続。ショートコードをサイト設定に登録）

## 7. ヒーロー動画
MP4（H.264、10〜15秒、5MB以下）をメディアにアップロードし、URLをサイト設定「ヒーロー背景動画のURL」に。SPでは自動的に静止画になります。

## 8. 株式会社化のとき
サイト設定の「会社名」を変更し、「会社名の注記」を空欄にするだけで全ページに反映されます。


## 更新の流れ（GitHub 連携）

- コードは https://github.com/mmmiosskwork/fastbreaks-theme（main ブランチ）で管理
- style.css の `Version:` が上がると、WordPress の「ダッシュボード → 更新」に FASTBREAKS テーマの更新が表示される（最大10分のキャッシュ。すぐ確認したいときは `/wp-admin/?fb-check-update=1` を開く）
- 「テーマを更新」を押すと GitHub の zip を取得して差し替わる。zip の手動アップロードは不要
- 文言・数字・URL・パートナー一覧・ヒーロー動画などは「設定 → FASTBREAKS サイト設定」で変更（コード変更不要）
