<?php the_title('<h2 class="entry-title">', '</h2>'); ?>
<?php the_excerpt('<p class="pdf__excerpt">', '</p>') ?>
<?php
$wr_add_document = get_field('wr_add_document');
$url = $wr_add_document['url'];
// print_r($url);
if ($wr_add_document) : ?>
    <section class="pdf col-lg-10 m-auto">
        <a href="<?php echo esc_url($wr_add_document['url']); ?>" download>
            <button class="btn btn--download mb-4">Download</button>
        </a>
        <div class="pdf__viewer mb-4">
            <?php echo do_shortcode("[pdf-embedder url=\"$url\"]"); ?>
        </div>
    </section>
<?php endif; ?>