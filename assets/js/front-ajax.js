jQuery(document).ready(function ($) {
    let ajaxNonce = ajax._nonce;
    // Functionality for filtering tech posts using AJAX
    $('#post-tech-filter').on('change', function () {
        // Get the selected option value and AJAX nonce
        let selectedOption = $(this).find('option:selected').val();


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
                pageName: pageName,
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
                    $('.breadcrumb').html('<li class="breadcrumb-item"><a href="\' . home_url() . \'" rel="nofollow">خانه</a></li>&nbsp;&#187;&nbsp;جستجو پیشرفته ')
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
                pageName: pageName,
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
                pageSlug: pageSlug,
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

//sending contact us form data by ajax
    $('#contact-form').on('submit', function (e) {
        e.preventDefault();

        let fullName = $('[name=contact_full_name]').val();//catching input data by name attribute
        let email = $('[name=contact_email]').val();//catching input data by name attribute
        let title = $('[name=contact_title]').val();//catching input data by name attribute
        let message = $('[name=contact_message]').val();//catching input data by name attribute
        let recaptcha = $('[name=g-recaptcha-response]').val();//catching input data by name attribute


        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: 'sy_contact',
                fullName: fullName,
                email: email,
                title: title,
                message: message,
                recaptcha:recaptcha,
                _nonce: ajaxNonce,
            },
            beforeSend: function () {
                $('.load-more-icon').removeClass('d-none')
            },
            success: function (response) {
                if (response.success) {
                    // alert(response.message);

                    $.toast({
                        text: response.message, // Text that is to be shown in the toast
                        heading: ' ', // Optional heading to be shown on the toast
                        icon: 'success', // Type of toast icon
                        showHideTransition: 'slide', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 4000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'top-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


                        textAlign: 'right',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader
                        beforeShow: function () {
                        }, // will be triggered before the toast is shown
                        afterShown: function () {
                        }, // will be triggered after the toat has been shown
                        beforeHide: function () {
                        }, // will be triggered before the toast gets hidden
                        afterHidden: function () {
                        }  // will be triggered after the toast has been hidden
                    });

                }
            },
            error: function (error) {
                if (error) {

                    $.toast({
                        text: error.responseJSON.message, // Text that is to be shown in the toast
                        heading: error.responseJSON.title, // Optional heading to be shown on the toast
                        icon: 'error', // Type of toast icon
                        showHideTransition: 'slide', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 4000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'top-left', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values


                        textAlign: 'right',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader
                        beforeShow: function () {
                        }, // will be triggered before the toast is shown
                        afterShown: function () {
                        }, // will be triggered after the toat has been shown
                        beforeHide: function () {
                        }, // will be triggered before the toast gets hidden
                        afterHidden: function () {
                        }  // will be triggered after the toast has been hidden
                    });

                }
            },
            complete: function () {
                $('.load-more-icon').addClass('d-none')
            }

        });
    });


});
