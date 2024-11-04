<?php if (!defined('ABSPATH')) exit; ?>

<footer id="footer" class="footer">
  <div class="footer__inner">
    <div class="footer__wrapper">
      <div class="footer__logo">
        <?php the_custom_logo(); ?>
      </div>
      <nav class="footer__nav">
        <ul class="footer__list">
          <li class="footer__item">
            <a href="<?php echo esc_url(home_url('/')); ?>contact" class="footer__link">CONTACT</a>
          </li>
        </ul>
      </nav>
    </div>
    <small class="copyright">&copy; 2024 WWW.</small>
  </div>
</footer>
<?php
if (is_404()) { ?>
  </div>
<?php } ?>
<?php wp_footer(); ?>

<?php if (is_page('固定ページのID')) { ?>
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
<?php
} ?>

</body>

</html>