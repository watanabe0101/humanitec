<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: TOP
*/
get_header(); ?>

<main>
  <!-- fv -->
  <section class="fv">
    <div class="fv__inner">
      <div class="fv__image"></div>
      <div class="fv__image"></div>
      <h2 class="fv__title">
        <picture>
          <source srcset="<?php echo get_theme_file_uri('/assets/images/top/fv/fv-caption-sp.svg'); ?>" media="(max-width: 767px)">
          <img src="<?php echo get_theme_file_uri('/assets/images/top/fv/fv-caption.svg'); ?>" alt="あなたの学びたいを支援する。">
        </picture>
      </h2>
    </div>
  </section>
  <div class="front-bc">
    <!-- news -->
    <div class="news">
      <div class="news__inner inner">
        <ul class="news__list">

          <?php
          $args = array(
            'post_type' => 'news',
            'posts_per_page' => 3,
          );
          $the_query = new WP_Query($args);
          ?>
          <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <li class="news__item">
                <a href="<?php echo esc_url(home_url('/news/')); ?>" class="news__link">
                  <article>
                    <p class="news__date"><?php the_time('Y.m.d') ?></p>
                    <p class="news__title"><?php the_title(); ?></p>
                    <span class="news__arrow arrow"></span>
                  </article>
                </a>
              </li>
            <?php endwhile; ?>
          <?php else: ?>
            <p>投稿がありません。</p>
          <?php endif;
          wp_reset_postdata(); ?>

        </ul>
      </div>
    </div>
    <!-- about -->
    <section class="about">
      <div class="about__inner inner-shrink">
        <div class="about__content">
          <div class="about__wrapper">
            <h2 class="about__title">About US</h2>
            <p class="about__description">
              ユマニテク教育支援センターは、三重県四日市市で介護福祉士実務者研修や保育専門研修、介護外国人人材集合研修や外国人（技能実習生／特定技能外国人）向け日本語研修など、キャリアアップのための教育研修事業を行っております。<br>
              また、各種教育コンテンツの制作や、貸館・研修室事業、講師派遣なども実施。<br>
              さまざまな教育活動をサポートし、みなさんの「学びたい」をしっかりと支援していきます。
            </p>
            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="about__link more-link">View more<span class="more-link__arrow arrow"></span></a>
          </div>
          <div class="about__image1">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/top/about/about-img1.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/top/about/about-img1.jpg'); ?>" alt="介護福祉士実務者研修をしている様子" loading="lazy">
            </picture>
          </div>
        </div>

        <div class="about__image-wrapper">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/top/about/about-img2.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/top/about/about-img2.jpg'); ?>" alt="男女がテーブルを囲んでディスカッションをしている" loading="lazy">
          </picture>
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/top/about/about-img3.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/top/about/about-img3.jpg'); ?>" alt="講師の女性が授業を行っている様子" loading="lazy">
          </picture>
        </div>

      </div>
    </section>
  </div><!-- front-bc -->
  <!-- service -->
  <section class="service">
    <div class="service__inner">
      <h2 class="service__title title">
        <span class="service__sub-title sub-title">Service</span>
        <span class="service__main-title main-title">事業紹介</span>
      </h2>
      <p class="service__logo">
        <img src="<?php echo get_theme_file_uri('/assets/images/top/service/service-logo.svg'); ?>" alt="社会人向け 教育研修事業 ユマニテクキャリアアカデミー" loading="lazy">
      </p>
      <ul class="service__grid">
        <li class="service__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="service__link">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/top/service/service-img1.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/top/service/service-img1.jpg'); ?>" alt="介護福祉士実務者研修の様子" loading="lazy">
            </picture>
            <div class="service__label">
              <p class="service__text">介護福祉士実務者研修<span>（厚生労働省指定実務者養成施設）</span></p>
            </div>
          </a>
        </li>
        <li class="service__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="service__link">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/top/service/service-img2.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/top/service/service-img2.jpg'); ?>" alt="保育士の女性が子どもに対してにこやかに話しかけている" loading="lazy">
            </picture>
            <div class="service__label">
              <p class="service__text">保育専門研修</p>
            </div>
          </a>
        </li>
        <li class="service__item">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="service__link">
            <picture>
              <source srcset="<?php echo get_theme_file_uri('/assets/images/top/service/service-img3.webp'); ?>" type="image/webp">
              <img src="<?php echo get_theme_file_uri('/assets/images/top/service/service-img3.jpg'); ?>" alt="外国人の男女四人が並んで歩いている" loading="lazy">
            </picture>
            <div class="service__label">
              <p class="service__text">介護外国人人材集合研修</p>
            </div>
          </a>
        </li>
        <li class="service__item">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/top/service/service-img4.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/top/service/service-img4.jpg'); ?>" alt="外国人が日本語研修を受けている" loading="lazy">
          </picture>
          <div class="service__label">
            <p class="service__text service__text2">外国人<span>（技能実習生／特定技能外国人）</span>向け<br>日本語研修</p>
          </div>
        </li>
      </ul>
    </div>
    <div class="other">
      <p class="other__title">その他の事業</p>
      <div class="other__content">
        <div class="other__inner">
          <ul class="other__list">
            <li class="other__item">教育コンテンツ制作事業</li>
            <li class="other__item">貸館・貸研修室事業</li>
            <li class="other__item">ユマニテクプラザ運営管理委託事業</li>
            <li class="other__item">講師派遣業</li>
            <li class="other__item">その他教育活動支援事業 ほか</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- group -->
  <section class="group">
    <div class="group__inner inner">
      <h2 class="group__title title">
        <span class="group__sub-title sub-title">Group</span>
        <span class="group__main-title main-title">グループ法人</span>
      </h2>
      <div class="group__image">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="group__link">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/top/group/group-img.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/top/group/group-img.jpg'); ?>" alt="大橋学園グループのイメージ画像" loading="lazy">
          </picture>
        </a>
      </div>
      <div class="group__footer">
        <p class="group__text">ユマニテク教育支援センターは大橋学園グループの一員です。</p>
        <a href="<?php echo esc_url(home_url('/about/')); ?>" class="group__more more-link">View more<span class="more-link__arrow arrow"></span></a>
      </div>
    </div>
  </section>
  <!-- recruit -->
  <div class="recruit">
    <div class="recruit__inner shrink__inner">
      <a href="<?php echo esc_url(home_url('/about/')); ?>" class="recruit__link">
        <div class="recruit__left">
          <div class="recruit__wrapper">
            <p class="recruit__title">
              <span class="recruit__sub-title">Recruit</span>
              <span class="recruit__main-title">求人情報</span>
            </p>
            <div class="recruit__more more-link">View more<span class="more-link__arrow arrow"></span></div>
          </div>
        </div>
        <div class="recruit__image">
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/top/recruit/recruit-img.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/top/recruit/recruit-img.jpg'); ?>" alt="" loading="lazy">
          </picture>
        </div>
      </a>
    </div>
  </div>
  <!-- access -->
  <section class="access">
    <div class="access__inner inner">
      <h2 class="access__title">Access</h2>
      <div class="access__content">
        <div class="access__map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3269.6060643698347!2d136.61279327691253!3d34.96648102282645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60038ef3acb1e089%3A0x8b54725e153b7b47!2z44Om44Oe44OL44OG44Kv44OX44Op44K2KOWtpuagoeazleS6uuOBv-OBiOWkp-api-WtpuWckik!5e0!3m2!1sja!2sjp!4v1731141298543!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <ul class="access__details">
          <li class="access__item">
            <p class="access__name">ユマニテク教育支援センター</p>
          </li>
          <li class="access__item">
            <p class="access__address">三重県四日市市鵜の森一丁目4番28号 <br class="br-sp">ユマニテクプラザ1F</p>
          </li>
          <li class="access__item">
            <div class="access__phone">
              <p class="access__tel">Tel. 059-340-4575</p>
              <p class="access__fax">Fax. 059-351-1711</p>
            </div>
          </li>
          <li class="access__item">
            <ul class="access__notes">
              <li class="access__note-item">近鉄四日市駅より徒歩5分
              </li>
              <li class="access__note-item">隣接のコインパーキングあり</li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </section>
</main>

<!-- footer -->
<?php get_footer(); ?>