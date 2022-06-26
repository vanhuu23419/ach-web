<?php get_header(); ?>
<?php 
    global $wp_query; 
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
                    <?php while (have_posts()): 
                        the_post();
                        $primaryPostIds[] = get_the_ID();
                        get_template_part('template-parts/posts-list', 'primary', ['idx' => $idx++]);
                    endwhile; ?>
                </ul>
            <?php else: ?>
                <?php ViewHelper::noRecordMessage(); ?>
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
    </div>
</div>

<?php get_footer(); ?>


    
