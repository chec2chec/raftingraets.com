<?php get_header(); ?>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
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
                <nav aria-label="Page navigation">
                    <?php
                        $pagination_links = paginate_links(array(
                            'prev_text' => __('&laquo;'),
                            'next_text' => __(' &raquo;'),
                            'mid_size' => 1,
                            'prev_next' => true,
                            'type' => 'array',
                        ));

                        if ($pagination_links) {
                            echo '<ul class="pagination pagination-lg justify-content-center bg-white mb-0" style="padding: 30px;">';
                            foreach ($pagination_links as $link) {
                                // Check if the current pagination link is the active one
                                $isActive = strpos($link, 'current') !== false;
                                if ($isActive) {
                                    // If it's the current page, add your custom class to the <span> element
                                    $link = str_replace('<span', '<span class="page-link"', $link);
                                }
                                $link = str_replace('<a', '<a class="page-link"', $link);
                                echo '<li class="page-item' . ($isActive ? ' active' : ''). '">' . $link . '</li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>