<li class="post-list-item m-0 p-0 mb-4">
    <a href="<?= the_permalink() ?>">
        <figure class="mb-2">
            <img src="<?= get_the_post_thumbnail_url(null, 'thumbnail'); ?>" alt="<?=  pathinfo(get_the_post_thumbnail_url('thumbnail'))['filename'] ?>">
        </figure>
    </a>
    <h3 class="fs-18">
        <a class="anchor-0" href="<?= the_permalink() ?>"> <?= the_title() ?></a>
    </h3>
</li>    