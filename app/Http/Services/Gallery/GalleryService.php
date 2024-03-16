<?php


namespace App\Http\Services\Gallery;

use App\Models\Gallery;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryService
{
    public function insert($request)
    {
        try {
            #$request->except('_token');
            Gallery::create($request->input());
            Session::flash('success', 'Thêm ảnh mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm ảnh lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function get()
    {
        return Gallery::orderByDesc('id')->get();
    }

    public function update($request, $gallery)
    {
        try {
            $gallery->fill($request->input());
            $gallery->save();
            Session::flash('success', 'Cập nhật ảnh thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật ảnh lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $gallery = Gallery::where('id', $request->input('id'))->first();
        if ($gallery) {
            $path = str_replace('storage', 'public', $gallery->thumb);
            Storage::delete($path);
            $gallery->delete();
            return true;
        }

        return false;
    }
// home main
    public function show()
    {
        return Gallery::where('active', 1)->orderBy('id')->get();
    }
}
