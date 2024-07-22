 
# Giới thiệu
![Cover](docs/images/Cover.png)
##DEMO: 
*VIDEO: https://youtu.be/X7CEoBDfQoU
*Database, report, images, Source code** If error: https://s.net.vn/M7qj
## Công cụ sử dụng:
* Backend: PHP(Laravel)
* Frontend: HTML, CSS, JS(Ajax jQuery)
* Database: MySQL
## Cơ sở dữ liệu
![Database 4](docs/images/Database_4.png)

## Hướng dẫn cài đặt và sửa lỗi
* Lỗi hình ảnh
  * Xóa `public->storage`
  * Chạy Terminal: `php artisan storage:link`
## Sơ đồ Trang web
![sitemap](docs/images/sitemap.png)
# Các chức năng
## Trang Người dùng
* Đăng nhập, Đăng ký (Mạng xã hội)
  * Xác thực tài khoản email
* Quên mật khẩu
  * Xác thực tài khoản email
* Sửa thông tin người dùng
  * Địa chỉ 
    * API của tỉnh Đà Nẵng chỉnh sửa lại và tính phí vận chuyển Ajax
* Trạng thái đơn hàng
* Xem Đánh giá, Mã giảm giá đã thực hiện.

## Trang chủ/ Trang thông tin về cửa hàng
* Xem các thông tin về nhà hàng
* Thông tin
* Slider
* Banner
* Hình nhà hàng

## Thực đơn
* Xem sản phẩm 
  * theo tab
* Đánh giá
  * số sao (5 sao)
* Thêm món bằng Ajax
* Xem chi tiết món ăn

## Giỏ hàng (AJAX)
* Thêm, sửa, xóa bằng Ajax Jquery
* Tính toán điều kiện giá tiền khi: Thêm, Sửa, Xóa, Áp mã giảm giá, Phí vận chuyển
## Thanh toán
* Gửi email thông tin đơn hàng
## Blog
* Xem danh sách, danh mục, chi tiết bài viết
* Tìm kiếm ajax (từ khóa gợi ý)
* Bình luận (AJAX)
  * Thêm bình luận
  * Sắp xếp 
    * mới nhất hoặc nổi bật
  * Thích/ không thích
  * Báo cáo (Người dùng), Ẩn bình luận (Quản trị)
  * Xem thêm
## Đặt bàn
* Thêm vào DB và gửi mail
## Quản trị viên
![Admin Home Page](docs/images/admin.png)
### Quản lý thông tin nhà hàng
  * Bài viết giới thiệu
  * Thư viện hình ảnh
  * Slider
  * Banner
### Quản lý thực đơn
  * Món ăn
  * Loại món ăn
  * Bình luận 
### Quản lý Blog
  * Bài viết
  * Danh mục  
  * Bình luận 
### Quản lý Đơn Hàng
  * Mã giảm giá
  * Phí Vận Chuyển (load API tỉnh, quận ĐN)
  * Đơn hàng
    * Duyệt các trạng thái đơn hàng
    * Xem chi tiết(In hóa đơn, gửi mail thông báo)
### Phân quyền hệ thống (gate và policy)
  * Tài khoản người dùng
  * Quản lý vai trò
  * Quyền xử lý
# Hết
![Database 4](docs/images/thank_you.png)
