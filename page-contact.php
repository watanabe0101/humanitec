<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: contact
*/
get_header(); ?>

<main>
  <section class="contact-header page-header">
    <div class="contact-header__inner page-inner">
      <div class="contact-header__title page-header__title">
        <span class="contact-header__sub-title page-header__sub-title">Contact</span>
        <h1 class="contact-header__main-title page-header__main-title">お問い合わせ</h1>
      </div>
    </div>
  </section>
  <div class="contact-content">
    <div class="contact-content__inner inner">
      <!-- form -->
      <?php echo do_shortcode('[mwform_formkey key="68"]'); ?>
      <!-- form -->
      <p class="contact-content__text">
        ご入力いただいた個人情報は、お問い合わせの対応のみに使用し、他の目的に利用することはございません。また、ご本人様の同意なしにいただいた個人情報を第三者に提供することはありません。プライバシーポリシーは<a href="<?php echo get_theme_file_uri('/assets/pdf/privacy.pdf'); ?>" class="contact-content__link">こちら</a>をご確認ください。
      </p>
    </div>
  </div>
</main>
<?php get_footer(); ?>