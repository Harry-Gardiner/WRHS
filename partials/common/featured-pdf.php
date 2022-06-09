<?php
$doc_id = get_the_ID();

if (has_post_thumbnail()) {
    $image = the_post_thumbnail();
} else {
    $image = get_template_directory_uri() . '/images/pdf-placeholder.png';
}
?>
<div class="pdfs__card">

    <a href="<?php the_permalink(); ?>" class="pdfs__card__link pb-2 mb-4" title="Permanent Link to <?php the_title_attribute(); ?>">
        <img class="pdfs__card__image" src="<?php echo esc_url($image) ?>" alt="">
        <h4 class="pdfs__card__title mt-2 mb-0"><?php the_title(); ?></h4>
    </a>
    <a href="<?php the_permalink(); ?>" download="<?php the_title_attribute(); ?>">
        <button class="btn btn--download mb-4">Download</button>
    </a>
</div>