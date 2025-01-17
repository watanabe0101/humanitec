<?php
if (!defined('ABSPATH')) exit;


// ファイルをheadとbodyの閉じタグ直前にに追加する関数と宣言
function my_script()
{
  wp_deregister_script('jquery'); // WordPressに含まれているjquery.jsを読み込まない
  wp_enqueue_script('jquery', get_theme_file_uri('/assets/jquery/jquery-3.7.1.min.js'), array(), filemtime(get_theme_file_path('assets/jquery/jquery-3.7.1.min.js')), true);

  wp_enqueue_script('jquery-picturefill', get_theme_file_uri('/assets/jquery/picturefill.min.js'), array(), filemtime(get_theme_file_path('assets/jquery/picturefill.min.js')), true);
  
  wp_enqueue_script('script-common', get_theme_file_uri('/assets/script/common.js'), array(), filemtime(get_theme_file_path('assets/script/common.js')), true);

  if (is_front_page()) {
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/home.min.css', array(), filemtime(get_theme_file_path('assets/css/home.min.css')));
  }

  if (is_page('group')) {
    wp_enqueue_style('group-style', get_stylesheet_directory_uri() . '/assets/css/group.min.css', array(), filemtime(get_theme_file_path('assets/css/group.min.css')));
  }

  if (is_page('about')) {
    wp_enqueue_style('about-style', get_stylesheet_directory_uri() . '/assets/css/about.min.css', array(), filemtime(get_theme_file_path('assets/css/about.min.css')));
  }

  if (is_page('contact') or is_page('confirm') or is_page('thanks')) {
    wp_enqueue_style('contact-style', get_stylesheet_directory_uri() . '/assets/css/contact.min.css', array(), filemtime(get_theme_file_path('assets/css/contact.min.css')));
  }
  
  if (is_post_type_archive('news')) {
    wp_enqueue_style('news-style', get_stylesheet_directory_uri() . '/assets/css/news.min.css', array(), filemtime(get_theme_file_path('assets/css/news.min.css')));
  }

  if (is_post_type_archive('recruit')) {
    wp_enqueue_style('recruit-style', get_stylesheet_directory_uri() . '/assets/css/recruit.min.css', array(), filemtime(get_theme_file_path('assets/css/recruit.min.css')));
  }

  if (is_singular('recruit')) {
    wp_enqueue_style('recruit-detail-style', get_stylesheet_directory_uri() . '/assets/css/recruit-detail.min.css', array(), filemtime(get_theme_file_path('assets/css/recruit-detail.min.css')));
  }

  if (is_singular('news')) {
    wp_enqueue_style('news-style', get_stylesheet_directory_uri() . '/assets/css/news.min.css', array(), filemtime(get_theme_file_path('assets/css/news.min.css')));
  }

  if (is_404()) {
    wp_enqueue_script('script-sticky-footer', get_theme_file_uri('/assets/script/sticky-footer.js'), array(), filemtime(get_theme_file_path('assets/script/sticky-footer.js')), true);
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/page-404.min.css', array(), filemtime(get_theme_file_path('assets/css/page-404.min.css')));
  }
}
add_action('wp_enqueue_scripts', 'my_script');


// JSファイルにdefer属性を付与（レンダリングを妨げるリソースの場外対策）
function add_defer($tag)
{
  // 管理画面では処理しない
  if (is_admin()) {
    return $tag;
  }

  // jQueryにはdeferを追加しない
  if (strpos($tag, 'jquery.js')) {
    return $tag;
  }

  // aioseo関連のスクリプトにはdeferを追加しない
  if (strpos($tag, 'aioseo')) {
    return $tag;
  }

  // deferを付与
  return str_replace('src', 'defer src', $tag);
}
add_filter('script_loader_tag', 'add_defer', 10);