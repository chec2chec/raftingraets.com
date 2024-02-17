    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-6 mb-5">
                <!-- Logo -->
                <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" class="navbar-brand">
                        <h1 class="m-0 text-primary"><?php the_custom_logo(); ?><h1>
                    </a>
                <?php else : ?> 
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" class="navbar-brand"><h1 class="m-0 text-primary"><img src="<?php echo get_stylesheet_directory_uri(); ?>/clipart/logo-rect.png" alt="<?php bloginfo( 'name' ); ?>" width="200" /></h1></a>
                <?php endif; ?>
                <!-- Tagline -->
                <?php echo ($tagline = get_bloginfo('description')) ? '<p>' . $tagline . '</p>' : ''; ?>
            </div>
            <div class="col-lg-6 col-md-6 mb-5">
                <?php dynamic_sidebar( 'footer-sidebar' ); ?>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="display: inline;">
        <i class="fa fa-angle-double-up"></i>
    </a>

    <!-- Footer content goes here -->
    <?php wp_footer(); ?>
</body>

</html>