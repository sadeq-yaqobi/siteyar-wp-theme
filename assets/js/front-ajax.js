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
            },
            success: function (response) {
                if (response.success) {
                    // Actions to handle successful response
                    console.log(response.content);
                }
            },
            error: function (error) {
                if (error.error) {
                    // Error handling based on specific error conditions
                }
            },
            complete: function () {
                // Actions to perform after the AJAX request completes (regardless of success or failure)
            },
        });
    });

});
