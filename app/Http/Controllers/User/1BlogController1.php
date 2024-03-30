<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController1 extends Controller
{

    public function index()
    {
        $blogs = Post::OrderBy('id', 'desc')->where('active', 1)->paginate(6);
        $blognew = Post::where('active', 1)->get();
        $blogCategories =  PostCategory::where('active', 1)->get();
        $title = 'Tin tức - Mì Quảng Bà Mua';

        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    }

    public function detail($id = '', $slug = '')
    {
        $blog = Post::where('id', $id)
                ->where('active', 1)
                ->with('postCategory')
                ->firstOrFail();
        #Increase views
        $blog->view = $blog->view + 1;
        $blog->save();

        $blognew = Post::OrderBy('id', 'desc')->limit('3')->get();
        $countComment = PostComment::where('post_id', $id)->where('active', 1)->count();
        $list_comment = PostComment::where('post_id',$id)->orderby('id', 'DESC')->take(5)->get();
        return view('user.blog.detail', [
            'title' => 'Chi tiết bài viết - Mì Quảng Bà Mua',
            'blog' => $blog,
            'blognew' => $blognew,
            'countTotalComments' => $countComment,
            'comments' => $list_comment,
        ]);
    }
    public function latest_comment(Request $request)
    {
        $post_id = $request->blog_id;
        $blog = Post::where('id', $post_id)
        ->where('active', 1)
        ->with('postCategory')
        ->firstOrFail();

        $comments = PostComment::where('post_id', $post_id)->orderBy('id', 'DESC')->get();
        $comment_compoment = view('user.blog.compoments.comment_compoment', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Bình luận mới nhất!',
            'comment_compoment' => $comment_compoment,
            'code' => 200
        ]);
    }
    public function popular_comment(Request $request)
    {
        $post_id = $request->blog_id;
        $blog = Post::where('id', $post_id)
        ->where('active', 1)
        ->with('postCategory')
        ->firstOrFail();
        $comments = PostComment::where('post_id', $post_id)->orderBy('number_like', 'DESC')->get();
        $comment_compoment = view('user.blog.compoments.comment_compoment', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Bình luận nổi bậc nhất!',
            'comment_compoment' => $comment_compoment,
            'code' => 200
        ]);
    }
    public function load_Comment(Request $request)
    {
        $data = $request->all();
        $comment_number = 4;

        if($data['id'] > 0) {
            $list_comment = PostComment::where('post_id', $data['post_id'])->where('id', '<', $data['id'])->orderby('id', 'DESC')->take($comment_number)->get();
        } else {
            $list_comment = PostComment::where('post_id', $data['post_id'])->orderby('id', 'DESC')->take($comment_number)->get();
        }

        $output_comment = '';
        if (!$list_comment->isEmpty()) {
            foreach ($list_comment as $comment) {
                $last_id = $comment->id;
                $output_comment .='
                <li style="margin-top: 30px;">
                    <div class="comment">
                        <div class="comment-img">';
                        if ($comment->user->avatar) {
                        $output_comment .='
                            <img src="'. $comment->user->avatar .'" alt="img_error">';
                        }else{
                            $output_comment .='
                            <img src="' . asset('teamplate/img/user.png') . '" alt="img_error">';
                        }
                        $output_comment .='
                        </div>
                        <div class="comment-content comment_right">
                            <div class="comment-details">
                                <h6 class="comment-name">' . $comment->user->name . '</h6>
                                <span class="comment-log">' . $comment->created_at->locale('vi_VN')->diffForHumans() . '</span>
                            </div>

                            <div class="comment-desc">
                                <p>' . $comment->content . '</p>
                            </div>
                            <details class="media-option">
                                <summary role="button_dropdown">
                                    <a class="ripple-grow button_dropdown" id="dropdown" data-id_dropdown="' . $comment->id . '">
                                        <svg class="ripple-icon" width="28" height="28" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                            <g fill="currentColor">
                                                <circle cx="5" cy="12" r="2"></circle>
                                                <circle cx="12" cy="12" r="2"></circle>
                                                <circle cx="19" cy="12" r="2"></circle>
                                            </g>
                                        </svg>
                                    </a>
                                </summary>
                                <ul class="ul_dropdown">
                                    <li class="li_dropdown">
                                        <a href="#" class="a_dropdown">Chỉnh sửa</a>
                                    </li>
                                    <li class="li_dropdown">
                                        <a href="#" class="a_dropdown">Báo cáo</a>
                                    </li>
                                    <li class="li_dropdown">
                                        <a href="#" class="a_dropdown">Ẩn</a>
                                    </li>
                                </ul>
                            </details>
                        </div>
                    </div>
                    <div class="media-comment-footer">
                        <form method="POST" role="form">
                            ' . csrf_field() . '
                            <button type="button" data-id="' . $comment->id . '"
                            class="media-footer-option like" id="like-comment"
                                style="text-decoration: none;">';
                                if ($comment->likes->contains(Auth::user())) {
                                    $output_comment .='
                                    <span class="icon-bubble-content_{{ $comment->id }} active">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                        </svg>
                                    </span>';
                                } else {
                                    $output_comment .='
                                    <span class="icon-bubble-content_{{ $comment->id }}">
                                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg"xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path>
                                        </svg>
                                    </span>';
                                }
                                $output_comment .='
                                <span class="media-footer-option-text">' . $comment->number_like . '</span>
                            </button>
                        </form>

                        <!-- Button -->
                        <a class="media-footer-option repply btn_show_reply_form"
                            data-id="' . $comment->id . '" style="text-decoration: none;" onclick="show_reply()">
                            <span class="icon-bubble-content">
                                <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path>
                                </svg>
                            </span>
                            <span class="media-footer-option-text"> ' . $comment->replies->count() . ' </span> &nbsp;Phản hồi
                        </a>
 
                    </div>
                    <ul class="replied-to" id="show-list-reply" style="display: none;">
                        <div id="show-data-replies"></div>
                        <li>
                            <!-- Form -->
                            <div style="display: none; margin-left: 0.4em; margin-top: 20px;"
                            class="form_replies form_reply-' . $comment->id . '">
                                <div class="avatar">';
                                    if ($comment->user->avatar) {
                                        $output_comment .='
                                        <img src="'. $comment->user->avatar .'" alt="img_error">';
                                    }else{
                                        $output_comment .='
                                        <img src="' . asset('teamplate/img/user.png') . '" alt="img_error">';
                                    }
                                    $output_comment .='
                                </div>
                                <div class="comment_right clearfix" style="width: 85%;">
                                    <form method="POST" role="form">
                                    ' . csrf_field() . '
                                        <div class="form-group">
                                            <textarea class="form-control content_reply-' . $comment->id . '" rows="3"  placeholder="Nội dung trả lời..."></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" data-id="' . $comment->id . '" class="btn_1 mb-3 btn_reply">Trả lời</button>
                                            <button type="button" style="mar" class="btn_1b mb-3 close-reply-form">Huỷ</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>';
            }

            $output_comment .= '
            <div style="margin-top: 36px;">
                <button type="button" class="btn btn-primary form-control" data-id="' . $last_id . '" id="load_more_comment_button">
                    xem thêm
                </button>
            </div>';
        } else {
            $output_comment .= '
            <div style="margin-top: 36px;">
                <button type="button" class="btn btn-default form-control">
                    không còn bình luận nào
                </button>
            </div>
            ';
        }

        echo $output_comment;
    }

    public function load_Reply(Request $request)
    {

    }

    public function showComment()
    {
        return response()->json([
            'functions' => PostComment::where('parent_id', '0')->get(),
        ]);
    }

    //Danh mục
    public function category($id = '', $slug = '')
    {
        $blogCategories =  PostCategory::where('active', 1)->get();
        $blognew = Post::OrderBy('id', 'desc')->limit('3')->get();
        // $blogs = PostCategory::where('name', $name)->first()->blogs->toQuery()->paginate(6);
        $blogs = Post::where([['category_id', $id], ['active', 1]])->paginate(6);
        $title = 'Tin tức theo danh mục - Mì Quảng Bà Mua';
        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    }

    // Tìm kiếm
    public function searchAjax(Request $request)
    {
        $data = $request->all();

        if ($data['keywords']) {
            $searchs = Post::where('active', 1)->where('name', 'LIKE', '%' . $data['keywords'] . '%')->get();
            $output = '
            <ul class="dropdown-menu" style="display:block;">';
            foreach ($searchs as $key => $search) {
                $output .= '
                <li class="li_search_ajax"><p>' . $search->name . '</p></li>';
            }

            $output .= '</ul>';
            echo $output;
        }
    }
    public function search(Request $request)
    {
        $data   = $request->all();
        $search = $data['search'];
        $blogs  = Post::where('active', 1)
            ->where('name', 'LIKE', '%' . $search . '%')
            // ->OrWhere('description', 'LIKE', '%' .$search. '%')
            ->paginate(6);

        $blognew = Post::OrderBy('id', 'desc')->limit('3')->get();
        $blogCategories = PostCategory::where('active', 1)->get();
        $title = 'Tin tức - Mì Quảng Bà Mua';

        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    }

    public function postComment($post_id, BlogRequest $request)
    {
        $validation = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận'
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        } else {
            $user_id = Auth::id();
            $data = [
                'user_id' => $user_id,
                'post_id' => $post_id,
                'content' => $request->content,
                'active' => 1,
                // 'reply_id' => $request->reply_id ? $request->reply_id : 0,
            ];

            $comment = PostComment::create($data);
            return response()->json(['data' => $comment]);
            // }
        }

        return response()->json([
            'error' => $validation->errors()->first()]
        );
    }

    public function postReply(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'content_reply' => 'required',
        ], [
            'content_reply.required' => 'Vui lòng nhập nội dung trả lời'
        ]);


        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        } else {
            $data = [
                'user_id' => Auth::id(),
                'comment_id' => $request->comment_id,
                'content' => $request->content_reply,
                'active' => 1,
                // 'reply_id' => $request->reply_id ? $request->reply_id : 0,
            ];

            $reply = PostCommentReply::create($data);
            return response()->json(['data' => $reply]);
        }

        return response()->json(['error' => $validation->errors()->first()]);
    }

    public function postCommentLike(Request $request)
    {
        $id = $request->comment_like_id;
        $validation = Validator::make($request->all(), [
            'comment_like_id' => 'required',
        ], [
            'comment_like_id.required' => "Id không xác định!"
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        } else {

            $user = Auth::user();
            $comment = PostComment::find($id);
            $likeComment = $user->likedComments()->where('comment_id', $id)->count();
            if ($likeComment == 0) {
                $user->likedComments()->attach($id);
                $comment->number_like +=  1;
                $comment->save();
            } else {
                $user->likedComments()->detach($id);
                $comment->number_like -=  1;
                $comment->save();
            }

            return response()->json(['data' => $user]);
        }

        return response()->json(['error' => $validation->errors()->first()]);
    }

    public function postReplyLike(Request $request)
    {
        $id = $request->reply_like_id;
        $validation = Validator::make($request->all(), [
            'reply_like_id' => 'required',
        ], [
            'reply_like_id.required' => "ID null"
        ]);

        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        } else {

            $user = Auth::user();
            $reply = PostCommentReply::find($id);
            $likeReply = $user->likedReplies()->where('reply_id', $id)->count();
            if ($likeReply == 0) {
                $user->likedReplies()->attach($id);
                $reply->number_like +=  1;
                $reply->save();
            } else {
                $user->likedReplies()->detach($id);
                $reply->number_like -=  1;
                $reply->save();
            }

            return response()->json(['data' => $reply]);
        }

        return response()->json(['error' => $validation->errors()->first()]);
    }
}
