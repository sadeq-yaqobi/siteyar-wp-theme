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
        let metaPostType = $('.meta-post-type:checked').val();
        let pageName = $('.page-name').val();

        $.each($('.user-id:checked'), function () {
            userID.push($(this).val());
        });
        $.each($('.post-term-id:checked'), function () {
            postTermID.push($(this).val());
        });
        $.each($('.tech-term-id:checked'), function () {
            techTermID.push($(this).val());
        });


        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            dataType: 'json',
            data: {
                action: 'sy_filter_content',
                userID: userID,
                postTermID: postTermID,
                techTermID: techTermID,
                metaPostType: metaPostType,
                pageName:pageName,
                _nonce: ajax._nonce
            },
            beforeSend: function () {
                $('#load_more_archive_btn').hide();
                // Actions to perform before sending the AJAX request
                $('#filter-content').addClass('op-3 transition-all-4');
            },
            success: function (response) {
                if (response.success) {
                    // Actions to handle successful response
                    if (response.content != null) {
                        if (currentPage >= response.max_page) {
                            $('#load_more_btn').hide();
                        } else {
                            $('#load_more_btn').show();
                        }
                        $('#filter-content').html(response.content);
                        $('.num-post-found').text(response.total_posts_num);
                        $('#archive_pagination').hide();
                        $('#load_more_btn').removeClass('d-none');
                        $('#filter_content_query').val(response.filter_content_query);


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

    //load more button in archive page
    let currentPage = 1; //for first showing content

    $('#load_more_btn').on('click', function (e) {
        currentPage++;
        let userID = [];
        let postTermID = [];
        let techTermID = [];
        let postType = $('.meta-post-type:checked').val();
        let filterContentQuery = $('#filter_content_query').val();
        let pageName = $('.page-name').val();
        $.each($('.user-id:checked'), function () {
            userID.push($(this).val());
        });
        $.each($('.post-term-id:checked'), function () {
            postTermID.push($(this).val());
        });
        $.each($('.tech-term-id:checked'), function () {
            techTermID.push($(this).val());
        });


        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'sy_filter_content',
                userID: userID,
                postTermID: postTermID,
                techTermID: techTermID,
                postType: postType,
                paged: currentPage,
                filterContentQuery: filterContentQuery,
                pageName:pageName,
                _nonce: ajax._nonce

            },
            beforeSend: function () {
                // Actions to perform before sending the AJAX request
                $('#filter-content').addClass('op-3 transition-all-4');
                $('.load-more-icon').removeClass('d-none');
            },
            success: function (response) {
                if (response.success) {
                    // Actions to handle successful response
                    if (response.content != null) {
                        $('#filter-content').append(response.content);
                        if (currentPage >= response.max_page) {
                            $('#load_more_btn').hide();
                            currentPage = 1;
                        }

                      
                        // console.log(response.content);
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
                $('.load-more-icon').addClass('d-none');
            },
        });
    });

    //load more for tech archive and post archive
    $('#load_more_archive_btn').on('click', function (e) {
        currentPage++;
        let pageSlug = $(this).data('page-slug');
        // console.log(pageSlug);

        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'sy_more_content',
                paged: currentPage,
                pageSlug:pageSlug,
                _nonce: ajax._nonce

            },
            beforeSend: function () {
                // Actions to perform before sending the AJAX request
                $('#filter-content').addClass('op-3 transition-all-4');
                $('.load-more-icon').removeClass('d-none');
            },
            success: function (response) {
                if (response.success) {
                    // Actions to handle successful response
                    if (response.content != null) {
                        $('#filter-content').append(response.content);
                        if (currentPage >= response.max_page) {
                            $('#load_more_archive_btn').hide();
                            currentPage = 1;
                        }


                        // console.log(response.content);
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
                $('.load-more-icon').addClass('d-none');
            },
        });
    });


});
