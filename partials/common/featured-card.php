<!-- Template file that takes $args. 
The $args value is the post ID, which is then used to display the posts information. -->

<div class="featured__item featured__item--alt row">
    <a class="col-md-4" href="<?php the_permalink($args[0]); ?>">
        <?php echo get_the_post_thumbnail($args[0]) ?>
    </a>
    <div class="col-md-7">
        <a href="<?php the_permalink($args[0]); ?>">
            <h3 class="featured__item__title mb-2 mt-md-0"><?php echo get_the_title($args[0]); ?></h3>
        </a>
        <p class="featured__item__excerpt mb-2"><?php echo get_the_excerpt($args[0]) ?></p>
        <p class="featured__item__date"><?php echo get_the_date('d M Y', $args[0]) ?></p>
    </div>
</div>