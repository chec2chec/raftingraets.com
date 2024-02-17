<?php
$raftingraets_homepage_post_per_page = get_option( 'raftingraets_homepage_post_per_page' );

if ( empty( $raftingraets_homepage_post_per_page ) ) {
    $raftingraets_homepage_post_per_page = 3;
}

?>

<div id="post-<?php the_ID(); ?>" <?php
  if ('offers' == get_post_type()) {
    post_class(getColumnsClasses());
  } else {
    post_class('col-md-4 mb-4 pb-2');
  }; ?>>
  <div class="blog-item">
    <?php $is_hot = get_field('is_hot');?>
    <div class="bg-white p-4"  <?php if ($is_hot) { ?>style='box-shadow: inset 0 0 0 4px red'<?php };?>>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h1 class="entry-title">
            <div class="row">
              <div class="col">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
              <div class="col text-right">
                <?php
                  // Retrieve and display ACF fields
                  $custom_field_value = get_field('offer-price');
                  if ($custom_field_value) {
                      echo '<div class="btn btn-primary">Цена: ' . $custom_field_value . ' лв.</div>';
                  }
                ?>
              </div>
            </div>
          </h1>
        </header><!-- .entry-header -->

        <div class="entry-content">

          <?php the_content(); ?>

        </div><!-- .entry-content -->

        <footer class="entry-footer">
          <?php
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
            edit_post_link('Edit');
          ?>
        </footer><!-- .entry-footer -->
      </article><!-- #post-<?php the_ID(); ?> -->

    </div>
  </div>
</div>
