<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogRequest;
use App\Http\Services\Blog\BlogService;
use App\Models\Post;
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
        return view('admin.blog.list', [
            'titles' => 'Danh Sách Bài Viết Mới Nhất',
            'blogs' => $this->blogService->get()
        ]);
    }


    public function create()
    {
        return view('admin.blog.add', [
           'titles' => 'Thêm Bài viết mới',
           'blogs' => $this->blogService->getCategoryBlog()
        ]);
    }

    public function store(BlogRequest $request)
    {
        $this->blogService->insert($request);
        return redirect()->route('post.index');
    }

    public function show(Post $blog)
    {
        return view('admin.blog.edit', [
            'titles' => 'Chỉnh Sửa Bài viết',
            'blog' => $blog,
            // 'Blogs' => $this->blogService->getCategoryBlog()
            'blogCategories' => $this->blogService->getCategoryBlog()
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $result = $this->blogService->update($request, $post);
        if ($result) {
            return redirect()->route('post.index');
        }
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->blogService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài viết'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
