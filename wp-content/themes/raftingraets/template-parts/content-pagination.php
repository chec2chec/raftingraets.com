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
            echo '<ul class="pagination pagination-lg justify-content-center mb-0" style="padding: 30px;">';
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