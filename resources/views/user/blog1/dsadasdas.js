
        // Display the reply form
        function show_reply() {
            var x = document.getElementById("show-list-reply");
            if (x.style.display === "none") {
                x.style.display = "block";
                alert("hien");
            } else {
                x.style.display = "none";
                alert("an");
            }
        }
        $(document).ready(function(){
            $('#dropDown').click(function(event){
                $('.drop-down').toggleClass('drop-down--active');
                event.stopPropagation();
            });
            $(document).click(function(event) {
                if (!$(event.target).hasClass('drop-down--active')) {
                    $(".drop-down").removeClass("drop-down--active");
                }
            });
        });

        var _token = $('input[name="_token"]').val();
        load_more_comment();

        $(document).on('click', '#load_more_comment_button', function() {
            var id = $(this).data('id');
            load_more_comment(id);
        });

        function load_more_comment(id = '') {
            var loadMoreButton = $(this);
            var post_id = $('#post_id').val();

            $.ajax({
                url: '{{ route('comment.load_more') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                    post_id: post_id,
                },
                success: function(data) {
                    $('#load_more_comment_button').remove();
                    $('#list-comment').append(data);
                }
            });
        }
        $(document).ready(function() {
            // window.$('#loginModal').modal();
            $('#loginModal').modal('show');
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
            $('#btn-login').click(function(ev) {
                ev.preventDefault();
                var email = $('#email').val();
                var password = $('#password').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '/dang-nhap/ajax',
                    type: 'POST',
                    data: {
                        email: email,
                        password: password,
                        _token: _token,
                    },
                    success: function(res) {
                        if (res.message) {
                            let _html_error =
                                '<div class="alert alert-danger">';
                            for (let error of res.error) {
                                _html_error += '<li> ${error}</li>';
                            }
                            _html_error += '</div>'
                            $('#error').html(_html_error);
                        } else {
                            alert('Đăng nhập thành công!');
                            location.reload();
                        }
                    }
                });
            })

            $('#btn-comment').click(function(ev) {
                ev.preventDefault();
                let content = $('.cmt_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ route('comment.sent', $blog->id) }}',
                    type: 'POST',
                    data: {
                        content: content,
                        _token: _token,
                    },
                    success: function(res) {
                        location.reload();
                    }
                });
            });
            $('#like-comment').click(function(ev) {
                ev.preventDefault();
                var comment_like_id = $(this).data('id');

                $.ajax({
                    url: '{{ route('comment.like') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        comment_like_id: comment_like_id,
                        _token: _token,
                    },
                    success: function(res) {
                        if (res.error) {
                            $('#comment-error').html(res.error)
                        } else {
                            location.reload();
                        }
                    }
                });
            });

        });



        // --------------------------reply--------------------------


        $(document).on("click", ".btn_show_reply_form", function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var content_reply_id = '.content-reply-' + id;
            let content_reply = $(content_reply_id).val();
            let form_reply = '.form_reply-' +id;

            $('.form_replies').slideUp();
            $(form_reply).slideDown();
        });


        $(document).on("click", ".close-reply-form", function(e) {
            e.preventDefault();
            $('.form_replies').slideUp();
        });

        // send reply
         $(document).on('click', '.btn_reply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            var content_reply_id = '.content_reply-' + id;
            let form_reply = '.form-reply-' + id;
            let content_reply = $(content_reply_id).val();
            $.ajax({
                url: '{{ route('reply.sent') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    content_reply: content_reply,
                    comment_id: id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        location.reload();
                    }
                }
            });
        });

        $(document).on('click', '#dropdown', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id');
            let form_dropdown = '.form-dropdown-' + id;

            $('.dropdown-menu').slideUp();
            if ($(form_dropdown).slideDown()) {
                $(form_dropdown).slideUp();
            } else {
                $(form_dropdown).slideDown();
            }
        });



        $(document).on('click', '#load_more_replies_button', function() {
            var id = $(this).data('id');
            load_more_replies(id);
        });

        function load_more_reply(id = '') {
            $.ajax({
                url: '{{ route('reply.load_more') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#load_more_button').remove();
                    $('#list-comment').append(data);
                }
            });
        }


        $(document).on('click', '#load-more-reply', function(ev) {
            ev.preventDefault();
            var comment_id = $(this).data('id');
            $.ajax({
                url: '{{ route('reply.load_more') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_id: comment_id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        $('#show-data-replies').append(res);
                    }
                }
            });
        });

        $(document).on('click', '#like-reply', function(ev) {
            ev.preventDefault();
            var reply_like_id = $(this).data('id');

            $.ajax({
                url: '{{ route('reply.like') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    reply_like_id: reply_like_id,
                    _token: _token,
                },
                success: function(res) {
                    if (res.error) {
                        $('#comment-error').html(res.error)
                    } else {
                        location.reload();
                    }
                }
            });
        });
