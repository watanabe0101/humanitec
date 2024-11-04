<?php
if ( !defined( 'ABSPATH' ) ) exit;

// WordPressの投稿ページに直書きする場合に、Webpとjpg or pngの両方を表示させるショートコード
function my_picture_element_shortcode($atts) {
    // ショートコードの属性を取得し、デフォルト値を設定
    $atts = shortcode_atts(array(
        'webp' => '',   // WebP形式のファイル名
        'png' => '',    // PNG形式のファイル名
        'jpg' => '',    // JPEG形式のファイル名
        'alt' => '',    // 画像のaltテキストのデフォルト値を設定
        'class' => '',  // <picture>要素に適用するクラスのデフォルト値を設定
    ), $atts, 'picture_element');
  
    // <picture>要素のHTMLを生成
    $picture_html = '<picture class="' . esc_attr($atts['class']) . '">';
  
    // WebP画像のURLを生成して追加
    if (!empty($atts['webp'])) {
        $webp_image_url = wp_get_upload_dir()['baseurl'] . '/' . ltrim($atts['webp'], '/');
        $picture_html .= '<source srcset="' . esc_url($webp_image_url) . '" type="image/webp">';
    }
  
    // フォールバックとして画像を追加
    if (!empty($atts['jpg']) || !empty($atts['png'])) {
        $fallback_image_url = '';
        if (!empty($atts['jpg'])) {
            $fallback_image_url = wp_get_upload_dir()['baseurl'] . '/' . ltrim($atts['jpg'], '/');
            $picture_html .= '<img src="' . esc_url($fallback_image_url) . '" alt="' . esc_attr($atts['alt']) . '" loading="lazy" type="image/jpg">';
        } elseif (!empty($atts['png'])) {
            $fallback_image_url = wp_get_upload_dir()['baseurl'] . '/' . ltrim($atts['png'], '/');
            $picture_html .= '<img src="' . esc_url($fallback_image_url) . '" alt="' . esc_attr($atts['alt']) . '" loading="lazy" type="image/png">';
        }
    }
  
    $picture_html .= '</picture>';
  
    return $picture_html;
  }
  add_shortcode('picture_element', 'my_picture_element_shortcode');

//   [picture_element 
//     webp="2024/01/image.webp" 
//     jpg="2024/01/image.jpg" 
//     alt="画像の説明" 
//   ]