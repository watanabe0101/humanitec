<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main>
  <section class="recruit-header page-header">
    <div class="recruit-header__inner page-inner">
      <div class="recruit-header__title page-header__title">
        <span class="recruit-header__sub-title page-header__sub-title">Recruit</span>
        <h1 class="recruit-header__main-title page-header__main-title">求人情報</h1>
      </div>
    </div>
  </section>

  <div class="recruit-content">
    <div class="recruit-content__inner inner">
      <p class="recruit-content__text">ユマニテク教育支援センターでは、現在下記の職種を募集しています。</p>
      <ul class="recruit-card">
        <?php
        $args = array(
          'posts_per_page' => 10, // 表示する投稿数
          'paged' => $paged, //ページング
          'post_type' => 'recruit', // 取得する投稿タイプのスラッグ
          'orderby' => 'date', //日付で並び替え
          'order' => 'DESC' // 降順 or 昇順
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) :
          while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="recruit-card__item">
              <article>
                <a href="<?php the_permalink(); ?>" class="recruit-card__link">
                  <div class="recruit-card__label">
                    <?php taxonomies_label() ?>
                    <?php display_urgent_label(); ?>
                  </div>
                  <p class="recruit-card__title"><?php the_title(); ?></p>
                  <span class="recruit-card__arrow arrow"></span>
                </a>
              </article>
            </li>
        <?php endwhile;
        endif; ?>
      </ul>
      <?php custom_paginate_recruit($the_query, $paged); ?>
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>