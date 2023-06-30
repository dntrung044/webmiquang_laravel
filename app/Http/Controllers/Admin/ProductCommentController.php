<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProductComment;
use Illuminate\Http\Request;

class ProductCommentController extends Controller
{
    // Cmt
    public function listProductCmt()
    {
        $getCMT = ProductComment::orderByDesc('id')->paginate(8);

        return view('admin.productCMT.list', [
            'title' => 'Danh Sách Bình luận Món Ăn',
            'productsCMT' => $getCMT
        ]);
    }

    // Trạng thái Cmt
    public function activeCmt($productcomment)
    {
        $productsCMT = ProductComment::find($productcomment);

        $productsCMT->active = ProductComment::ACTIVE_DONE;
        $productsCMT->save();

        return redirect()->back()->with('success', 'Xử lý trang thái bình luận món ăn thành công');
    }

    // Trạng thái CMT
    public function inactiveCmt($productcomment)
    {
        $productsCMT = ProductComment::find($productcomment);

        $productsCMT->active = ProductComment::ACTIVE_NOT_DEFAULT;
        $productsCMT->save();

        return redirect()->back()->with('success', 'Xử lý trang thái bình luận món ăn thành công');
    }
}
