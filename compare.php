<?php

$id_1 = explode(",", $_GET['id'])[0];

$id_2 = explode(",", $_GET['id'])[1];
header('Cache-Control: no cache'); //disable validation of form by the browser
session_cache_limiter('private_no_expire'); // works
include './connect/db.php';
$db = new DB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradix</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon1.jpg">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>

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
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="blog section-padding border-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="row">
                            <?php
                            $sql = "SELECT * FROM product where  productid=$id_1";
                            $db->Execute($sql);
                            $row = $db->getData();
                            ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                <div class="blog-grid">
                                    <div class="card">

                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img height="100" width="100" src="./images/supplier/<?php echo $row['img'] ?>" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <h3 style="margin-top: 20px;"><?php echo $row['insure_name'] ?></h3>
                                                    <h5>ราคา <?php echo number_format($row['insure_prince'], 2) ?> บาท</h5>
                                                    <h5>ทุนประกัน <?php echo number_format($row['insure_cover'], 2) ?> บาท</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                                <br>
                                                <span><?php echo $row['promotion'] ?></span>
                                            </div>
                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                                    </div>
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                                    </div>
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;">
                                                            <?php
                                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                                            if ($row['claim1'] && $row['claim2']) {
                                                                echo ',';
                                                            }
                                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                                    </div>
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                                    <hr />
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <span>ไฟไหม้ และ โจรกรรม</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>ประกันน้ำท่วม</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                                                </div>


                                                <div class="col-md-12 col-12">
                                                    <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                                    <hr />
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>อุบัติเหตุส่วนบุคคล</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>ค่ารักษาพยาบาล</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>ประกันตัวผู้ขับขี่</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                                                </div>



                                                <div class="col-md-12">
                                                    <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                                    <hr />
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="card-footer">
                                            <div class="meta-info">
                                                <a href="#" class="author"><img src="./images/avatar/5.jpg" alt="">
                                                    Admin</a>
                                                <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July,
                                                    2019</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sql = "SELECT * FROM product where  productid=$id_2";
                            $db->Execute($sql);
                            $row = $db->getData();
                            ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-6">
                                <div class="blog-grid">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img  height="100" width="100" src="./images/supplier/<?php echo $row['img'] ?>" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <h3 style="margin-top: 20px;"><?php echo $row['insure_name'] ?></h3>
                                                    <h5>ราคา <?php echo number_format($row['insure_prince'], 2) ?> บาท</h5>
                                                    <h5>ทุนประกัน <?php echo number_format($row['insure_cover'], 2) ?> บาท</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                                <br>
                                                <span><?php echo $row['promotion'] ?></span>
                                            </div>
                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                                    </div>
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                                    </div>
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;">
                                                            <?php
                                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                                            if ($row['claim1'] && $row['claim2']) {
                                                                echo ',';
                                                            }
                                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                                    </div>
                                                    <div class="col-md-6 col-12" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                                    <hr />
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <span>ไฟไหม้ และ โจรกรรม</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>ประกันน้ำท่วม</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                                                </div>


                                                <div class="col-md-12 col-12">
                                                    <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                                    <hr />
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>อุบัติเหตุส่วนบุคคล</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>ค่ารักษาพยาบาล</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>ประกันตัวผู้ขับขี่</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                                                </div>



                                                <div class="col-md-12">
                                                    <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                                    <hr />
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- <div class="card-footer">
                                            <div class="meta-info">
                                                <a href="#" class="author"><img src="./images/avatar/5.jpg" alt="">
                                                    Admin</a>
                                                <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July,
                                                    2019</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12" style="text-align:center">
                        <button type="button" class="btn btn-success waves-effect" onclick="click_link()">กลับไปเลือกประกัน</button>
                    </div>
                </div>
            </div>
        </div>




        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="copyright">
                            <p>© Copyright 2019 <a href="#">Tradix</a> I All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
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

    <script src="./js/scripts.js"></script>
    <script>
        function click_link() {
            window.location = 'form_step_type.php'
        }
    </script>

</body>

</html>