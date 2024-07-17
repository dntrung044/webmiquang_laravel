<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập quản trị</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    <style>
        body {
            background-color: #181828;
        }

        .card {
            border: none;
            border-radius: 30px;
            background-color: #14edaa;
        }

        .wow-bg {
            background-color: #141421;
            border: 1px solid #2e2e4c;
            box-shadow: 3px 9px 16px rgb(0, 0, 0, 0.4), -3px -3px 10px rgba(255, 255, 255, 0.06), inset 14px 14px 26px rgb(0, 0, 0, 0.3), inset -3px -3px 15px rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            margin-top: 4px;
        }



        .starsec {
            content: " ";
            position: absolute;
            width: 3px;
            height: 3px;
            background: transparent;
            box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
            animation: animStar 150s linear infinite;
        }

        .starthird {
            content: " ";
            position: absolute;
            width: 3px;
            height: 3px;
            background: transparent;
            box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
            animation: animStar 10s linear infinite;
        }

        .starfourth {
            content: " ";
            position: absolute;
            width: 2px;
            height: 2px;
            background: transparent;
            box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
            animation: animStar 50s linear infinite;
        }

        .starfifth {
            content: " ";
            position: absolute;
            width: 1px;
            height: 1px;
            background: transparent;
            box-shadow: 571px 173px #00BCD4, 1732px 143px #00BCD4, 1745px 454px #FF5722, 234px 784px #00BCD4, 1793px 1123px #FF9800, 1076px 504px #03A9F4, 633px 601px #FF5722, 350px 630px #FFEB3B, 1164px 782px #00BCD4, 76px 690px #3F51B5, 1825px 701px #CDDC39, 1646px 578px #FFEB3B, 544px 293px #2196F3, 445px 1061px #673AB7, 928px 47px #00BCD4, 168px 1410px #8BC34A, 777px 782px #9C27B0, 1235px 1941px #9C27B0, 104px 1690px #8BC34A, 1167px 1338px #E91E63, 345px 1652px #009688, 1682px 1196px #F44336, 1995px 494px #8BC34A, 428px 798px #FF5722, 340px 1623px #F44336, 605px 349px #9C27B0, 1339px 1344px #673AB7, 1102px 1745px #3F51B5, 1592px 1676px #2196F3, 419px 1024px #FF9800, 630px 1033px #4CAF50, 1995px 1644px #00BCD4, 1092px 712px #9C27B0, 1355px 606px #F44336, 622px 1881px #CDDC39, 1481px 621px #9E9E9E, 19px 1348px #8BC34A, 864px 1780px #E91E63, 442px 1136px #2196F3, 67px 712px #FF5722, 89px 1406px #F44336, 275px 321px #009688, 592px 630px #E91E63, 1012px 1690px #9C27B0, 1749px 23px #673AB7, 94px 1542px #FFEB3B, 1201px 1657px #3F51B5, 1505px 692px #2196F3, 1799px 601px #03A9F4, 656px 811px #00BCD4, 701px 597px #00BCD4, 1202px 46px #FF5722, 890px 569px #FF5722, 1613px 813px #2196F3, 223px 252px #FF9800, 983px 1093px #F44336, 726px 1029px #FFC107, 1764px 778px #CDDC39, 622px 1643px #F44336, 174px 1559px #673AB7, 212px 517px #00BCD4, 340px 505px #FFF, 1700px 39px #FFF, 1768px 516px #F44336, 849px 391px #FF9800, 228px 1824px #FFF, 1119px 1680px #FFC107, 812px 1480px #3F51B5, 1438px 1585px #CDDC39, 137px 1397px #FFF, 1080px 456px #673AB7, 1208px 1437px #03A9F4, 857px 281px #F44336, 1254px 1306px #CDDC39, 987px 990px #4CAF50, 1655px 911px #00BCD4, 1102px 1216px #FF5722, 1807px 1044px #FFF, 660px 435px #03A9F4, 299px 678px #4CAF50, 1193px 115px #FF9800, 918px 290px #CDDC39, 1447px 1422px #FFEB3B, 91px 1273px #9C27B0, 108px 223px #FFEB3B, 146px 754px #00BCD4, 461px 1446px #FF5722, 1004px 391px #673AB7, 1529px 516px #F44336, 1206px 845px #CDDC39, 347px 583px #009688, 1102px 1332px #F44336, 709px 1756px #00BCD4, 1972px 248px #FFF, 1669px 1344px #FF5722, 1132px 406px #F44336, 320px 1076px #CDDC39, 126px 943px #FFEB3B, 263px 604px #FF5722, 1546px 692px #F44336;
            animation: animStar 80s linear infinite;
        }

        @keyframes animStar {
            0% {
                transform: translateY(0px);
            }

            100% {
                transform: translateY(-2000px);
            }
        }



        .logn-btn {
            background: #1c1f2f;
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid #2e344d;
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
            /* box-shadow: 10px 10px 36px rgb(0,0,0,0.5), -13px -13px 23px rgba(255,255,255, 0.03), inset 14px 14px 70px rgb(0,0,0,0.2), inset -15px -15px 30px rgba(255,255,255, 0.04); */
            box-shadow: 0px 2px 26px rgb(0, 0, 0, 0.5), 0px 7px 13px rgba(255, 255, 255, 0.03);
            margin-top: 30px;
        }

        .logn-btn:hover {
            background-color: #1c1f2f;
            border-radius: 50px;
            min-width: 140px;
            /* box-shadow: 10px 10px 36px rgb(0,0,0,0.5), -13px -13px 23px rgba(255,255,255, 0.03), inset 14px 14px 70px rgb(0,0,0,0.2), inset -15px -15px 30px rgba(255,255,255, 0.04); */
            box-shadow: 3px 9px 16px rgb(0, 0, 0, 0.4), -3px -3px 10px rgba(255, 255, 255, 0.06), inset 14px 14px 26px rgb(0, 0, 0, 0.3), inset -3px -3px 15px rgba(255, 255, 255, 0.05);
            border-width: 1px 0px 0px 1px;
            border-style: solid;
            border-color: #2e344d;
        }

        .textbox-dg {
            background: rgba(28, 31, 47, 0.16);
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid #2e344d;
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
            /* box-shadow: 10px 10px 36px rgb(0,0,0,0.5), -13px -13px 23px rgba(255,255,255, 0.03), inset 14px 14px 70px rgb(0,0,0,0.2), inset -15px -15px 30px rgba(255,255,255, 0.04); */
            box-shadow: 10px 10px 36px rgb(0, 0, 0, 0.5), -13px -13px 23px rgba(255, 255, 255, 0.03);
            border-width: 1px 0px 0 1px;
            margin-top: 15px;
        }



        .form-control:focus {
            border: 1px solid #344d2e;
            color: #495057;
            outline: 0;
            background: rgb(17, 20, 31);
            border-radius: 4px;
            transition: all 0.3s ease-in-out 0s;
            /* box-shadow: 10px 10px 36px rgb(0,0,0,0.5), -13px -13px 23px rgba(255,255,255, 0.03), inset 14px 14px 70px rgb(0,0,0,0.2), inset -15px -15px 30px rgba(255,255,255, 0.04); */
            box-shadow: 10px 10px 36px rgb(0, 0, 0, 0.5), -13px -13px 23px rgba(255, 255, 255, 0.03);
        }



        .btn-link {
            color: #344d2e;
        }


        .btn-link:hover {
            color: #2b7a19;
            text-decoration: underline;
        }

        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            color: #807f7f;
            background-color: transparent;
            border-color: #2b7a19;
        }


        .btn-primary.focus,
        .btn-primary:focus {
            color: #fff;
            background-color: transparent;
            border-color: transparent;
            box-shadow: 0 0 0 0.2rem rgba(0, 255, 110, 0.25);
        }

        .mt-6,
        .my-6 {
            margin-top: 2rem !important;
        }


        .socila-btn {
            height: 40px;
            border-radius: 10%;
            width: 40px;
            box-shadow: 3px 9px 16px rgb(0, 0, 0, 0.4), -3px -3px 10px rgba(255, 255, 255, 0.06), inset 14px 14px 26px rgb(0, 0, 0, 0.3), inset -3px -3px 15px rgba(255, 255, 255, 0.05);
            border-width: 1px 0px 0px 1px;
            border-style: solid;
            border-color: rgba(255, 255, 255, 0.2);
            margin-right: 10px;

        }

        .fb-color {
            color: #3b5998;
        }

        .incolor {
            color: #007bff;
        }

        .tweetcolor {
            color: #41a4f7;
        }

        .driblecolor {
            color: #e83e8c;
        }

        .colorboard {
            color: #00ffaaed;
        }
    </style>
</head>

<body>
    <!--dust particel-->
    <div>
        <div class="starsec"></div>
        <div class="starthird"></div>
        <div class="starfourth"></div>
        <div class="starfifth"></div>
    </div>
    <div class="container text-center text-dark mt-5">
        <div class="row">
            <div class="col-lg-4 d-block mx-auto mt-5">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-md-12">
                        <div class="card">
                            <div class="card-body wow-bg" id="formBg">
                                <h3 class="colorboard">Đăng nhập</h3>

                                <p class="text-muted">Đăng nhập vào quản trị website</p>

                                <div class="input-group mb-3"> <input type="text" class="form-control textbox-dg"
                                        placeholder="Username"> </div>
                                <div class="input-group mb-4"> <input type="password" class="form-control textbox-dg"
                                        placeholder="Password"> </div>

                                <div class="row">
                                    <div class="col-12"> <button type="button"
                                            class="btn btn-primary btn-block logn-btn">Đăng nhập</button> </div>
                                    <div class="col-12"> <a href="forgot-password.html"
                                            class="btn btn-link box-shadow-0 px-0">Quên mật khẩu?</a> </div>
                                </div>

                                <div class="mt-6 btn-list">
                                    <button type="button" class="socila-btn btn btn-icon btn-facebook fb-color"><i
                                            class="fab fa-facebook-f faa-ring animated"></i></button> <button
                                        type="button" class="socila-btn btn btn-icon btn-google incolor"><i
                                            class="fab fa-linkedin-in faa-flash animated"></i></button> <button
                                        type="button" class="socila-btn btn btn-icon btn-twitter tweetcolor"><i
                                            class="fab fa-twitter faa-shake animated"></i></button> <button
                                        type="button" class="socila-btn btn btn-icon btn-dribbble driblecolor"><i
                                            class="fab fa-dribbble faa-pulse animated"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
