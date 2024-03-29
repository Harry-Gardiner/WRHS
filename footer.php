<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WRHS
 */

?>

<footer id="colophon" class="site-footer gap">
  <div class="footer container padding">
    <div class="row d-flex flex-column align-items-center flex-md-row align-items-md-start">

      <div class="col-md-4 footer__s1">
        <div class="logo m-auto m-md-0">
          <?php
          the_custom_logo();
          ?>
        </div>
        <?php dynamic_sidebar('footer_open_hours'); ?>
      </div>

      <div class="col-md-4 footer__s2 mb-3 d-flex flex-column align-items-center align-items-md-start">
        <div class="footer__s2__content m-md-auto">
          <h3 class="text-center text-md-left">Sitemap</h3>

          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'footer-menu',
              'menu_class'  => 'menu-items',
            )
          );
          ?>

        </div>
      </div>

      <div class="col-md-4 footer__s3 mb-3 mb-md-5 d-flex flex-column align-items-center align-items-md-start">
        <h3>Connect</h3>
        <div class="footer__s3__socials">
          <a href="https://www.facebook.com/groups/440186932834132/" class="fa fa-facebook"></a>
          <!-- <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-youtube"></a>
          <a href="#" class="fa fa-rss"></a> -->
          <a href="mailto:enquiries@wrhs.org.uk" class="fa fa-envelope"></a>
        </div>
        <br>
        <h3>Members</h3>
        <?php if (is_user_logged_in()) : ?>
          <a href="<?php echo wp_logout_url() ?>">Logout</a>
        <?php else : ?>
          <a href="<?php echo wp_login_url() ?>">Login</a>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <div class="site-footer__sub-content">
  </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>