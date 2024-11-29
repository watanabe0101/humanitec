<?php if (!defined('ABSPATH')) exit; ?>

<div class="single-pagination">
  <div class="custom-pagination">
    <?php
    $next_post = get_next_post();
    if (!empty($next_post)) { ?>
      <div class="single-pagination__next">
        <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="custom-pagination__link custom-pagination__next-link">新しい記事<span class="custom-pagination__arrow arrow"></span></a>
      </div>
    <?php } ?>

    <?php
    $previous_post = get_previous_post();
    if (!empty($previous_post)) { ?>
      <div class="single-pagination__prev">
        <a href="<?php echo get_permalink($previous_post->ID); ?>" class="custom-pagination__link custom-pagination__prev-link"><span class="custom-pagination__arrow arrow2"></span>過去の記事</a>
      </div>
    <?php } ?>
  </div>

  <?php $slug = get_post_type_object(get_post_type())->name; ?>
  <div class="single-pagination__back">
    <a href="<?php echo home_url(); ?>/<?php echo $slug; ?>/" class="custom-pagination__link">記事一覧</a>
  </div>
</div>