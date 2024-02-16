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
          
    
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <?php
                    wp_link_pages( array(
                        'before'      => '<div class="col-md-4"><div class="d-flex mb-4 mb-lg-0"><div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;"><i class="fa fa-2x fa-money-check-alt text-white"></i></div><div class="d-flex flex-column">',
                        'after'       => '</div>',
                        'next_or_number' => 'next' // You can use 'next' for Next/Previous links instead of numbers
                    ));
                ?>
            </div>
        </div>
    </div>


<?php
    endwhile;
?>

<div class="pagination-links">
    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'textdomain' ),
            'after' => '</div>',
            'next_or_number' => 'number' // You can use 'next' for Next/Previous links instead of numbers
        ));
    ?>
</div>

<?php
get_footer();
