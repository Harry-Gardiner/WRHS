<?php if (have_rows('wr_home_hero')) : ?>
    <?php while (have_rows('wr_home_hero')) :
        the_row();
        $btn_one_url = esc_url(get_sub_field('wr_hero_button_one_url'));
        $btn_two_url = esc_url(get_sub_field('wr_hero_button_two_url'));
    ?>

        <section class="hero container">
            <div class="row">
                <div class="col-md-6 hero__content">
                    <h1>
                        <?php if ($wr_hero_title = get_sub_field('wr_hero_title')) : ?>
                            <?php echo esc_html($wr_hero_title); ?>
                        <?php endif; ?>
                    </h1>
                    <p>
                        <?php if ($wr_hero_sub_text = get_sub_field('wr_hero_sub_text')) : ?>
                            <?php echo esc_textarea($wr_hero_sub_text); ?>
                        <?php endif; ?>
                    </p>
                    <div class="hero__content__buttons">
                        <?php if ($wr_hero_button_one_label = get_sub_field('wr_hero_button_one_label')) : ?>
                            <a href="<?php echo $btn_one_url ?>"><button class="btn btn--primary"><?php echo esc_html($wr_hero_button_one_label); ?></button></a>
                        <?php endif; ?>
                        <?php if ($wr_hero_button_two_label = get_sub_field('wr_hero_button_two_label')) : ?>
                            <a href="<?php echo $btn_two_url ?>"><button class="btn btn--secondary"><?php echo esc_html($wr_hero_button_two_label); ?></button></a>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-md-6 hero__image">
                    <figure>
                        <?php
                        $wr_hero_image = get_sub_field('wr_hero_image');
                        if ($wr_hero_image) : ?>
                            <img src="<?php echo esc_url($wr_hero_image['url']); ?>" alt="<?php echo esc_attr($wr_hero_image['alt']); ?>" />
                        <?php endif; ?>
                    </figure>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
<?php endif; ?>