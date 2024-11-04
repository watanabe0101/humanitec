<?php if ( !defined( 'ABSPATH' ) ) exit; ?>

<?php
// サムネイルを取得する関数
function get_custom_thumbnail($post_id) {
  // サムネイルが設定されているかを確認
  if (has_post_thumbnail($post_id)) {
      // サムネイルがある場合は表示
      return get_the_post_thumbnail($post_id, 'medium', array('class' => 'works__img', 'alt' => '制作したサイトのファーストビュー'));
  } else {
      // サムネイルがない場合はダミー画像を表示
      return '<img src="' . esc_url(get_theme_file_uri('images/common/no-image.webp')) . '" alt="ダミー画像" class="works__img">';
  }
}
?>

    <!-- 前後の記事のタイトルを表示 -->
    <div class="single-pagination">
      <ul class="single-pagination__list">
        <li class="single-pagination__item">
            <?php $previous_post = get_previous_post(); ?>
            <?php if (!empty($previous_post)): ?>
                <a href="<?php echo get_permalink($previous_post->ID); ?>" class="single-pagination__link">
                  <div class="single-pagination__prev"><< PREV</div>
                  <figure class="works__pic">
                    <?php echo get_custom_thumbnail($previous_post->ID); ?>
                  </figure>
                </a>
                <div class="works__card-content">
                  <p class="works__card-title" itemprop="headline"><?php echo get_the_title($previous_post->ID); ?></p>
                  <div class="works__card-meta">
                    <?php /// カテゴリーラベルの取得と追加
                    $categories = get_the_category();
                    $genre_terms = get_the_terms($post->ID, 'genre');
                    if ($genre_terms && !is_wp_error($genre_terms)) {
                      $categories = array_merge($categories, $genre_terms);
                    }
                    if (!empty($categories) && is_array($categories)) {
                      foreach ($categories as $category) { ?>
                        <span class="works__card-label card-label-<?php echo ($category->term_id); ?>"># <?php echo esc_html($category->name); ?></span>
                      <?php
                      }
                    } ?>
                      <span class="works__card-date"><?php the_time( 'Y-m-d' ); ?></span>
                    <span class="works__card-icon"></span>
                  </div>
                </div>
            <?php endif; ?>
        </li>
        <li class="single-pagination__item">
            <?php $next_post = get_next_post(); ?>
            <?php if (!empty($next_post)): ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="single-pagination__link">
                  <div class="single-pagination__next">NEXT >></div>
                  <figure class="works__pic">
                    <?php echo get_custom_thumbnail($next_post->ID); ?>
                  </figure>
                </a>
                <div class="works__card-content">
                  <p class="works__card-title" itemprop="headline"><?php echo get_the_title($next_post->ID); ?></p>
                  <div class="works__card-meta">
                    <?php /// カテゴリーラベルの取得と追加
                    $categories = get_the_category();
                    $genre_terms = get_the_terms($post->ID, 'genre');
                    if ($genre_terms && !is_wp_error($genre_terms)) {
                      $categories = array_merge($categories, $genre_terms);
                    }
                    if (!empty($categories) && is_array($categories)) {
                      foreach ($categories as $category) { ?>
                        <span class="works__card-label card-label-<?php echo ($category->term_id); ?>"># <?php echo esc_html($category->name); ?></span>
                      <?php
                      }
                    } ?>
                      <span class="works__card-date"><?php the_time( 'Y-m-d' ); ?></span>
                    <span class="works__card-icon"></span>
                  </div>
                </div>
            <?php endif; ?>
        </li>
      </ul>
    </div>
    <!-- 前後の記事のタイトル表示終了 -->
    <div class="single-pagination__button button-noAnime">
      <a class="single-pagination__button-link arrow-noAnime" href="<?php echo esc_url(home_url('/works')); ?>">実績一覧に戻る</a>
    </div>