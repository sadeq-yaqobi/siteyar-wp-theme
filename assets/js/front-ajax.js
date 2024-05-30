jQuery(document).ready(function ($) {

    // Functionality for filtering tech posts using AJAX
    $('#post-tech-filter').on('change', function () {
        // Get the selected option value and AJAX nonce
        let selectedOption = $(this).find('option:selected').val();
        let ajaxNonce = ajax._nonce;

        // AJAX request to filter posts
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            dataType: 'json',
            data: {
                action: selectedOption,
                _nonce: ajaxNonce,
            },
            beforeSend: function () {
                // Actions to perform before sending the AJAX request
                $('#ajax-load-content').addClass('op-3 transition-all-4');
            },
            success: function (response) {
                if (response.success) {
                    // Actions to handle successful response
                    $('#ajax-load-content').html(response.content);

                }
            },
            error: function (error) {
                if (error.error) {
                    // Error handling based on specific error conditions
                    $('#ajax-load-content').html('<div class="alert alert-info w-100">' + error.responseJSON.message + '</div>');
                }
            },
            complete: function () {
                // Actions to perform after the AJAX request completes (regardless of success or failure)
                $('#ajax-load-content').removeClass('op-3');
            },
        });
    });

    // advanced filttring content in archive page
    $('#archive_filter_form').on('submit', function (e) {
        e.preventDefault();
        let userID = [];
        let postTermID = [];
        let techTermID = [];
        $.each($('.user-id:checked'), function () {
            userID.push($(this).val());
        });
        $.each($('.post-term-id:checked'), function () {
            postTermID.push($(this).val());
        });
        $.each($('.tech-term-id:checked'), function () {
            techTermID.push($(this).val());
        });
        console.log(userID);
        console.log(postTermID);
        console.log(techTermID);

        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'sy_filter_content',
                userID: userID,
                postTermID: postTermID,
                techTermID:techTermID,
                _nonce: ajax._nonce
            },
            beforeSend: function () {
                // Actions to perform before sending the AJAX request
                $('#filter-content').addClass('op-3 transition-all-4');
            },
            success: function (response) {
                if (response.success) {
                    // Actions to handle successful response
                    if (response.content != null) {
                        $('#filter-content').html(response.content);
                        $('.num-post-found').text(response.total_posts_num);
                        console.log(response.content);
                    } else {
                        $('#filter-content').html('<div class="alert alert-info">مطلبی یافت نشد</div>');
                        $('.num-post-found').text('0');
                    }

                }
            },
            error: function (error) {
                if (error.error) {
                    // Error handling based on specific error conditions
                    $('#filter-content').html('<div class="alert alert-info w-100">' + error.responseJSON.message + '</div>');
                    $('.num-post-found').text('0');
                    console.log(error.responseJSON.message);

                }
            },
            complete: function () {
// Actions to perform after the AJAX request completes (regardless of success or failure)
                $('#filter-content').removeClass('op-3');
            },
        })
    });

});
