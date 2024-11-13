<?php
if ( !defined( 'ABSPATH' ) ) exit;


// カスタムフィールドボックス
function add_recruit_fields() {
	//add_meta_box(表示される入力ボックスのHTMLのID, ラベル, 表示する内容を作成する関数名, 投稿タイプ, 表示方法)
	//第4引数のpostをpageに変更すれば固定ページにオリジナルカスタムフィールドが表示されます(custom_post_typeのslugを指定することも可能)。
	//第5引数はnormalの他にsideとadvancedがあります。
	add_meta_box( 'recruit_setting', '求人詳細', 'insert_recruit_fields', 'recruit', 'normal', 'high');
}
add_action('admin_menu', 'add_recruit_fields');
 
function custom_metabox_edit_form_tag(){
  echo ' enctype="multipart/form-data"';
}
//画像をアップする場合は、multipart/form-dataの設定が必要なので、post_edit_form_tagをフックしてformタグに追加
add_action('post_edit_form_tag', 'custom_metabox_edit_form_tag');
 
// カスタムフィールドの入力エリア
function insert_recruit_fields() {
	global $post;

	echo '<style>
		.custom-field {
				--_padding: 0.5em;

				margin-block-end: 15px;
		}
		.custom-field__title {
				display: block;
				font-weight: bold;
				margin-bottom: 5px;
		}
		.custom-field input[type="text"],
		.custom-field textarea {
				inline-size: 100%;
				padding: var(--_padding);
				line-height: 1.5;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				field-sizing content;
		}
		textarea {
		  --_min-rows: 5;
			--_max-rows: 10;

			box-sizing: border-box;
			min-block-size: calc(var(--_min-rows) * 1lh * var(--_padding) * 2);
			max-block-size: calc(var(--_max-rows) * 1lh * var(--_padding) * 2);
			field-sizing: content;
		}
		textarea @supports (field-sizing content) {
			resize: noe;
		}
		.custom-field input[type="checkbox"] {
				margin-top: 10px;
		}
	</style>';
	//下記に管理画面に表示される入力エリアを作ります。「get_post_meta()」は現在入力されている値を表示するための記述です。
	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">募集職種：</p>';
	echo '<input type="text" id="custom-field1" name="custom-field1" value="' . get_post_meta($post->ID, 'custom-field1', true) . '" />';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">仕事内容：</p>';
	echo '<textarea id="custom-field2" name="custom-field2" cols="100" rows="3">' . get_post_meta($post->ID, 'custom-field2', true) . '</textarea>';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">雇用形態：</p>';
	echo '<input type="text" id="custom-field3" name="custom-field3" value="' . get_post_meta($post->ID, 'custom-field3', true) . '" />';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">給与：</p>';
	echo '<input type="text" id="custom-field4" name="custom-field4" value="' . get_post_meta($post->ID, 'custom-field4', true) . '" />';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">昇給・賞与：</p>';
	echo '<textarea id="custom-field5" name="custom-field5" cols="100" rows="2">' . get_post_meta($post->ID, 'custom-field5', true) . '</textarea>';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">諸手当・待遇：</p>';
	echo '<input type="text" id="custom-field6" name="custom-field6" value="' . get_post_meta($post->ID, 'custom-field6', true) . '" />';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">勤務時間：</p>';
	echo '<input type="text" id="custom-field7" name="custom-field7" value="' . get_post_meta($post->ID, 'custom-field7', true) . '" />';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">休日・休暇：</p>';
	echo '<textarea id="custom-field8" name="custom-field8" cols="100" rows="5">' . get_post_meta($post->ID, 'custom-field8', true) . '</textarea>';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">応募資格：</p>';
	echo '<textarea id="custom-field9" name="custom-field9" cols="100" rows="5">' . get_post_meta($post->ID, 'custom-field9', true) . '</textarea>';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">勤務地：</p>';
	echo '<textarea id="custom-field10" name="custom-field10" cols="100" rows="3">' . get_post_meta($post->ID, 'custom-field10', true) . '</textarea>';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">アクセス：</p>';
	echo '<input type="text" id="custom-field11" name="custom-field11" value="' . get_post_meta($post->ID, 'custom-field11', true) . '" />';
	echo '</div>';

	echo '<div class="custom-field">';
	echo '<p class="custom-field__title">その他：</p>';
	echo '<textarea id="custom-field12" name="custom-field12" cols="100" rows="5">' . get_post_meta($post->ID, 'custom-field12', true) . '</textarea>';
	echo '</div>';

	// チェックボックス
	$urgent = get_post_meta($post->ID, 'urgent', true);
	echo '急募： <input type="checkbox" name="urgent" value="1" ' . checked($urgent, '1', false) . ' /><br>';
} 
 
// カスタムフィールドの値を保存
function save_recruit_fields( $post_id ) {
	for ($i = 1; $i <= 12; $i++) {
		$field_name = 'custom-field' . $i; // フィールド名を生成

		if (!empty($_POST[$field_name])) { // フィールドが入力されている場合
			update_post_meta($post_id, $field_name, $_POST[$field_name]); // 値を保存
		} else { // フィールド未入力の場合
			delete_post_meta($post_id, $field_name); // 値を削除
		}
	}

	for ($i = 1; $i <= 12; $i++) {
		$field_name = 'custom-field' . $i; // フィールド名を生成

		if (!empty($_POST[$field_name])) { // フィールドが入力されている場合
			update_post_meta($post_id, $field_name, wp_kses_post($_POST[$field_name])); // 値を保存
		} else { // フィールド未入力の場合
			delete_post_meta($post_id, $field_name); // 値を削除
		}
	}

	if (isset($_POST['urgent']) && $_POST['urgent'] === '1') {
		update_post_meta($post_id, 'urgent', '1'); // チェックボックスがオンの場合
	} else {
		delete_post_meta($post_id, 'urgent'); // チェックボックスがオフの場合
	}
}
add_action('save_post', 'save_recruit_fields');


function display_urgent_label()
{
	global $post;
	if (get_post_meta($post->ID, 'urgent', true)) {
		echo '<p class="recruit-card__urgent">急募</p>'; // チェックボックスがオンの場合に「急募」を表示
	} else {
		// チェックボックスがオフの場合の処理（必要に応じて）
		return;
	}
}