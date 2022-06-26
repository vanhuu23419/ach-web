<?php get_header(); ?>
<?php 
    $cats = get_the_category();
    $termId = $cats[0]->term_id;
    $tags = get_the_tags();
?>

<h1 class="uppercase fw-bold mb-32" style="text-transform: capitalize;">
    <?= the_title() ?>
</h1>

<div id="page-content" class="row mb-16">
    <div id="primary-content" class="single col-12 col-md-9 mb-5 mb-md-0 pe-32-md pb-5 pb-md-0">
        <!-- Post meta -->
        <div class="post-meta d-flex flex-wrap mb-16">
            <div class="me-32 d-flex align-items-center">
                <span class="uppercase fs-14 opacity-60 me-2">Danh mục:</span>
                <?php get_template_part('template-parts/tag-list', null, ['items' => $cats]); ?>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <span class="uppercase fs-14 opacity-60 me-2">Chủ đề:</span>
                <?php get_template_part('template-parts/tag-list', null, ['items' => $tags]); ?>
            </div>
        </div>

        <!-- Thumbnail -->
        <div class="row m-0 p-0">
            <div class="col-12 m-0 p-0">
                <figure class="featured-image mb-32">
                    <img class="w-100" 
                    src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large')?>" 
                    alt="<?= pathinfo(get_the_post_thumbnail_url('thumbnail'))['filename'] ?>">
                </figure>
            </div>
        </div>

        <!-- Post content -->
        <div class="content-area mb-32">
            <?= the_content() ?>
        </div>

        <!-- POst meta -->
        <div class="post-meta d-flex flex-wrap mb-16">
            <div class="me-32 d-flex align-items-center">
                <span class="uppercase fs-14 opacity-60 me-2">Danh mục:</span>
                <?php get_template_part('template-parts/tag-list', null, ['items' => $cats]); ?>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <span class="uppercase fs-14 opacity-60 me-2">Chủ đề:</span>
                <?php get_template_part('template-parts/tag-list', null, ['items' => $tags]); ?>
            </div>
        </div>
    </div>

    <div id="sidebar-content" class="col-12 col-md-3 ">
        <h5 class="uppercase fw-bold mb-16">  
            <span>Bài viết liên quan: </span>   
        </h5>
        <ul id="posts" class="ul-0 row">
            <?php 
                $params = [
                    'cat' => $termId,
                    'tag_id ' => $tags[0]->term_id,
                    'post__not_in' => [get_the_ID()],
                    'orderby'   => ['meta_value_num' => 'DESC'],
                    'meta_key'  => 'views',
                    'posts_per_page' => 4,
                ];
                $query = new WP_Query($params);
                while($query->have_posts()) {
                    $query->the_post();
                    get_template_part('template/posts-list', 'sidebar');
                }
                wp_reset_postdata(); 
            ?>
        </ul>
    </div>
</div>



<?php get_footer(); ?>