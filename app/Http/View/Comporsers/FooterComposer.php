<?php


namespace App\Http\View\Composers;

use App\Models\Aboutus;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class FooterComposer
{

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $aboutus = Aboutus::all();

        $view->with('aboutus', $aboutus);
    }
}
