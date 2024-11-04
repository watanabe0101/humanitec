<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: TOP
*/
get_header(); ?>

<?php if (have_posts()): ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
<?php else: ?>
<?php endif; ?>

<!-- footer -->
<?php get_footer(); ?>