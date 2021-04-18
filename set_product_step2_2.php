<?php
session_start();
if ($_SESSION['PERMISSION'] == 'A') {
    include 'db.php';

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>เลือกบริษัทประกัน </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="./vendor/waves/waves.min.css">
        <link rel="stylesheet" href="./css/style.css">

    </head>
    <style>
        #regForm {
            background-color: #ffffff;
            /* margin-top: 100px; */
            font-family: Raleway;
            /* padding: 40px; */
            width: 100%;
            min-width: 300px;
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

                        <li><a href="order_list.php" data-toggle="tooltip" data-placement="right" title="Account">
                                <span><i class="la la-user"></i></span>
                            </a>
                        </li>
                        <li><a href="set_product_step1.php" data-toggle="tooltip" data-placement="right" title="Setting" class="active">
                                <span><i class="la la-tools"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <div class="card settings_menu">
                                <div class="card-header">
                                    <h4 class="card-title">Settings</h4>
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <!-- <li class="nav-item">
                                        <a href="./settings.html" class="nav-link active">
                                            <i class="la la-user"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li> -->
                                        <li class="nav-item">
                                            <a href="./edit_supplier.php" class="nav-link">
                                                <i class="la la-cog"></i>
                                                <span>แก้ไขบริษัทประกัน</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./set_product_step1.php" class="nav-link">
                                                <i class="la la-lock"></i>
                                                <span>เพิ่ม Product ประกัน</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="./view_product.php" class="nav-link">
                                                <i class="la la-university"></i>
                                                <span>ดู Product ประกัน</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">

                                        <div class="card-header">
                                            <?php
                                            $stmt = $pdo->prepare("SELECT IMGS,SNAME, SUPPLIERCODE from supplier WHERE SUPPLIERCODE=:SUPPLIERCODE");
                                            $stmt->execute(['SUPPLIERCODE' => $_GET['supliername']]);
                                            $row = $stmt->fetch();

                                            ?>
                                            <div class="col-md-2 col-3">
                                                <img src="images/supplier/<?php echo $row['IMGS']; ?>" alt=" <?php echo $_GET['supliername']; ?>" width="80">
                                            </div>
                                            <div class="col-md-10 col-9">

                                                <h4><?php echo $row['SNAME']; ?></h4>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form id="regForm">

                                    <div id="product">
                                        <!-- <?php echo number_format(91212345.5512, 2); ?> -->
                                        <input type="hidden" name="insure_type" value="2">
                                        <input type="hidden" name="img" value="<?php echo $row['IMGS']; ?>">
                                        <input type="hidden" name="suppliername" value="<?php echo $row['SNAME']; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                        <a class="nav-link" aria-current="page" href="set_product_step2_1.php?supliername=<?php echo $_GET['supliername'] ?>" style="cursor: pointer;">ชั้น1</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" href="set_product_step2_2.php?supliername=<?php echo $_GET['supliername'] ?>" style="cursor: pointer;">ชั้น2</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="set_product_step2_20.php?supliername=<?php echo $_GET['supliername'] ?>" style="cursor: pointer;">ชั้น2+</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="set_product_step2_3.php?supliername=<?php echo $_GET['supliername'] ?>" style="cursor: pointer;">ชั้น3</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="set_product_step2_30.php?supliername=<?php echo $_GET['supliername'] ?>" style="cursor: pointer;">ชั้น3+</a>
                                                    </li>
                                                </ul>
                                            </div>


                                            <div class="form-group col-md-6">
                                                <span>ราคาประกันภัย</span>
                                                <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ทุนประกันภัย</span>
                                                <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ชื่อประกันภัย</span>
                                                <input type="text" class="form-control" id="insure_name" name="insure_name">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ปีรถยนต์</span>
                                                <select name='insure_year' id="car_year" class="form-control">
                                                    <option data-display="-- เลือกปีรถ --" value="">-- เลือกปีรถ --</option>
                                                    <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--) { ?>
                                                        <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ยี่ห้อรถยนต์</span>
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

                                            <div class="form-group col-md-6">
                                                <span>รุ่นรถยนต์</span>
                                                <div class="car_model">
                                                    <select name='car_model' id='car_model'  class="form-control">
                                                        <option data-display="-- เลือกรุ่นรถยนต์ --" value="">-- เลือกรุ่นรถยนต์ --
                                                    </select>
                                                </div>
                                            </div>

                                            
                                            <div class="form-group col-md-6">
                                                <span>รุ่นย่อยรถยนต์</span>
                                                <div class="carsub_model">
                                                    <select name='carsub_model' id='carsub_model' class="form-control">
                                                        <option data-display="-- เลือกรุ่นย่อยรถยนต์ --" value="">-- เลือกย่อยรุ่นรถยนต์ --
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>โปรโมชั่น</span>
                                                <input type="text" class="form-control" id="promotion" name="promotion">
                                            </div>


                                            <div class="form-group col-md-6" style="padding:10px;border-style:solid;border-radius:5px;">
                                                <div class="row">
                                                    <div class="col-md-2 col-2">
                                                        <input type="checkbox" id="claim1" style="width:20px;height:20px;float:right;" name="claim1">
                                                    </div>
                                                    <div class="col-md-10 col-10">
                                                        <span>อู่ประกัน</span>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <span>ราคาเดิม</span>
                                                        <input type="number" class="form-control" id="claim1_old" name="claim1_old" value="0.00">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <span>ราคาที่ลด (Discount)</span>
                                                        <input type="number" class="form-control" id="claim1_dis" name="claim1_dis" value="0.00">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6" style="padding:10px;border-style:solid;border-radius:5px;">
                                                <div class="row">
                                                    <div class="col-md-2 col-2">
                                                        <input type="checkbox" id="claim2" style="width:20px;height:20px;float:right;" name="claim2">
                                                    </div>
                                                    <div class="col-md-10 col-10">
                                                        <span>อู่ห้าง</span>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <span>ราคาเดิม</span>
                                                        <input type="number" class="form-control" id="claim2_old" name="claim2_old" value="0.00">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <span>ราคาที่ลด (Discount)</span>
                                                        <input type="number" class="form-control" id="claim2_dis" name="claim2_dis" value="0.00">
                                                    </div>
                                                </div>
                                            </div>

                                           


                                            <div class="form-group col-md-6">
                                                <span>ค่าส่วนแรก</span>
                                                <input type="number" class="form-control" id="first_price" name="first_price" value="0.00">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <span>แผนผู้ขับขี่</span>
                                                <input type="text" class="form-control" id="person_plan" name="person_plan">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ไฟไหม้ และ โจรกรรม</span>
                                                <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ประกันน้ำท่วม</span>
                                                <input type="number" class="form-control" id="cover_water" name="cover_water" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>อุบัติเหตุส่วนบุคคล</span>
                                                <input type="number" class="form-control" id="cover_person" name="cover_person" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ค่ารักษาพยาบาล</span>
                                                <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0.00">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <span>ประกันตัวผู้ขับขี่</span>
                                                <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                                                </span>
                                                <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                                                </span>
                                                <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0.00">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                                                </span>
                                                <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0.00">
                                            </div>

                                        </div>

                                </form>
                            </div>
                            <div class="col-md-12" style="margin-top: 20px;padding:20px;">
                                <button type="button" class="btn btn-success" style="float: right; " onclick="submit();">บันทึก</button>
                            </div>
                        </div>
                    </div>
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
            function car_type(n) {
                $.ajax({
                    url: "set_product_cartype.php",
                    type: "post",
                    data: {
                        type: n
                    },
                    success: function(response) {
                        $('#product').html(response)
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

            function submit() {
                $.ajax({
                    url: "set_product_submit.php",
                    type: "post",
                    data: $('#regForm').serialize(),
                    success: function(response) {
                        if (response == 'success') {
                            alert('บันทึกรายการสำเร็จ')
                            window.location = "set_product_step1.php"
                        } else {
                            alert('บันทึกรายการไม่สำเร็จ')
                        }
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


            function carsub(sub){
                $.ajax({
                    url: "detail_car.php",
                    type: "post",
                    data: { 
                        makecode :$('#car_brand').val(),
                        familycode : sub,
                        caryear : $('#car_year').val()

                    },
                    success: function(response) {
                        $('.carsub_model').html(response)
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