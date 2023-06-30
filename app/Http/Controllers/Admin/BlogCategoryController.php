<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\BlogCategoryRequest;
use App\Http\Services\BlogCategory\BlogCategoryService;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    protected $blogCategoryService;

    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    public function index()
    {
        return view('admin.blogCategory.list', [
            'title' => 'Danh Sách Danh Mục bài viết',
            'blogCategories' => $this->blogCategoryService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.BlogCategory.add', [
            'title' => 'Thêm Danh Mục Bài Viết Mới'
        ]);
    }

    public function store(BlogCategoryRequest $request)
    {
        $this->blogCategoryService->create($request);

        return redirect()->route('blog_categories.index');
    }

    public function show(PostCategory $blogCategory)
    {
        return view('admin.BlogCategory.edit', [
            'title' => 'Chỉnh Sửa Danh Mục: ' . $blogCategory->name,
            'blogCategory' => $blogCategory
        ]);
    }

    public function update(Request $request, PostCategory $BlogCategory)
    {
        $result = $this->blogCategoryService->update($request, $BlogCategory);
        if ($result) {
            return redirect()->route('blog_categories.index');
        }

        return redirect()->back();
    }

    public function destroy(Request $request) {
        $result = $this->blogCategoryService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
