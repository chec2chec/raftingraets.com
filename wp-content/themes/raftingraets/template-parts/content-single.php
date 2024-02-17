
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
            // Display categories and tags
            echo '<div class="entry-meta">';
            if (get_the_category() || get_the_tags()) {

                if (get_the_category()) {
                    echo '<span class="cat-links">' . __('Categories: ', 'your-theme') . get_the_category_list(', ') . '</span>';
                }
                if (get_the_tags()) {
                    echo '<span class="tag-links">' . __('Tags: ', 'your-theme') . get_the_tag_list('', ', ', '') . '</span>';
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

