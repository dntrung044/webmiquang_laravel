<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Post::OrderBy('id', 'desc')->where('active', 1)->paginate(6);
        $blognew = Post::where('active', 1)->get();
        $blogCategories = PostCategory::where('active', 1)->get();
        $title = 'Tin tức - Mì Quảng Bà Mua';

        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    }

    // Trang chi tiết
    public function detail($id = '', $slug = '')
    {
        $comment_number = 7;
        $blog = Post::where('id', $id)
                ->where('active', 1)
                ->with('postCategory')
                ->firstOrFail();
        $blog->view = $blog->view + 1;
        $blog->save();
        $blognew = Post::where('active', 1)->get();
        $countComment = PostComment::where('post_id', $id)->where('active', 1)->count();
        $list_comment = PostComment::where('post_id',$id)->orderby('id', 'DESC')->take($comment_number)->get();

        return view('user.blog.detail', [
            'title' => 'Chi tiết bài viết - Mì Quảng Bà Mua',
            'blog' => $blog,
            'blognew' => $blognew,
            'countTotalComments' => $countComment,
            'comments' => $list_comment,
        ]);
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
        $blognew = Post::where('active', 1)->get();
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
        $blognew = Post::where('active', 1)->get();
        $blogCategories = PostCategory::where('active', 1)->get();
        $title = 'Tin tức - Mì Quảng Bà Mua';

        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    }

    public function latest_comment(Request $request)
    {
        $post_id = $request->blog_id;
        $blog = Post::where('id', $post_id)
                ->where('active', 1)
                ->with('postCategory')
                ->firstOrFail();
        $comments = PostComment::where('post_id', $post_id)->orderBy('id', 'DESC')->get();
        $comment_component = view('user.blog.components.comment_component', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Bình luận mới nhất!',
            'comment_component' => $comment_component,
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
        $comment_component = view('user.blog.components.comment_component', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Bình luận nổi bậc nhất!',
            'comment_component' => $comment_component,
            'code' => 200
        ]);
    }

    public function load_comment(Request $request)
    {
        $post_id = $request->blog_id;
        $last_id = $request->last_id;
        $currentCount = $request->currentCount;

        $blog = Post::where('id', $post_id)
                ->where('active', 1)
                ->with('postCategory')
                ->firstOrFail();
        $comments  = PostComment::where('post_id',$post_id)->where('id', '<', $last_id)->orderby('id', 'DESC')->limit($currentCount)->get();

        $comment_component = view('user.blog.components.comment_component', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Xem thêm bình luận!',
            'comment_component' => $comment_component,
            'comments' => $comments,
            'code' => 200
        ]);
    }

    public function add_comment(Request $request)
    {
        $post_id = $request->post_id;
        $validation = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Vui lòng nhập nội dung bình luận'
        ]);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        }
        else {
            $comment = new PostComment();
            $comment->user_id =  Auth::id();
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->reply_id =  $request->reply_id ? $request->reply_id : 0;
            $comment->active = 1;
            $comment->save();
        }

        $blog = Post::where('id', $post_id)
                ->where('active', 1)
                ->with('postCategory')
                ->firstOrFail();
        $comments = $blog->comments;
        $comment_component = view('user.blog.components.comment_component', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Bình luận bài viết thành công!',
            'comment_component' => $comment_component,
            'code' => 200
        ]);
    }

    public function add_reply(Request $request)
    {
        $post_id = $request->post_id;
        $comment_id = $request->comment_id;
        $validation = Validator::make($request->all(), [
            'content' => 'required',
        ], [
            'content.required' => 'Vui lòng nhập nội dung trả lời!'
        ]);
        if ($validation->fails()) {
            return response()->json(['error' => $validation->errors()->first()]);
        }
        else {
            $reply = new PostCommentReply();
            $reply->user_id =  Auth::id();
            $reply->comment_id = $comment_id;
            $reply->content = $request->content;
            $reply->active = 1;
            $reply->save();
        }
        $blog = Post::where('id', $post_id)
                ->where('active', 1)
                ->with('postCategory')
                ->firstOrFail();


        $comments = $blog->comments;
        $reply_component = view('user.blog.components.comment_component', compact('comments', 'blog'))->render();


        return response()->json([
            'success' => 'Trả lời bình luận thành công!',
            'reply_component' => $reply_component,
            'code' => 200,
        ]);
    }

    public function postCommentLike(Request $request)
    {
        $id = $request->id_comment;
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

        return response()->json([
            'success' => 'Cập nhập thích bình luận thành công!',
            'likeComment' => $likeComment,
            'like_count' => $comment->number_like,
            'code' => 200
        ]);
    }

    public function postReplyLike(Request $request)
    {
            $id = $request->id_reply;
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

            return response()->json([
                'success' => 'Thích trả lời thành công!',
                'likeReply' => $likeReply,
                'like_count' => $reply->number_like,
                'code' => 200
            ]);
    }
}
