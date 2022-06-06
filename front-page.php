<?php

/**
 * The template for displaying front page only
 *
 * See template heirarcy for info
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WRHS
 */

get_header();
?>
<main id="primary" class="site-main">

  <?php

  get_template_part('partials/blocks/block', 'hero');
  get_template_part('partials/blocks/block', 'coloured');
  get_template_part('partials/blocks/block', 'featured');

  ?>

</main>

<?php
// get_sidebar();
get_footer();
