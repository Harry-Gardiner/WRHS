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
  <!-- SUDO
      Mob - 1 row
      Desk - 3 columns
      Sections - logo with text, site map, connect
    -->
  <div class="footer container padding">
    <div class="row d-flex flex-column align-items-center flex-md-row align-items-md-start">

      <div class="col-md-4 footer__s1">
        <div class="logo m-auto m-md-0">
          <?php
          the_custom_logo();
          ?>
        </div>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt, est ratione! Beatae minus corrupti reiciendis cum in tempore, nemo vel! Suscipit natus temporibus est nemo.</p>
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
          <a href="mailto:webmaster@example.com" class="fa fa-envelope"></a>
        </div>
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