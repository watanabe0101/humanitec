<?php if (!defined('ABSPATH')) exit; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php if (is_home() || is_front_page()): ?>

  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <?php else: ?>

    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <?php endif; ?>

    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">

    <!-- title -->
    <?php if (is_home() || is_front_page()): ?>
      <title>ユマニテク教育支援センター｜三重県四日市市</title>
    <?php elseif (is_page('group')): ?>
      <title>グループ法人｜ユマニテク教育支援センター</title>
    <?php elseif (is_page('about')): ?>
      <title>法人概要｜ユマニテク教育支援センター</title>
    <?php elseif (is_page('contact')): ?>
      <title>お問い合わせ｜ユマニテク教育支援センター</title>
    <?php elseif (is_page('confirm')): ?>
      <title>お問い合わせ｜ユマニテク教育支援センター</title>
    <?php elseif (is_category()): ?>
    <?php elseif (is_tag()): ?>
    <?php elseif (is_tax()): ?>
    <?php elseif (is_singular('recruit')): ?>
      <title>求人情報｜ユマニテク教育支援センター</title>
    <?php elseif (is_post_type_archive('news')): ?>
      <title>お知らせ｜ユマニテク教育支援センター</title>
    <?php elseif (is_post_type_archive('recruit')): ?>
      <title>求人情報｜ユマニテク教育支援センター</title>
    <?php endif; ?>

    <!-- description -->
    <?php if (is_home() || is_front_page()): ?>
      <meta name="description" content="「介護福祉士実務者研修」「保育専門研修」「外国人人材集合研修」「外国人（技能実習生／特定技能外国人）向け日本語研修」などの教育研修事業を行うユマニテク教育支援センターのホームページです。">
    <?php elseif (is_page('group')): ?>
      <meta name="description" content=“ユマニテク教育支援センターは、愛知・三重で専門学校・短大、社会福祉施設などを運営する大橋学園グループの一員です。”>
    <?php elseif (is_page('about')): ?>
      <meta name="description" content=“ユマニテク教育支援センターの法人概要ページです。”>
    <?php elseif (is_page('contact')): ?>
      <meta name="description" content=“ユマニテク教育支援センターへのお問い合わせおよび求人申し込みはこちらから。”>
    <?php elseif (is_page('confirm')): ?>
      <meta name="description" content=“ユマニテク教育支援センターへのお問い合わせおよび求人申し込みはこちらから。”>
    <?php elseif (is_page('about')): ?>
      <meta name="description" content=“ユマニテク教育支援センターの法人概要ページです。”>
    <?php elseif (is_page('about')): ?>
      <meta name="description" content=“ユマニテク教育支援センターの法人概要ページです。”>
    <?php elseif (is_category()): ?>
      <meta name="description" content="<?php echo category_description(); ?>">
    <?php elseif (is_tag()): ?>
      <meta name="description" content="<?php echo tag_description(); ?>">
    <?php elseif (is_tax()): ?>
      <meta name="description" content=<?php echo tag_description(); ?>>
    <?php elseif (is_singular('recruit')): ?>
      <meta name="description" content="ユマニテク教育支援センターの求人情報です。">
    <?php elseif (is_post_type_archive('news')): ?>
      <meta name="description" content="ユマニテク教育支援センターの最新情報をお届けします。">
    <?php elseif (is_post_type_archive('recruit')): ?>
      <meta name="description" content="ユマニテク教育支援センターの求人情報です。">
    <?php endif; ?>

    <!-- og:title -->
    <meta property="og:title" content="ユマニテク教育支援センター｜三重県四日市市">

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

    <meta property="og:image" content="<?php echo get_theme_file_uri('assets/images/common/ogp/ogp.jpg'); ?>">

    <!-- og:site_name -->
    <meta property="og:site_name" content="ユマニテク教育支援センター">

    <!-- og:description -->
    <?php if (is_home() || is_front_page()): ?>
      <meta property="og:description" content="「介護福祉士実務者研修」「保育専門研修」「外国人人材集合研修」「外国人（技能実習生／特定技能外国人）向け日本語研修」などの教育研修事業を行うユマニテク教育支援センターのホームページです。">
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
    <meta name="twitter:title" content="ユマニテク教育支援センター">
    <meta name="twitter:description" content="「介護福祉士実務者研修」「保育専門研修」「外国人人材集合研修」「外国人（技能実習生／特定技能外国人）向け日本語研修」などの教育研修事業を行うユマニテク教育支援センターのホームページです。">
    <meta name="twitter:image" content="<?php echo get_theme_file_uri('assets/images/common/ogp/ogp.jpg'); ?>">

    <!-- サイトカラー -->
    <meta name="theme-color" content="#D8EBED">

    <!-- モバイル検索結果にサムネイル画像を表示させるためのthumbnailタグ -->
    <meta name="thumbnail" content="<?php echo get_theme_file_uri('images/header/mobile-search.jpg'); ?>">

    <!-- ファビコン -->
    <link rel="icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/apple-touch-icon.png'); ?>" sizes="180x180">
    <link rel="icon" type="image/png" href="<?php echo get_theme_file_uri('./assets/images/common/favicon/web-app-manifest-192x192.png'); ?>" sizes="192x192">

    <!-- canonical属性（類似ページがある場合、どのページをクロールさせるか指定する） -->
    <!-- <link rel="canonical" href="④リンク（このページのURLを入力）"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Shippori+Mincho:wght@400;500;600;700;800&family=Sorts+Mill+Goudy:ital@0;1&display=swap" rel="stylesheet">

    <!-- お問い合わせページでキャッシュを無効化 -->
    <?php
    if (is_page('contactページのid') or is_page('confirmページのid') or is_page('completeページのid')) { ?>
      <meta http-equiv="Cache-Control" content="no-cache">
    <?php } ?>

    <?php wp_head(); ?>
    </head>

  <body <?php body_class(); ?>><?php wp_body_open(); ?>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9N19Z0Q5YL">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'G-9N19Z0Q5YL');
    </script>
    <!-- End Google Tag Manager -->

    <?php
    if (is_404()) { ?>
      <div class="sticky-footer-wrapper">
      <?php } ?>
      <header class="header">
        <div class="header__inner inner">

          <div class="header__wrapper">
            <?php if (is_home() || is_front_page()): ?>
              <h1 class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                  <img src="<?php echo get_theme_file_uri('/assets/images/header/logo.svg'); ?>" alt="ロゴ">
                </a>
              </h1>
            <?php else: ?>
              <p class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                  <img src="<?php echo get_theme_file_uri('/assets/images/header/logo.svg'); ?>" alt="ロゴ">
                </a>
              </p>
            <?php endif; ?>
            <div class="header__info">
              <nav class="header__menu">
                <ul class="header__list">
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/')); ?>" class="header__link">事業紹介</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/about/')); ?>" class="header__link">法人概要</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/news/')); ?>" class="header__link">お知らせ</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/group/')); ?>" class="header__link">グループ法人</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="header__link">求人情報</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/')); ?>" class="header__link">アクセス</a></li>
                </ul>
              </nav>
              <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="header__contact">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('/assets/images/header/header-contact.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('/assets/images/header/header-contact.jpg'); ?>" alt="お問い合わせマーク">
                </picture>
              </a>
            </div>
            <button type="button" id="hamburger" class="hamburger js-hamburger" aria-expanded="false" aria-controls="headerDrawer" aria-label="メニューを開く">
              <span class="hamburger__line"></span>
              <span class="hamburger__line"></span>
              <span class="hamburger__line"></span>
            </button>
          </div>
        </div>
      </header>
      <!-- 固定ヘッダー -->
      <div class="header js-fixed fixed-header">
        <div class="header__inner inner">
          <div class="header__wrapper">
            <?php if (is_home() || is_front_page()): ?>
              <h1 class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                  <img src="<?php echo get_theme_file_uri('/assets/images/header/logo.svg'); ?>" alt="ロゴ">
                </a>
              </h1>
            <?php else: ?>
              <p class="header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo-link">
                  <img src="<?php echo get_theme_file_uri('/assets/images/header/logo.svg'); ?>" alt="ロゴ">
                </a>
              </p>
            <?php endif; ?>
            <div class="header__info">
              <nav class="header__menu">
                <ul class="header__list">
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/')); ?>" class="header__link">事業紹介</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/about/')); ?>" class="header__link">法人概要</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/news/')); ?>" class="header__link">お知らせ</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/group/')); ?>" class="header__link">グループ法人</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="header__link">求人情報</a></li>
                  <li class="header__item"><a href="<?php echo esc_url(home_url('/')); ?>" class="header__link">アクセス</a></li>
                </ul>
              </nav>
              <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="header__contact">
                <picture>
                  <source srcset="<?php echo get_theme_file_uri('/assets/images/header/header-contact.webp'); ?>" type="image/webp">
                  <img src="<?php echo get_theme_file_uri('/assets/images/header/header-contact.jpg'); ?>" alt="お問い合わせマーク">
                </picture>
              </a>
            </div>
            <button type="button" class="hamburger js-hamburger" aria-expanded="false" aria-controls="headerDrawer" aria-label="メニューを開く">
              <span class="hamburger__line"></span>
              <span class="hamburger__line"></span>
              <span class="hamburger__line"></span>
            </button>
          </div>
        </div>
      </div>

      <nav id="headerDrawer" class="headerDrawer js-drawer" aria-label="スマホ用メニュー" aria-hidden="true">
        <div class="headerDrawer__inner">
          <ul class="headerDrawer__list">
            <li class="headerDrawer__item">
              <a href="<?php echo esc_url(home_url('/about/')); ?>" class="headerDrawer__link">法人概要<span class="headerDrawer__arrow arrow"></span></a>
            </li>
            <li class="headerDrawer__item">
              <a href="<?php echo esc_url(home_url('/news/')); ?>" class="headerDrawer__link">お知らせ<span class="headerDrawer__arrow arrow"></span></a>
            </li>
            <li class="headerDrawer__item">
              <a href="<?php echo esc_url(home_url('/group/')); ?>" class="headerDrawer__link">グループ法人<span class="headerDrawer__arrow arrow"></span></a>
            </li>
            <li class="headerDrawer__item">
              <a href="<?php echo esc_url(home_url('/recruit/')); ?>" class="headerDrawer__link">求人情報<span class="headerDrawer__arrow arrow"></span></a>
            </li>
            <li class="headerDrawer__item">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="headerDrawer__link">アクセス<span class="headerDrawer__arrow arrow"></span></a>
            </li>
          </ul>
          <div class="headerDrawer__button-wrapper">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="headerDrawer__contact-button">
              お問い合わせ
            </a>
          </div>
          <div class="headerDrawer__button-wrapper2">
            <button class="headerDrawer__close-button js-hamburger" aria-expanded="false" aria-controls="headerDrawer" aria-label="メニューを開く">
              Close
            </button>
          </div>
        </div>
      </nav>