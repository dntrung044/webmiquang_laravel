<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">  
</head>
<body>
  <h1>Giới thiệu: </h1>
  
  <h2>Công cụ sử dụng:</h2>
    <ul>
        <li>
           Backend: PHP, ajax jquery
        </li>
        <li>
          Fontend: HTML, CSS, JS
        </li>
        <li>
           DB: Mysql
        </li>
    </ul>

   <h2>Hướng dẫn cài đặt và sửa lỗi</h2>
    <ul>
        <li>
            Lỗi hình ảnh
            <ul>
                <li>  Xóa public->storage</li> 
                <li>   Chạy Terminal : php artisan storage:link  </li> 
            </ul>  
        </li> 
    </ul>

  <h1>Các chức năng:</h1>
    <h2>Trang Người dùng</h2>
    <ul>
        <li>
            Đăng nhập(Mạng xã hội)
        </li>
        <li>Đăng ký</li>
        <li>Xác thực tài khoản bằng mail</li>
        <li>Quên mật khẩu qua mail</li>
        <li>
            Sửa thông tin người dùng
            <ul>
                <li> Địa chỉ có load api của tỉnh ĐN</li>
                <li> Thông tin đơn hàng</li>
                <li> Xem Đánh giá, Mã giảm giá</li> 
            </ul>
        </li>
        </li>
    </ul>
    <h2>Trang chủ/ Trang thông tin về cửa hàng</h2>
    <ul> 
        Xem hiển thị các thông tin về cửa hàng
        <li>Thông tin</li> 
        <li>Slider</li> 
        <li>Banner</li> 
        <li>Hình về nhà hàng </li>  
    </ul>
    <h2>Thực đơn</h2>
    <ul>
        <li>Xem sản phẩm theo tab</li>
        <li>Đánh giá (số sao sản phẩm)</li>
        <li>Thêm món bằng ajax</li> 
         <li>Xem chi tiết món ăn</li> 
    </ul>

  <h2>Giỏ hàng (AJAX)</h2>
  <ul>
    <li>Thêm, sửa, xóa bằng ajax jquery</li>
    <li>Tính toán điều kiện giá tiền khi:</li>
        <ul>
            <li>Thêm</li>
            <li>Sửa</li>
            <li>Xoá</li>
            <li>Áp mã giảm giá</li>
            <li>Phí vận chuyển</li>
        </ul>
  </ul>

  <h2>Thanh toán</h2>
  <ul>
    <li>Qua các phương thức thanh toán</li>
    <li>Gửi email</li>
  </ul>

  <h2>Blog</h2>
  <ul>
    <li>Xem danh sách, danh mục, chi tiết bài viết</li>
    <li>Tìm kiếm ajax (có từ khóa gợi ý)</li>
    <li>Bình luận (ajax jquery)
        <ul>
            <li>Thêm bình luận</li>
            <li>Sắp xếp theo nổi bậc(lượt thích cmt và reply nhiều nhất) hoặc mới nhất</li>
            <li>Thích và không thích</li>
            <li>Báo cáo bình luận(Người dùng), Ẩn bình luận(Quản trị)</li>
            <li>Xem thêm</li>
        </ul>
    </li>
  </ul>

  <h2>Quản trị viên</h2>
  <ul> 
    Gồm các trang quản lý
    <li>Quản lý thông tin nhà hàng
        <ul> 
            Gồm các trang quản lý
            <li>Bài viết giới thiệu</li> 
            <li>Thư viện hình ảnh</li> 
            <li>Slider</li>
            <li>Banner</li>
        </ul> 
    </li> 
     <li>Quản lý thực đơn
        <ul> 
            Gồm các trang quản lý
            <li>Món ăn</li> 
            <li>Loại món ăn</li> 
            <li>Bình luận món ăn</li> 
        </ul> 
    </li> 
     <li>Quản lý Đơn Hàng
        <ul> 
            Gồm các trang quản lý
            <li>Mã giảm giá</li> 
            <li>Phí Vận Chuyển(load API tỉnh,quận ĐN)</li> 
            <li>Đơn hàng
                <ul> 
                    Gồm các trang quản lý
                    <li>Xem chi tiết</li>  
                    <li>In hóa đơn, gửi mail, các trạng thái đơn hàng</li>  
                </ul> 
            </li> 
        </ul> 
    </li> 
     <li>Phân quyền hệ thống
        <ul> 
            Gồm các trang quản lý
            <li>Tài khoản người dùng</li> 
            <li>Quản lý vai trò</li> 
            <li> Quyền xử lý</li>
            <li>Banner</li>
        </ul> 
    </li> 
  </ul>  
</body>
</html>
