<?php
if (get_field('wr_display_featured_block') === 'display') : ?>

    <?php if (get_field('wr_auto_fill')) : ?>
        <?php if (get_field('wr_featured_type') === 'post') : ?>
            <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $loop = new WP_Query($args);
            $postArr = $loop->posts;

            $type = 'post';
            $display_type = 'blogs';

            if (count($postArr) > 0) {
                $wr_featured_primary = $postArr[0];
            }


            if (count($postArr) > 1) {
                $wr_featured_secondary = $postArr[1];
            }

            if (count($postArr) > 2) {
                $wr_featured_tertiary = $postArr[2];
            }

            if (count($postArr) > 3) {
                $wr_featured_quaternary = $postArr[3];
            }

            $wr_featured_url = get_sub_field('wr_featured_url');

            ?>
        <?php endif; ?>

        <?php if (get_field('wr_featured_type') === 'events') : ?>
            <?php
            $args = array(
                'post_type' => 'event_listing',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'ASC',
            );
            $loop = new WP_Query($args);
            $postArr = $loop->posts;
            $type = 'post';
            $display_type = 'blogs';

            var_dump(count($postArr));

            if (count($postArr) > 0) {
                $wr_featured_primary = $postArr[0];
            }


            if (count($postArr) > 1) {
                $wr_featured_secondary = $postArr[1];
            }

            if (count($postArr) > 2) {
                $wr_featured_tertiary = $postArr[2];
            }

            if (count($postArr) > 3) {
                $wr_featured_quaternary = $postArr[3];
            }

            $wr_featured_url = get_sub_field('wr_featured_url');

            ?>
        <?php endif; ?>

    <?php else : ?>

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
            <?php if (have_rows('wr_featured_events')) : ?>
                <?php while (have_rows('wr_featured_events')) :
                    the_row(); ?>

                    <?php
                    $type = 'event';
                    $display_type = 'events';

                    $wr_featured_primary = get_sub_field('wr_featured_events_primary_feature');

                    $wr_featured_secondary = get_sub_field('wr_featured_events_secondary_feature');

                    $wr_featured_tertiary = get_sub_field('wr_featured_events_tertiary_feature');

                    $wr_featured_quaternary = get_sub_field('wr_featured_events_quaternary_feature');

                    $wr_featured_url = get_sub_field('wr_featured_url');
                    ?>

                <?php endwhile; ?>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>

    <section class="featured container margin">
        <h2>
            WHRS <?php echo $display_type ?>
        </h2>
        <a href="<?php echo esc_url($wr_featured_url); ?>" class="featured__link mb-4">View all <?php echo $display_type ?> <span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19" stroke="#2E6E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 5L19 12L12 19" stroke="#2E6E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span></a>

        <div class="row">
            <div class="featured__item featured__item--primary col-lg-6 mb-4 row">
                <?php
                if (!empty($wr_featured_primary)) :
                    $primary = $wr_featured_primary;

                ?>
                    <a class="col-md-7 col-lg-12" href="<?php the_permalink($primary); ?>">
                        <?php echo get_the_post_thumbnail($primary) ?>
                    </a>
                    <div class="col-md-5 col-lg-12">
                        <a href="<?php the_permalink($primary); ?>">
                            <h3 class="featured__item__title mb-2 mt-md-0"><?php echo get_the_title($primary); ?></h3>
                        </a>
                        <p class="featured__item__excerpt mb-2"><?php echo get_the_excerpt($primary) ?></p>
                        <p class="featured__item__date"><?php echo get_the_date('d M Y', $primary) ?></p>
                    </div>

                <?php endif; ?>
            </div>
            <div class="col-lg-6">
                <div class="featured__item featured__secondary mb-4">
                    <?php
                    if (!empty($wr_featured_secondary)) :
                        $secondary = $wr_featured_secondary;
                    ?>
                        <?php get_template_part('/partials/common/featured', 'card', array($secondary)) ?>
                    <?php endif; ?>
                </div>
                <hr>
                <div class="featured__item featured__tertiary mb-4">
                    <?php
                    if (!empty($wr_featured_tertiary)) :
                        $tertiary = $wr_featured_tertiary;
                    ?>
                        <?php get_template_part('./partials/common/featured', 'card', array($tertiary)) ?>
                    <?php endif; ?>
                </div>
                <hr>
                <div class="featured__item featured__quaternary mb-4">
                    <?php
                    if (!empty($wr_featured_quaternary)) :
                        $quaternary = $wr_featured_quaternary;
                    ?>
                        <?php get_template_part('./partials/common/featured', 'card', array($quaternary)) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>




    </section>
<?php endif; ?>