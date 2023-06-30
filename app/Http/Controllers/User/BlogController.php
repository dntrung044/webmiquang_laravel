<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Http\Services\Blog\BlogService;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = Post::OrderBy('id', 'desc')->where('active', 1)->paginate(6);
        $blognew = $this->blogService->blognew();
        $blogCategories = PostCategory::where('active', 1)->get();
        $title = 'Tin tức - Mì Quảng Bà Mua';

        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    }

    // Trang chi tiết
    public function detail($id = '', $slug = '')
    {
        $comment_number = 7;
        $blog = $this->blogService->show($id); 
        $blog->view = $blog->view + 1;
        $blog->save();

        $blognew = $this->blogService->blognew();
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
        $blognew = $this->blogService->blognew();
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
        $blognew = $this->blogService->blognew();
        $blogCategories = PostCategory::where('active', 1)->get();
        $title = 'Tin tức - Mì Quảng Bà Mua';

        return view('user.blog.list', compact('blogs', 'title', 'blognew', 'blogCategories'));
    } 

    public function latest_comment(Request $request)
    { 
        $post_id = $request->blog_id;  
        $blog = $this->blogService->show( $post_id ); 
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
        $blog = $this->blogService->show( $post_id );  
        $comments = PostComment::where('post_id', $post_id)->orderBy('number_like', 'DESC')->get();
        $comment_compoment = view('user.blog.compoments.comment_compoment', compact('comments', 'blog'))->render();
        
        return response()->json([
            'success' => 'Bình luận nổi bậc nhất!', 
            'comment_compoment' => $comment_compoment,
            'code' => 200
        ]);   
    }
    
    public function load_comment(Request $request)
    { 
        $post_id = $request->blog_id;
        $last_id = $request->last_id;
        $currentCount = $request->currentCount; 
              
        $blog = $this->blogService->show( $post_id ); 
        $comments  = PostComment::where('post_id',$post_id)->where('id', '<', $last_id)->orderby('id', 'DESC')->limit($currentCount)->get();

        $comment_compoment = view('user.blog.compoments.comment_compoment', compact('comments', 'blog'))->render();
        
        return response()->json([   
            'success' => 'Xem thêm bình luận!',
            'comment_compoment' => $comment_compoment,  
            'comments' => $comments,
            'code' => 200
        ]);   
    }

    public function load_reply(Request $request)
    { 
        $comment_id = $request->comment_id;
        $last_id = $request->last_id;
        $currentCount = $request->currentCount;  
   
        $comments  = PostComment::where('id', $comment_id)
                    ->where('active', 1) 
                    ->firstOrFail(); 
        
        // PostComment::where('comment_id',$comment_id)
        //             ->where('id', '<', $last_id)
        //             ->orderby('id', 'DESC')
        //             ->limit($currentCount)->get(); 
        foreach ($comments as $key => $comment) {
            $replies = $comment->replies->where('id', '<', $last_id)
            ->orderby('id', 'DESC')
            ->limit($currentCount)->get(); 
        }
        $reply_compoment = view('user.blog.compoments.reply_compoment', compact('replies'))->render();
        
        return response()->json([   
            'success' => 'Xem thêm bình luận!',
            'reply_compoment' => $reply_compoment,  
            'replies' => $replies,
            'code' => 200
        ]);   
    }

    public function add_Comment(Request $request)
    {
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

        $blog = $this->blogService->show( $request->post_id ); 
        $comments = $blog->comments; 
        $comment_compoment = view('user.blog.compoments.comment_compoment', compact('comments', 'blog'))->render();

        return response()->json([
            'success' => 'Bình luận bài viết thành công!', 
            'comment_compoment' => $comment_compoment, 
            'code' => 200
        ]); 
    } 

    public function add_Reply(Request $request)
    {
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
            $reply->comment_id = $request->id;
            $reply->content = $request->content; 
            $reply->active = 1; 
            $reply->save();    
        } 
       
        $blog = $this->blogService->show( $request->post_id ); 
        $comments = $blog->comments;  
        $comment = $this->blogService->show_comment( $request->id ); 
        $replies = $comment->replies; 
        $comment_compoment = view('user.blog.compoments.comment_compoment', compact('comments', 'blog','replies'))->render();

        return response()->json([
            'success' => 'Trả lời bình luận thành công!', 
            'comment_compoment' => $comment_compoment,
            'code' => 200]); 
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
            'commentLiked' => $likeComment,
            'likeCount' => $comment->number_like,
            'code' => 200
        ]); 
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
            // foreach($validation->messages()->getMessages() as $field_name => $messages)
            // {
            //     $error_array[] = $messages;
            // }
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