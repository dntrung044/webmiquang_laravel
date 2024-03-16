<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Gallery\GalleryService;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $gallery;

    public function __construct(GalleryService $gallery)
    {
        $this->gallery = $gallery;
    }

    public function index()
    {
        return view('admin.gallery.list', [
            'title' => 'Danh Sách Thư viện hình ảnh Mới Nhất',
            'galleries' => $this->gallery->get()
        ]);
    }

    public function add()
    {
        return view('admin.gallery.add', [
           'title' => 'Thêm ảnh mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'thumb' => 'required'
        ]);

        $this->gallery->insert($request);

        return redirect()->route('galleries.index');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.edit', [
            'title' => 'Chỉnh Sửa Hình Ảnh Thư Viện',
            'gallery' => $gallery
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'thumb' => 'required'
        ]);

        $result = $this->gallery->update($request, $gallery);
        if ($result) {
            return redirect()->route('galleries.index');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->gallery->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công hình ảnh'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
