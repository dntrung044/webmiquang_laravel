# Giới thiệu

## Công cụ sử dụng:

* Backend: PHP, Ajax jQuery
* Frontend: HTML, CSS, JS
* Database: MySQL

## Hướng dẫn cài đặt và sửa lỗi

* Lỗi hình ảnh
  * Xóa `public->storage`
  * Chạy Terminal: `php artisan storage:link`

# Các chức năng

## Trang Người dùng

* Đăng nhập (Mạng xã hội)
* Đăng ký
* Xác thực tài khoản bằng email
* Quên mật khẩu qua email
* Sửa thông tin người dùng
  * Địa chỉ có load API của tỉnh ĐN
  * Thông tin đơn hàng
  * Xem Đánh giá, Mã giảm giá

## Trang chủ/ Trang thông tin về cửa hàng

* Xem hiển thị các thông tin về cửa hàng
  * Thông tin
  * Slider
  * Banner
  * Hình về nhà hàng

## Thực đơn

* Xem sản phẩm theo tab
* Đánh giá (số sao sản phẩm)
* Thêm món bằng Ajax
* Xem chi tiết món ăn

## Giỏ hàng (AJAX)

* Thêm, sửa, xóa bằng Ajax jQuery
* Tính toán điều kiện giá tiền khi:
  * Thêm
  * Sửa
  * Xóa
  * Áp mã giảm giá
  * Phí vận chuyển

## Thanh toán

* Qua các phương thức thanh toán
* Gửi email

## Blog

* Xem danh sách, danh mục, chi tiết bài viết
* Tìm kiếm Ajax (có từ khóa gợi ý)
* Bình luận (Ajax jQuery)
  * Thêm bình luận
  * Sắp xếp theo nổi bật (lượt thích cmt và reply nhiều nhất) hoặc mới nhất
  * Thích và không thích
  * Báo cáo bình luận (Người dùng), Ẩn bình luận (Quản trị)
  * Xem thêm

## Quản trị viên

Gồm các trang quản lý:

* Quản lý thông tin nhà hàng
  * Bài viết giới thiệu
  * Thư viện hình ảnh
  * Slider
  * Banner
* Quản lý thực đơn
  * Món ăn
  * Loại món ăn
  * Bình luận món ăn
* Quản lý Đơn Hàng
  * Mã giảm giá
  * Phí Vận Chuyển (load API tỉnh, quận ĐN)
  * Đơn hàng
    * Xem chi tiết
    * In hóa đơn, gửi mail, các trạng thái đơn hàng
* Phân quyền hệ thống
  * Tài khoản người dùng
  * Quản lý vai trò
  * Quyền xử lý
  * Banner
