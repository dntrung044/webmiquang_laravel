<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Mì Quảng' }}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        .error-404 {
            margin: 0 auto;
            text-align: center;
        }

        .error-404 .error-code {
            bottom: 60%;
            color: #4686CC;
            font-size: 96px;
            line-height: 100px;
            font-weight: bold;
        }

        .error-404 .error-desc {
            font-size: 14px;
            color: #647788;
        }

        .error-404 .m-b-10 {
            margin-bottom: 10px !important;
        }

        .error-404 .m-b-20 {
            margin-bottom: 20px !important;
        }

        .error-404 .m-t-20 {
            margin-top: 20px !important;
        }
    </style>
</head>

<body>
    <div class="error-404">
        <div class="error-code m-b-10 m-t-20">404 <i class="fa fa-warning"></i></div>
        <h2 class="font-bold">Oops 404! Trang đó không thể tìm thấy.</h2>

        <div class="error-desc">
            Xin lỗi, nhưng trang bạn đang tìm kiếm đã không được tìm thấy hoặc không tồn tại. <br />
            Hãy thử làm mới trang hoặc nhấp vào nút bên dưới để quay lại Trang chủ.
            <div><br />
                <a href="/" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Quay lại trang
                    chủ</a>
            </div>
        </div>
    </div>
</body>

</html>
