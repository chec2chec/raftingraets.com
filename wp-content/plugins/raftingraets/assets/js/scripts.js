jQuery(document).ready(function($) {

  $('#offer-info-btn').on('click', function() {

    var postId = $(this).data('post-id');

    // AJAX call to retrieve ACF field value
    $.ajax({
        url: my_ajax_object.ajax_url, // WordPress AJAX URL
        type: 'post',
        data: {
            action: 'get_acf_field', // Action hook to call the PHP function
            post_id: postId, // The ID of the post you want to retrieve ACF field from
        },
        success: function(response) {
            // Handle the response
            if (response) {
              $(this).hide();
              $('#offer-result').html(response);
            }
        }
    });

  });
});
