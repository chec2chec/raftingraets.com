<?php
// page.php template
get_header(); ?>

<?php
    // Start the loop.
    while ( have_posts() ) : the_post(); ?>


    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="position-relative h-100">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large' ); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/clipart/logo-square.png" width="400" alt="Custom Image">
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-8 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h1 class="mb-3"><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    endwhile;
?>

<div class="pagination-links">
    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'raets' ),
            'after' => '</div>',
            'next_or_number' => 'number' // You can use 'next' for Next/Previous links instead of numbers
        ));
    ?>
</div>

<?php
get_footer();
