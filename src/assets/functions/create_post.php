<?php
if ( !defined( 'ABSPATH' ) ) exit;


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

// 一覧画面の表示件数を変更
function change_posts_per_page($query)
{
  if (is_admin() || ! $query->is_main_query())
    return;
  if ($query->is_archive('news')) { //カスタム投稿タイプを指定
    $query->set('posts_per_page', '3'); //表示件数を指定
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
          $link = preg_replace('/<a /', '<a class="custom-pagination__link custom-pagination__prev-link" ', $link); 
        } elseif (strpos($link, 'next') !== false) {
          $link = preg_replace('/<a /', '<a class="custom-pagination__link custom-pagination__next-link" ', $link);
        } else {
          $link = preg_replace('/<a /', '<a class="custom-pagination__link" ', $link);
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
// function add_custom_taxonomy(){
//   // 制作実績(カテゴリー)
//   register_taxonomy(
//       '', // 1.タクソノミーの名前
//       '',          // 2.利用する投稿タイプ
//       array(            // 3.オプション
//           'label' => 'カテゴリー', // タクソノミーの表示名
//           'hierarchical' => true, // 階層を持たせるかどうか
//           'rewrite' => array( 'with_front' =>false),
//           'public' => true, // 利用する場合はtrueにする
//           'show_admin_column' => true,
//       )
//   );
// }
// add_action('init', 'add_custom_taxonomy');


//   //カスタム投稿タイプのタイトルを変更
//   function custom_archive_title( $title ){
//     if ( is_post_type_archive() || is_tax()) {
//       // スラッグを出力（ラベルを出力する場合->label）
//       $title = (get_post_type_object(get_post_type())->name);
//     }
//   return $title;
//   }
//   add_filter( 'get_archive_chapter_title', 'custom_archive_title', 10 );