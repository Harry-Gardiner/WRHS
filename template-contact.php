<?php
/* Template Name: Custom Contact */
get_header();
?>
<main id="main" class="contact container">
    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    <?php the_content() ?>

    <h2>Location and details</h2>
    <div class="row mb-lg-5">
        <iframe class="contact__map col-lg-6" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2532.59143980583!2d-2.4733336841347904!3d50.59754668463569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4872f6e208e0a42f%3A0xe7da45b92109e787!2sWyke%20Regis%20Horticultural%20Society!5e0!3m2!1sen!2suk!4v1654601522437!5m2!1sen!2suk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="contact__details col-lg-6">
            <?php if (have_rows('contact_details')) : ?>
                <?php while (have_rows('contact_details')) :
                    the_row(); ?>

                    <?php if ($wr_address = get_sub_field('wr_address')) : ?>
                        <?php echo $wr_address; ?>
                    <?php endif; ?>

                    <?php if ($wr_opening_hours = get_sub_field('wr_opening_hours')) : ?>
                        <?php echo $wr_opening_hours; ?>
                    <?php endif; ?>

                    <?php if ($wr_email = get_sub_field('wr_email')) : ?>
                        <p><strong>Email:<strong>
                                    <a href="mailto:<?php echo $wr_email; ?>"><?php echo $wr_email; ?></a>
                        </p>

                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</main>
<?php
get_footer();
