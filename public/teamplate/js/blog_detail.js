
    show_loadmore()
    function show_loadmore() { 
        var commentCount = $(".comment").length; 
        var maxComments = 7; 
        var replyCount = $(".reply").length; 
        var maxReplys = 4; 


        if (commentCount > maxComments) {
            $(".load_more_comment").show();
        } else{
            $(".load_more_comment").hide();
        }
    
        if (replyCount > maxReplys) {
            $(".load_more_reply").show();
        } else {
            $(".load_more_reply").hide();
        }  
        // Hiển thị nút "Xem thêm" nếu số lượng comment vượt quá giới hạn
    }  
    
    $(document).on("click", ".load_more_comment", function (e) {
        e.preventDefault();
        var loadMoreButton = $(this);
        var currentCount = $('.comment').length + 7;
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
                    $('#comment-wrapper').html(data.comment_compoment);
                    loadMoreButton.remove();
                    // Kiểm tra số lượng bình luận mới
                    if (data.comments.length === 0) {
                        loadMoreButton.hide();
                    }
                }
            }
        });
    });   

    $(document).on("click", ".load_more_reply", function (e) {
        e.preventDefault();
        var loadMoreButton = $(this);
        var currentCount = $('.reply').length + 5;
        var comment_id = $(this).data("id_blog");
        var last_id = $(this).data("id_last");
        var url = $(this).data('url');
        var _token = $("input[name='_token']").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: { _token: _token, comment_id: comment_id, last_id: last_id, currentCount: currentCount, },
            success: function (data) {
                if (data.code === 200) {
                    $('#reply-wrapper').html(data.reply_compoment);
                    loadMoreButton.remove();
                    show_loadmore()
                    // Kiểm tra số lượng bình luận mới
                    if (data.replys.length === 0) {
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
        $(this).find('label').css('background', '#f7f7f7');
        var blog_id = $(this).data("id_blog");
        var url = $(this).data('url');
        var _token = $("input[name='_token']").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: { _token: _token, blog_id: blog_id },
            success: function (data) {
                if (data.code === 200) {
                    $('#comment-wrapper').html(data.comment_compoment);
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
        $(this).find('label').css('background', '#f7f7f7');

        var blog_id = $(this).data("id_blog");
        var url = $(this).data('url');
        var _token = $("input[name='_token']").val();

        $.ajax({
            url: url,
            method: 'POST',
            data: { _token: _token, blog_id: blog_id },
            success: function (data) {
                if (data.code === 200) {
                    $('#comment-wrapper').html(data.comment_compoment);
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
                        $('#comment-wrapper').html(data.comment_compoment);
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
            data: { _token: _token, id: comment_id, content: content_reply, post_id: post_id },
            success: function (data) {
                if (data.code === 200) {
                    Swal.fire({
                        type: 'success',
                        title: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        $('#comment-wrapper').html(data.comment_compoment);
                        $(content_reply_id).val('');
                        show_loadmore();
                    });
                }
            }
        });
    });

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
    $(document).on("click", ".show-reply-form", function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        let form_reply = '.form-reply-' + id;
        $('.formReply').slideUp();
        $(form_reply).slideDown(); 
    });

    $(document).on("click", ".close-reply-form", function (e) {
        e.preventDefault();  
        $('.formReply').slideUp(); 
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
                    $('.media-footer-option-text.number_like_comment_' + id_comment).text(data.likeCount);
                    var isLiked = $('.icon-bubble-content_' + id_comment).hasClass('active');
                    if (isLiked) {
                        $('.icon-bubble-content_' + id_comment).removeClass('active');
                    } else {
                        $('.icon-bubble-content_' + id_comment).addClass('active');
                    }
                }
            }
        });
    }); 
