<?php
/* Template Name: Custom Documents Page */
get_header();
?>
<main id="main" class="contact container">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php the_content() ?>

    <h2 class="underline">Magazines</h2>
    <?php
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'document',
        'orderby' => 'date',
        'order' => 'DESC',
        'category_name' => 'magazine'
    );
    $loop = new WP_Query($args);
    ?>

    <section class="pdfs">
        <?php if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php get_template_part('partials/common/featured', 'pdf') ?>
            <?php endwhile;
        else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </section>
    <?php
    wp_reset_postdata();
    wp_reset_query();
    ?>


    <h2 class="underline">Other</h2>
    <?php
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'document',
        'orderby' => 'date',
        'order' => 'DESC',
        'category_name' => 'document'
    );
    $loop = new WP_Query($args);
    ?>

    <section class="pdfs">
        <?php if ($loop->have_posts()) :
            while ($loop->have_posts()) : $loop->the_post(); ?>
                <?php get_template_part('partials/common/featured', 'pdf') ?>
            <?php endwhile;
        else : ?>
            <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </section>

    <?php
    wp_reset_postdata();
    wp_reset_query();
    ?>

</main>
<?php
get_footer();
