<?php
if ( !defined( 'ABSPATH' ) ) exit;


// カスタムフィールドボックス(メディアアップローダーを自作し画像を表示させる)
add_action('admin_menu', 'add_mockup_fields');

function add_mockup_fields() {
    add_meta_box(
        'mockup_sectionid', // id (必須)
        'モックアップと透過する背景画像', // title (必須)
        'mockup_custom_fields', // コールバック (必須)
        'works', // 投稿の種類 (必須、post、pageなど)
        'advanced', // 編集画面セクションが表示される部分 (オプション)
        'default' // 優先順位
    );
}

function mockup_custom_fields($post) {
    $mockup_image_name = array();
    $mockup_image = array();

    // 3画像の格納
    for ($i = 0; $i < 3; $i++) {
        $mockup_image_name[] = get_post_meta($post->ID, 'mockup-image-name_' . $i, true);
        $mockup_image[] = get_post_meta($post->ID, 'mockup-image_' . $i, true);
    }

    // 登録画面に出力
    ?>
    <table class="form-table">
        <?php wp_nonce_field('my_action', 'my_nonce'); ?>
        <?php for ($i = 0; $i < 3; $i++): ?>
            <tr class="form-field">
              <th scope="row">画像名<?php echo $i+ 1?></th>
              <td><input type="text" name="mockup-image-name_<?php echo $i?>" value="<?php echo esc_html($mockup_image_name[$i] ? $mockup_image_name[$i] : '')?>"></td>
            </tr>
            <tr class="form-field">
              <th scope="row">
              <?php
                if ($i === 0) {
                    echo 'モックアップ';
                } else {
                    echo ($i === 1) ? '透過する背景画像' : '768px以下の透過する背景画像';
                }
                ?>
              </th>
              <td>
                <input type="hidden" id="mockup-image_<?php echo $i; ?>" name="mockup-image_<?php echo $i; ?>" value="<?php echo $mockup_image[$i] ? $mockup_image[$i] : '' ?>">
                <div id="image-wrapper_<?php echo $i ?>">
                  <?php if ($mockup_image[$i]) {
                    $mockup_thumb = wp_get_attachment_image_src($mockup_image[$i], 'thumbnail');
                    ?>
                    <img src="<?php echo $mockup_thumb[0] ?>" width="<?php echo $mockup_thumb[1]; ?>" height="<?php echo $mockup_thumb[2]; ?>" class="custom_media_image">
                  <?php } ?>
                </div>
                <p>
                  <input type="button" class="button button-secondary media_button" name="media_button" value="追加" id="media-button_<?php echo $i ?>" />
                  <input type="button" class="button button-secondary media_remove" name="media_remove" value="削除" id="media-remove_<?php echo $i ?>"/>
                </p>
              </td>
            </tr>
        <?php endfor; ?>
    </table>
    <?php
}

add_action('admin_enqueue_scripts', 'add_mockup_api');
function add_mockup_api() {
    wp_enqueue_media();
}

add_action('admin_footer', 'add_mockup_script');

function add_mockup_script() {
    ?>
    <script>
        jQuery(document).ready(
            function ($) {
                let _custom_media = true,
                    _orig_send_attachment = wp.media.editor.send.attachment;

                // 画像の登録
                $('.media_button').each(function (index) {
                    $(this).on("click", function () {
                        let send_attachment_bkp = wp.media.editor.send.attachment;
                        wp.media.editor.send.attachment = function (props, attachment) {
                            if (_custom_media) {
                                $('#mockup-image_' + index).val(attachment.id);
                                $('#image-wrapper_' + index).html('<img class="custom_media_image" src="' + attachment.sizes.thumbnail.url + '" height="' + attachment.sizes.thumbnail.height + '" width="' + attachment.sizes.thumbnail.width + '">');
                            } else {
                                return _orig_send_attachment.apply($(this).id, [props, attachment]);
                            }
                        }
                        wp.media.editor.open($(this));
                        return false;
                    });
                });

                // 削除
                $('.media_remove').each(function (index) {
                    $(this).on("click", function () {
                        $('#mockup-image_' + index).val('');
                        $('#image-wrapper_' + index + ' .custom_media_image').remove();
                    });
                });
            });
    </script>
    <?php
}

add_action('save_post', 'save_mockup');

function save_mockup($post_id)
{
    if (isset($_REQUEST['my_nonce'])) {
        if (!wp_verify_nonce($_POST['my_nonce'], 'my_action')) {
            return;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
        for ($i = 0; $i < 3; $i++) {
            if (isset($_POST['mockup-image-name_' . $i])) {
                if ($_POST['mockup-image-name_' . $i] !== '') {
                    update_post_meta($post_id, 'mockup-image-name_' . $i, $_POST['mockup-image-name_' . $i]);
                } else {
                    delete_post_meta($post_id, 'mockup-image-name_' . $i);
                }
            }
            // 画像の保存
            if (isset($_POST['mockup-image_' . $i])) {
                if ($_POST['mockup-image_' . $i] !== '') {
                    update_post_meta($post_id, 'mockup-image_' . $i, $_POST['mockup-image_' . $i]);
                } else {
                    delete_post_meta($post_id, 'mockup-image_' . $i);
                }
            }
        }
    }
}
// 画像を出力する関数
function outputMockupImage($postID, $imageNumber) {
  $mockup_image_id = get_post_meta($postID, 'mockup-image_' . $imageNumber, true);
  $mockup_image_name = get_post_meta($postID, 'mockup-image-name_' . $imageNumber, true);

  if (!empty($mockup_image_id)) {
      $mockup_image = wp_get_attachment_image_src($mockup_image_id, 'full');
      ?>
      <img src="<?php echo $mockup_image[0]; ?>" alt="<?php echo esc_attr($mockup_image_name); ?>" class="s-works__img" width="<?php echo $mockup_image[1]; ?>" height="<?php echo $mockup_image[2]; ?>" loading="lazy">
      <?php
  }
}
// 画像のURLを出力する関数（主にsourceタグのsrcset属性に指定したい時に使用）
function outputMockupImageSources($postID, $imageNumber) {
  $mockup_image_id = get_post_meta($postID, 'mockup-image_' . $imageNumber, true);

  if (!empty($mockup_image_id)) {
      $mockup_image = wp_get_attachment_image_src($mockup_image_id, 'full');
      return esc_url($mockup_image[0]);
  }
}