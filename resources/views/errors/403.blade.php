<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <style>
        body {
            background: #342643;
            font-family: "roboto";
            overflow: hidden;
        }

        body .overlay {
            width: 100vw;
            height: 100vh;
        }

        body .overlay.open .left {
            transition: all 0.3s;
            transform: translate(-100%);
        }

        body .overlay.open .right {
            transition: all 0.3s;
            transform: translate(100%);
        }

        body .overlay .fa-lock {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 78px;
            transition: all 0.3s;
            color: #fff;
        }

        body .overlay .fa-lock:hover {
            color: #1FA9D6;
        }

        body .overlay .left {
            transition: all 0.3s;
            top: 0;
            position: absolute;
            left: 0;
            width: 50vw;
            height: 100vh;
            background: firebrick;
        }

        body .overlay .right {
            transition: all 0.3s;
            top: 0;
            position: absolute;
            right: 0;
            width: 50vw;
            height: 100vh;
            background: firebrick;
        }

        body .content {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            color: #fff;
            text-align: center;
        }

        body .content h1 {
            text-transform: uppercase;
        }

        body .content h1,
        body .content h2 {
            margin: 100px 0;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="content">
        <h1 style="color: #EE4B5E; margin-top: 2em;">
            403 - Quyền Truy Cập Bị Từ Chối.<br>
            403 - ACCESS DENIED.
        </h1>
        <h2>Bạn không có quyền truy cập vào trang này!</h2>
    </div>
    <div class="overlay">
        <div class="left"></div>
        <div class="right"></div>
        <a href="/admin"><i class="fa fa-lock"></i></a>

    </div>

</body>
<script>
    let lock = document.querySelector(".fa-lock");
    let overlay = document.querySelector(".overlay");
    lock.addEventListener('mouseover', () => {
        overlay.classList.add("open");
    })
    lock.addEventListener('mouseleave', () => {
        overlay.classList.remove("open");
    })
</script>

</html>
