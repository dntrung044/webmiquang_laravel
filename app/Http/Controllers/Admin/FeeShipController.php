<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Feeship;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeeShipController extends Controller
{

    public function index()
    {

        $feeship = Feeship::orderbyDesc('id')->paginate(5);
        return view('admin.feeship.list', [
            'title' => 'Danh Sách Phí Vận Chuyển Mới Nhất',
            'feeships'=> $feeship
        ]);
    }


    public function create()
    {
        $district = District::orderby('id', 'ASC')->get();
        return view('admin.feeship.add', [
           'title' => 'Thêm Phí Vận Chuyển mới',
           'districts' => $district
        ]);
    }

    public function add_address(Request $request)
    {
        $data = $request->all();
        $output ='';
        $data['action'] == "district" ;
        $select = Ward::where('district_name', $data['district_name'])->get();
        $output.='<option>---Chọn xã/phường---</option>';
        foreach ($select as $key => $ward){
            $output.='<option value="'.$ward->name.'">'.$ward->name.'</option>';
        }

        echo  $output;
    }

    public function store(Request $request)
    {
        // var district = $('.district').val();
        // var ward = $('.ward').val();
        // var _token = $('input[name="_token"]').val();
        // var feeship = $('.feeship').val();

        $this->validate($request, [
            'district' => 'required',
            'ward' => 'required',
            'feeship'   => 'required',
        ]);

        Feeship::create($request->input());
        Session::flash('success', 'Thêm phí vận chuyển thành công');
        return redirect()->route('feeships.index');
    }
}
