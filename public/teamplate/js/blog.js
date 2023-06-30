$('#keywords').keyup(function () {
    var keywords = $(this).val();

    var searchAjaxUrl = $(this).data('url');
    if (keywords != '') {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: searchAjaxUrl,
            type: 'POST',
            data: {
                keywords: keywords,
                _token: _token,
            },
            success: function (data) {
                $('#search_ajax').fadeIn();
                $('#search_ajax').html(data);
            }
        });
    } else {
        $('#search_ajax').fadeOut();
    }
});

$(document).on('click', '.li_search_ajax', function () {
    $('#keywords').val($(this).text());
    $('#search_ajax').fadeOut();
}); 