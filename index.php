<?php
include 'db.php';
header('Cache-Control: no cache'); //disable validation of form by the browser
session_cache_limiter('private_no_expire'); // works
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOS PRAKAN</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon1.jpg">
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
    /* @font-face {
  font-family: 'ThaiSansNeue-Light';
  src: url('information/font/test/ThaiSansNeue-Light.woff2') format('woff2'),
       url('information/font/test/ThaiSansNeue-Light.woff') format('woff'),
       url('information/font/test/ThaiSansNeue-Light.ttf')  format('truetype');
}

body {
  font-family: 'ThaiSansNeue-Light', sans-serif;
} */

    .nice-select .list {
        overflow-y: scroll;
        max-height: 200px;
    }
</style>

<body>

    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <a class="navbar-brand" href="index.html"><img src="./icons/logo.jpg" alt="logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">หน้าหลัก
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#price-grid" style="width: 100px;">เกี่ยวกับเรา</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#getstart" style="width: 130px;">ประกันรถยนต์</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="career.php" style="width: 100px;">สมัครงาน
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#contact" style="width: 100px;">ติดต่อเรา
                                            </a>
                                        </li>


                                    </ul>
                                </div>

                                <div class="signin-btn">
                                    <a class="btn btn-primary" href="./signin.php">เข้าสู่ระบบ</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="intro" style="padding: 50px 0px;">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="intro-content">
                            <h1>ประกันรถยนต์<img src="./icons/logo.jpg" alt="logo"> <br> ค้นหาประกันรถยนต์ หรือ พ.ร.บ. จากบริษัทประกันชั้นนำ
                            </h1>
                            <p>การันตีราคาถูก เจอถูกกว่าคืนเงินทันที</p>
                        </div>

                        <div class="intro-btn">
                            <a href="#myform" class="btn btn-primary">เช็คเบี้ยประกันฟรี</a>
                            <!-- <a href="#" class="btn btn-outline-primary"></a> -->
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12">
                        <div class="intro-form-exchange">
                            <form method="post" id="myform" name="myform" class="currency_validate" action="form_step_type.php">


                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">ปีรถ</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='car_year' id="car_year" class="form-control">
                                                <option data-display="-- เลือกปีรถ --" value="">-- เลือกปีรถ --</option>
                                                <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--) { ?>
                                                    <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">ยี่ห้อรถยนต์</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='car_brand' id="car_brand" class="form-control">
                                                <option data-display="-- เลือกยี่ห้อรถยนต์ --" value="">-- เลือกยี่ห้อรถยนต์ --</option>
                                                <?php
                                                $stmt = $pdo->query('SELECT MakeCode, Description FROM car_brand');
                                                while ($row = $stmt->fetch()) {
                                                ?>
                                                    <option value="<?php echo $row['MakeCode']; ?>"><?php echo $row['Description']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">รุ่นรถยนต์</label>
                                    </div>
                                    <div class="col-sm-8 ">
                                        <div class="input-group mb-3 car_model">
                                            <select name='car_model' id='car_model' class="form-control">
                                                <option data-display="-- เลือกรุ่นรถยนต์ --" value="">-- เลือกรุ่นรถยนต์ --
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <span class="mr-sm-2">รุ่นย่อยรถ: </span>
                                    </div>
                                    <div class="col-sm-8 ">
                                        <div class="input-group mb-3 carsub_model">
                                            <select name='carsub_model' id='carsub_model' class="form-control">
                                                <option data-display="-- เลือกรุ่นย่อยรถยนต์ --" value="">-- เลือกย่อยรุ่นรถยนต์ --
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">กล้อง CCTV</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='cctv' class="form-control">
                                                <option data-display="-- เลือกกล้อง CCTV--" value="">-- เลือกกล้อง CCTV--</option>
                                                <option value="1">มี</option>
                                                <option value="2">ไม่มี</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">ประกันหมดอายุ</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group mb-3">
                                            <select name='expirydate_date' class="form-control">
                                                <option data-display="วัน" value="">วัน</option>
                                                <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <select name='expirydate_month' class="form-control">
                                                <option data-display="เดือน" value="">เดือน</option>
                                                <option value="01">มกราคม</option>
                                                <option value="02">กุมภาพันธ์</option>
                                                <option value="03">มีนาคม</option>
                                                <option value="04">เมษายน</option>
                                                <option value="05">พฤษภาคม</option>
                                                <option value="06">มิถุนายน</option>
                                                <option value="07">กรกฎาคม</option>
                                                <option value="08">สิงหาคม</option>
                                                <option value="09">กันยายน</option>
                                                <option value="10">ตุลาคม</option>
                                                <option value="11">พฤศจิกายน</option>
                                                <option value="12">ธันวาคม</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='expirydate_year' class="form-control">
                                                <option data-display="ปี" value="">ปี</option>
                                                <?php for ($i = date('Y'); $i >= date('Y') - 100; $i--) { ?>
                                                    <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">เบอร์โทรศัพท์</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="กรอกเบอร์โทรศัพท์">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    เช็คราคา
                                    <i class="la la-arrow-right"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="price-grid" class="price-grid section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h1 style="text-align: center; color:#514dd9"><span style="color:#08e5de; font-size:70px;">“</span> ค้นพบข้อเสนอโดนๆให้คุณซื้อประกันออนไลน์แบบไร้กังวล</h1>
                            <h1 style="text-align: center; color:#514dd9"> และได้รับความคุ้มครองตามที่ได้ระบุไว้ในกรมธรรม์ <span style="color:#08e5de;font-size:70px;">”</span></h1>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="./icons/logo.jpg" alt="logo" width="100%">
                    </div>
                    <div class="col-md-7">
                        <img src="./icons/logo.jpg" width="70" alt="logo">คือแพลตฟอร์มอินชัวร์เทค(InsurTech) แห่งแรกของประเทศไทย โดยเรานำเสนอแพลตฟอร์มเทียบแผนประกันชั้นนำที่มาปฏิวัติอุตสาหกรรมประกันภัย โดนการรวมเทคโนโลยีและความชำนาญในธุรกิจประกันภัย จนได้แพลจฟอร์มประกันภัยออนไลน์ที่ใช้ง่าย ใช้สะดวกในทุกขั้นตอน ตั้งแต่เลือกซื้อประกันจนถึงการชำระเงิน พร้อมให้บริการลูกค้า ด้วยการค้นหาแผนประกันที่หลากหลาย สะดวกและรวดเร็ว ผ่านช่องทางการซื้อที่ปลอดภัย มั่นใจได้
                    </div>
                    <div class="col-md-12" style="margin-top: 40px;">
                        <img src="./information/state_insurance.jpg" alt="logo" width="100%">
                    </div>

                </div>
            </div>
        </div>



        <div id="getstart" class="getstart section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12" style="margin-top: 40px;">
                        <img src="./information/banner.png" alt="logo" width="100%">
                    </div>
                </div>
            </div>
        </div>



        <div id="portfolio" class="portfolio section-padding" data-scroll-index="2">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12" style="margin-top: 40px;">
                        <img src="./information/icon_insurance.jpg" alt="logo" width="100%">
                    </div>
                </div>
            </div>
        </div>



        <div class="footer" id="contact">
            <div class="container">
                <div class="row">


                    <div class="col-xl-12 col-12" style="color:white">
                        <div>
                            <h4 style="color:white;">บริษัท เอส โอ เอส โบรคเกอร์ ประกันภัย จำกัด</h4>
                            <p>ขอบคุณที่ท่านให้ความสนใจในบริษัท เอส โอ เอส โบรคเกอร์ ประกันภัย จำกัด เพื่อความสะดวกท่านฝากข้อความไว้หรือสอบถามปัญหาการใช้งาน ถึงเราได้โดยตรง</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <input type="text" name="fullname" id="fullname" class="form-control mb-3" placeholder="Full Name">
                    </div>

                    <div class="col-md-6">
                        <input type="email" name="email" id="email" class="form-control mb-3" placeholder="Email">
                    </div>

                    <div class="col-md-10">
                        <textarea class="form-control mb-3" name="detail" id="detail" rows="3" placeholder="Tell us we can help you with!" required></textarea>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary lift" style="margin-top: 10px;margin-bottom: 10px;" onclick="contact()">
                            ติดต่อเรา
                        </button>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="copyright">
                            <p>© Copyright 2021 <a href="#">SOS PRAKAN</a> I All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="./js/global.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="./js/plugins/owl-carousel-init.js"></script>

    <script src="./vendor/apexchart/apexcharts.min.js"></script>
    <script src="./vendor/apexchart/apexchart-init.js"></script>

    <script src="./js/scripts.js"></script>
    <script>
        $('#car_brand').change(function() {
            $.ajax({
                url: "car_model.php",
                type: "post",
                data: 'MakeCode=' + $('#car_brand').val(),
                success: function(response) {
                    $('.car_model').html(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });


        function carsub(sub) {
            $.ajax({
                url: "detail_car.php",
                type: "post",
                data: {
                    makecode: $('#car_brand').val(),
                    familycode: sub,
                    caryear: $('#car_year').val()

                },
                success: function(response) {
                    $('.carsub_model').html(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function contact() {
            if ($('#fullname').val() != '' && $('#email').val() != '' && $('#detail').val()) {
                $.ajax({
                    url: "contact.php",
                    type: "post",
                    data: {
                        fullname: $('#fullname').val(),
                        email: $('#email').val(),
                        detail: $('#detail').val()

                    },
                    success: function(msg) {
                        if (msg == 'success') {
                            alert('ขอบคุณที่ส่งข้อความถึงเรา')
                            window.location = 'index.php';
                        } else {
                            window.location = 'index.php';
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

        }
    </script>
</body>

</html>