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
                    console.log(response.content);
                    $('#ajax-load-content').html(response.content);
                }
            },
            error: function (error) {
                if (error.error) {
                    // Error handling based on specific error conditions
                    $('#ajax-load-content').html('<div class="alert alert-info w-100">'+error.responseJSON.message+'</div>');
                }
            },
            complete: function () {
                // Actions to perform after the AJAX request completes (regardless of success or failure)
                $('#ajax-load-content').removeClass('op-3');
            },
        });
    });

});
