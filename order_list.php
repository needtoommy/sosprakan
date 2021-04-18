<?php session_start();
if ($_SESSION['PERMISSION'] == 'A') {
    include 'db.php'; ?>
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
                                <a class="navbar-brand" href="index.html"><img src="./icons/logo.jpg" alt="logo"></a>


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


                        <li><a href="contact_list.php" data-toggle="tooltip" data-placement="right" title="Contact">
                                <span><i class="la la-paste"></i></span>
                            </a>
                        </li>
                        <li><a href="career_list.php" data-toggle="tooltip" data-placement="right" title="Career">
                                <span><i class="la la-user-secret"></i></span>
                            </a>
                        </li>
                        <li><a href="order_list.php" data-toggle="tooltip" data-placement="right" title="Account" class="active">
                                <span><i class="la la-user"></i></span>
                            </a>
                        </li>
                        <li><a href="set_product_step1.php" data-toggle="tooltip" data-placement="right" title="Setting" >
                                <span><i class="la la-tools"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php
            $stmt = $pdo->query('SELECT count(*) as count from `order` where status = "A"');
            $res_a = $stmt->fetch();

            $stmt = $pdo->query('SELECT count(*) as count from `order` where status = "B"');
            $res_b = $stmt->fetch();

            $stmt = $pdo->query('SELECT count(*) as count from `order` where status = "C"');
            $res_c = $stmt->fetch();

            $stmt = $pdo->query('SELECT count(*) as count from `order` where status = "D"');
            $res_d = $stmt->fetch();

            $stmt = $pdo->query('SELECT count(*) as count from `order` where status = "E"');
            $res_e = $stmt->fetch();

            ?>

            <div class="content-body">
                <div class="container-fluid">
                    <div class="row" style="justify-content: center;">
                        <div class="col-md-2" style="padding:20px;background-color:hsl(204deg 92% 63%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;" onclick="box('A')">
                            <div class="box-1" style="text-align: center;">
                                <h3 style="color:white"><?php echo $res_a['count'] > 0 ? $res_a['count'] : 0 ?></h3>
                                <p>เปิดบิล</p>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding:20px;background-color:hsl(174deg 82% 45%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;" onclick="box('B')">
                            <div class="box-2" style="text-align: center;">
                                <h3 style="color:white"><?php echo $res_b['count'] > 0 ? $res_b['count'] : 0 ?></h3>
                                <p>ติดตาม</p>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding:20px;background-color:hsl(22deg 98% 64%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;" onclick="box('C')">
                            <div class="box-3" style="text-align: center;">
                                <h3 style="color:white"><?php echo $res_c['count'] > 0 ? $res_c['count'] : 0 ?></h3>
                                <p>รอการชำระเงิน</p>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding:20px;background-color:hsl(1deg 89% 64%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;" onclick="box('D')">
                            <div class="box-4" style="text-align: center;">
                                <h3 style="color:white"><?php echo $res_d['count'] > 0 ? $res_d['count'] : 0 ?></h3>
                                <p>ส่งออกกรมธรรม์</p>
                            </div>
                        </div>
                        <div class="col-md-2" style="padding:20px;background-color:hsl(176deg 95% 25%);color:white;border-radius:20px;margin-left:20px;margin-top:30px;margin-bottom:30px;cursor:pointer;" onclick="box('E')">
                            <div class="box-5" style="text-align: center;">
                                <h3 style="color:white"><?php echo $res_e['count'] > 0 ? $res_e['count'] : 0 ?></h3>
                                <p>เสร็จสิ้น</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th align="center">วันที่</th>
                                        <th align="center">ไอดี</th>
                                        <th align="center">บริษัทประกัน</th>
                                        <th align="center">ยี่ห้อรถยนต์</th>
                                        <th align="center">รุ่นรถยนต์</th>
                                        <th align="center">ชื่อลูกค้า</th>
                                        <th align="center">ที่อยู่</th>
                                        <th align="center">เบอร์โทร</th>
                                        <th align="center">ราคา</th>
                                        <th align="center">สถานะ</th>
                                        <th align="center">แก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $stmt = $pdo->query('SELECT o.car_brand brand, o.car_model model,o.create_datetime as order_date, o.status order_status ,o.*,p.* from `order` o, product p where o.productid = p.productid order by o.id desc');

                                    while ($row = $stmt->fetch()) {

                                        $txt = "";
                                        $color = "";
                                        if ($row['order_status'] == 'A') {
                                            $txt = "เปิดบิล";
                                            $color = "hsl(204deg 92% 63%)";
                                        } else if ($row['order_status'] == 'B') {
                                            $txt = "ติดตาม";
                                            $color = "hsl(174deg 82% 45%)";
                                        } else if ($row['order_status'] == 'C') {
                                            $txt = "รอชำระ";
                                            $color = "hsl(22deg 98% 64%)";
                                        } else if ($row['order_status'] == 'D') {
                                            $txt = "ส่งออก";
                                            $color = "hsl(1deg 89% 64%)";
                                        } else if ($row['order_status'] == 'E') {
                                            $txt = "เสร็จสิ้น";
                                            $color = "hsl(176deg 95% 25%)";
                                        }

                                    ?>
                                        <tr>


                                            <td align="center"><?php echo explode(" ", $row['order_date'])[0] ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td align="center"><?php echo $row['suppliername'] ?></td>
                                            <td align="center"><?php echo $row['brand'] ?></td>
                                            <td align="center"><?php echo $row['model'] ?></td>
                                            <td align="center"><?php echo $row['firstname'] . " " . $row['lastname'] ?></td>
                                            <td align="center"><?php echo $row['addressno'] . " " . $row['addressmoo'] . " " . $row['addresssoi'] . " " . $row['addressroad'] ?></td>
                                            <td align="center"><?php echo $row['tel'] ?></td>
                                            <td align="center"><?php echo $row['insure_prince'] ?></td>
                                            <td align="center"><span style="font-size: 14px;padding:5px; background-color:<?php echo $color; ?>; color:white;border-radius:3px;"><?php echo $txt; ?></span></td>
                                            <td align="center"><a href="order_detail.php?orderid=<?php echo $row['id'] ?>"><i class="fa fa-file" aria-hidden="true"></i></a> &nbsp; <a href="order_delete.php?orderid=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                    <?php

                                    }
                                    ?>


                                </tbody>
                                <tfoot>
                                    <th>วันที่</th>
                                    <th>ไอดี</th>
                                    <th>บริษัทประกัน</th>
                                    <th>ยี่ห้อรถยนต์</th>
                                    <th>รุ่นรถยนต์</th>
                                    <th>ชื่อลูกค้า</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทร</th>
                                    <th>ราคา</th>
                                    <th>สถานะ</th>
                                    <th>แก้ไข/ลบ</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>


                    </div>

                </div>
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
            $(document).ready(function() {
                $('#example').DataTable();
            });

            function box(i) {
                $.ajax({
                    url: "order_status.php",
                    type: "post",
                    data: {
                        status: i
                    },
                    success: function(response) {
                        $('tbody').html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        </script>
    </body>

    </html>
<?php } ?>