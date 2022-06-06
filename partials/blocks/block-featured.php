<?php if (get_field('wr_featured_type') === 'post') : ?>
    <?php if (have_rows('wr_featured_posts')) : ?>
        <?php while (have_rows('wr_featured_posts')) :
            the_row(); ?>

            <?php
            $type = 'post';
            $display_type = 'blogs';

            $wr_featured_primary = get_sub_field('wr_featured_posts_primary_feature');

            $wr_featured_secondary = get_sub_field('wr_featured_posts_secondary_feature');

            $wr_featured_tertiary = get_sub_field('wr_featured_posts_tertiary_feature');

            $wr_featured_quaternary = get_sub_field('wr_featured_posts_quaternary_feature');

            $wr_featured_url = get_sub_field('wr_featured_url');
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
        WHRS <?php echo $display_type ?>
    </h2>
    <a href="<?php echo esc_url($wr_featured_url); ?>" class="featured__link mb-4">View all <?php echo $display_type ?> <span><?php echo file_get_contents(get_template_directory_uri() . '/images/arrow.svg'); ?></span></a>

    <div class="row">
        <div class="featured__item featured__item--primary col-md-5 mb-4">
            <?php
            if ($wr_featured_primary) :
                $primary = $wr_featured_primary;

            ?>
                <a href="<?php the_permalink($primary); ?>">
                    <?php echo get_the_post_thumbnail($primary) ?>
                    <h3 class="featured__item__title mb-2"><?php echo get_the_title($primary); ?></h3>
                </a>
                <p class="featured__item__excerpt mb-2"><?php echo get_the_excerpt($primary) ?></p>
                <p class="featured__item__date"><?php echo get_the_date('d M Y', $primary) ?></p>

            <?php endif; ?>
        </div>
        <div class="col-md-7">
            <div class="featured__item featured__item--alt">
                <?php
                if ($wr_featured_secondary) :
                    $secondary = $wr_featured_secondary;

                ?>
                    <a href="<?php the_permalink($secondary); ?>">
                        <?php echo get_the_post_thumbnail($secondary) ?>
                        <h3 class="featured__item__title mb-2"><?php echo get_the_title($secondary); ?></h3>
                    </a>
                    <p class="featured__item__excerpt mb-2"><?php echo get_the_excerpt($secondary) ?></p>
                    <p class="featured__item__date"><?php echo get_the_date('d M Y', $secondary) ?></p>

                <?php endif; ?>
            </div>
            <div class="featured__tertiary">S3</div>
            <div class="featured__quaternary">S4</div>
        </div>
    </div>




</section>