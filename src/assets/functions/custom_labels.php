<?php
if ( !defined( 'ABSPATH' ) ) exit;


// カスタム投稿のタームをターム別一覧ページへのリンク付きで取得
function display_category_labels($taxonomy, $custom_class = '') {
  $categories = get_the_category();
  $genre_terms = get_the_terms(get_the_ID(), $taxonomy);

  if ($genre_terms && !is_wp_error($genre_terms)) {
    $categories = array_merge($categories, $genre_terms);
  }

  if (!empty($categories) && is_array($categories)) {
    foreach ($categories as $category) { 
      $term_link = get_term_link($category); // ターム別一覧ページへのリンク取得

      if (!is_wp_error($term_link) && !empty($term_link)) { ?>
        <a href="<?php echo esc_url($term_link); ?>" class="<?php echo esc_attr($custom_class); ?>"># <?php echo esc_html($category->name); ?></a>
      <?php
      } else {
        $category_link = get_category_link($category->term_id); // カテゴリー一覧ページへのリンク取得
        if (!is_wp_error($category_link) && !empty($category_link)) { ?>
          <a href="<?php echo esc_url($category_link); ?>" class="<?php echo esc_attr($custom_class); ?>"><?php echo esc_html($category->name); ?></a>
        <?php
        } else { ?>
          <span class="<?php echo esc_attr($custom_class); ?>"><?php echo esc_html($category->name); ?></span>
        <?php
        }
      }
    }
  }
}