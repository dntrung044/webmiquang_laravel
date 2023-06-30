<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $posts = Blog::where('active', 1)->get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận bài viết thành công',
            'post' => $posts
        ]);
    }
}
