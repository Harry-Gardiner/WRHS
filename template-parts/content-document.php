<?php
$wr_add_document = get_field('wr_add_document');
$url = $wr_add_document['url'];
$selected_cat = get_the_category()[0]->slug;
$current_user = wp_get_current_user(); // grab user info  from the database 

if (current_user_can('upload_files') && $selected_cat === 'protected') : // 'read' is the lowest  level capability 
    if ($wr_add_document) : ?>
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php the_excerpt('<p class="pdf__excerpt">', '</p>') ?>
        <section class="pdf">
            <a href="<?php echo esc_url($wr_add_document['url']); ?>" download="<?php the_title_attribute(); ?>">
                <button class="btn btn--download mb-4">Download</button>
            </a>
            <div class="pdf__viewer m-auto mb-4">
                <?php echo do_shortcode("[pdf-embedder url=\"$url\"]"); ?>
            </div>
        </section>
    <?php endif; ?>
<?php elseif ($selected_cat === 'protected') : ?>
    <section class="pdf mt-5 mb-5">
        <p class="info">This document is protected, you do not have the required access</p>
    </section>
<?php endif ?>

<?php if ($selected_cat !== 'protected') :
    if ($wr_add_document) : ?>
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php the_excerpt('<p class="pdf__excerpt">', '</p>') ?>
        <section class="pdf">
            <a href="<?php echo esc_url($wr_add_document['url']); ?>" download="<?php the_title_attribute(); ?>">
                <button class="btn btn--download mb-4">Download</button>
            </a>
            <div class="pdf__viewer m-auto mb-4">
                <?php echo do_shortcode("[pdf-embedder url=\"$url\"]"); ?>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>