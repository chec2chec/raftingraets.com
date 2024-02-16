<?php get_header(); ?>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="row pb-3">
                    <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row pb-3">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php
                            if (is_single()) {
                                get_template_part('template-parts/content', 'single');
                            } else {
                                get_template_part('template-parts/content', 'list');
                            }
                        ?>
                    <?php
                        endwhile; // End of the loop.
                    ?>
                </div>
            </div>

            <div class="col-12">
                <?php get_template_part('template-parts/content','pagination'); ?>
            </div>
        </div>
    </div>
</div>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>