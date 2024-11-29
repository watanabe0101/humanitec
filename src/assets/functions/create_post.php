<?php
if ( !defined( 'ABSPATH' ) ) exit;


// お知らせ投稿
add_action('init', 'create_news');
function create_news()
{
  register_post_type('news', array( // ⓵スラッグ名「blog」をいれる
    'labels' => array(
      'name' => 'お知らせ', // 投稿タイプの表示名を設定
      'singular_name' => 'お知らせ', // 投稿タイプの表示名を設定
    ),
    'public' => true,
    'has_archive' => true, // ⓶アーカイブページを作成するかどうか
    'menu_position' => 2, // ⓷管理画面での表示位置
    'hierarchical' => false, // ⓸階層構造を持つかどうか
    'supports' => array( // ⓹編集画面の項目
      'title', // タイトル 
      'editor', // エディタ 
      'thumbnail', // サムネイル 
      'revisions', // リビジョン
      'excerpt', // 抜粋 
      'custom-fields' // カスタムフィールド
    )
  ));
}


// 求人情報
add_action('init', 'create_recruit');
function create_recruit()
{
  register_post_type('recruit', array( // ⓵スラッグ名「blog」をいれる
    'labels' => array(
      'name' => '求人情報', // 投稿タイプの表示名を設定
      'singular_name' => '求人情報', // 投稿タイプの表示名を設定
    ),
    'public' => true,
    'has_archive' => true, // ⓶アーカイブページを作成するかどうか
    'menu_position' => 2, // ⓷管理画面での表示位置
    'hierarchical' => false, // ⓸階層構造を持つかどうか
    'supports' => array( // ⓹編集画面の項目
      'title', // タイトル 
      'editor', // エディタ 
      'thumbnail', // サムネイル 
      'revisions', // リビジョン
      'excerpt', // 抜粋 
      'custom-fields' // カスタムフィールド
    )
  ));
}


// パーマリンクにランダムな数字を生成・保存する関数
add_action('save_post', function ($post_id) {
  // 自動保存やリビジョンの更新を避ける
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  // 投稿タイプが "page" でない場合のみ実行
  if (get_post_type($post_id) !== 'page') {
    // 現在のスラッグを取得
    $current_slug = get_post_field('post_name', $post_id);

    // スラッグがランダムな数字でない場合に更新
    if (!preg_match('/^[0-9]{8}$/', $current_slug)) {
      // ランダムな8桁の数字を生成
      $new_slug = makeRandStr(8);
      wp_update_post([
        'ID' => $post_id,
        'post_name' => $new_slug,
      ]);
    }
  }
});

function makeRandStr($length = 8)
{
  static $chars = '0123456789';
  $str = '';
  for ($i = 0; $i < $length; ++$i) {
    $str .= $chars[mt_rand(0, 9)];
  }
  return $str;
}




// 一覧画面の表示件数を変更
function change_posts_per_page($query)
{
  if (is_admin() || ! $query->is_main_query())
    return;
  if ($query->is_archive('news')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '3'); //表示件数を指定
    $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1);

  } elseif ($query->is_archive('recruit')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '10'); //表示件数を指定
    $query->set('paged', get_query_var('paged') ? get_query_var('paged') : 1); // ページネーションを設定
  }
}
add_action('pre_get_posts', 'change_posts_per_page');


// カスタム投稿一覧のページネーションを出力（ページ番号なし）
function custom_paginate_links($the_query, $paged)
{
  if ($the_query->max_num_pages > 1
  ) {
    $args = array(
      'base'      => get_pagenum_link(1) . '%_%',
      'format'    => 'page/%#%/',
      'current'   => max(1, $paged),
      'total'     => $the_query->max_num_pages,
      'prev_next' => true,
      'prev_text' => '<span class="custom-pagination__arrow arrow2"></span>新しい記事',
      'next_text' => '過去の記事<span class="custom-pagination__arrow arrow"></span>',
      'type'      => 'array'
    );

    $links = paginate_links($args);

    if (!empty($links)) {
      echo '<ul class="custom-pagination">';
      foreach ($links as $link) {
        if (strpos($link, 'prev') !== false) {
          $link = preg_replace('/<a([^>]*?)class="[^"]*"/', '<a$1', $link);
          $link = preg_replace('/<a/', '<a class="custom-pagination__link custom-pagination__prev-link"', $link);
        } elseif (strpos($link, 'next') !== false) {
          $link = preg_replace('/<a([^>]*?)class="[^"]*"/', '<a$1', $link);
          $link = preg_replace('/<a/', '<a class="custom-pagination__link custom-pagination__next-link"', $link);
        } else {
          $link = preg_replace('/<a([^>]*?)class="[^"]*"/', '<a$1', $link);
          $link = preg_replace('/<a/', '<a class="custom-pagination__link"', $link);
        }

        if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
          echo '<li class="custom-pagination__item">' . $link . '</li>';
        }
      }
      echo '</ul>';
    }
  }
}


// 求人一覧のページネーション
function custom_paginate_recruit($the_query, $paged)
{
  if (
    $the_query->max_num_pages > 1
  ) {
    $args = array(
      'base'      => get_pagenum_link(1) . '%_%',
      'format'    => 'page/%#%/',
      'current'   => max(1, $paged),
      'total'     => $the_query->max_num_pages,
      'prev_next' => true,
      'prev_text' => '<span class="custom-pagination__arrow arrow2"></span>前の求人へ',
      'next_text' => '次の求人へ<span class="custom-pagination__arrow arrow"></span>',
      'type'      => 'array'
    );

    $links = paginate_links($args);

    if (!empty($links)) {
      echo '<ul class="custom-pagination">';
      foreach ($links as $link) {
        if (strpos($link, 'prev') !== false) {
          $link = preg_replace('/<a([^>]*?)class="[^"]*"/', '<a$1', $link);
          $link = preg_replace('/<a/', '<a class="custom-pagination__link custom-pagination__prev-link"', $link);
        } elseif (strpos($link, 'next') !== false) {
          $link = preg_replace('/<a([^>]*?)class="[^"]*"/', '<a$1', $link);
          $link = preg_replace('/<a/', '<a class="custom-pagination__link custom-pagination__next-link"', $link);
        } else {
          $link = preg_replace('/<a([^>]*?)class="[^"]*"/', '<a$1', $link);
          $link = preg_replace('/<a/', '<a class="custom-pagination__link"', $link);
        }

        if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
          echo '<li class="custom-pagination__item">' . $link . '</li>';
        }
      }
      echo '</ul>';
    }
  }
}

// custom_paginate_links($the_query, $paged);←出力コード

// カスタムタクソノミーの追加
function add_custom_taxonomy(){
  register_taxonomy(
    'employment-type', // 1.タクソノミーの名前
    'recruit',          // 2.利用する投稿タイプ
      array(            // 3.オプション
          'label' => 'カテゴリー', // タクソノミーの表示名
          'hierarchical' => true, // 階層を持たせるかどうか
          'rewrite' => array( 'with_front' =>false),
          'public' => true, // 利用する場合はtrueにする
          'show_admin_column' => true,
      )
  );
}
add_action('init', 'add_custom_taxonomy');


  //カスタム投稿タイプのタイトルを変更
  function custom_archive_title( $title ){
    if ( is_post_type_archive() || is_tax()) {
      // スラッグを出力（ラベルを出力する場合->label）
      $title = (get_post_type_object(get_post_type())->name);
    }
  return $title;
  }
  add_filter( 'get_archive_chapter_title', 'custom_archive_title', 10 );