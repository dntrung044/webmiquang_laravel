<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Services\About\AboutService;
use App\Models\Aboutus;
use App\Models\Gallery;
use Illuminate\Support\Facades\Request;

class AboutUsController extends Controller
{ 
    protected $about;

    public function __construct(AboutService $about)
    {
        $this->about = $about;
    }

    public function index()
    {  
        $aboutus =  Aboutus::get();
        $about = $this->about->abouthome();
        $galleries = Gallery::OrderBy('id', 'desc')->where('active', 1)->paginate(9);
        $title ='Về nhà hàng - Mì Quảng Bà Mua';
        
        return view('user.aboutus.index', compact('aboutus', 'title', 'galleries'));
    }

}
