<?php
/* Template Name: Custom Documents Page */
get_header();
?>
<main id="main" class="contact container">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php the_content() ?>

    <?php
    $current_user = wp_get_current_user(); // grab user info  from the database 

    if (current_user_can('upload_files')) : // 'read' is the lowest  level capability 
    ?>

        <h2 class="underline">Protected Documents</h2>
        <small class="info mb-4">Protected documents are only visible to logged in users with 'Author' role or greater</small>
        <?php
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'document',
            'orderby' => 'date',
            'order' => 'DESC',
            'category_name' => 'protected'
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

        <hr class="hr-gray">
    <?php endif; // end of user capability check 
    ?>

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

    <hr class="hr-gray">

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

    <section class="pdfs mb-5">
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
