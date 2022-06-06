<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WRHS
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found container margin">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'wrhs'); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wrhs'); ?></p>

			<div class="archive-sidebar">
				<div class="archive-categories">
					<p><strong><?php echo esc_html__('Categories', 'wrhs'); ?></strong></p>
					<ul class="category-list">
						<?php wp_list_categories(
							array(
								'title_li' => '',
								'hide_title_if_empty' => true
							)
						); ?>
					</ul>
				</div>
				<div class="archive-tags">
					<p><strong><?php echo esc_html__('Tags', 'wrhs'); ?></strong></p>
					<?php wp_tag_cloud(); ?>
				</div>
				<div class="archive-authors">
					<p><strong><?php echo esc_html__('Authors', 'wrhs'); ?></strong></p>
					<?php wp_list_authors(
						array(
							'hide_empty' => 'true',
							'optioncount' => 'true'
						)
					); ?>
				</div>
			</div>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
