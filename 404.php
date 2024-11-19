<?php get_header(); ?>
<main>
  <div class="error-404">
    <div class="error-404__inner inner">
      <h1 class="error-404__title">
        404 NOT FOUND
      </h1>
      <p class="error-404__text">
        お探しのページはありませんでした。
      </p>
      <a href="<?php echo esc_url(home_url('/')); ?>" class="error-404__link">TOPに戻る</a>
    </div>
  </div>
</main>
<?php get_footer(); ?>