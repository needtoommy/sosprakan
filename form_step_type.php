<?php
include 'db.php';
session_start();
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

    <!-- <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.csss"> -->

</head>
<style>
    #regForm {
        background-color: #ffffff;
        margin-top: 100px;
        font-family: Raleway;
        /* padding: 40px; */
        width: 100%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: hsl(239deg 100% 41%);
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
        padding: 10px;
    }

    .step.active {
        opacity: 1;

    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
        display: none;
    }

    #main-wrapper {
        margin-top: 0px;
    }

    .end {
        background: #10d876;
        color: #fff;
        padding: 10px;
        border-radius: 50px;
        height: 40px;
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;
        display: none;
        font-weight: bold;
        opacity: 0.5;
    }

    .end.active {
        opacity: 1;

    }

    .form-control {
        border-color: hsl(210deg 73% 81%);
        border-radius: 25px;
    }

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

        <div class="intro" style="padding: 50px 0px;">
            <div class="container">

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:100px;">
                    <div class="row stepup">

                        <div style="width:25%">
                            <div class="col-md-12">
                                <!-- <span class="step" style="display: none;"></span> -->
                                <span class="end" id="" style="display: inline-block !important;"><i class="la la-check"></i></span>
                            </div>
                            <div class="col-md-12">
                                ระบุข้อมูล
                            </div>
                        </div>
                        <div style="width:25%">
                            <div class="col-md-12">
                                <span class="step"></span>
                                <span class="end" id="end0"><i class="la la-check"></i></span>
                            </div>
                            <div class="col-md-12">
                                เลือกแพ็คเกจ
                            </div>
                        </div>
                        <div style="width:25%">
                            <div class="col-md-12">
                                <span class="step"></span>
                                <span class="end" id="end1"><i class="la la-check"></i></span>
                            </div>
                            <div class="col-md-12">
                                สมัครแผนประกัน
                            </div>
                        </div>
                        <div style="width:25%">
                            <div class="col-md-12">
                                <span class="step"></span>
                                <span class="end" id="end2"><i class="la la-check"></i></span>
                            </div>
                            <div class="col-md-12">
                                ชำระเงิน
                            </div>
                        </div>


                    </div>

                </div>


                <!-- One "tab" for each step in the form: -->
                <br />


                <div class="tab" id="tab2">

                    <input type="hidden" name="insure_level" value="1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" onclick="car_type(1)" style="cursor: pointer;">ชั้น1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="car_type(2)" style="cursor: pointer;">ชั้น2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="car_type(3)" style="cursor: pointer;">ชั้น2+</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="car_type(4)" style="cursor: pointer;">ชั้น3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="car_type(5)" style="cursor: pointer;">ชั้น3+</a>
                        </li>
                    </ul>
                    <?php
                    $sql_product = "SELECT * from product WHERE insure_type = '1' and status = 'A'";
                    $stmt = $pdo->prepare($sql_product);
                    $stmt->execute();
                    $i = 1;
                    while ($row = $stmt->fetch()) {
                    ?>
                        <div class="row" style="background-color: #f2f6ff;margin-bottom:15px;padding-bottom:10px;">

                            <div class="col-md-10 col-12">
                                <div class="row">
                                    <div class="col-md-2 col-4">
                                        <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="120" height="120" style="padding:8px;margin-top:15px;">
                                    </div>
                                    <div class="col-md-10 col-8">
                                        <div class="row">
                                            <div class="col-md-12 " style="margin-top: 15px;">
                                                <h4><?php echo $row['insure_name']; ?> ชั้น 1</h4>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <?php if ($row['claim1'] != '') {
                                                    ?>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-12">
                                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ประกัน</span>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <del><em><?php echo number_format($row['claim1_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim1_dis'], 2); ?></strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } ?>

                                                    <?php
                                                    if ($row['claim2'] != '') {
                                                    ?>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-12">
                                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ห้าง</span>
                                                                </div>
                                                                <div class="col-md-12 col-12">
                                                                    <del><em><?php echo number_format($row['claim2_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim2_dis'], 2); ?></strong></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-12">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-6 col-md-12">
                                        <a class="btn btn-dark" id="compare<?php echo $row['productid'] ?>" style=" padding:10px;margin-top:10px;width:100%" onclick="compare('<?php echo $row['productid'] ?>')">เปรียบเทียบ</a>
                                    </div>
                                    <div class="col-6 col-md-12">
                                        <a href="#" class="btn btn-primary" style=" padding:10px; margin-top:10px;width:100%;" onclick="nextPrev(1);set_productid(<?php echo $row['productid'] ?>);">สนใจ</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <span id="read-more<?php echo $i; ?>" onclick="preview(<?php echo $i; ?>)" style="display:flex;justify-content:center;cursor:pointer;">-- ดูเพิ่มเติม --</span>
                            </div>
                            <div class="col-md-12" id="toggle-data<?php echo $i; ?>" style="display:none;background-color: white; margin-top:20px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="background-color: white;"></p>
                                    </div>
                                    <div class="col-md-6" style="background-color: hsl(222deg 100% 97%);">
                                        <div class="row">
                                            <div class="col-md-3 col-3">
                                                <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="80" height="80" style="padding:8px;margin-top:15px;">
                                            </div>
                                            <div class="col-md-9 col-9">
                                                <span style="font-size:20px; color:black;margin-top:10px;"><?php echo $row['insure_name'] ?></span>
                                                <br />
                                                <span>ให้บริการโดย <strong><?php echo $row['suppliername'] ?></strong></span>
                                            </div>



                                            <div style="padding: 10px;background-color:#ffffff; margin-top:15px;" class="col-md-12">
                                                <div class="col-md-12">
                                                    <span style="color:hsl(3deg 94% 42%);text-align:center;font-size:30px;background-color:hsl(222deg 100% 97%); display:flex;justify-content:center;"><?php echo number_format($row['insure_prince'], 2) ?></span>
                                                </div>
                                                <div class="col-md-12">
                                                    <p style="text-align: center;font-size:25px;">ทุนประกันภัย <?php echo number_format($row['insure_cover'], 2) ?> ฿</p>
                                                </div>
                                            </div>

                                            <div class="col-md-12" style="padding: 15px;background-color:hsl(268deg 79% 96%);">
                                                <div style="padding: 10px;background-color:hsl(0deg 0% 100%);">
                                                    <p style="text-align: center;color:black">กรอกข้อมูลเพื่อรับข้อเสนอนี้</p>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name_sp" class="name_sp">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname_sp" class="lastname_sp">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทร" name="phone_sp" class="phone_sp">
                                                    </div>
                                                </div>
                                                <div class="col-md-12" style="margin-top: 10px;">
                                                    <input type="checkbox" name="consent" id="consent" style="width: 0;height:20px;width:20px;">&nbsp;&nbsp;
                                                    <span>ยอมรับ</span><span style="color:hsl(206deg 78% 58%)">นโยบายของเรา</span>
                                                </div>
                                                <button type="button" class="btn btn-success waves-effect" id="confirm_sp" style="width: 100%;margin-top:10px;" onclick="nextPrev(1)">ยืนยันข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                                <br>
                                                <span><?php echo $row['promotion'] ?></span>
                                            </div>
                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                                    </div>
                                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                                    </div>
                                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
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
                                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                                    </div>
                                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                                <hr />
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span>ไฟไหม้ และ โจรกรรม</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span>ประกันน้ำท่วม</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                                            </div>


                                            <div class="col-md-12">
                                                <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                                <hr />
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span>อุบัติเหตุส่วนบุคคล</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span>ค่ารักษาพยาบาล</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span>ประกันตัวผู้ขับขี่</span>
                                            </div>
                                            <div class="col-md-6 col-6">
                                                <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                                            </div>



                                            <div class="col-md-12">
                                                <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                                <hr />
                                            </div>
                                            <div class="col-md-8 col-8">
                                                <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                                            </div>
                                            <div class="col-md-4 col-4">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                                            </div>
                                            <div class="col-md-6 col-8">
                                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                                            </div>
                                            <div class="col-md-6 col-4">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                                            </div>
                                            <div class="col-md-6 col-8">
                                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                                            </div>
                                            <div class="col-md-6 col-4">
                                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <?php
                        ?>
                    <?php
                        $i++;
                    }
                    ?>

                </div>


                <form id="regForm" action="form_step_submit.php" autocomplete="off">
                    <input type="hidden" name="productid" id="productid">
                    <div class="tab">

                        <div class="form-row" style="padding: 5px;">
                            <div class="col-md-12">
                                <h3 style="background-color: darkblue;color:whitesmoke; padding:10px;">ข้อมูลของคุณ</h3>
                            </div>
                            <div class="form-group col-xl-12">
                            </div>
                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">ชื่อ: </span>
                                <input type="text" class="form-control" placeholder="ชื่อ" name="firstname" id="firstname">
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">นามสกุล: </span>
                                <input type="text" class="form-control" placeholder="นามสกุล" name="lastname" id="lastname">
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">เจ้าของรถ: </span>
                                <br>
                                <input type="radio" style="padding:10px;width:25px;height:25px;" name="owner_car" id="owner_car">
                                ตัวท่านเอง &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" style="padding:10px;width:25px;height:25px;"  name="owner_car" id="owner_car">
                                คนอื่น
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">เลขบัตรประชาชน: </span>
                                <input type="number" class="form-control" placeholder="" name="citizenid" id="citizenid">
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">เบอร์สะดวกติดต่อ: </span>
                                <input type="number" class="form-control" placeholder="" name="tel" id="tel">
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">อีเมล: </span>
                                <input type="text" class="form-control" placeholder="เพื่อรับกรมธรรม์" name="email" id="email">
                            </div>


                            <div class="col-md-12">
                                <h3 style="background-color: darkblue;color:whitesmoke; padding:10px;">ที่อยู่</h3>
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">บ้านเลขที่: </span>
                                <input type="text" class="form-control" placeholder="" name="addressno" id="addressno">
                            </div>


                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">หมู่: </span>
                                <input type="text" class="form-control" placeholder="" name="addressmoo">
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">ซอย: </span>
                                <input type="text" class="form-control" placeholder="" name="addresssoi">
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">ถนน: </span>
                                <input type="text" class="form-control" placeholder="" name="addressroad">
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">จังหวัด: </span>
                                <div class="province">
                                    <select name='province' id="province" class="form-control">
                                        <option data-display="-- จังหวัด --" value="">-- จังหวัด --</option>
                                        <?php
                                        $stmt = $pdo->query('SELECT distinct(province) FROM location ');
                                        while ($row = $stmt->fetch()) {
                                        ?>
                                            <option value="<?php echo $row['province']; ?>"><?php echo $row['province']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">เขต/อำเภอ: </span>
                                <div class="amphur">
                                    <select name='amphur' id="amphur" class="form-control">
                                        <option data-display="-- เขต/อำเภอ --" value="">-- เขต/อำเภอ --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">แขวง/ตำบล: </span>
                                <div class="district">
                                    <select name='district' id="district" class="form-control">
                                        <option data-display="-- แขวง/ตำบล --" value="">-- แขวง/ตำบล --</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-xl-6">
                                <span class="mr-sm-2">รหัสไปรษณีย์: </span>
                                <div class="zipcode">
                                    <input type="text" class="form-control" placeholder="" name="zipcode" readonly>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <h3 style="background-color: darkblue;color:whitesmoke; padding:10px;">รายละเอียดรถยนต์</h3>
                            </div>

                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">ปีรถ: </span>

                                <select name='car_year' id="car_year" class="form-control">
                                    <option data-display="-- เลือกปีรถ --" value="">-- เลือกปีรถ --</option>
                                    <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--) { ?>
                                        <option value="<?php echo  $i ?>" <?php echo $_POST['car_year'] == $i ? 'selected' : '' ?>><?php echo  $i ?></option>
                                    <?php  } ?>
                                </select>

                            </div>

                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">ยี่ห้อรถ: </span>
                                <select name='car_brand' id="car_brand" class="form-control">
                                    <?php
                                    echo  $_POST['car_brand'] != '' ? $_POST['car_brand'] : '<option data-display="-- เลือกยี่ห้อรถยนต์ --" value="">-- เลือกยี่ห้อรถยนต์ --</option>'
                                    ?>

                                    <?php
                                    $stmt = $pdo->query('SELECT MakeCode, Description FROM car_brand');
                                    while ($row = $stmt->fetch()) {
                                    ?>
                                        <option value="<?php echo $row['MakeCode']; ?>"><?php echo $row['Description']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <!-- <?php print_r($_POST); ?> -->

                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">รุ่นรถ: </span>
                                <div class="car_model">

                                    <select name='car_model' id='car_model' class="form-control">
                                        <option value="<?php echo $_POST['car_model'] ?>"><?php echo $_POST['car_model'] ?></option>

                                    </select>
                                </div>
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">รุ่นย่อยรถ: </span>
                                <div class="carsub_model">
                                    <select name='carsub_model' id='carsub_model' class="form-control">
                                        <option value="<?php echo $_POST['carsub_model'] ?>"><?php echo $_POST['carsub_model'] ?></option>

                                    </select>
                                </div>
                            </div>



                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">จังหวัดที่จดทะเบียน: </span>
                                <select name='car_plate_province' id="car_plate_province" class="form-control">
                                    <option data-display="-- จังหวัด --" value="">-- จังหวัด --</option>
                                    <?php
                                    $stmt = $pdo->query('SELECT distinct(province) FROM location ');
                                    while ($row = $stmt->fetch()) {
                                    ?>
                                        <option value="<?php echo $row['province']; ?>"><?php echo $row['province']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">เลขทะเบียน (ตัวอย่าง กก-1111): </span>
                                <input type="text" class="form-control" placeholder="" name="car_plate" id="car_plate">
                            </div>

                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">เลขตัวถัง: </span>
                                <input type="text" class="form-control" placeholder="" name="car_num_body" id="car_num_body">
                            </div>


                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">วันเริ่มคุ้มครอง: </span>
                                <input type="date" class="form-control" placeholder="" name="policy_date" id="policy_date" value="<?php echo date('Y-m-d') ?>">
                            </div>



                            <div class="form-group col-xl-12">
                                <span class="mr-sm-2">ซื้อพ.ร.บ.ด้วยหรือไม่ </span>
                                <br>
                                <input type="radio" style="padding:10px;width:25px;height:25px;" name="prb" value="Y" id="prb">
                                ซื้อ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" style="padding:10px;width:25px;height:25px;" name="prb" value="N" id="prb">
                                ไม่ซื้อ
                            </div>

                        </div>
                    </div>


                    <div class="tab">
                        <span style="font-size:1.875rem;text-align:center;padding:50px;justify-content:center;display:flex;">เจ้าหน้าที่จะติดต่อกลับไปขอบคุณค่ะ</span>
                        <div class="col-md-12" style="justify-content:center;display:flex;">
                            <img src="./icons/logo.jpg" alt="logo" width="70%">
                        </div>

                    </div>


                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button type="button" class="btn btn-success waves-effect" id="prevBtn" onclick="nextPrev(-1)">ย้อนกลับ</button>
                            <button type="button" class="btn btn-success waves-effect" id="nextBtn" onclick="nextPrev(1)">ยืนยันข้อมูล</button>
                            <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-12">
                    <div class="copyright">
                        <p>© Copyright 2021 <a href="#">SOS PRAKAN</a> I All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-md-6 col-12">
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


    <!-- <input type="hidden" name="step_form" id="step_form" value="<?php echo $_SESSION['currentTab']; ?>"> -->


    <script src="./js/global.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="./js/plugins/owl-carousel-init.js"></script>

    <script src="./vendor/apexchart/apexcharts.min.js"></script>
    <script src="./vendor/apexchart/apexchart-init.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script> -->




    <script src="./js/scripts.js"></script>
    <script>
        $(document).ready(function() {

        });

        var currentTab = 0; // Current tab is set to be the first tab (0)


        showTab(currentTab); // Display the current tab

        function showTab(n) {
            if (currentTab == 2) {

                sendData();
            }


            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
                if (currentTab == 2) {
                    document.getElementById("prevBtn").style.display = "none";

                    document.getElementsByClassName("step")[2].className += " finish";
                    $('#end' + 2).css('display', 'inline-block')
                    $('span, #end1').removeClass('active')

                    // document.getElementsByClassName("step").classList.remove("acitve");
                    document.getElementById("end2").classList.add("acitve");
                }
            }
            if (n == (x.length - 1)) {
                // document.getElementById("nextBtn").innerHTML = "ยืนยันข้อมูล";
                document.getElementById("nextBtn").style.display = "none";
            } else {
                if (currentTab == 0) {
                    $('#nextBtn').css('display', 'none')
                } else {
                    $('#nextBtn').css('display', 'inline-block')
                    document.getElementById("nextBtn").innerHTML = "ถัดไป";
                }


            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            if (currentTab == 1) {

                if ($('#firstname').val() == '') {
                    $('#firstname').focus();
                    $('#firstname').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#firstname').css('border', '0px solid red');
                }

                if ($('#lastname').val() == '') {
                    $('#lastname').focus();
                    $('#lastname').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#lastname').css('border', '0px solid red');
                }

                if (!$("input:radio[name='owner_car']").is(":checked")) {
                    $('#owner_car').focus();
                    alert('กรุณาเลือกเจ้าของรถยนต์')
                    return false
                } 

                if ($('#citizenid').val() == '') {
                    $('#citizenid').focus();
                    $('#citizenid').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#citizenid').css('border', '0px solid red');
                }

                if ($('#tel').val() == '') {
                    $('#tel').focus();
                    $('#tel').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#tel').css('border', '0px solid red');
                }

                if ($('#email').val() == '') {
                    $('#email').focus();
                    $('#email').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#email').css('border', '0px solid red');
                }

                if ($('#addressno').val() == '') {
                    $('#addressno').focus();
                    $('#addressno').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#addressno').css('border', '0px solid red');
                }

                if ($('#province').val() == '') {
                    $('#province').focus();
                    $('#province').css('border', '1px solid red !important');
                    alert('กรุณาเลือกจังหวัด')
                    return false
                }


                if ($('#amphur').val() == '') {
                    $('#amphur').focus();
                    $('#amphur').css('border', '1px solid red !important');
                    alert('กรุณาเลือกเขต/อำเภอ')
                    return false
                }


                if ($('#district').val() == '') {
                    $('#district').focus();
                    $('#district').css('border', '1px solid red !important');
                    alert('กรุณาเลือกตำบล/แขวง')
                    return false
                }


                if ($('#car_year').val() == '') {
                    $('#car_year').focus();
                    $('#car_year').css('border', '1px solid red !important');
                    alert('กรุณาเลือกปีรถ')
                    return false
                }

                if ($('#car_brand').val() == '') {
                    $('#car_brand').focus();
                    $('#car_brand').css('border', '1px solid red !important');
                    alert('กรุณาเลือกยี่ห้อรถยนต์')
                    return false
                }


                if ($('#car_model').val() == '') {
                    $('#car_model').focus();
                    $('#car_model').css('border', '1px solid red !important');
                    alert('กรุณาเลือกรุ่นรถยนต์')
                    return false
                }

                if ($('#car_plate_province').val() == '') {
                    $('#car_plate_province').focus();
                    $('#car_plate_province').css('border', '1px solid red !important');
                    alert('กรุณาเลือกจังหวัดที่จดทะเบียน')
                    return false
                }

                if ($('#car_plate').val() == '') {
                    $('#car_plate').focus();
                    $('#car_plate').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#car_plate').css('border', '0px solid red');
                }


                if ($('#car_num_body').val() == '') {
                    $('#car_num_body').focus();
                    $('#car_num_body').css('border', '1px solid red');
                    alert('กรุณากรอกข้อมูลให้ครบ !!')
                    return false
                } else {
                    $('#car_num_body').css('border', '0px solid red');
                }

                if (!$("input:radio[name='prb']").is(":checked")) {
                    $('#prb').focus();
                    alert('กรุณาเลือกซื้อพ.ร.บ.ด้วยหรือไม่')
                    return false
                }

               


            }
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:

            if (n == 1 && !validateForm()) return false;
            // if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }

            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            // for (i = 0; i < y.length; i++) {
            //     // If a field is empty...
            //     if (y[i].value == "") {
            //         // add an "invalid" class to the field:
            //         y[i].className += " invalid";
            //         // and set the current valid status to false
            //         valid = false;
            //     }
            // }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
                $('#end' + currentTab).css('display', 'inline-block')
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            var j, y = document.getElementsByClassName("end");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            for (j = 0; j < y.length; j++) {
                y[j].className = y[j].className.replace(" active", "");
            }

            //... and adds the "active" class on the current step:
            x[n].className += " active";
            y[n].className += " active";

            document.getElementById("end1").classList.remove("active")

        }

        function sendData() {
            $.ajax({
                url: "form_step_submit.php",
                type: "post",
                data: $('#regForm').serialize(),
                success: function(response) {
                    if (response != "success") {
                        return false
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function car_type(n) {
            $.ajax({
                url: "car_type.php",
                type: "post",
                data: {
                    type: n
                },
                success: function(response) {
                    $('#tab2').html(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

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

        $('#province').change(function() {
            $('.district').html("<select style='display:none' name='district' id='district' class='form-control'><option data-display='-- แขวง/ตำบล --'value=''>-- แขวง/ตำบล --</option></select><div class='nice-select form-control' tabindex='0'><span class='current'>-- แขวง/ตำบล --</span><ul class='list'><li data-value='' data-display='-- แขวง/ตำบล --' class='option selected'>-- แขวง/ตำบล --</li></ul></div>");
            $('#zipcode').val('');
            $.ajax({
                url: "get_amphur.php",
                type: "post",
                data: 'province=' + $('#province').val(),
                success: function(response) {
                    $('.amphur').html(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });

        $('.amphur,#amphur').change(function() {
            $('#zipcode').val('');
            $.ajax({
                url: "get_district.php",
                type: "post",
                data: {
                    province: $('#province').val(),
                    amphur: $('#amphur').val()
                },
                success: function(response) {
                    $('.district').html(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });



        $('.district,#district').change(function() {

            $.ajax({
                url: "get_zipcode.php",
                type: "post",
                data: {
                    province: $('#province').val(),
                    amphur: $('#amphur').val(),
                    district: $('#district').val()
                },
                success: function(response) {
                    $('.zipcode').html(response)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

        });

        function preview(n) {
            // $('#read-more' + n).click(function() {
            $('#toggle-data' + n).toggle("slow");
            // })
        }


        function set_productid(productid) {
            $('#productid').val(productid);
        }

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

        var checkid
        var check_count = 0
        var list_id = "";
        function compare(id) {
            
         
            if (checkid == id) {
                $('#compare' + id).css('background-color', '#1652F0');
                $('#compare' + id).css('color', 'white');
                check_count-=1
                checkid = 0;
            } else {
                list_id = list_id.concat(id, ",");
         
                checkid = id;
                check_count++;
                
                $('#compare' + id).css('background-color', '#10d876');
                $('#compare' + id).css('color', 'white');
            }

            if (check_count == 2) {
                window.location = 'compare.php?id='+list_id
            }


        }
    </script>
</body>

</html>