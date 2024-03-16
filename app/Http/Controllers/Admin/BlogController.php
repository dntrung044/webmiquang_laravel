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
            'title' => 'Danh Sách Bài Viết Mới Nhất',
            'blogs' => $this->blogService->get()
        ]);
    }

    public function create()
    {
        return view('admin.blog.add', [
           'title' => 'Thêm Bài viết mới',
           'blogs' => $this->blogService->getCategoryBlog()
        ]);
    }

    public function store(BlogRequest $request)
    {
        $this->blogService->insert($request);
        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('admin.blog.edit', [
            'title' => 'Chỉnh Sửa Bài viết',
            'post' => $post,
            // 'Blogs' => $this->blogService->getCategoryBlog()
            'postCategories' => $this->blogService->getCategoryBlog()
        ]);
    }


    public function update(Request $request, Post $post)
    {
        $result = $this->blogService->update($request, $post);
        if ($result) {
            return redirect()->route('posts.index');
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
