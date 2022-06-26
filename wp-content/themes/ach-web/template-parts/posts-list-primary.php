<?php
    $idx = $args['idx'];
    $container = ($idx == 1 || $idx == 8) ? 'col-12' : 'col-12 col-md-6';
    $thumbSize = ($idx == 1 || $idx == 8) ? 'large' : 'medium';
    $titleSize = ($idx == 1 || $idx == 8) ? 'fs-32-md fs-20' : 'fs-20';
?>

<li class="post-list-item <?= $container?> m-0 p-0 pe-3 pe-md-4 mb-4">
    <a href="<?= the_permalink() ?>">
        <figure class="mb-2">
            <img src="<?= get_the_post_thumbnail_url(null, $thumbSize); ?>" alt="<?=  pathinfo(get_the_post_thumbnail_url($thumbSize))['filename'] ?>">
        </figure>
    </a>
    <h3 class="<?= $titleSize ?>">
        <a class="anchor-0" href="<?= the_permalink() ?>"> <?= the_title() ?></a>
    </h3>
</li>    