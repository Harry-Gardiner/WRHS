<?php if (get_field('wr_display_coloured_block') === 'display') : ?>
    <section class="coloured-block">
        <div class="coloured-block__background-leaf">
            <img src="<?php echo get_template_directory_uri() ?>/images/leaf.svg" alt="leaf image">
        </div>
        <div class="coloured-block__content container pt-4 pb-4 d-flex flex-column flex-md-column-reverse">
            <?php if (have_rows('wr_coloured_block')) : ?>
                <?php while (have_rows('wr_coloured_block')) :
                    the_row(); ?>


                    <?php
                    $wr_coloured_block_primary_image = get_sub_field('wr_coloured_block_primary_image');
                    if ($wr_coloured_block_primary_image) : ?>
                        <figure class="coloured-block__image coloured-block__image--primary">
                            <img src="<?php echo esc_url($wr_coloured_block_primary_image['url']); ?>" alt="<?php echo esc_attr($wr_coloured_block_primary_image['alt']); ?>" />
                        </figure>
                    <?php endif; ?>

                    <div class="coloured-block__content__section-one d-md-flex">
                        <div class="row mb-md-4">
                            <?php
                            $wr_coloured_block_secondary_image = get_sub_field('wr_coloured_block_secondary_image');
                            if ($wr_coloured_block_secondary_image) : ?>
                                <figure class="coloured-block__image coloured-block__image--secondary col-md-6">
                                    <img src="<?php echo esc_url($wr_coloured_block_secondary_image['url']); ?>" alt="<?php echo esc_attr($wr_coloured_block_secondary_image['alt']); ?>" />
                                </figure>
                            <?php endif; ?>
                            <div class="coloured-block__content col-md-6">
                                <?php if ($wr_coloured_block_header = get_sub_field('wr_coloured_block_header')) : ?>
                                    <h2><?php echo esc_html($wr_coloured_block_header); ?></h2>
                                <?php endif; ?>
                                <?php if ($text = get_sub_field('text')) : ?>
                                    <p><?php echo esc_textarea($text); ?></p>
                                <?php endif; ?>
                                <?php
                                $url = get_sub_field('wr_coloured_block_button_link');
                                ?>
                                <a href="<?php echo esc_url($url); ?>">
                                    <button class="btn btn--tertiary">
                                        <?php if ($wr_coloured_block_button_label = get_sub_field('wr_coloured_block_button_label')) : ?>
                                            <?php echo esc_html($wr_coloured_block_button_label); ?>
                                        <?php endif; ?>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>