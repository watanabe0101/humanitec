<?php
if ( !defined( 'ABSPATH' ) ) exit;


// カスタムフィールドボックス(制作に関する情報)
function add_works_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	//第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
	//第5引数はnormalの他にsideとadvancedがあります。
	add_meta_box( 'works_setting', '制作に関する情報', 'insert_works_fields', 'works', 'normal');
}
add_action('admin_menu', 'add_works_fields');
 
function custom_metabox_edit_form_tag(){
  echo ' enctype="multipart/form-data"';
}
//画像をアップする場合は、multipart/form-dataの設定が必要なので、post_edit_form_tagをフックしてformタグに追加
add_action('post_edit_form_tag', 'custom_metabox_edit_form_tag');
 
// カスタムフィールドの入力エリア
function insert_works_fields() {
	global $post;
	//下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
	echo 'サイトURL： <input type="text" name="works_url" value="'.get_post_meta($post->ID, 'works_url', true).'" size="50" />　<br>';
	echo '担当業務： <input type="text" name="works_skill" value="'.get_post_meta($post->ID, 'works_skill', true).'" size="50" /><br>';
	echo '制作期間： <input type="text" name="works_time" value="'.get_post_meta($post->ID, 'works_time', true).'" size="50" /><br>';
	echo '制作概要：<br> <textarea name="remarks" cols="100" rows="10" />'.get_post_meta($post->ID, 'remarks', true).'</textarea>　<br>';
} 
 
// カスタムフィールドの値を保存
function save_works_fields( $post_id ) {
	if(!empty($_POST['works_skill'])){ //題名が入力されている場合
		update_post_meta($post_id, 'works_skill', $_POST['works_skill'] ); //値を保存
	}else{ //題名未入力の場合
		delete_post_meta($post_id, 'works_skill'); //値を削除
	}
	
	if(!empty($_POST['works_time'])){
		update_post_meta($post_id, 'works_time', $_POST['works_time'] );
	}else{
		delete_post_meta($post_id, 'works_time');
	}
	
	if(!empty($_POST['works_url'])){
		update_post_meta($post_id, 'works_url', $_POST['works_url'] );
	}else{
		delete_post_meta($post_id, 'works_url');
  }

	if(!empty($_POST['remarks'])){
		update_post_meta($post_id, 'remarks', $_POST['remarks'] );
	}else{
		delete_post_meta($post_id, 'remarks');
  }
	
	if(!empty($_POST['works_label'])){
		update_post_meta($post_id, 'works_label', $_POST['works_label'] );
	}else{
		delete_post_meta($post_id, 'works_label');
	}
}
add_action('save_post', 'save_works_fields');