<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // dd($requset->all());die();
        $products = Product::all();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách món ăn thành công',
            'product' => $products
        ]);
    }

    public function noodles(){
        $product = 5;
        $products = Product::where('cat_id', $product)->get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách Mì Quảng thành công',
            'product' => $products
        ]);
    }

    public function Latest(){
        $products = Product::OrderBy('id', 'desc')->get();
        return response()->json([
            'success' => 1,
            'message' => 'Nhận danh sách món ăn mới thành công',
            'product' => $products
        ]);
    }

    public function jsonWard(){
        return response()->json([
           '
            [
                {
                    "name": "Phường Hòa Hiệp Bắc",
                    "code": 20194,
                    "division_type": "phường",
                    "codename": "phuong_hoa_hiep_bac",
                    "district_code": 490
                },
                {
                "name": "Phường Hòa Hiệp Nam",
                "code": 20195,
                "division_type": "phường",
                "codename": "phuong_hoa_hiep_nam",
                "district_code": 490
                },
                {
                "name": "Phường Hòa Khánh Bắc",
                "code": 20197,
                "division_type": "phường",
                "codename": "phuong_hoa_khanh_bac",
                "district_code": 490
                },
                {
                "name": "Phường Hòa Khánh Nam",
                "code": 20198,
                "division_type": "phường",
                "codename": "phuong_hoa_khanh_nam",
                "district_code": 490
                },
                {
                "name": "Phường Hòa Minh",
                "code": 20200,
                "division_type": "phường",
                "codename": "phuong_hoa_minh",
                "district_code": 490
                }

                {
                "name": "Phường Tam Thuận",
                "code": 20203,
                "division_type": "phường",
                "codename": "phuong_tam_thuan",
                "district_code": 491
                },
                {
                "name": "Phường Thanh Khê Tây",
                "code": 20206,
                "division_type": "phường",
                "codename": "phuong_thanh_khe_tay",
                "district_code": 491
                },
                {
                "name": "Phường Thanh Khê Đông",
                "code": 20207,
                "division_type": "phường",
                "codename": "phuong_thanh_khe_dong",
                "district_code": 491
                },
                {
                "name": "Phường Xuân Hà",
                "code": 20209,
                "division_type": "phường",
                "codename": "phuong_xuan_ha",
                "district_code": 491
                },
                {
                "name": "Phường Tân Chính",
                "code": 20212,
                "division_type": "phường",
                "codename": "phuong_tan_chinh",
                "district_code": 491
                },
                {
                "name": "Phường Chính Gián",
                "code": 20215,
                "division_type": "phường",
                "codename": "phuong_chinh_gian",
                "district_code": 491
                },
                {
                "name": "Phường Vĩnh Trung",
                "code": 20218,
                "division_type": "phường",
                "codename": "phuong_vinh_trung",
                "district_code": 491
                },
                {
                "name": "Phường Thạc Gián",
                "code": 20221,
                "division_type": "phường",
                "codename": "phuong_thac_gian",
                "district_code": 491
                },
                {
                "name": "Phường An Khê",
                "code": 20224,
                "division_type": "phường",
                "codename": "phuong_an_khe",
                "district_code": 491
                },
                {
                "name": "Phường Hòa Khê",
                "code": 20225,
                "division_type": "phường",
                "codename": "phuong_hoa_khe",
                "district_code": 491
                }

                {
                "name": "Phường Thanh Bình",
                "code": 20227,
                "division_type": "phường",
                "codename": "phuong_thanh_binh",
                "district_code": 492
                },
                {
                "name": "Phường Thuận Phước",
                "code": 20230,
                "division_type": "phường",
                "codename": "phuong_thuan_phuoc",
                "district_code": 492
                },
                {
                "name": "Phường Thạch Thang",
                "code": 20233,
                "division_type": "phường",
                "codename": "phuong_thach_thang",
                "district_code": 492
                },
                {
                "name": "Phường Hải Châu I",
                "code": 20236,
                "division_type": "phường",
                "codename": "phuong_hai_chau_i",
                "district_code": 492
                },
                {
                "name": "Phường Hải Châu II",
                "code": 20239,
                "division_type": "phường",
                "codename": "phuong_hai_chau_ii",
                "district_code": 492
                },
                {
                "name": "Phường Phước Ninh",
                "code": 20242,
                "division_type": "phường",
                "codename": "phuong_phuoc_ninh",
                "district_code": 492
                },
                {
                "name": "Phường Hòa Thuận Tây",
                "code": 20245,
                "division_type": "phường",
                "codename": "phuong_hoa_thuan_tay",
                "district_code": 492
                },
                {
                "name": "Phường Hòa Thuận Đông",
                "code": 20246,
                "division_type": "phường",
                "codename": "phuong_hoa_thuan_dong",
                "district_code": 492
                },
                {
                "name": "Phường Nam Dương",
                "code": 20248,
                "division_type": "phường",
                "codename": "phuong_nam_duong",
                "district_code": 492
                },
                {
                "name": "Phường Bình Hiên",
                "code": 20251,
                "division_type": "phường",
                "codename": "phuong_binh_hien",
                "district_code": 492
                },
                {
                "name": "Phường Bình Thuận",
                "code": 20254,
                "division_type": "phường",
                "codename": "phuong_binh_thuan",
                "district_code": 492
                },
                {
                "name": "Phường Hòa Cường Bắc",
                "code": 20257,
                "division_type": "phường",
                "codename": "phuong_hoa_cuong_bac",
                "district_code": 492
                },
                {
                "name": "Phường Hòa Cường Nam",
                "code": 20258,
                "division_type": "phường",
                "codename": "phuong_hoa_cuong_nam",
                "district_code": 492
                }

                {
                "name": "Phường Thọ Quang",
                "code": 20263,
                "division_type": "phường",
                "codename": "phuong_tho_quang",
                "district_code": 493
                },
                {
                "name": "Phường Nại Hiên Đông",
                "code": 20266,
                "division_type": "phường",
                "codename": "phuong_nai_hien_dong",
                "district_code": 493
                },
                {
                "name": "Phường Mân Thái",
                "code": 20269,
                "division_type": "phường",
                "codename": "phuong_man_thai",
                "district_code": 493
                },
                {
                "name": "Phường An Hải Bắc",
                "code": 20272,
                "division_type": "phường",
                "codename": "phuong_an_hai_bac",
                "district_code": 493
                },
                {
                "name": "Phường Phước Mỹ",
                "code": 20275,
                "division_type": "phường",
                "codename": "phuong_phuoc_my",
                "district_code": 493
                },
                {
                "name": "Phường An Hải Tây",
                "code": 20278,
                "division_type": "phường",
                "codename": "phuong_an_hai_tay",
                "district_code": 493
                },
                {
                "name": "Phường An Hải Đông",
                "code": 20281,
                "division_type": "phường",
                "codename": "phuong_an_hai_dong",
                "district_code": 493
                }

                {
                "name": "Phường Mỹ An",
                "code": 20284,
                "division_type": "phường",
                "codename": "phuong_my_an",
                "district_code": 494
                },
                {
                "name": "Phường Khuê Mỹ",
                "code": 20285,
                "division_type": "phường",
                "codename": "phuong_khue_my",
                "district_code": 494
                },
                {
                "name": "Phường Hoà Quý",
                "code": 20287,
                "division_type": "phường",
                "codename": "phuong_hoa_quy",
                "district_code": 494
                },
                {
                "name": "Phường Hoà Hải",
                "code": 20290,
                "division_type": "phường",
                "codename": "phuong_hoa_hai",
                "district_code": 494
                }


                {
                "name": "Phường Khuê Trung",
                "code": 20260,
                "division_type": "phường",
                "codename": "phuong_khue_trung",
                "district_code": 495
                },
                {
                "name": "Phường Hòa Phát",
                "code": 20305,
                "division_type": "phường",
                "codename": "phuong_hoa_phat",
                "district_code": 495
                },
                {
                "name": "Phường Hòa An",
                "code": 20306,
                "division_type": "phường",
                "codename": "phuong_hoa_an",
                "district_code": 495
                },
                {
                "name": "Phường Hòa Thọ Tây",
                "code": 20311,
                "division_type": "phường",
                "codename": "phuong_hoa_tho_tay",
                "district_code": 495
                },
                {
                "name": "Phường Hòa Thọ Đông",
                "code": 20312,
                "division_type": "phường",
                "codename": "phuong_hoa_tho_dong",
                "district_code": 495
                },
                {
                "name": "Phường Hòa Xuân",
                "code": 20314,
                "division_type": "phường",
                "codename": "phuong_hoa_xuan",
                "district_code": 495
                }

                {
                "name": "Xã Hòa Bắc",
                "code": 20293,
                "division_type": "xã",
                "codename": "xa_hoa_bac",
                "district_code": 497
                },
                {
                "name": "Xã Hòa Liên",
                "code": 20296,
                "division_type": "xã",
                "codename": "xa_hoa_lien",
                "district_code": 497
                },
                {
                "name": "Xã Hòa Ninh",
                "code": 20299,
                "division_type": "xã",
                "codename": "xa_hoa_ninh",
                "district_code": 497
                },
                {
                "name": "Xã Hòa Sơn",
                "code": 20302,
                "division_type": "xã",
                "codename": "xa_hoa_son",
                "district_code": 497
                },
                {
                "name": "Xã Hòa Nhơn",
                "code": 20308,
                "division_type": "xã",
                "codename": "xa_hoa_nhon",
                "district_code": 497
                },
                {
                "name": "Xã Hòa Phú",
                "code": 20317,
                "division_type": "xã",
                "codename": "xa_hoa_phu",
                "district_code": 497
                },
                {
                "name": "Xã Hòa Phong",
                "code": 20320,
                "division_type": "xã",
                "codename": "xa_hoa_phong",
                "district_code": 497
                },
                {
                    "name": "Xã Hòa Châu",
                    "code": 20323,
                    "division_type": "xã",
                    "codename": "xa_hoa_chau",
                    "district_code": 497
                },

                {
                    "name": "Xã Hòa Tiến",
                    "code": 20326,
                    "division_type": "xã",
                    "codename": "xa_hoa_tien",
                    "district_code": 497
                },

                {
                    "name": "Xã Hòa Phước",
                    "code": 20329,
                    "division_type": "xã",
                    "codename": "xa_hoa_phuoc",
                    "district_code": 497
                },

                {
                    "name": "Xã Hòa Khương",
                    "code": 20332,
                    "division_type": "xã",
                    "codename": "xa_hoa_khuong",
                    "district_code": 497
                }
            ]




        ']);
    }
}
