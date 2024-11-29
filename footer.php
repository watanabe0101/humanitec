<?php if (!defined('ABSPATH')) exit; ?>

<footer id="footer" class="footer">
  <div class="footer__inner inner">
    <div class="footer__content">
      <div class="footer__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__link"><img src="<?php echo get_theme_file_uri('/assets/images/footer/footer-logo.svg'); ?>" alt="" loading="lazy"></a>
      </div>
      <div class="footer__info">
        <p class="footer__address">三重県四日市市鵜の森一丁目4番28号 ユマニテクプラザ1F</p>
        <div class="footer__tel">
          <a href="tel:0593404575" class="footer__phone">Tel. 059-340-4575</a><p class="footer__fax">Fax. 059-351-1711</p>
        </div>
      </div>
    </div>
    <small class="copyright">2024&copy;HUMANITEC EDUCATIONAL SUPPORT CENTER</small>
  </div>
</footer>
<?php
if (is_404()) { ?>
  </div>
<?php } ?>

<?php wp_footer(); ?>

</body>

</html>