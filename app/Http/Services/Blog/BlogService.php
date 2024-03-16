<?php


namespace App\Http\Services\Blog;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class BlogService
{
    public function getCategoryBlog()
    {
        return PostCategory::get();
    }
    public function get()
    {
        return Post::with('postCategory')->orderByDesc('id')->get();
    }
    public function insert($request)
    {
        try {
            $request->except('_token');
            // dd($request->input());
            Post::create($request->all());
            Session::flash('success', 'Thêm bài viết mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm bài viết Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function update($request, $blog)
    {
        try {
            $blog->fill($request->input());
            $blog->save();
            Session::flash('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật bài viết Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function destroy($request)
    {
        $blog = Post::where('id', $request->input('id'))->first();
        if ($blog) {
            $path = str_replace('storage', 'public', $blog->image);
            Storage::delete($path);
            $blog->delete();
            return true;
        }

        return false;
    }

    // public function searchpost()
    // {
    //     $tukhoa = $_GET['tukhoa'];
    //     return Post::where('title', 'LIKE', '%' .$tukhoa. '%')
    //     ->OrWhere('description', 'LIKE', '%' .$tukhoa. '%')
    //     ->get();
    // }
    // public function search(Request $request)
    // {
    //     $search = $request->search ?? '';

    //     return Post::where('title', 'like', '%' .$search. '%');;
    // }


    // Danh sách bài viết
    public function BlogList()
    {
        return Post::OrderBy('id', 'desc')->paginate(6);
    }

    // Chi tiết bài viết
    public function blogdetail($id) {
        return Post::find($id)->where('active', 1);
    }

}
