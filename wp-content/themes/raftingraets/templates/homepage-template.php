<?php
/* Template Name: Homepage */
?>

<?php get_header(); ?>

<?php
$raftingraets_homepage_post_per_page = get_option( 'raftingraets_homepage_post_per_page' );


if ( empty( $raftingraets_homepage_post_per_page ) ) {
    $raftingraets_homepage_post_per_page = 3;
}

$offers_args = array(
    'post_type'      => 'offers',
    'post_status'    => 'publish',
    'posts_per_page' => $raftingraets_homepage_post_per_page,
    // 'meta_query' => array(
    //     array(
    //         'key' => 'featured',
    //         'value' => 1,
    //         'compare' => '=',
    //     ),
    // )
);

$offers_query = new WP_Query( $offers_args );
?>


<div class="container-fluid py-5">
    <div class="container py-5">
        <?php if ( $offers_query->have_posts() ) : ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row pb-3">
                      <h1 class="page-title">Оферти</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row pb-3">
                        <?php while( $offers_query->have_posts() ) : $offers_query->the_post(); ?>
                        <?php
                            if ($offers_query->is_single()) {
                                get_template_part('template-parts/content', 'single');
                            } else {
                                get_template_part('template-parts/content', 'list');
                            }
                        ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>


<?php
    $blog_args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        // 'meta_query' => array(
        //     array(
        //         'key' => 'featured',
        //         'value' => 1,
        //         'compare' => '=',
        //     ),
        // )
    );

    $blog_query = new WP_Query( $blog_args );
?>

        <?php if ( $blog_query->have_posts() ) : ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row pb-3">
                        <h1 class="page-title">Блог</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row pb-3">
                        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                            <?php
                                if ($blog_query->is_single()) {
                                    get_template_part('template-parts/content', 'single');
                                } else {
                                    get_template_part('template-parts/content', 'list');
                                }
                            ?>
                        <?php
                            endwhile; // End of the loop.
                        ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>


        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>

