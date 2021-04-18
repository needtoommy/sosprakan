<?php
session_start();
include 'connect/db.php';
$db = new DB();
if ($_GET['type'] == 1) {
    $sql = "DELETE from job where job_id=" . $_GET['id'] . "";
    echo "<script type='text/javascript'>alert('ลบสำเร็จ'); window.location='career_list.php'</script>";
} else {
    $sql = "SELECT * from job where job_id=" . $_GET['id'] . "";
}
$db->Execute($sql);
$row = $db->getData();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>รายละเอียดผู้สมัครงาน</title>
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

                    <div class="col-xl-12">

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <h3 style="color:blue">ข้อมูลผู้สมัคร</h3>
                            </div>


                            <div class="col-12 col-md-12">
                                <label for="contactName">
                                    ตำแหน่งที่ต้องการสมัคร
                                </label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="" readonly><?php echo $row['request_position'] ?></textarea>
                            </div>


                            <div class="col-12 col-md-12">
                                <label for="contactName">
                                    แนบรูปถ่าย
                                </label>
                                <img src="<?php echo $row['img'] ?>" width="300" alt="">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    ชื่อ-สกุล(ภาษาไทย)
                                </label>
                                <input type="text" class="form-control" id="namethai" name="namethai" value="<?php echo $row['namethai']; ?>" readonly>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    ชื่อ-สกุล(ภาษาอังกฤษ)
                                </label>
                                <input type="text" class="form-control" id="nameeng" name="nameeng" value="<?php echo $row['nameeng']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    เพศ
                                </label>
                                <input type="text" class="form-control" id="nameeng" name="nameeng" value="<?php echo $row['sex']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    ชื่อเล่น
                                </label>
                                <input type="text" class="form-control" id="nickname" name="nickname"  value="<?php echo $row['nickname']; ?>" readonly>
                            </div>



                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    อายุ(ปี)
                                </label>
                                <input type="number" class="form-control" id="age" name="age"  value="<?php echo $row['age']; ?>" readonly>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    ส่วนสูง
                                </label>
                                <input type="number" class="form-control" id="height" name="height"  value="<?php echo $row['height']; ?>" readonly>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="contactName">
                                    น้ำหนัก
                                </label>
                                <input type="number" class="form-control" id="weight" name="weight"  value="<?php echo $row['weight']; ?>" readonly>
                            </div>
                        </div>
                        <!-- / .row -->
                        <div class="row">
                            <div class="col-12">
                                <label for="contactMessage">
                                    ที่อยู่ปัจจุบัน
                                </label>
                                <textarea class="form-control" name="address" id="address" rows="3" placeholder="" readonly> <?php echo $row['address']; ?></textarea>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    Email
                                </label>
                                <input type="email" class="form-control" id="email" name="email"  value="<?php echo $row['email']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    Facebook
                                </label>
                                <input type="text" class="form-control" id="facebook" name="facebook"  value="<?php echo $row['facebook']; ?>" readonly>
                            </div>



                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    Line id
                                </label>
                                <input type="text" class="form-control" id="line" name="line"  value="<?php echo $row['line']; ?>" readonly> 
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    เบอร์ติดต่อ
                                </label>
                                <input type="number" class="form-control" id="tel" name="tel"  value="<?php echo $row['tel']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    ระดับการศึกษา
                                </label>
                                <input type="text" class="form-control" id="edu" name="edu"  value="<?php echo $row['edu']; ?>" readonly>
                             
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="contactName">
                                    เงินเดือนที่คาดหวัง
                                </label>
                                <input type="number" class="form-control" id="salary" name="salary"  value="<?php echo $row['salary']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-4">
                                <label for="ประสบการณ์ทำงาน">
                                    ประสบการณ์ทำงาน
                                </label>
                                <input type="text" class="form-control" id="experince" name="experince"  value="<?php echo $row['experince']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-8">
                                <label for="ประสบการณ์ทำงาน">
                                    ตำแหน่งงานล่าสุด
                                </label>
                                <input type="text" class="form-control" id="position" name="position" value="<?php echo $row['position']; ?>" readonly>
                            </div>


                            <div class="col-12 col-md-12">
                                <label for="ประสบการณ์ทำงาน">
                                    ลักษณะงานที่ทำ
                                </label>
                                <input type="text" class="form-control" id="propjob" name="propjob" value="<?php echo $row['propjob']; ?>" readonly>
                            </div>


                            <div class="col-12">
                                <label for="contactMessage">
                                    ข้อดีของคุณคืออะไร
                                </label>
                                <textarea class="form-control" name="positive" id="positive" rows="3" placeholder="" readonly><?php echo $row['positive']; ?></textarea>
                            </div>



                            <div class="col-12">
                                <label for="contactMessage">
                                    ผลงาน กิจกรรมที่เคยทำ ความสามารถพิเศษ
                                </label>
                                <textarea class="form-control" name="activity" id="activity" rows="3" placeholder="" readonly><?php echo $row['activity']; ?></textarea>
                            </div>
                        </div>
                        <br>

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