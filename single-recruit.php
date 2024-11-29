<?php if (!defined('ABSPATH')) exit; ?>

<?php get_header(); ?>

<main>
  <section class="recruitDetail-header page-header">
    <div class="recruitDetail-header__inner page-inner">
      <div class="recruitDetail-header__title page-header__title">
        <span class="recruitDetail-header__sub-title page-header__sub-title">Recruit</span>
        <h1 class="recruitDetail-header__main-title page-header__main-title">求人情報</h1>
      </div>
    </div>
  </section>
  <div class="recruitDetail-content">
    <div class="recruitDetail-content__inner inner">
      <!-- table -->
      <table class="recruitDetail-table">
        <tbody class="recruitDetail-table__tbody">
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading">募集職種</th>
            <td class="recruitDetail-table__data"><?php echo get_post_meta($post->ID, 'custom-field1', true); ?></td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading recruitDetail-table__heading--sp">仕事内容</th>
            <td class="recruitDetail-table__data recruitDetail-table__data--sp">
              <?php
              $post_id = $post->ID;
              $text = nl2br(get_post_meta($post_id, 'custom-field2', true));
              ?>
              <?php if ($text) : ?>
                <p><?php echo $text; ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading">雇用形態</th>
            <td class="recruitDetail-table__data"><?php echo get_post_meta($post->ID, 'custom-field3', true); ?></td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading">給与</th>
            <td class="recruitDetail-table__data"><?php echo get_post_meta($post->ID, 'custom-field4', true); ?></td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading">昇給・賞与</th>
            <td class="recruitDetail-table__data recruitDetail-table__raise">
              <?php
              $post_id = $post->ID;
              $text = nl2br(get_post_meta($post_id, 'custom-field5', true));
              ?>
              <?php if ($text) : ?>
                <p><?php echo $text; ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading recruitDetail-table__allowance">諸手当・<br class="br-sp">待遇</th>
            <td class="recruitDetail-table__data"><?php echo get_post_meta($post->ID, 'custom-field6', true); ?></td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading">勤務時間</th>
            <td class="recruitDetail-table__data"><?php echo get_post_meta($post->ID, 'custom-field7', true); ?></td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading recruitDetail-table__heading--tall">休日・休暇</th>
            <td class="recruitDetail-table__data recruitDetail-table__data--tall">
              <?php
              $post_id = $post->ID;
              $text = nl2br(get_post_meta($post_id, 'custom-field8', true));
              ?>
              <?php if ($text) : ?>
                <p><?php echo $text; ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading recruitDetail-table__heading--tall">応募資格</th>
            <td class="recruitDetail-table__data recruitDetail-table__data--tall">
              <?php
              $post_id = $post->ID;
              $text = nl2br(get_post_meta($post_id, 'custom-field9', true));
              ?>
              <?php if ($text) : ?>
                <p><?php echo $text; ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading recruitDetail-table__heading--sp">勤務地</th>
            <td class="recruitDetail-table__data recruitDetail-table__data--sp">
              <?php
              $post_id = $post->ID;
              $text = nl2br(get_post_meta($post_id, 'custom-field10', true));
              ?>
              <?php if ($text) : ?>
                <p><?php echo $text; ?></p>
              <?php endif; ?>
            </td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading">アクセス</th>
            <td class="recruitDetail-table__data"><?php echo get_post_meta($post->ID, 'custom-field11', true); ?></td>
          </tr>
          <tr class=" recruitDetail-table__row">
            <th class="recruitDetail-table__heading recruitDetail-table__heading--tall">その他</th>
            <td class="recruitDetail-table__data recruitDetail-table__data--tall">
              <?php
              $post_id = $post->ID;
              $text = nl2br(get_post_meta($post_id, 'custom-field12', true));
              ?>
              <?php if ($text) : ?>
                <p><?php echo $text; ?></p>
              <?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- table -->
      <div class="recruitDetail-footer">
        <p class="recruitDetail-footer__text">採用にご応募いただく方は、下記よりエントリーをお願いします。</p>
        <div class="recruitDetail-footer__button-wrapper">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="recruitDetail-footer__button button">ENTRY</a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>