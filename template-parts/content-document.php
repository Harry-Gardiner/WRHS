<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
<?php the_excerpt('<p class="pdf__excerpt">', '</p>') ?>
<?php
$wr_add_document = get_field('wr_add_document');
$url = $wr_add_document['url'];
// print_r($url);
if ($wr_add_document) : ?>
    <section class="pdf">
        <a href="<?php echo esc_url($wr_add_document['url']); ?>" download="<?php the_title_attribute(); ?>">
            <button class="btn btn--download mb-4">Download</button>
        </a>
        <div class="pdf__viewer m-auto mb-4">
            <?php echo do_shortcode("[pdf-embedder url=\"$url\"]"); ?>
        </div>
    </section>
<?php endif; ?>