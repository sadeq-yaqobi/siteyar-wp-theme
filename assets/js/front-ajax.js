jQuery(document).ready(function ($) {
// alert("ajax is working")
// ajax for filtering tech post

    $('#post-tech-filter').on('change', function () {
        let el = $(this);
        let option_value = el.find('option:selected').val();
        let _nonce = ajax._nonce;
        $.ajax({
            url: ajax.ajaxurl,
            type: 'post',
            datatype: 'json',
            data: {
                action: option_value,
                _nonce: _nonce,
            },
            beforesend: function () {

            },
            success: function (response) {
                if (response.success) {
                    console.log(response.content);
                }
            },
            error: function (error) {
                if (error.error) {

                }
            },
            complete: function () {

            },
        })
    });

});