<?php
if ( !defined( 'ABSPATH' ) ) exit;


// カスタム投稿タイプの追加
function create_post_type() {
  //カスタム投稿 制作実績
    register_post_type(
      '好きなスラッグ 例）works',
      array(
        'labels' => array(
          'name' => __( '管理画面に出力されるタイトル' ),
          'singular_name' => __( '管理画面に出力されるタイトル' )
        ),
        'public' => true,
      'hierarchical' => false,
        'menu_position' => 2,
      'supports' => array('title','editor','excerpt','thumbnail','custom-fields'),
      'has_archive' => true,
      'rewrite' => array( 'with_front' =>false),
      'show_in_rest' => true,
      )
    );
  
  }
  add_action( 'init', 'create_post_type' );

// カスタムタクソノミーの追加
function add_custom_taxonomy(){
  // 制作実績(カテゴリー)
  register_taxonomy(
      '', // 1.タクソノミーの名前
      '',          // 2.利用する投稿タイプ
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