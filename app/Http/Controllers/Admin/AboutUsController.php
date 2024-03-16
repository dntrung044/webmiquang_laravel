<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\About\AboutService;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    protected $about;

    public function __construct(AboutService $about)
    {
        $this->about = $about;
    }

    public function index()
    {
        return view('admin.aboutus.list', [
            'title' => 'Thông tin cửa hàng',
            'abouts' => $this->about->get()
        ]);
    }

    public function edit($id)
    {
        $about = Aboutus::where('id', $id)->get();
        return view('admin.aboutus.edit', [
            'title' => 'Chỉnh Sửa bài viết giới thiệu cửa hàng',
            'ab' => $about
        ]);
    }

    public function update(Request $request, Aboutus $about)
    {
        $this->validate($request, [
            'description' => 'required',
            'address' => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'openH' => 'required',
            'map'   => 'required'
        ]);

        $result = $this->about->update($request, $about);
        if ($result) {
            return redirect()->route('abouts.index');
        }

        return redirect()->back();
    }
}
