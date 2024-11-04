<?php get_header(); ?>
<main>
  <div class="error-404">
    <div class="error-404__inner inner">
      <h1 class="error-404__title">
        404 NOT FOUND
      </h1>
      <div class="error-404__outer outer">
        <p class="error-404__text">
          お探しのページはありませんでした。
        </p>
      </div>
      <div class="complete__button button-noAnime">
        <a class="complete__arrow arrow-noAnime" href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る</a>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>