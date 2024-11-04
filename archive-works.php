<?php if ( !defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

<?php
$sub_query = new WP_Query(
  array(
    'post_type' => 'works',
    'posts_per_page' => 3,
  )
);
?>
<?php if ($sub_query->have_posts()) : ?>
  <ul class="list">
    <?php
    while ($sub_query->have_posts()) :
      $sub_query->the_post();
    ?>
      <li class="item">
        <a href="<?php echo get_permalink(); ?>">
          <?php custom_thumbnail('works__img', array(350, 280), '制作したサイトのファーストビュー'); ?>
          <p class="works__card-title" itemprop="headline"><?php the_title(); ?></p>
          <?php display_category_labels('genre', 'works__card-label'); ?>
          <?php the_time( 'Y-m-d' ); ?>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
<?php else : ?>
  <p>投稿がありません。</p>
<?php
endif;
wp_reset_postdata();
?>

<?php get_footer(); ?>