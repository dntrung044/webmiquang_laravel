// --------------------------comment--------------------------
show_loadmore()
function show_loadmore() {
    var commentCount = $(".comment").length;
    var maxComments = 5;
    // Hiển thị nút "Xem thêm" nếu số lượng comment vượt quá giới hạn
    if (commentCount > maxComments) {
        $(".load_more_comment").show();
    } else{
        $(".load_more_comment").hide();
    }

}
$(document).on("click", ".load_more_comment", function (e) {
    e.preventDefault();
    var loadMoreButton = $(this);
    var currentCount = $('.comment').length + 5; // số lượng cmt
    var blog_id = $(this).data("id_blog");
    var last_id = $(this).data("id_last");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, blog_id: blog_id, last_id: last_id, currentCount: currentCount, },
        success: function (data) {
            if (data.code === 200) {
                $('#comment-list').html(data.comment_component);
                loadMoreButton.remove();
                // Kiểm tra số lượng bình luận mới
                if (data.comments.length === 0) {
                    loadMoreButton.hide();
                }
            }
        }
    });
});

$(document).on("click", ".latest_button", function (e) {
    e.preventDefault();
   // Xoá đi kiểu dáng của nhãn label khi không được chọn
    $('.button-radio label').css('background', 'none');
    // Thêm kiểu dáng cho nhãn label khi nút được chọn
    $(this).find('label').css('background', '#f8da45');
    var blog_id = $(this).data("id_blog");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, blog_id: blog_id },
        success: function (data) {
            if (data.code === 200) {
                $('#comment-list').html(data.comment_component);
                show_loadmore()
            }
        }
    });
});

$(document).on("click", ".popular_button", function (e) {
    e.preventDefault();
   // Xoá đi kiểu dáng của nhãn label khi không được chọn
    $('.button-radio label').css('background', 'none');
    // Thêm kiểu dáng cho nhãn label khi nút được chọn
    $(this).find('label').css('background', '#f8da45');
    var blog_id = $(this).data("id_blog");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, blog_id: blog_id },
        success: function (data) {
            if (data.code === 200) {
                $('#comment-list').html(data.comment_component);
                show_loadmore()
            }
        }
    });
});

$(document).on("click", ".send-comment", function (e) {
    e.preventDefault();
    var content = $('.cmt_content').val();
    var blogId = $(this).data("id");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, post_id: blogId, content: content },
        success: function (data) {
            if (data.code === 200) {
                Swal.fire({
                    type: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    $('#comment-list').html(data.comment_component);
                    $('.cmt_content').val('');
                    show_loadmore();
                });
            } else{
                Swal.fire({
                    type: 'error',
                    title: data.error,
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
});
$(document).on("click", ".like-comment", function (e) {
    e.preventDefault();
    var id_comment = $(this).data("id");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, id_comment: id_comment },
        success: function (data) {
            if (data.code === 200) {
                $('.media-footer-option-text.number_like_comment_' + id_comment).text(data.like_count);
                var isLiked = $('.comment-active_'+ id_comment).hasClass('active');
                if (isLiked) {
                    $('.comment-active_'+ id_comment).removeClass('active');
                } else {
                    $('.comment-active_'+ id_comment).addClass('active');
                }
            }
        }
    });
});

// --------------------------reply--------------------------
$(document).on("click", ".show-reply-form", function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    let form_reply = '.form_reply-' + id;

    if ($(form_reply).css('display') === 'none') {
         //mở ra
         $('.form_replies').slideUp();
         $(form_reply).slideDown();
    } else {
        // đóng lại
        $('.form_replies').slideUp();
    }
});

$(document).on("click", ".close-reply-form", function (e) {
    e.preventDefault();
    $('.form_replies').slideUp();
});

$(document).on("click", ".send-reply", function (e) {
    e.preventDefault();
    var comment_id = $(this).data("id");
    var post_id = $(this).data("id_post");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    var content_reply_id = '.content-reply-' + comment_id;
    var content_reply = $(content_reply_id).val();

    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, comment_id: comment_id, content: content_reply, post_id: post_id },
        success: function (data) {
            if (data.code === 200) {
                Swal.fire({
                    type: 'success',
                    title: data.success,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    $('#comment-list').html(data.reply_component);
                    $('.form_reply-' + comment_id).css('display', 'block');
                    $(content_reply_id).val('');

                    show_loadmore();
                });
            }
        }
    });
});
$(document).on("click", ".like-reply", function (e) {
    e.preventDefault();
    var id_reply = $(this).data("id");
    var url = $(this).data('url');
    var _token = $("input[name='_token']").val();
    $.ajax({
        url: url,
        method: 'POST',
        data: { _token: _token, id_reply: id_reply },
        success: function (data) {
            if (data.code === 200) {
                $('.media-footer-option-text.number_like_reply_' + id_reply).text(data.like_count);
                var isLiked = $('.reply-active_' + id_reply).hasClass('active');
                if (isLiked) {
                    $('.reply-active_' + id_reply).removeClass('active');
                } else {
                    $('.reply-active_' + id_reply).addClass('active');
                }
            }
        }
    });
});
// --------------------------login--------------------------
$(document).on("click", ".show_model_login", function (e) {
    e.preventDefault();
    $('#loginModal').modal('show');
});
$(document).on("click", ".btn-login", function (e) {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    var url = $(this).data('url');

    $.ajax({
        url: url,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            email: email,
            password: password,

        },
        success: function (data) {
            if (data.success === 1) {
                Swal.fire({
                    type: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    location.reload();
                });
            }
            if (data.success === 0) {
                Swal.fire({
                    type: 'error',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    let _html_error =
                        '<div class="alert alert-danger">';
                    for (let error of data.error) {
                        _html_error += '<li> ${error}</li>';
                    }
                    _html_error += '</div>'
                    $('#login-error').html(_html_error);
                });
            }
            else {
                let _html_error =
                    '<div class="alert alert-danger">';
                for (let error of data.error) {
                    _html_error += '<li> ${error}</li>';
                }
                _html_error += '</div>'
                $('#login-error').html(_html_error);
            }
        }
    });
});


