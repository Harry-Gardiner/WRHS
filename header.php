<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WRHS
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'wrhs'); ?></a>

    <header id="masthead" class="site-header">
      <!-- <div class="site-branding">
				<?php
        the_custom_logo();
        ?>
			</div> -->

      <nav>
        <div class="navbar">
          <div class="container nav-container d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center">
              <?php
              the_custom_logo();
              ?>
            </div>
            <div class="check-container d-flex align-items-center d-md-none">
              <input class="checkbox" type="checkbox" name="" id="" />
              <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
              </div>
            </div>
            <?php
            wp_nav_menu(
              array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
                'menu_class'  => 'menu-items d-md-flex',
                'container_class' => 'd-none d-md-block'
              )
            );
            ?>
          </div>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'mobile',
              'menu_id'        => 'mobile-menu',
              'menu_class'  => 'menu-items d-md-none',
              'container_class' => 'd-md-none'
            )
          );
          ?>
        </div>
      </nav>
    </header>
    <div class="title-content">
      <?php
      if (is_front_page() && is_home()) :
      ?>
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
      <?php
      else :
      ?>
        <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
      <?php
      endif;
      $wrhs_description = get_bloginfo('description', 'display');
      if ($wrhs_description || is_customize_preview()) :
      ?>
        <p class="site-description"><?php echo $wrhs_description;
                                    ?></p>
      <?php endif; ?>
    </div>