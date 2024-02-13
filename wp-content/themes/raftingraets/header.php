<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title(); ?></title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid pt-0 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center text-lg-center mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <!-- Tagline -->
                        <?php echo ($tagline = get_bloginfo('description')) ? '<p>' . $tagline . '</p>' : ''; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar Start -->
    <div  id="topbar-raets" class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" class="navbar-brand">
                    <h1 class="m-0 text-primary"><?php the_custom_logo(); ?><h1>
                </a>
            <?php else : ?> 
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>" class="navbar-brand"><h1 class="m-0 text-primary"><img src="<?php echo get_stylesheet_directory_uri(); ?>/clipart/logo-rect.png" alt="<?php bloginfo( 'name' ); ?>" width="200" /></h1></a>
            <?php endif; ?>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <?php
                    wp_nav_menu( array(
                        'menu'           => 'primary-menu',
                        'theme_location' => 'primary_menu',
                        'menu_class' => '',
                        'container' => 'div',
                        'container_class' => 'navbar-nav ml-auto py-0',
                        'items_wrap' => '%3$s',
                        'depth' => 0,
                    ));
                ?>
            </div>
        </nav>
    </div>


