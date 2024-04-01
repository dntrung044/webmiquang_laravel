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

        $feeship = Feeship::orderbyDesc('id')->get();
        return view('admin.feeship.list', [
            'title' => 'Danh Sách Phí Vận Chuyển Mới Nhất',
            'feeships'=> $feeship
        ]);
    }

    public function create()
    {
        $district = District::get();
        return view('admin.feeship.add', [
           'title' => 'Thêm Phí Vận Chuyển mới',
           'districts' => $district
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'district_id' => 'required',
            'ward_id' => 'required',
            'feeship'   => 'required',
        ]);

        Feeship::create($request->input());
        Session::flash('success', 'Thêm phí vận chuyển thành công');
        return redirect()->route('feeships.index');
    }

    public function show(Feeship $feeship)
    {
        return view('admin.feeship.edit', [
            'title' => 'Chỉnh Sửa Danh Mục:',
            'feeship' => $feeship,
            'districts' => District::get(),
            'ward' => Ward::get(),
        ]);
    }

    public function update(Feeship $feeship, Request $request)
    {
        $feeship->fill($request->input());
        $result =  $feeship->save();
        if ($result) {
            return redirect()->route('feeships.index');
        }
        return redirect()->back();
    }

    public function load_address(Request $request)
    {
        $data = $request->all();
        $output ='';
        $data['action'] == "district" ;

        $select = Ward::where('district_id', $data['district_id'])->get();
        $output.='<option>---Chọn xã/phường---</option>';
        foreach ($select as $d){
            $output.='<option value="'.$d->id.'">'.$d->name.'</option>';
        }
         return response()->json(['html' => $output]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $feeship = Feeship::where('id', $id)->first();
        if ($feeship) {
            $feeship ->delete();
            return response()->json([
                'error' => false,
                'message' => 'Xóa Thành Công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
