<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WRHS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<header class="entry-header">
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title">', '</h2>');
		endif;
		?>
		<hr>
	</header><!-- .entry-header -->
	<?php
	if ('post' === get_post_type()) :
	?>
		<div class="entry-meta">
			<?php
			wrhs_posted_on();
			wrhs_posted_by();
			?>
		</div><!-- .entry-meta -->
	<?php endif; ?>

	<?php wrhs_post_thumbnail(); ?>


	<div class="entry-content">
		<div class="entry-content__main">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'wrhs'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			?>
		</div>

		<div class="entry-content__gallery mb-4">
			<ul>
				<?php if (have_rows('wr_post_gallery')) : ?>
					<?php while (have_rows('wr_post_gallery')) :
						the_row(); ?>
						<?php
						$wr_post_image_1 = get_sub_field('wr_post_image_1');
						if ($wr_post_image_1) : ?>
							<li><img src="<?php echo esc_url($wr_post_image_1['url']); ?>" alt="<?php echo esc_attr($wr_post_image_1['alt']); ?>" /></li>
						<?php endif; ?>
						<?php
						$wr_post_image_2 = get_sub_field('wr_post_image_2');
						if ($wr_post_image_2) : ?>
							<li><img src="<?php echo esc_url($wr_post_image_2['url']); ?>" alt="<?php echo esc_attr($wr_post_image_2['alt']); ?>" /></li>
						<?php endif; ?>
						<?php
						$wr_post_image_3 = get_sub_field('wr_post_image_3');
						if ($wr_post_image_3) : ?>
							<li><img src="<?php echo esc_url($wr_post_image_3['url']); ?>" alt="<?php echo esc_attr($wr_post_image_3['alt']); ?>" /></li>
						<?php endif; ?>
						<?php
						$wr_post_image_4 = get_sub_field('wr_post_image_4');
						if ($wr_post_image_4) : ?>
							<li><img src="<?php echo esc_url($wr_post_image_4['url']); ?>" alt="<?php echo esc_attr($wr_post_image_4['alt']); ?>" /></li>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>


		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'wrhs'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wrhs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->