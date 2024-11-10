<?php if (!defined('ABSPATH')) exit; ?>

<?php
/*
Template Name: group
*/
get_header(); ?>

<main>
  <!-- fv -->
  <section class="group-fv">
    <div class="group-fv__inner">
      <div class="group-fv__image"></div>
      <div class="group-fv__image"></div>
      <h1 class="group-fv__title">
        <picture>
          <picture>
            <source srcset="<?php echo get_theme_file_uri('/assets/images/group/group-fv-sp.webp'); ?>" type="image/webp" media="(max-width: 767px)">
            <source srcset="<?php echo get_theme_file_uri('/assets/images/group/group-fv-sp.jpg'); ?>" media="(max-width: 767px)">
            <source srcset="<?php echo get_theme_file_uri('/assets/images/group/group-fv.webp'); ?>" type="image/webp">
            <img src="<?php echo get_theme_file_uri('/assets/images/group/group-fv.jpg'); ?>" alt="グループ法人【大橋学園グループ】" loading="lazy">
          </picture>
        </picture>
      </h1>
    </div>
  </section>
  <!-- group-section -->
  <section class="group-section">
    <div class="group-section__inner inner">
      <p class="group-section__intro">ユマニテク教育支援センターは大橋学園グループの一員です。</p>
      <ul class="group-section__group">
        <li class="group-section__item">
          <h2 class="group-section__group-title"><a href="https://www.humanitec.ac.jp/" class="group-section__link" target="_blank" rel="noopener">学校法人<br class="br-sp">みえ大橋学園</a></h2>
          <div class="group-section__group-details">
            <a href="https://www.humanitec-ld.jp/" class="group-section__detail" target="_blank" rel="noopener">ユマニテクライフデザイン専門学校</a><br class="br-sp">
            <a href="https://www.humanitec-cc.jp/" class="group-section__detail" target="_blank" rel="noopener">ユマニテク調理製菓専門学校</a><br>
            <a href="https://www.humanitec-nmc.jp/" class="group-section__detail" target="_blank" rel="noopener">ユマニテク看護助産専門学校</a><br class="br-sp">
            <a href="https://www.humanitec-re.jp/" class="group-section__detail" target="_blank" rel="noopener">専門学校ユマニテク医療福祉大学校</a><br class="br-sp">
            <a href="https://www.ohashigh.ed.jp/" class="group-section__detail" target="_blank" rel="noopener">大橋学園高等学校</a><br>
            <a href="https://www.humanitec-plaza.jp/" class="group-section__detail" target="_blank" rel="noopener">ユマニテクプラザ</a>
          </div>
        </li>
        <li class="group-section__item">
          <h2 class="group-section__group-title"><a href="http://houjin.jc-humanitec.ac.jp/" class="group-section__link" target="_blank" rel="noopener">学校法人<br class="br-sp">大橋学園</a></h2>
          <div class="group-section__group-details">
            <a href="https://www.jc-humanitec.ac.jp/" class="group-section__detail" target="_blank" rel="noopener">ユマニテク短期大学</a><br class="br-sp">
            <a href="https://dental.nagoya-humanitec.ac.jp/" class="group-section__detail" target="_blank" rel="noopener">名古屋ユマニテク歯科衛生専門学校</a><br>
            <a href="https://cc.ao-g.jp/" class="group-section__detail" target="_blank" rel="noopener">名古屋ユマニテク調理製菓専門学校</a><br class="br-sp">
            <a href="https://nagoya.huma-hic.jp/" class="group-section__detail" target="_blank" rel="noopener">名古屋ユマニテク調理製菓専門学校 高等課程</a>
          </div>
        </li>
        <li class="group-section__item">
          <h2 class="group-section__group-title"><a href="https://www.kazekaorukai.com/" class="group-section__link" target="_blank" rel="noopener">社会福祉法人<br class="br-sp">風薫会</a></h2>
          <div class="group-section__group-details">
            <a href="https://www.kazekaorukai.com/%E6%96%BD%E8%A8%AD%E4%B8%80%E8%A6%A7/%E7%89%B9%E5%88%A5%E9%A4%8A%E8%AD%B7%E8%80%81%E4%BA%BA%E3%83%9B%E3%83%BC%E3%83%A0-%E3%82%B5%E3%83%86%E3%83%A9%E3%82%A4%E3%83%88%E3%81%BF%E3%81%AA%E3%81%A8-%E5%9C%B0%E5%9F%9F%E5%AF%86%E7%9D%80%E5%9E%8B/" class="group-section__detail" target="_blank" rel="noopener">特別養護老人ホーム サテライトみなと</a><br class="br-sp">
            <a href="https://www.kazekaorukai.com/%E6%96%BD%E8%A8%AD%E4%B8%80%E8%A6%A7/%E7%89%B9%E5%88%A5%E9%A4%8A%E8%AD%B7%E8%80%81%E4%BA%BA%E3%83%9B%E3%83%BC%E3%83%A0-%E9%A2%A8%E3%81%AE%E8%B7%AF/" class="group-section__detail" target="_blank" rel="noopener">特別養護老人ホーム 風の路</a><br>
            <a href="https://www.kazekaorukai.com/%E6%96%BD%E8%A8%AD%E4%B8%80%E8%A6%A7/%E7%89%B9%E5%88%A5%E9%A4%8A%E8%AD%B7%E8%80%81%E4%BA%BA%E3%83%9B%E3%83%BC%E3%83%A0-%E3%82%A2%E3%83%AA%E3%83%93%E3%82%AA/" class="group-section__detail" target="_blank" rel="noopener">特別養護老人ホーム アリビオ</a><br class="br-sp">
            <a href="https://www.kazekaorukai.com/%E6%96%BD%E8%A8%AD%E4%B8%80%E8%A6%A7/%E3%81%97%E3%81%8A%E3%81%AF%E3%81%BE%E5%9C%A8%E5%AE%85%E4%BB%8B%E8%AD%B7%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%82%BB%E3%83%B3%E3%82%BF%E3%83%BC/" class="group-section__detail" target="_blank" rel="noopener">しおはま在宅介護サービスセン<br class="br-sp">ター</a><br>
            <a href="https://www.kazekaorukai.com/%E6%96%BD%E8%A8%AD%E4%B8%80%E8%A6%A7/%E3%81%BF%E3%81%AA%E3%81%A8%E5%9C%A8%E5%AE%85%E4%BB%8B%E8%AD%B7%E3%82%B5%E3%83%BC%E3%83%93%E3%82%B9%E3%82%BB%E3%83%B3%E3%82%BF%E3%83%BC/" class="group-section__detail" target="_blank" rel="noopener">みなと在宅介護サービスセン<br class="br-sp">ター</a>
          </div>
        </li>
      </ul>
      <div class="group-section__associate">
        <h2 class="group-section__group-title">株式会社ユマニテクアソシエイツ</h2>
      </div>
    </div>
  </section>

</main>

<!-- footer -->
<?php get_footer(); ?>