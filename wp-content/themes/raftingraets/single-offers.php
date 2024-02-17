<?php
/**
 * Template Name: Custom Single
 *
 * The template for displaying single posts with custom layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Your_Theme_Name
 */

get_header();
?>

<main id="primary" class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php
                while (have_posts()) : 
                  echo '<div class="bg-white mb-3" style="padding: 30px; margin-top: 30px;">';
                  echo '<div class="row">';
                  echo '<div class="col">';
                  echo '<h1 class="mb-3">';
                    the_title();
                  echo '</h1>';
                  echo '</div>';
                  
                  echo '<div class="col text-right">';
                  // Retrieve and display ACF fields
                  $custom_field_value = get_field('offer-price');
                  if ($custom_field_value) {
                      echo '<div class="btn btn-primary">Цена: ' . $custom_field_value . ' лв.</div>';
                  }
                  echo '</div>';
                  echo '</div>';
              
                  echo '<h2 class="mb-3">';
                    the_post();
                  echo '</h2>';
                  // The content
                  the_content();

                  echo '</div>';
                endwhile;
                ?>
              </div>
            </div><!-- .col-md-8 -->
        </div><!-- .row -->
    </div><!-- .container -->
</main><!-- #primary -->

<?php
get_footer();
?>
