<?php if ( !defined( 'ABSPATH' ) ) exit; ?>

<!-- ページネーション -->
<div class="pagination">
  <?php
  global $wp_query;

  $big = 999999999; // 適当に大きな数字

  $paginate_links = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $wp_query->max_num_pages,
    'prev_text' => __('&laquo; 前へ'),
    'next_text' => __('次へ &raquo;'),
    'prev_next' => true,
    'type' => 'list', // 'list'を指定するとul/liで出力
    'end_size' => 1,
    'mid_size' => 2, // 中間のページリンクの数
  ));

  // 生成されたページネーションの<ul>タグのクラスを変更
  $paginate_links = str_replace('<ul class=\'page-numbers\'>', '<ul class=\'pagination__list\'>', $paginate_links);
  // 生成されたページネーションの<li>タグのクラスを変更
  $paginate_links = preg_replace('/<li>/', '<li class="pagination__item">', $paginate_links);
  // 生成されたページネーションの<a>タグのクラスを変更
  $paginate_links = str_replace('page-numbers', 'pagination__link', $paginate_links);
  echo $paginate_links;
  ?>
</div>