<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main>
  <section class="news-header">
    <div class="news-header__inner">
      <h1 class="news-header__title">
        <span class="news-header__sub-title">News</span>
        <span class="news-header__main-title">お知らせ</span>
      </h1>
    </div>
  </section>
  
  <div class="news-content">
    <div class="news-content__inner inner">
      <ul class="news-card">
        <?php
        $args = array(
          'posts_per_page' => 3, // 表示する投稿数
          'paged' => $paged, //ページング
          'post_type' => 'news', // 取得する投稿タイプのスラッグ
          'orderby' => 'date', //日付で並び替え
          'order' => 'DESC' // 降順 or 昇順
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="news-card__item">
              <article>
                <h2 class="news-card__date"><?php the_time('Y.m.d') ?></h2>
                <p class="news-card__title"><?php the_title(); ?></p>
                <div class="news-card__content"><?php the_content(); ?></div>
              </article>
            </li>
        <?php endwhile;
        endif; ?>
      </ul>
      <?php custom_paginate_links($the_query, $paged); ?>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
</main>


<?php get_footer(); ?>