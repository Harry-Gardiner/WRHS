<?php if (get_field('wr_featured_type') === 'post') : ?>
    <?php if (have_rows('wr_featured_posts')) : ?>
        <?php while (have_rows('wr_featured_posts')) :
            the_row(); ?>

            <?php
            $type = 'blogs';

            $wr_featured_primary = get_sub_field('wr_featured_posts_primary_feature');

            $wr_featured_secondary = get_sub_field('wr_featured_posts_secondary_feature');

            $wr_featured_tertiary = get_sub_field('wr_featured_posts_tertiary_feature');

            $wr_featured_quaternary = get_sub_field('wr_featured_posts_quaternary_feature');
            ?>

        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>

<?php if (get_field('wr_featured_type') === 'events') : ?>

<?php endif; ?>

<?php if (get_field('wr_featured_type') === 'news') : ?>

<?php endif; ?>

<section class="featured container margin">
    <h2>
        WHRS <?php echo $type ?>
    </h2>
    <a href="" class="featured__link">View all <?php echo $type ?> <span><?php echo file_get_contents(get_template_directory_uri() . '/images/arrow.svg'); ?></span></a>
</section>
<?php
if ($wr_featured_primary) :
    $primary = $wr_featured_primary;
    setup_postdata($primary);
?>
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>