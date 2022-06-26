<?php get_header(); ?>
<?php 
    global $wp_query; 
    $termId = get_queried_object()->term_id;
    $primaryPostIds = [];
?>

<?php
    ViewHelper::archivePageTitle();
?>
<div id="page-content" class="row">
    <div id="primary-content" class="col-12 col-md-9 mb-5 mb-md-0 pe-32-md pb-5 pb-md-0">
        <div id="posts">
            <?php if (have_posts()): $idx = 1; ?>
                <ul class="row p-0 ps-3">
                    <?php 
                        while (have_posts()): 
                            the_post();
                            $primaryPostIds[] = get_the_ID();
                            get_template_part('template-parts/posts-list', 'primary', ['idx' => $idx++]);
                        endwhile; 
                    ?>
                </ul>
            <?php else: ?>
                <?= ViewHelper::noRecordMessage(); ?>
            <?php endif; ?>
            
            <div class="pagination d-flex flex-wrap">
                <?php
                    echo paginate_links( array(
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $wp_query->max_num_pages,    
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'end_size'     => 0,
                        'mid_size'     => 2,
                        'prev_next'    => false,
                        'prev_text'    => __( 'Trước', 'fandom_channel' ),
                        'next_text'    => __( 'Sau', 'fandom_channel' ),
                        'add_args'     => false,
                        'add_fragment' => '',
                    ) );
                ?>
            </div>
        </div>
    </div>

    <div id="sidebar-content" class="col-12 col-md-3">
        <?php 
            $params = [
                'post__not_in' => $primaryPostIds,
                'orderby'   => ['meta_value_num' => 'DESC'],
                'meta_key'  => 'views',
                'posts_per_page' => 4,
            ];
            if (is_tag($termId)) {
                $params['tag_id'] = $termId;
            }
            else if (is_category($termId)) {
                $params['cat'] = $termId;
            }
            $query = new WP_Query($params);
        ?>
        <?php if ($query->have_posts()): ?>
            <h5 class="uppercase fw-bold mb-16">  
                <span >Xem nhiều nhất: </span>   
            </h5>
            <ul id="posts" class="ul-0 row">
                <?php 
                    while($query->have_posts()) {
                        $query->the_post();
                        get_template_part('template-parts/posts-list', 'sidebar');
                    }
                    wp_reset_postdata(); 
                ?>
            </ul>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>


    
