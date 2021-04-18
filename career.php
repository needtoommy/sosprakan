<?php
include 'db.php';
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
                                <a class="navbar-brand" href="index.php"><img src="./icons/logo.jpg" alt="logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">หน้าหลัก
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php" style="width: 100px;">เกี่ยวกับเรา</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php" style="width: 130px;">ประกันรถยนต์</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="career.php" style="width: 100px;">สมัครงาน
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php" style="width: 100px;">ติดต่อเรา
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
        <form method="post" action="career_insert.php" enctype="multipart/form-data">
            <div class="container" style="margin-top:20px;">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="info-list">
                            <h4 class="mb-3" style="color:blue;">ตำแหน่งงานทั้งหมด</h4>
                            <p>เลือกตำแหน่งงานที่เปิดรับได้มากกว่า 1 ตำแหน่ง</p>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c1" id="c1" value="เจ้าหน้าที่บริการลูกค้าองค์กร">
                                <span>เจ้าหน้าที่บริการลูกค้าองค์กร</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c2" id="c2" value="เจ้าหน้าที่บริการลูกค้าออนไลน์">
                                <span>เจ้าหน้าที่บริการลูกค้าออนไลน์</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c3" id="c3" value="เจ้าหน้าที่บริการตัวแทน">
                                <span>เจ้าหน้าที่บริการตัวแทน</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c4" id="c4" value="เจ้าหน้าที่ธุรการฝ่ายขาย">
                                <span>เจ้าหน้าที่ธุรการฝ่ายขาย</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c5" id="c5" value="เจ้าหน้าที่พัฒนาธุรกิจ">
                                <span>เจ้าหน้าที่พัฒนาธุรกิจ</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c6" id="c6" value="เจ้าหน้าที่ลูกค้าสัมพันธ์">
                                <span>เจ้าหน้าที่ลูกค้าสัมพันธ์</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c7" id="c7" value="เจ้าหน้าที่ฝ่ายกรมธรรม์">
                                <span>เจ้าหน้าที่ฝ่ายกรมธรรม์</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c8" id="c8" value="เจ้าหน้าที่การเงิน">
                                <span>เจ้าหน้าที่การเงิน</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c9" id="c9" value="เจ้าหน้าที่บัญชี">
                                <span>เจ้าหน้าที่บัญชี</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c10" id="c10" value="เจ้าหน้าที่จัดส่งเอกสาร">
                                <span>เจ้าหน้าที่จัดส่งเอกสาร</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c11" id="c11" value="เจ้าหน้าที่โปรแกรมเมอร์">
                                <span>เจ้าหน้าที่โปรแกรมเมอร์</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="checkbox" style="width: 20px;height:20px;" name="c12" id="c12" value="เจ้าหน้าที่ Content Creator">
                                <span>เจ้าหน้าที่ Content Creator</span> <a href="#" data-toggle="modal" data-target="#exampleModalCenter">รายละเอียด</a>
                            </div>


                        </div>
                    </div>
                    <div class="col-xl-8">

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h3 style="color:blue">ข้อมูลผู้สมัคร</h3>
                                <p>กรอกรายละเอียดเบื้องต้น</p>
                            </div>

                            <div class="col-12 col-md-12">
                                <label for="contactName">
                                    แนบรูปถ่าย <span style="color:red">*ไม่เกิน 10 mb</span>
                                </label>
                                <input type="file" class="form-control" id="img" name="img" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    ชื่อ-สกุล(ภาษาไทย)
                                </label>
                                <input type="text" class="form-control" id="namethai" name="namethai" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    ชื่อ-สกุล(ภาษาอังกฤษ)
                                </label>
                                <input type="text" class="form-control" id="nameeng" name="nameeng" required>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    เพศ
                                </label>
                                <div class="form-control">
                                    ชาย
                                    <input type="radio" id="sex" name="sex" value="ชาย" required>
                                    หญิง
                                    <input type="radio" id="sex" name="sex" value="หญิง">
                                </div>

                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    ชื่อเล่น
                                </label>
                                <input type="text" class="form-control" id="nickname" name="nickname" required>
                            </div>



                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    อายุ(ปี)
                                </label>
                                <input type="number" class="form-control" id="age" name="age" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    ส่วนสูง
                                </label>
                                <input type="number" class="form-control" id="height" name="height">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    น้ำหนัก
                                </label>
                                <input type="number" class="form-control" id="weight" name="weight" required>
                            </div>
                        </div>
                        <!-- / .row -->
                        <div class="row">
                            <div class="col-12">
                                <label for="contactMessage">
                                    ที่อยู่ปัจจุบัน
                                </label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="" required></textarea>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    Facebook
                                </label>
                                <input type="text" class="form-control" id="facebook" name="facebook">
                            </div>



                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    Line id
                                </label>
                                <input type="text" class="form-control" id="line" name="line">
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    เบอร์ติดต่อ
                                </label>
                                <input type="number" class="form-control" id="tel" name="tel" required>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    ระดับการศึกษา
                                </label>
                                <select name="edu" id="edu" class="form-control" required>
                                    <option value="ปริญญาตรี">ปริญญาตรี</option>
                                    <option value="ปริญญาโท">ปริญญาโท</option>
                                    <option value="ปริญญาเอก">ปริญญาเอก</option>
                                </select>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    เงินเดือนที่คาดหวัง
                                </label>
                                <input type="number" class="form-control" id="salary" name="salary" required>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="ประสบการณ์ทำงาน">
                                    ประสบการณ์ทำงาน
                                </label>
                                <input type="text" class="form-control" id="experince" name="experince">
                            </div>


                            <div class="col-12 col-md-8">
                                <label for="ประสบการณ์ทำงาน">
                                    ตำแหน่งงานล่าสุด
                                </label>
                                <input type="text" class="form-control" id="position" name="position">
                            </div>


                            <div class="col-12 col-md-12">
                                <label for="ประสบการณ์ทำงาน">
                                    ลักษณะงานที่ทำ
                                </label>
                                <input type="text" class="form-control" id="propjob" name="propjob">
                            </div>


                            <div class="col-12">
                                <label for="contactMessage">
                                    ข้อดีของคุณคืออะไร
                                </label>
                                <textarea class="form-control" name="positive" id="positive" rows="3" placeholder="" required></textarea>
                            </div>



                            <div class="col-12">
                                <label for="contactMessage">
                                    ผลงาน กิจกรรมที่เคยทำ ความสามารถพิเศษ
                                </label>
                                <textarea class="form-control" name="activity" id="activity" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <!-- / .row -->
                        <div class="row justify-content-center">
                            <div class="col-auto">

                                <!-- Submit -->
                                <button type="submit" class="btn btn-primary lift" style="margin-top: 10px;margin-bottom: 10px;">
                                    สมัครงาน
                                </button>

                            </div>
                        </div>
                        <!-- / .row -->

                    </div>
                </div>
            </div>
    </div>
    </form>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-12">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center;">ร่วมงานกับเรา</h5>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="detail">
                        <h4>รายละเอียดงาน</h4>
                        <ul>
                            <li style="margin-left:20px;list-style:disc;">รูปแบบงาน: ประจำ 8:30-17.30 วันจันทร์-ศุกร์ (เสาร์เว้นเสาร์ 9:00-15:00)</li>
                            <li style="margin-left:20px;list-style:disc;">สถานที่ปฏิบัติงาน: กรุงเทพมหานคร (เขตบางพลัด)</li>
                            <li style="margin-left:20px;list-style:disc;">เงินเดือน(บาท): 13,000-25,000+ ค่าคอมมิชชั่น(ตามความสามารถ)+ค่าน้ำมัน</li>
                        </ul>
                    </div>

                    <div class="work">
                        <h4>หน้าที่ความรับผิดชอบ</h4>
                        <ul>
                            <li style="margin-left:20px;list-style:disc;">ให้บริการและนำเสนอข้อมูลการทำประกันแก่กลุ่มลูกค้าองค์กร</li>
                            <li style="margin-left:20px;list-style:disc;">ดูแลฐานลูกค้าเก่าและลูกค้าใหม่</li>
                            <li style="margin-left:20px;list-style:disc;">ประสานงานบริษัทประกันในการทำข้อเสนอและการบริการหลังการขาย</li>
                            <li style="margin-left:20px;list-style:disc;">จัดทำรายงานเสนอหัวหน้าและงานอื่นๆ ตามที่ได้รับมอบหมาย</li>
                        </ul>
                    </div>

                    <div class="prop">
                        <h4>คุณสมบัติที่จำเป็น</h4>
                        <ul>
                            <li style="margin-left:20px;list-style:disc;">วุฒิการศึกษาระดับปริญญาตรี ขึ้นไป</li>
                            <li style="margin-left:20px;list-style:disc;">มีประสบการณ์การขาย อย่างน้อย 2 ปีขึ้นไป</li>
                            <li style="margin-left:20px;list-style:disc;">บุคคลิกภาพ ทักษะการสื่อสาร รักในงานขายละบริการ</li>
                            <li style="margin-left:20px;list-style:disc;">มีรถยนต์เป็นของตัวเอง ออกพบลูกค้าได้</li>
                            <li style="margin-left:20px;list-style:disc;">หากมีประสบการณ์ด้านงานประกันภัย จะได้รับพิจารณาเป็นพิเศษ</li>
                        </ul>
                    </div>

                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
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

    </script>
</body>

</html>