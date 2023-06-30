<?php


namespace App\Http\Services\Blog;

use App\Models\Post;
use App\Models\PostComment; 
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

    public function get()
    {
        return Post::with('postCategory')->orderByDesc('id')->paginate(5);
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
    //End admin

    // Bài viết mới nhất
    public function blognew()
    {
        return Post::where('active', 1)->OrderBy('id', 'desc')->limit('3')->get();
    } 


    // Danh sách bài viết
    public function BlogList()
    {
        return Post::OrderBy('id', 'desc')->paginate(6);
    }

    // Chi tiết bài viết
    public function blogdetail($id) {
        return Post::find($id)->where('active', 1);
    }

    //Danh mục bài viết
    public function show($id)
    {
        return Post::where('id', $id)
            ->where('active', 1)
            ->with('postCategory')
            ->firstOrFail();
    }  

    public function show_comment($id)
    {
        return PostComment::where('id', $id)
            ->where('active', 1) 
            ->firstOrFail();
    }
}