<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
<?php the_excerpt('<p class="pdf__excerpt">', '</p>') ?>
<?php
$wr_add_document = get_field('wr_add_document');
$url = $wr_add_document['url'];
// print_r($url);
if ($wr_add_document) : ?>
    <section class="pdf">
        <a href="<?php echo esc_url($wr_add_document['url']); ?>" download>
            <button class="btn btn--download">Download</button>
        </a>
        <div class="pdf__viewer">
            <?php echo do_shortcode("[pdf-embedder url=\"$url\"]"); ?>
        </div>
    </section>
<?php endif; ?>