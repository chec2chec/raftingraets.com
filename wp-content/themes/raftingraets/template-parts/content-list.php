<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-4 mb-4 pb-2'); ?>>
  <div class="blog-item">
    <div class="bg-white p-4">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
          <?php
            // // Display categories and tags
            // if (get_the_category() || get_the_tags()) {
            //     echo '<div class="entry-meta">';
            //     if (get_the_category()) {
            //         echo '<span class="cat-links">' . __('Categories: ', 'your-theme') . get_the_category_list(', ') . '</span>';
            //     }
            //     if (get_the_tags()) {
            //         echo '<span class="tag-links">' . __('Tags: ', 'your-theme') . get_the_tag_list('', ', ', '') . '</span>';
            //     }
            //     echo '</div><!-- .entry-meta -->';
            // }

            // Custom taxonomies
            $taxonomy_names = get_object_taxonomies(get_post_type());
            foreach ($taxonomy_names as $taxonomy_name) {
                $taxonomy = get_taxonomy($taxonomy_name);
                if ($taxonomy->public) {
                    $terms = get_the_terms(get_the_ID(), $taxonomy_name);
                    if ($terms && !is_wp_error($terms)) {
                        echo '<div class="entry-meta">';
                        foreach ($terms as $term) {
                            echo '<span class="cat-links"><a href="' . get_term_link($term->slug, $taxonomy_name) . '">' . $term->name . '</a></span><br>';
                        }
                        echo '</div><!-- .entry-meta -->';
                    }
                }
            }

            // Edit post link
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'your-theme'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
          ?>
        </footer><!-- .entry-footer -->
      </article><!-- #post-<?php the_ID(); ?> -->

    </div>
  </div>
</div>
