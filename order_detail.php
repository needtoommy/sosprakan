<?php
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 


include 'db.php';

$sql =  "select status from `order` where id = '" . $_GET['orderid'] . "' ";
$query = $pdo->query($sql);
$res = $query->fetch();
$status = $res['status'];


if ($status == 'A') {

    $iconb_1 = 'none';
    $iconc_1 = 'none';
    $icond_1 = 'none';
    $icone_1 = 'none';

    $iconb_2 = 'inline-block';
    $iconc_2 = 'inline-block';
    $icond_2 = 'inline-block';
    $icone_2 = 'inline-block';
}
if ($status == 'B') {

    $iconb_1 = 'inline-block';
    $iconc_1 = 'none';
    $icond_1 = 'none';
    $icone_1 = 'none';

    $iconb_2 = 'none';
    $iconc_2 = 'inline-block';
    $icond_2 = 'inline-block';
    $icone_2 = 'inline-block';
}
if ($status == 'C') {
    $iconb_1 = 'inline-block';
    $iconc_1 = 'inline-block';
    $icond_1 = 'none';
    $icone_1 = 'none';

    $iconb_2 = 'none';
    $iconc_2 = 'none';
    $icond_2 = 'inline-block';
    $icone_2 = 'inline-block';
}
if ($status == 'D') {
    $iconb_1 = 'inline-block';
    $iconc_1 = 'inline-block';
    $icond_1 = 'inline-block';
    $icone_1 = 'none';

    $iconb_2 = 'none';
    $iconc_2 = 'none';
    $icond_2 = 'none';
    $icone_2 = 'inline-block';
}
if ($status == 'E') {

    $iconb_1 = 'inline-block';
    $iconc_1 = 'inline-block';
    $icond_1 = 'inline-block';
    $icone_1 = 'inline-block';

    $iconb_2 = 'none';
    $iconc_2 = 'none';
    $icond_2 = 'none';
    $icone_2 = 'none';
}

$sql = "SELECT o.car_brand brand, o.car_model model, o.create_datetime AS order_datetime, o.*, p.* FROM `order` o, product p where id= " . $_GET['orderid'] . " AND o.productid = p.productid ";

$ex =  $pdo->query($sql);
$res = $ex->fetch();

// print_r($res);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ออเดอร์สินค้า</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/waves/waves.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<style>
    .pagement {
        -webkit-filter: grayscale(100%);
        /* Safari 6.0 - 9.0 */
        filter: grayscale(100%);
    }

    <?php if($res['payment'] == "KBANK"){?>
        .payment1{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>

    <?php if($res['payment'] == "BBL"){?>
        .payment2{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>

    <?php if($res['payment'] == "SCB"){?>
        .payment3{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>

    <?php if($res['payment'] == "KTB"){?>
        .payment4{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>


    <?php if($res['payment'] == "TMB"){?>
        .payment5{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>


    <?php if($res['payment'] == "BAY"){?>
        .payment6{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>


    <?php if($res['payment'] == "VISA"){?>
        .payment7{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>


    <?php if($res['payment'] == "MONEY"){?>
        .payment8{
        -webkit-filter: grayscale(0%) !important;
        /* Safari 6.0 - 9.0 */
        filter: grayscale(0%) !important;
    }
    <?php }?>

    .modal-backdrop {
        position: static
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

        <div class="header dashboard">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar navbar-expand-lg navbar-light px-0 justify-content-between">
                            <a class="navbar-brand" href="index.html"><img src="./icons/logo.jpg" alt="">
                            </a>


                            <div class="dashboard_log my-2">
                                <div class="d-flex align-items-center">

                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown">
                                            <span class="thumb"><i class="la la-user"></i></span>
                                            <span class="name">Admin</span>
                                            <span class="arrow"><i class="la la-angle-down"></i></span>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                                <?php if ($_SESSION['ADMIN']) { ?>
                                                    <a href="role.php" class="dropdown-item logout">
                                                        <i class="la la-sign-out"></i> เพิ่มสิทธิ
                                                    </a>
                                                <?php } ?>
                                                <a href="session_destroy.php" class="dropdown-item logout">
                                                    <i class="la la-sign-out"></i> Logout
                                                </a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <div class="menu">
                <ul>
                 
                    <li><a href="order_list.php" data-toggle="tooltip" data-placement="right" title="Account" class="active">
                            <span><i class="la la-user"></i></span>
                        </a>
                    </li>
                    <li><a href="set_product_step1.php" data-toggle="tooltip" data-placement="right" title="Setting">
                            <span><i class="la la-tools"></i></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>



        <div class="content-body">
            <div class="container-fluid">
                <div class="row" style="justify-content: center;">
                    <div class="col-md-2" style="padding:20px;background-color:hsl(204deg 92% 63%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;opacity:<?php echo $status == 'A' ? '1' : '0.3' ?>" onclick="box('A',<?php echo $_GET['orderid'] ?>)">
                        <div class="box-1" style="text-align: center;">
                            <i class="fa fa-check fa-5x" aria-hidden="true"></i>
                            <p>เปิดบิล</p>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:20px;background-color:hsl(174deg 82% 45%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;opacity:<?php echo $status == 'B' ? '1' : '0.3' ?>" onclick="box('B',<?php echo $_GET['orderid'] ?>)">
                        <div class="box-2" style="text-align: center;">
                            <i class="fa fa-check fa-5x" aria-hidden="true" style="display: <?php echo $iconb_1 ?>;"></i>
                            <i class="fa fa-times fa-5x" aria-hidden="true" style="display: <?php echo $iconb_2 ?>;"></i>
                            <p>ติดตาม</p>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:20px;background-color:hsl(22deg 98% 64%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;opacity:<?php echo $status == 'C' ? '1' : '0.3' ?>" onclick="box('C',<?php echo $_GET['orderid'] ?>)">
                        <div class="box-3" style="text-align: center;">
                            <i class="fa fa-check fa-5x" aria-hidden="true" style="display: <?php echo $iconc_1 ?>;"></i>
                            <i class="fa fa-times fa-5x" aria-hidden="true" style="display: <?php echo $iconc_2 ?>;"></i>
                            <p>รอการชำระเงิน</p>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:20px;background-color:hsl(1deg 89% 64%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;opacity:<?php echo $status == 'D' ? '1' : '0.3' ?>" onclick="box('D',<?php echo $_GET['orderid'] ?>)">
                        <div class="box-4" style="text-align: center;">
                            <i class="fa fa-check fa-5x" aria-hidden="true" style="display: <?php echo $icond_1 ?>;"></i>
                            <i class="fa fa-times fa-5x" aria-hidden="true" style="display: <?php echo $icond_2 ?>;"></i>
                            <p>ส่งออกกรมธรรม์</p>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding:20px;background-color:hsl(176deg 95% 25%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;opacity:<?php echo $status == 'E' ? '1' : '0.3' ?>" onclick="box('E',<?php echo $_GET['orderid'] ?>)">
                        <div class="box-5" style="text-align: center;">
                            <i class="fa fa-check fa-5x" aria-hidden="true" style="display: <?php echo $icone_1 ?>;"></i>
                            <i class="fa fa-times fa-5x" aria-hidden="true" style="display: <?php echo $icone_2 ?>;"></i>
                            <p>เสร็จสิ้น</p>
                        </div>
                    </div>
                </div>
                <form id="form_order" method="POST" action="order_submit.php">
                    <input type="hidden" name="orderid" value="<?php echo $_GET['orderid'] ?>">
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card profile_card">
                                <div class="card-body">
                                    <div class="media">
                                        <img class="mr-3 rounded-circle mr-0 mr-sm-3" src="images/profile/2.png" width="60" height="60" alt="">
                                        <div class="media-body">
                                            <!-- <span>Hello</span> -->

                                            <h4 id="txt_firstlast" class="mb-2"><?php echo $res['firstname'] . ' ' . $res['lastname'] ?> <i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer;color:blue" data-toggle="modal" data-target="#exampleModal" onclick="popup('แก้ไขชื่อนามสกุล')"></i></h4>
                                            <input type="hidden" name="firstname" id="firstname" value="<?php echo $res['firstname']; ?>">
                                            <input type="hidden" name="lastname" id="lastname" value="<?php echo $res['lastname']; ?>">

                                            <p class="mb-1"> <span><i class="fa fa-phone mr-2 text-primary"></i></span> <?php echo $res['tel'] ?></p>
                                            <p class="mb-1"> <span><i class="fa fa-envelope mr-2 text-primary"></i></span>
                                                <?php echo $res['email'] ?>
                                            </p>
                                        </div>
                                    </div>

                                    <ul class="card-profile__info">
                                        <li>
                                            <h5 class="mr-4">Address</h5>
                                            <span class="text-muted"><?php echo $res['addressno'] . ' ' . $res['addresssoi'] . ' ' . $res['addressroad'] . ' ' . $res['district'] . ' ' . $res['amphur'] . ' ' . $res['province'] . ' ' . $res['zipcode'] ?></span>
                                        </li>
                                        <li class="mb-1">
                                            <h5 class="mr-4">เวลาเปิดบิล</h5>
                                            <span><?php echo $res['order_datetime']; ?></span>
                                        </li>
                                        <li>
                                            <h5 class="mr-4">เวลาแก้ไขบิลล่าสุด</h5>
                                            <span class="text-danger"><?php echo $res['update_datetime'] ?></span>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="card acc_balance">
                                <div class="card-header">
                                    <h4 class="card-title">รายละเอียด</h4>
                                </div>
                                <div class="card-body">
                                    <span>บริษัทประกันภัย</span>
                                    <h3><?php echo $res['suppliername'] . ' ชั้น' . $res['insure_type']; ?></h3>
                                    <h4><?php echo $res['brand'] . ' ' . $res['model'] . ' ' . $res['insure_year'] ?></h4>
                                    <h3><?php echo $res['car_sub'] ?></h3>

                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">ประกันภัยหมดอายุ</p>
                                        </div>
                                        <div>
                                            <h4><?php echo $res['policy_date']; ?></h4>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">เลขทะเบียน</p>
                                        </div>
                                        <div>
                                            <span id="txt_plateid"><?php echo $res['car_plate']; ?></span>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer;color:blue" data-toggle="modal" data-target="#exampleModal" onclick="popup('แก้ไขเลขทะเบียน')"></i>
                                            <input type="hidden" name="plateid" id="plateid" value="<?php echo $res['car_plate']; ?>">

                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">เลขตัวถัง</p>
                                        </div>
                                        <div>
                                            <span id="txt_car_num_body"><?php echo $res['car_num_body']; ?></span>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer;color:blue" data-toggle="modal" data-target="#exampleModal" onclick="popup('แก้ไขเลขตัวถัง')"></i>
                                            <input type="hidden" name="car_num_body" id="car_num_body" value="<?php echo $res['car_num_body']; ?>">

                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">จังหวัด</p>
                                        </div>
                                        <div>
                                            <span><?php echo $res['car_plate_province']; ?></span>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">พรบ.</p>
                                        </div>
                                        <div>
                                            <span id="txt_prb"><?php echo $res['prb'] == 'Y' ? 'รับ' : 'ไม่รับ'; ?></span>
                                            <i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer;color:blue" data-toggle="modal" data-target="#exampleModal" onclick="popup('พรบ.')"></i>
                                            <input type="hidden" name="prb" id="prb" value="<?php echo $res['prb']; ?>">

                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <h4>ราคากลาง</h4>
                                            <p class="mb-1"><?php echo number_format($res['claim1_old'] != '' ? $res['claim1_old'] : $res['claim2_old'], 2) ?></p>
                                        </div>
                                        <div>
                                            <h4>ราคาเสนอล่าสุด</h4>
                                            <p class="mb-1" id="txt_lastprice"><?php echo number_format(empty($res['lastprice'])? $res['claim1_dis'] != '' ? $res['claim1_dis'] : $res['claim2_dis']: $res['lastprice'], 2) ?></p>
                                            <input type="hidden" name="lastprice" id="lastprice" value="<?php echo $res['lastprice'] ?>">
                                        </div>
                                    </div>

                                    <!-- <div class="btn-group mb-3">
                                    <button class="btn btn-primary">Sell</button>
                                    <button class="btn btn-success">Buy</button>
                                </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">เสนอราคาใหม่</h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text"><i class="fa fa-money"></i></label>
                                            </div>
                                            <input type="number" id="change_price" class="form-control" placeholder="">
                                        </div>
                                    </div>


                                    <a class="btn btn-primary btn-block" style="cursor: pointer;color:white" onclick="change_price()">เปลี่ยนราคา</a>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card acc_balance">
                                <div class="card-header">
                                    <h4 class="card-title">ช่องทางการโอนเงิน</h4>


                                </div>


                                <div class="card-body">

                                    <img src="images/payment/kbank.png" class="pagement payment1" id="1" alt="" width="50" style="cursor: pointer;" onclick="click_payment(1)">
                                    <img src="images/payment/bangkok.png" class="pagement payment2" id="2" alt="" width="50" style="cursor: pointer;" onclick="click_payment(2)">
                                    <img src="images/payment/scb.png" class="pagement payment3" id="3" alt="" width="50" style="cursor: pointer;" onclick="click_payment(3)">
                                    <img src="images/payment/ktb.png" class="pagement payment4" id="4" alt="" width="50" style="cursor: pointer;" onclick="click_payment(4)">
                                    <img src="images/payment/tmb.png" class="pagement payment5" id="5" alt="" width="50" style="cursor: pointer;" onclick="click_payment(5)">
                                    <img src="images/payment/bay.png" class="pagement payment6" id="6" alt="" width="50" style="cursor: pointer;" onclick="click_payment(6)">
                                    <img src="images/payment/visa.png" class="pagement payment7" id="7" alt="" width="50" style="cursor: pointer;" onclick="click_payment(7)">
                                    <img src="images/payment/money.png" class="pagement payment8" id="8" alt="" width="50" style="cursor: pointer;" onclick="click_payment(8)">
                                    <input type="hidden" name="payment" id="payment" value="<?php echo $res['payment'] ?>">
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>วันและเวลารับเงิน</p>
                                            <div class="input-group mb-3">
                                                <input type="datetime-local" class="form-control" id="time_money" aria-label="Recipient's username" aria-describedby="basic-addon2" style="display: inline-block;" name="datetime_getmoney" value="<?php echo $res['datetime_getmoney']; ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2" style="background-color: gray;"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>


                                            <p>เลขพัสดุ</p>
                                            <div class="input-group mb-3">
                                                <input type="text" name="delivery_code" class="form-control" id="delivery_code" value="<?php  echo $res['delivery_code'] ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p>วันเริ่มต้นกรมธรรม์</p>
                                            <div class="input-group mb-3">
                                                <input type="datetime-local" class="form-control" id="policy_date" aria-label="Recipient's username" aria-describedby="basic-addon2" style="display: inline-block;" name="datetime_policy" value="<?php echo $res['datetime_policy'] ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2" style="background-color: gray;"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>


                                        </div>


                                        <div class="col-md-12">
                                            <button class="btn btn-primary">อัพเดต</button>
                                        </div>

                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>
                </form>
            </div>



            <div class="footer dashboard">
                <div class="container-fluid">
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

        <script src="./vendor/waves/waves.min.js"></script>

        <script src="./js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
            function box(i, order) {
                $.ajax({
                    url: "order_status_change.php",
                    type: "post",
                    data: {
                        status: i,
                        orderid: order
                    },
                    success: function(res) {
                        const data = JSON.parse(res)

                        if (data[0] == 'success') {
                            window.location = "order_detail.php?orderid=" + data[1]
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }


            function click_payment(id) {
                const payment = id
                let text_p = ''
                if (payment == 1) {
                    text_p = 'KBANK'
                }
                if (payment == 2) {
                    text_p = 'BBL'
                }
                if (payment == 3) {
                    text_p = 'SCB'
                }
                if (payment == 4) {
                    text_p = 'KTB'
                }
                if (payment == 5) {
                    text_p = 'TMB'
                }
                if (payment == 6) {
                    text_p = 'BAY'
                }
                if (payment == 7) {
                    text_p = 'VISA'
                }
                if (payment == 8) {
                    text_p = 'MONEY'
                }
                $('#payment').val(text_p);
                const num = [1, 2, 3, 4, 5, 6, 7, 8];

                for (let index = 0; index < num.length; index++) {
                    const element = num[index];

                    if (element === id) {
                        $('#' + id).css('-webkit-filter', 'grayscale(0%)')
                        $('#' + id).css('filter', 'grayscale(0%)')
                    } else {
                        $('#' + element).css('-webkit-filter', 'grayscale(100%)')
                        $('#' + element).css('filter', 'grayscale(100%)')
                    }

                }

            }

            function popup(txt) {
                if (txt == 'แก้ไขเลขทะเบียน') {

                    const text = $('#txt_plateid').text();
                    $('.modal-title').text(txt)
                    $('.modal-body').html("<input type='text' class='form-control' id='pop_plateid'  value='" + text + "'>")
                    $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button><button type="button" class="btn btn-primary" onclick="save_modal(1)">บันทึก</button>')
                }

                if (txt == 'แก้ไขเลขตัวถัง') {
                    const text = $('#txt_car_num_body').text();
                    $('.modal-title').text(txt)
                    $('.modal-body').html("<input type='text' class='form-control' id='pop_car_num_body'  value='" + text + "'>")
                    $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button><button type="button" class="btn btn-primary" onclick="save_modal(2)">บันทึก</button>')

                }

                if (txt == 'พรบ.') {
                    const text = $('#txt_prb').text();
                    $('.modal-title').text(txt)
                    $('.modal-body').html("<select class='form-control' id='pop_prb'><option value='Y'>รับ</option><option value='N'>ไม่รับ</option></select>")
                    $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button><button type="button" class="btn btn-primary" onclick="save_modal(3)">บันทึก</button>')

                }

                if (txt == 'แก้ไขชื่อนามสกุล') {
                    const text = $('#txt_prb').text();
                    $('.modal-title').text(txt)
                    $('.modal-body').html("First Name: <input type='text' class='form-control' id='pop_firstname'  value=''><br>Last Name: <input type='text' class='form-control' id='pop_lastname'  value=''>")
                    $('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button><button type="button" class="btn btn-primary" onclick="save_modal(4)">บันทึก</button>')

                }
            }

            function save_modal(n) {
                var prb_text
                if (n == 1) {
                    $('#plateid').val($('#pop_plateid').val())
                    $('#txt_plateid').text($('#pop_plateid').val())
                } else if (n == 2) {
                    $('#car_num_body').val($('#pop_car_num_body').val())
                    $('#txt_car_num_body').text($('#pop_car_num_body').val())

                } else if (n == 3) {
                    $('#prb').val($('#pop_prb').val())
                    if ($('#pop_prb').val() == 'Y') {
                        prb_text = 'รับ'
                    } else {
                        prb_text = 'ไม่รับ'
                    }
                    $('#txt_prb').text(prb_text)
                } else if (n == 4) {
                    $('#firstname').val($('#pop_firstname').val())
                    $('#lastname').val($('#pop_lastname').val())
                    $('#txt_firstlast').text($('#pop_firstname').val() + ' ' + $('#pop_lastname').val())
                }

                $('#exampleModal').modal('hide')
            }

            function change_price() {
                $('#txt_lastprice').text(new Intl.NumberFormat().format($('#change_price').val()))
                $('#lastprice').val($('#change_price').val())
            }
        </script>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                        <button type="button" class="btn btn-primary" onclick='save_modal(1)'>บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>
<?php } ?>