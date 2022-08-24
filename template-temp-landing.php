<?php
/* Template Name: Custom Temporary Landing Page */
// get_header();
?>
<main id="main" class="posts container">
    <?php if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>

            <!-- <h1 class="posts__title"><?php echo esc_html(get_the_title()); ?></h1> -->
            <div class="posts__section">
                <div class="posts__content" style="display: flex; flex-direction: column; align-items: center;">
                    <?php the_content(); ?>
                </div>
        <?php }
        wp_reset_postdata();
    } ?>
            </div>

            <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $posts_query = new WP_Query(
                array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 9,
                    'paged' => $paged
                )
            ); ?>

            <!-- <div class="posts__grid">
                <?php if ($posts_query->have_posts()) { ?>
                    <div class="posts__grid__row mb-5">
                        <?php while ($posts_query->have_posts()) {
                            $posts_query->the_post(); ?>
                            <div class="posts__grid__row__item">
                                <?php if (has_post_thumbnail(get_the_ID())) { ?>
                                    <div class="posts__grid__thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php } ?>
                                <div class="posts__grid__title">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3><?php the_title(); ?></h3>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <?php
                    $total_pages = $posts_query->max_num_pages;
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged')); ?>
                        <div class="posts__pagination d-flex justify-content-evenly margin">
                            <?php echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => 'page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19" stroke="#2E6E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 5L19 12L12 19" stroke="#2E6E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg> Previous',
                                'next_text' => 'Next <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 12H19" stroke="#2E6E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 5L19 12L12 19" stroke="#2E6E3C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>'
                            )); ?>
                        </div>
                    <?php }
                    wp_reset_postdata();
                } else { ?>
                    <div class="posts"><?php echo esc_html__('No posts matching the query were found.', 'wrhs'); ?></div>
                <?php } ?>
            </div> -->
</main>
<?php
// get_footer();
