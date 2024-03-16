<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProductComment;

class ProductCommentController extends Controller
{
    // Cmt
    public function index()
    {
        $getCMT = ProductComment::orderByDesc('id')->get();

        return view('admin.productCMT.list', [
            'title' => 'Danh Sách Bình luận Món Ăn',
            'productsCMT' => $getCMT
        ]);
    }

    public function activeCmt($productcomment)
    {
        $productsCMT = ProductComment::find($productcomment);

        $productsCMT->active = ProductComment::ACTIVE_DONE;
        $productsCMT->save();

        return redirect()->back()->with('success', 'Xử lý trang thái bình luận món ăn thành công');
    }
    public function inactiveCmt($productcomment)
    {
        $productsCMT = ProductComment::find($productcomment);

        $productsCMT->active = ProductComment::ACTIVE_NOT_DEFAULT;
        $productsCMT->save();

        return redirect()->back()->with('success', 'Xử lý trang thái bình luận món ăn thành công');
    }
}
