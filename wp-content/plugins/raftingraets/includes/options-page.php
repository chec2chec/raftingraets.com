<?php
$raftingraets_homepage_post_per_page = get_option( 'raftingraets_homepage_post_per_page' );

if ( empty( $raftingraets_homepage_post_per_page) ) {
    $raftingraets_homepage_post_per_page = 3;
}


// Checks if the is submitted
if ( ! empty( $_POST['raftingraets_save'] ) && $_POST['raftingraets_save'] == 1 ) {

    if ( ! empty( $_POST['raftingraets_homepage_post_number'] ) ) {
        $raftingraets_posts_per_page = esc_attr( $_POST['raftingraets_homepage_post_number'] );
        update_option( 'raftingraets_homepage_post_per_page', $raftingraets_posts_per_page, false );
        $raftingraets_homepage_post_per_page = $raftingraets_posts_per_page; // Update the variable
    }

}
?>

<div class="wrap">

    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    <form action="" method="post">
        <table class="form-table">
            <!-- Table contents here -->
            <tr valign="top">
                <th scope="row">
                    <label for="raftingraets_homepage_post_number">
                          <?php _e( 'Rafting RAETS Number of posts on the homepage', 'raets' ); ?>
                    </label>
                </th>
                <td><input type="number" id="raftingraets_homepage_post_number" name="raftingraets_homepage_post_number" value="<?php echo esc_attr( $raftingraets_homepage_post_per_page );  ?>" /></td>
            </tr>
            <!-- Add more rows as needed -->
        </table>

        <?php
            // Submit button
            submit_button('Save Changes');
        ?>
        <input class="primary" type="hidden" name="raftingraets_save" value="1">
    </form>
</div>