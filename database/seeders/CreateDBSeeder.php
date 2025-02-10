<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateDBSeeder extends Seeder
{
    public function run()
    {
        // Insert About Us Information
        DB::table('aboutus')->insert([
            'id'          => 1,
            'description' => "<h1>MỲ QUẢNG BÀ MUA - <strong>Niềm Tự Hào Xứ Quảng</strong></h1>...",
            'address'     => '✩40 Ngũ Hành Sơn, TP. Đà Nẵng (đầu cầu Trần Thị Lý)',
            'email'       => 'theduongbamua1@gmail.com',
            'phone'       => '0905 005 773',
            'openH'       => '10 giờ - 21 giờ',
            'thumb'       => '/storage/uploads/2021/12/14/my-quang-ba-mua-2.jpg',
            'map'         => 'https://www.google.com/maps/embed?...',
            'linkYT'      => 'https://www.youtube.com/watch?v=6E25jKwN4Nw',
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // Insert Gallery Images
        $galleries = [
            ['id' => 1, 'thumb' => '/storage/uploads/2022/01/11/117950931-733146313923989-1517350468444567382-n-640x360.jpg', 'active' => 0],
            ['id' => 3, 'thumb' => '/storage/uploads/2022/01/11/3.jpg', 'active' => 1],
            ['id' => 4, 'thumb' => '/storage/uploads/2022/01/11/5.jpg', 'active' => 0],
            ['id' => 5, 'thumb' => '/storage/uploads/2022/01/11/7.jpg', 'active' => 1],
            ['id' => 6, 'thumb' => '/storage/uploads/2022/01/11/8.jpg', 'active' => 1],
            ['id' => 7, 'thumb' => '/storage/uploads/2022/01/11/9.jpg', 'active' => 0],
            ['id' => 10, 'thumb' => '/storage/uploads/2022/01/11/10.jpg', 'active' => 1],
            ['id' => 11, 'thumb' => '/storage/uploads/2022/01/11/11.jpg', 'active' => 1],
        ];

        foreach ($galleries as &$gallery) {
            $gallery['created_at'] = now();
            $gallery['updated_at'] = now();
        }
        DB::table('galleries')->insert($galleries);

        DB::table('sliders')->insert([
            [
                'id' => 2,
                'name' => 'Chào mừng bạn<br> đến với mì Quảng - Bà Mua',
                'url' => '/gioi-thieu',
                'thumb' => '/storage/uploads/2022/01/09/9.jpg',
                'sort_by' => 1,
                'active' => 1,
                'description' => 'Các địa điểm nhà hàng chúng tôi sau để thưởng :<br>
                19 Trần Bình Trọng - Đà Nẵng <br>
                44 Lê Đình Dương - Đà Nẵng<br>
                231 Đống Đa - Đà Nẵng<br>
                259 Hồ Nghinh - Đà Nẵng',
                'button' => 'Về cửa hàng',
                'created_at' => '2021-12-18 09:25:59',
                'updated_at' => '2022-01-09 11:51:38',
            ],
            [
                'id' => 3,
                'name' => 'Mỳ Quảng - Ẩm thực -<br> Đặc sản món Quảng',
                'url' => '/thuc-don',
                'thumb' => '/storage/uploads/2022/01/03/photo3-4.jpg',
                'sort_by' => 3,
                'active' => 1,
                'description' => 'Mỳ Quảng không còn thuần túy là món ăn nữa, mà trở thành <br> 
                một trong những biểu tượng văn hóa của một vùng đất,<br>  
                là cái “hồn” nghệ thuật ẩm thực của vùng đất Quảng Nam…',
                'button' => 'Xem thực đơn',
                'created_at' => '2021-12-18 09:26:13',
                'updated_at' => '2022-01-03 09:06:47',
            ],
            [
                'id' => 4,
                'name' => 'dsadsa',
                'url' => 'dsad',
                'thumb' => '/storage/uploads/2021/12/22/backhome.jpg',
                'sort_by' => 1,
                'active' => 1,
                'description' => 'dsad',
                'button' => 'dsaddsadsa',
                'created_at' => '2021-12-18 09:26:26',
                'updated_at' => '2022-06-16 08:23:43',
            ],
            [
                'id' => 5,
                'name' => 'Mỳ Quảng Bà Mua <br> Niềm Tự Hào Xứ Quảng',
                'url' => '/dat-ban',
                'thumb' => '/storage/uploads/2021/12/22/hom1.jpg',
                'sort_by' => 2,
                'active' => 1,
                'description' => 'Mỳ Quảng Bà Mua đã trở thành điểm ẩm thực thân quen ở Đà Nẵng. <br> 
                trở thành món ngon không thể bỏ lỡ nếu một lần nếm thử nếu bạn đến Đà Nẵng',
                'button' => 'Đặt bàn ngay',
                'created_at' => '2021-12-22 10:41:59',
                'updated_at' => '2024-03-14 08:30:20',
            ],
        ]);

        // Insert Menus
        $menus = [
            ['id' => 1, 'name' => 'Về chúng tôi', 'description' => 'Xem thông tin chi tiết...', 'link' => '/gioi-thieu'],
            ['id' => 2, 'name' => 'Đặt bàn ngay', 'description' => 'Để có được chỗ ngồi...', 'link' => '/dat-ban'],
            ['id' => 3, 'name' => 'Liên hệ với chúng tôi', 'description' => 'Nếu có bất kỳ thắc mắc...', 'link' => '/lien-he'],
        ];

        foreach ($menus as &$menu) {
            $menu['active'] = 1;
            $menu['thumb'] = '/storage/uploads/2022/01/03/hom1.jpg';
            $menu['created_at'] = now();
            $menu['updated_at'] = now();
        }
        DB::table('menus')->insert($menus);

        DB::table('reservations')->insert([
            [
                'id' => 6,
                'date' => '2021-12-24', // Định dạng chuẩn YYYY-MM-DD
                'time' => '19:00',
                'people' => 2,
                'name' => 'Trung Dao',
                'email' => 'dntrung.20it6@vku.udn.vn',
                'phone' => 2147483647,
                'content' => 'á',
                'created_at' => '2021-12-17 14:39:46',
                'updated_at' => '2021-12-18 09:18:30',
                'status' => 1,
            ],
            [
                'id' => 37,
                'date' => '2024-03-20',
                'time' => '19:00',
                'people' => 3,
                'name' => 'Đào Nhật Trung',
                'email' => 'trungdao10a1@gmail.com',
                'phone' => 375307021,
                'content' => 'dsadas',
                'created_at' => '2024-03-01 07:44:59',
                'updated_at' => '2024-03-01 07:44:59',
                'status' => 0,
            ],
            [
                'id' => 38,
                'date' => '2024-06-11',
                'time' => '19:00',
                'people' => 3,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => 375,
                'content' => 'r',
                'created_at' => '2024-06-08 03:44:23',
                'updated_at' => '2024-06-08 03:44:23',
                'status' => 0,
            ],
        ]);



        // DB::table('post_reply_user')->insert([
        //     [
        //         'user_id' => 1,
        //         'reply_id' => 81,
        //         'created_at' => '2024-03-21 10:57:03',
        //         'updated_at' => '2024-03-21 10:57:03',
        //     ],
        //     [
        //         'user_id' => 1,
        //         'reply_id' => 45,
        //         'created_at' => '2024-03-21 11:00:22',
        //         'updated_at' => '2024-03-21 11:00:22',
        //     ],
        //     [
        //         'user_id' => 1,
        //         'reply_id' => 50,
        //         'created_at' => '2024-03-25 09:12:20',
        //         'updated_at' => '2024-03-25 09:12:20',
        //     ],
        // ]);

        // Insert Roles
        DB::table('users')->insert([
            [
                'id' => 0,
                'avatar' => 'đ',
                'name' => 'testlevel',
                'email' => 'testlevel@vku.udn.vn',
                'phone' => 2147483647,
                'google_id' => NULL,
                'facebook_id' => '',
                'email_verified_at' => NULL,
                'password' => '$2y$10$V/cHSTmYck9dblU1OKK.EO6AyVUShrnnr3AG1RuH22hVyLBMYnSTu',
                'remember_token' => NULL,
                'created_at' => '2021-12-14 07:39:00',
                'updated_at' => '2021-12-14 07:39:00',
                'active' => 1,
                'level' => 0,
                'district' => '',
                'ward' => '',
                'street' => 'dsa2',
                'fee' => 0,
                'deleted_at' => NULL,
            ],
            [
                'id' => 1,
                'avatar' => 'https://static.vecteezy.com/system/resources/previews/002/002/297/large_2x/beautiful-woman-avatar-character-icon-free-vector.jpg',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone' => 375,
                'google_id' => '',
                'facebook_id' => '',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Eo0BBzQjY.5l3uNnH318r.My1O1JJ5VS19Qu6Qzcv7KbDp75Yyplq',
                'remember_token' => 'N32VSqK2J1LDMBNLf7LMhL4kTNY9oXDjLohGchji50AtrZs6ebC0FQ0oncDD',
                'created_at' => '2021-12-31 04:42:53',
                'updated_at' => '2023-06-30 08:39:37',
                'active' => 1,
                'level' => 1,
                'district' => 'Quận Hải Châu',
                'ward' => 'Phường Nam Dương',
                'street' => '21',
                'fee' => 15000,
                'deleted_at' => NULL,
            ],
            [
                'id' => 2,
                'avatar' => 'https://lh3.googleusercontent.com/a-/AOh14GjWznZwPJ21Ps0QnfiGhrSwhB6GeKOdjdKMgl17=s96-c',
                'name' => 'Đào Nhật Trung',
                'email' => 'dntrung.20it6@vku.udn.vn',
                'phone' => 375307021,
                'google_id' => '101581940241819211089',
                'facebook_id' => '',
                'email_verified_at' => NULL,
                'password' => '',
                'remember_token' => NULL,
                'created_at' => '2021-12-12 04:55:05',
                'updated_at' => '2022-06-25 04:20:25',
                'active' => 1,
                'level' => 1,
                'district' => 'Quận Liên Chiểu',
                'ward' => 'Phường Hòa Khánh Bắc',
                'street' => '454 hoa s',
                'fee' => 15000,
                'deleted_at' => NULL,
            ],
            [
                'id' => 4,
                'avatar' => NULL,
                'name' => 'Trung Dao',
                'email' => 'dntrung.20it7@vku.udn.vn',
                'phone' => 2147483647,
                'google_id' => NULL,
                'facebook_id' => '',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Uxg1DyhsIDEqBzDTMy73X.f1bMA8c5pkRRfVL6axMorcsd4B/1VCO',
                'remember_token' => NULL,
                'created_at' => '2021-12-13 10:22:30',
                'updated_at' => '2021-12-13 10:22:30',
                'active' => 1,
                'level' => 1,
                'district' => '',
                'ward' => '',
                'street' => 'dsa',
                'fee' => 0,
                'deleted_at' => NULL,
            ],
            [
                'id' => 100,
                'avatar' => NULL,
                'name' => '120',
                'email' => 'trungdao10a1@gmail.com',
                'phone' => 45120,
                'google_id' => NULL,
                'facebook_id' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$7/u1eTj7O18xqeQPPFdJH.hpEyWW6knu0KdXzkMvyMg9Vi6qHg/UG',
                'remember_token' => 'QMm1gsPgvM3pF2E58jOuuMah7OeOEMfPxpeydsWV0Lj4YfCpx0mH5294dXgu',
                'created_at' => '2022-07-11 22:10:25',
                'updated_at' => '2024-06-09 11:49:37',
                'active' => 0,
                'level' => 0,
                'district' => '3',
                'ward' => '18',
                'street' => 'dsad',
                'fee' => 10000,
                'deleted_at' => NULL,
            ],
            [
                'id' => 101,
                'avatar' => 'https://lh3.googleusercontent.com/a/AAcHTtdamTCXKjv4SlTWPq9G-TTyFPacCJua6qvD4Pb2=s96-c',
                'name' => 'bảo Trần',
                'email' => 'phongzboy.26@gmail.com',
                'phone' => 0,
                'google_id' => '104350290708949382278',
                'facebook_id' => '104350290708949382278',
                'email_verified_at' => NULL,
                'password' => '',
                'remember_token' => '',
                'created_at' => '2023-06-26 12:49:17',
                'updated_at' => '2024-03-10 10:41:14',
                'active' => 0,
                'level' => 0,
                'district' => NULL,
                'ward' => NULL,
                'street' => NULL,
                'fee' => NULL,
                'deleted_at' => NULL,
            ],
        ]);


        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'description' => 'Quản trị hệ thống',
                'created_at' => null,
                'updated_at' => '2023-06-30 07:37:04',
            ],
            [
                'id' => 2,
                'name' => 'guest',
                'description' => 'Khách hàng',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'developer d',
                'description' => 'Phát triển hệ thống d',
                'created_at' => null,
                'updated_at' => '2024-03-10 03:46:49',
            ],
            [
                'id' => 4,
                'name' => 'content',
                'description' => 'Chỉnh sửa nội dung',
                'created_at' => null,
                'updated_at' => null,
            ],
            [
                'id' => 36,
                'name' => 'tên vai trò',
                'description' => 'mô tả',
                'created_at' => '2024-03-10 10:34:30',
                'updated_at' => '2024-03-10 10:34:30',
            ],
        ]);

        DB::table('role_user')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
                'created_at' => '2023-06-30 06:30:34',
                'updated_at' => null,
            ],
            [
                'id' => 22,
                'user_id' => 101,
                'role_id' => 2,
                'created_at' => '2024-03-10 10:41:14',
                'updated_at' => null,
            ],
            [
                'id' => 24,
                'user_id' => 104,
                'role_id' => 1,
                'created_at' => '2024-03-11 07:03:37',
                'updated_at' => null,
            ],
        ]);




        // Insert Districts
        $districts = [
            ['id' => 1, 'name' => 'Quận Liên Chiểu', 'type' => 'Quận'],
            ['id' => 2, 'name' => 'Quận Thanh Khê', 'type' => 'Quận'],
            ['id' => 3, 'name' => 'Quận Hải Châu', 'type' => 'Quận'],
            ['id' => 4, 'name' => 'Quận Sơn Trà', 'type' => 'Quận'],
            ['id' => 5, 'name' => 'Quận Ngũ Hành Sơn', 'type' => 'Quận'],
            ['id' => 6, 'name' => 'Quận Cẩm Lệ', 'type' => 'Quận'],
            ['id' => 7, 'name' => 'Huyện Hòa Vang', 'type' => 'Huyện'],
            ['id' => 8, 'name' => 'Huyện Hoàng Sa', 'type' => 'Huyện'],
        ];
        DB::table('district_dn')->insert($districts);

        // Insert Wards
        $wards = [
            ['id' => 1, 'name' => 'Phường Hòa Hiệp Bắc', 'district_id' => 1],
            ['id' => 2, 'name' => 'Phường Hòa Hiệp Nam', 'district_id' => 1],
            ['id' => 3, 'name' => 'Phường Hòa Khánh Bắc', 'district_id' => 1],
            ['id' => 4, 'name' => 'Phường Hòa Khánh Nam', 'district_id' => 1],
            ['id' => 5, 'name' => 'Phường Hòa Minh', 'district_id' => 1],
            ['id' => 6, 'name' => 'Phường Tam Thuận', 'district_id' => 2],
            ['id' => 7, 'name' => 'Phường Thanh Khê Tây', 'district_id' => 2],
            ['id' => 8, 'name' => 'Phường Thanh Khê Đông', 'district_id' => 2],
            ['id' => 9, 'name' => 'Phường Xuân Hà', 'district_id' => 2],
            ['id' => 10, 'name' => 'Phường Tân Chính', 'district_id' => 2],
        ];
        foreach ($wards as &$ward) {
            $ward['type'] = 'Phường';
        }
        DB::table('ward_dn')->insert($wards);



        //PRODUCT
        DB::table('productcategories')->insert([
            [
                'id' => 5,
                'name' => 'Mì Quảng',
                'active' => 1,
                'created_at' => Carbon::parse('2021-12-14 13:11:49'),
                'updated_at' => Carbon::parse('2021-12-14 13:20:34'),
            ],
            [
                'id' => 7,
                'name' => 'Bánh tráng thịt heo',
                'active' => 1,
                'created_at' => Carbon::parse('2021-12-14 13:12:12'),
                'updated_at' => Carbon::parse('2021-12-14 13:12:12'),
            ],
            [
                'id' => 8,
                'name' => 'Thức uống',
                'active' => 1,
                'created_at' => Carbon::parse('2021-12-14 13:12:28'),
                'updated_at' => Carbon::parse('2021-12-14 13:12:28'),
            ],
            [
                'id' => 11,
                'name' => 'Món ăn dân dã',
                'active' => 1,
                'created_at' => Carbon::parse('2021-12-28 03:12:25'),
                'updated_at' => Carbon::parse('2021-12-28 03:12:25'),
            ],
            [
                'id' => 12,
                'name' => 'Bánh Xèo',
                'active' => 1,
                'created_at' => Carbon::parse('2021-12-28 03:12:49'),
                'updated_at' => Carbon::parse('2021-12-31 08:57:21'),
            ],
            [
                'id' => 16,
                'name' => 'Đào Nhật Trunggg',
                'active' => 0,
                'created_at' => Carbon::parse('2024-03-14 10:02:22'),
                'updated_at' => Carbon::parse('2024-03-14 10:06:57'),
            ],
        ]);

        DB::table('products')->insert([
            [
                'name' => 'Bánh tráng cuốn thịt heo da',
                'description' => 'Bánh tráng cuốn thịt heo là món ăn nổi tiếng ở Đà Nẵng.',
                'content' => 'Bánh tráng cuốn thịt heo là món ăn nổi tiếng ở Đà Nẵng...',
                'cat_id' => 7,
                'price' => 100000,
                'price_sale' => 80000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/31/banh-trang-cuon-thit-heo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 0,
                'total_rating' => 0,
            ],
            [
                'name' => 'Ram cuốn thịt',
                'description' => 'Ram cuốn cải là món ăn phổ biến ở Đà Nẵng.',
                'content' => 'Ram cuốn cải, một cái tên nghe không mấy xa lạ...',
                'cat_id' => 12,
                'price' => 30000,
                'price_sale' => 29999,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/28/Ram-cuon-thit-nam.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 0,
                'total_rating' => 0,
            ],
            [
                'name' => 'Bún mắm thịt luộc',
                'description' => 'Bún mắm bà Mua là quán nổi tiếng ở Đà Nẵng.',
                'content' => 'Bún mắm nơi đây dùng thịt heo quay làm nguyên liệu chính...',
                'cat_id' => 11,
                'price' => 32000,
                'price_sale' => 30000,
                'active' => 1,
                'thumb' => '/storage/uploads/2022/01/01/Bun-mam-heo-quay.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 0,
                'total_rating' => 0,
            ],
            [
                'name' => 'Mỳ quảng Ếch',
                'description' => 'Mỳ quảng Ếch là món ăn được yêu thích khi nhắc đến Mỳ Quảng.',
                'content' => 'Nấu mỳ Quảng ếch không phải là khó nhưng để ngon cần công thức chuẩn.',
                'cat_id' => 5,
                'price' => 55000,
                'price_sale' => 45000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/31/my-quang-ech.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 30,
                'total_rating' => 8,
            ],
            [
                'name' => 'Bánh tráng cuốn thịt heo quay',
                'description' => 'Bánh tráng cuốn thịt heo quay với lớp da giòn tan.',
                'content' => 'Thịt heo quay kết hợp với rau sống và mắm nêm đặc trưng...',
                'cat_id' => 7,
                'price' => 120000,
                'price_sale' => 115000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/28/banh-trang-cuon-thit-heo-quay.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 0,
                'total_rating' => 0,
            ],
            [
                'name' => 'Mỳ Quảng Thố',
                'description' => 'Mì Quảng là món ăn đặc trưng của Quảng Nam, Việt Nam.',
                'content' => 'Mì Quảng thường được làm từ sợi mì bằng bột gạo...',
                'cat_id' => 5,
                'price' => 85000,
                'price_sale' => 75000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/31/My-Quang-Tho.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 9,
                'total_rating' => 2,
            ],
            [
                'name' => 'Mỳ gà rút xương',
                'description' => 'Chân gà rút xương cùng các nguyên liệu đơn giản.',
                'content' => 'Chân gà rút xương làm món gì ngon?...',
                'cat_id' => 5,
                'price' => 70000,
                'price_sale' => 69000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/31/my-ga-rut-xuong.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 0,
                'total_rating' => 0,
            ],
            [
                'name' => 'Mỳ Quảng Bò',
                'description' => 'Bò cuộn nấm kim châm thơm ngon, đầy dinh dưỡng.',
                'content' => 'Mỳ Quảng bò, thịt bò, trứng gà, rau sống...',
                'cat_id' => 5,
                'price' => 48000,
                'price_sale' => 45000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/31/my-bo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 4,
                'total_rating' => 1,
            ],
            [
                'name' => 'Bánh tráng cuốn heo Đại Lộc',
                'description' => 'Thịt heo Đại Lộc có mùi thơm dai và ngọt đặc trưng.',
                'content' => 'Những miếng thịt heo ba chỉ được luộc chín...',
                'cat_id' => 7,
                'price' => 80000,
                'price_sale' => 75000,
                'active' => 1,
                'thumb' => '/storage/uploads/2021/12/31/banh-trang-cuon-thit-heo.jpg',
                'created_at' => now(),
                'updated_at' => now(),
                'total_number' => 0,
                'total_rating' => 0,
            ],
        ]);

        //POST

        //orders


        DB::table('transactions')->insert([
            [
                'id' => 103,
                'name' => '0',
                'email' => '',
                'phone' => 0,
                'user_id' => 28,
                'content' => NULL,
                'total_price' => 189999,
                'total_item' => 3,
                'payment_type' => 'pay_later',
                'created_at' => '2022-06-07 13:46:39',
                'updated_at' => '2022-06-08 07:28:39',
                'status' => 'CANCELLED',
                'method' => 'Giao hàng tận nơi',
                'time' => '',
                'day' => '',
            ],
            [
                'id' => 104,
                'name' => '0',
                'email' => '',
                'phone' => 0,
                'user_id' => 28,
                'content' => NULL,
                'total_price' => 160000,
                'total_item' => 2,
                'payment_type' => 'pay_later',
                'created_at' => '2022-06-07 13:49:15',
                'updated_at' => '2022-06-13 13:28:37',
                'status' => 'CANCELLED',
                'method' => 'Giao hàng tận nơi',
                'time' => '',
                'day' => '',
            ],
            [
                'id' => 105,
                'name' => '0',
                'email' => '',
                'phone' => 0,
                'user_id' => 28,
                'content' => NULL,
                'total_price' => 80000,
                'total_item' => 1,
                'payment_type' => 'pay_later',
                'created_at' => '2022-06-07 13:58:29',
                'updated_at' => '2022-06-13 13:28:32',
                'status' => 'CANCELLED',
                'method' => 'Giao hàng tận nơi',
                'time' => '',
                'day' => '',
            ],
            [
                'id' => 126,
                'name' => '0',
                'email' => '',
                'phone' => 0,
                'user_id' => 28,
                'content' => 'rr',
                'total_price' => 638997,
                'total_item' => 12,
                'payment_type' => 'pay_later',
                'created_at' => '2022-06-15 05:23:40',
                'updated_at' => '2022-06-15 05:24:15',
                'status' => 'DONE',
                'method' => 'Mua hàng mang về',
                'time' => '',
                'day' => '',
            ],
        ]);
    }
}
