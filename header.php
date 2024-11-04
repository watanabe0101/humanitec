<?php if (!defined('ABSPATH')) exit; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php if (is_home() || is_front_page()): ?>
  <!-- トップページ -->

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php else: ?>
    <!-- トップページ以外 -->

    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <?php endif; ?>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- Google Tag Manager -->
    <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M38HFQSX');</script> -->
    <!-- End Google Tag Manager -->

    <!-- /Google Search Console -->
    <!-- /Google Search Console -->

    <!-- OGPなど -->
    <!-- title -->
    <title></title>
    <!-- アーカイブページ、ターム別一覧ページ、カスタム投稿の各記事のtitleを個別に設定 -->
    <?php if (is_post_type_archive('works') || is_tax() || is_singular('カスタム投稿名')): ?>
      <title><?php bloginfo('name'); ?></title>
    <?php endif; ?>

    <!-- description -->
    <?php if (is_home() || is_front_page()): ?>
      <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php elseif (is_page('')): ?>
      <meta name="description" content="">
    <?php elseif (is_category()): ?>
      <meta name="description" content="<?php echo category_description(); ?>">
    <?php elseif (is_tag()): ?>
      <meta name="description" content="<?php echo tag_description(); ?>">
    <?php elseif (is_tax()): ?>
      <meta name="description" content=<?php echo tag_description(); ?>>
    <?php elseif (is_singular()): ?>
      <meta name="description" content="<?php echo get_the_excerpt(); ?>">
    <?php elseif (is_post_type_archive('カスタム投稿のスラッグ')): ?>
      <meta name="description" content="カスタム投稿一覧の説明">
    <?php endif; ?>

    <!-- og:title -->
    <meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">

    <!-- og:type -->
    <meta property="og:type" content="<?php if (is_front_page()) {
                                        echo 'website';
                                      } else {
                                        echo 'article';
                                      } ?>" />

    <!-- og:url -->
    <?php if (is_post_type_archive('カスタム投稿のスラッグ')): ?>
      <meta property="og:url" content="<?php echo esc_url(get_post_type_archive_link('カスタム投稿のスラッグ')); ?>">
    <?php elseif (is_tax('カスタム投稿のタクソノミー')): ?>
      <?php $term = get_queried_object(); ?>
      <meta property="og:url" content="<?php echo esc_url(get_term_link($term)); ?>">
    <?php else: ?>
      <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
    <?php endif; ?>

    <!-- og:image -->
    <?php if (is_post_type_archive('カスタム投稿のスラッグ')): ?>
      <!-- カスタム投稿の一覧ページ -->
      <meta property="og:image" content="<?php echo get_theme_file_uri('images/ogp/ogp.jpg'); ?>">
    <?php elseif (is_tax()): ?>
      <!-- ターム別アーカイブページ -->
      <meta property="og:image" content="<?php echo get_theme_file_uri('images/ogp/ogp.jpg'); ?>">
    <?php elseif (has_post_thumbnail()): ?>
      <!-- サムネイルがある場合 -->
      <meta property="og:image" content="<?php echo esc_url(get_the_post_thumbnail_url()); ?>">
    <?php else: ?>
      <!-- サムネイルがない場合 -->
      <meta property="og:image" content="<?php echo get_theme_file_uri('images/ogp/ogp.jpg'); ?>">
    <?php endif; ?>

    <!-- og:site_name -->
    <meta property="og:site_name" content="このサイトの名前">

    <!-- og:description -->
    <?php if (is_home() || is_front_page()): ?>
      <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <?php elseif (is_category()): ?>
      <meta property="og:description" content="<?php echo category_description(); ?>">
    <?php elseif (is_tag()): ?>
      <meta property="og:description" content="<?php echo tag_description(); ?>">
    <?php elseif (is_tax()): ?>
      <meta property="og:description" content="<?php echo tag_description(); ?>">
    <?php elseif (is_singular()): ?>
      <meta property="og:description" content="<?php echo get_the_excerpt(); ?>">
    <?php elseif (is_post_type_archive()): ?>
      <meta property="og:description" content="説明">
    <?php endif; ?>

    <!-- twitter:card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="________">
    <meta name="twitter:description" content="________">
    <meta name="twitter:image" content="<?php echo get_theme_file_uri('iamges/ogp/ogptw.jpg'); ?>">

    <!-- サイトカラー -->
    <meta name="theme-color" content="⑧サイトカラー（このサイトのカラー）">

    <!-- モバイル検索結果にサムネイル画像を表示させるためのthumbnailタグ -->
    <meta name="thumbnail" content="<?php echo get_theme_file_uri('images/header/mobile-search.jpg'); ?>">

    <!-- ファビコン -->
    <link rel="icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/apple-touch-icon.png'); ?>" sizes="180x180">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/android-chrome.png'); ?>" sizes="192x192">

    <!-- canonical属性（ページャーがるアーカイブページなどの類似ページがある場合、どのページをクロールさせるか指定する） -->
    <!-- <link rel="canonical" href="④リンク（このページのURLを入力）"> -->

    <!-- お問い合わせページでキャッシュを無効化 -->
    <?php
    if (is_page('contactページのid') or is_page('confirmページのid') or is_page('completeページのid')) { ?>
      <meta http-equiv="Cache-Control" content="no-cache">
    <?php } ?>

    <?php wp_head(); ?>
    </head>

  <body <?php body_class(); ?>><?php wp_body_open(); ?>
    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M38HFQSX"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->
    <?php
    if (is_404()) { ?>
      <div class="sticky-footer-wrapper">
      <?php } ?>
      <header class="header">
        <div class="header__inner">

          <?php if (is_home() || is_front_page()): ?>
            <h1 class="header__logo">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('assets/images/header/logo.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('images/header/logo.png'); ?>" alt="ロゴ">
                </picture>
              </a>
            </h1>
          <?php else: ?>
            <p class="header__logo">
              <a href="<?php echo esc_url(home_url('/#home')); ?>" class="header__logo-link">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('images/header/logo.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('images/header/logo.png'); ?>" alt="ロゴ">
                </picture>
              </a>
            </p>
          <?php endif; ?>

          <nav class="header__menu">
            <ul class="header__list">
              <li class="header__item"><a href="" class="header__link"></a></li>
            </ul>
          </nav>
        </div>
      </header>
      <button type="button" id="hamburger" class="hamburger js-hamburger" aria-expanded="false" aria-controls="headerDrawer" aria-label="メニューを開く">
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <!-- <p class="header__menu">MENU</p> -->
      </button>
      <nav id="headerDrawer" class="headerDrawer js-drawer" aria-label="スマホ用メニュー" aria-hidden="true">
        <div class="headerDrawer__inner">
          <ul class="headerDrawer__list">
            <li class="headerDrawer__item">
              <a href="" class="headerDrawer__link"></a>
            </li>
          </ul>
        </div>
      </nav>