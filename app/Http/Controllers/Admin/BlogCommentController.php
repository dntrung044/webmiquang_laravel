<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostComment;
use App\Models\PostCommentReply;
use App\Models\ProductComment;

class BlogCommentController extends Controller
{
    public function index()
    {
        $getCMT = PostComment::orderByDesc('id')->get();
        $getCMTreply = PostCommentReply::orderByDesc('id')->get();

        return view('admin.blogCMT.list', [
            'title' => 'Danh Sách Bình luận Bài Viết',
            'comments' => $getCMT,
            'replies' => $getCMTreply,
        ]);
    }

    public function activeCmt($postcomment)
    {
        $pCMT = PostComment::find($postcomment);

        $pCMT->active = PostComment::ACTIVE_DONE;
        $pCMT->save();

        return redirect()->back()->with('success', 'Xử lý trang thái bình luận bài viết thành công');
    }
    public function inactiveCmt($postcomment)
    {
        $postcomments = PostComment::find($postcomment);

        $postcomments->active = PostComment::ACTIVE_NOT_DEFAULT;
        $postcomments->save();

        return redirect()->back()->with('success', 'Xử lý trang thái bình luận bài viết thành công');
    }
}
