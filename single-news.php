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
      <?php while (have_posts()) : the_post(); ?>
        <article>
          <h2 class="news-card__date"><?php the_time('Y.m.d') ?></h2>
          <p class="news-card__title"><?php the_title(); ?></p>
          <div class="news-card__content"><?php the_content(); ?></div>
        </article>
      <?php endwhile; ?>
      <!-- single-pagination -->
      <?php get_template_part('tmp/single-news-pagination'); ?>
      <!-- single-pagination -->
    </div>
  </div>
  <?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>