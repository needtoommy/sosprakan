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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    </head>
    <style>
        .modal-backdrop {
            position: sticky;
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

                        <li><a href="contact_list.php" data-toggle="tooltip" data-placement="right" title="Contact">
                                <span><i class="la la-paste"></i></span>
                            </a>
                        </li>
                        <li><a href="career_list.php" data-toggle="tooltip" data-placement="right" title="Career">
                                <span><i class="la la-user-secret"></i></span>
                            </a>
                        </li>
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


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">แก้ไข Product ประกัน &nbsp;</h5>
                            <button type="button" class="btn btn-danger" style="float: right;color:white" onclick="delete_product()">ลบ</button>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="update_product">
                                <input type="hidden" name="productid" id="productid">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <span>บริษัทประกัน</span>
                                        <div class="supplier">

                                            <select name="suppliername" id="suppliername" class="form-control">
                                                <option value="">-- เลือกบริษัทประกันภัย --</option>
                                                <?php
                                                $stmt = $pdo->query('SELECT SUPPLIERCODE, SNAME from supplier WHERE active = 1');
                                                $i = 1;
                                                while ($row = $stmt->fetch()) {
                                                ?>
                                                    <option value="<?php echo $row['SNAME']; ?>"><?php echo $row['SNAME']; ?></option>

                                                <?php $i++;
                                                } ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>ประกันชั้น</span>
                                        <div class="insure_type">
                                            <select name="insure_type" id="insure_type" class="form-control">
                                                <option value="">-- ประกันชั้น --</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="2plus">2+</option>
                                                <option value="3">3</option>
                                                <option value="3plus">3+</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>ราคาประกันภัย</span>
                                        <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ทุนประกันภัย</span>
                                        <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ชื่อประกันภัย</span>
                                        <input type="text" class="form-control" id="insure_name" name="insure_name">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ปีรถยนต์</span>
                                        <div class="insure_year">
                                            <select id="car_year" name='insure_year' class="form-control">
                                                <option data-display="-- เลือกปีรถ --" value="">-- เลือกปีรถ --</option>
                                                <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--) { ?>
                                                    <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ยี่ห้อรถยนต์</span>
                                        <div class="car_brand">
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

                                    <div class="form-group col-md-4">
                                        <span>รุ่นรถยนต์</span>
                                        <div class="car_model">
                                            <input type="text" class="form-control" id="car_model" name="car_model">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>รุ่นย่อยรถยนต์</span>
                                        <div class="carsub_model">
                                            <input type="text" class="form-control" id="car_submodel" name="car_submodel">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>โปรโมชั่น</span>
                                        <input type="text" class="form-control" id="promotion" name="promotion">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>ค่าส่วนแรก</span>
                                        <input type="number" class="form-control" id="first_price" name="first_price" value="0.00">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>แผนผู้ขับขี่</span>
                                        <input type="text" class="form-control" id="person_plan" name="person_plan">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ไฟไหม้ และ โจรกรรม</span>
                                        <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ประกันน้ำท่วม</span>
                                        <input type="number" class="form-control" id="cover_water" name="cover_water" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>อุบัติเหตุส่วนบุคคล</span>
                                        <input type="number" class="form-control" id="cover_person" name="cover_person" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ค่ารักษาพยาบาล</span>
                                        <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0.00">
                                    </div>


                                    <div class="form-group col-md-4">
                                        <span>ประกันตัวผู้ขับขี่</span>
                                        <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                                        </span>
                                        <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                                        </span>
                                        <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0.00">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                                        </span>
                                        <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0.00">
                                    </div>


                                    <div class="form-group col-md-4" style="padding:10px;border-style:solid;border-radius:5px;">
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

                                    <div class="form-group col-md-4" style="padding:10px;border-style:solid;border-radius:5px;">
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

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-primary" onclick="save_product();">บันทึก</button>
                        </div>
                    </div>
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

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">ดู Product ประกัน</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="display" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>

                                                            <th scope="col">ชื่อบริษัท</th>
                                                            <th scope="col">ราคาประกันภัย</th>
                                                            <th scope="col">ชื่อประกันภัย</th>
                                                            <th scope="col">ปีรถยนต์</th>
                                                            <th scope="col">ยี่ห้อรถยนต์</th>
                                                            <th scope="col">รุ่นรถยนต์</th>
                                                            <th scope="col">ดูเพิ่มเติม</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stmt = $pdo->query("SELECT * from product WHERE status = 'A'");
                                                        $i = 1;
                                                        while ($row = $stmt->fetch()) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i ?></th>
                                                                <td><?php echo $row['suppliername']; ?></td>
                                                                <td><?php echo $row['insure_prince']; ?></td>
                                                                <td><?php echo $row['suppliername']; ?></td>
                                                                <td><?php echo $row['insure_year']; ?></td>
                                                                <td><?php echo $row['car_model']; ?></td>
                                                                <td><?php echo $row['car_brand']; ?></td>
                                                                <td><a style="cursor: pointer;justify-content:center;display:flex;" data-toggle="modal" data-target="#exampleModalCenter" onclick="edit_product('<?php echo $row['car_submodel'] ?>','<?php echo $row['suppliername']  ?>','<?php echo $row['insure_prince']  ?>','<?php echo $row['insure_cover']  ?>','<?php echo $row['insure_name']  ?>','<?php echo $row['insure_year']  ?>','<?php echo $row['car_brand']  ?>','<?php echo $row['car_model']  ?>','<?php echo $row['claim1']  ?>','<?php echo $row['claim1_old']  ?>','<?php echo $row['claim1_dis']  ?>','<?php echo $row['claim2']  ?>','<?php echo $row['claim2_old']  ?>','<?php echo $row['claim2_dis']  ?>','<?php echo $row['promotion']  ?>','<?php echo $row['first_price']  ?>','<?php echo $row['person_plan']  ?>','<?php echo $row['cover_fire_sneaker']  ?>','<?php echo $row['cover_water']  ?>','<?php echo $row['cover_person']  ?>','<?php echo $row['cover_hospital']  ?>','<?php echo $row['insure_driver']  ?>','<?php echo $row['cover_person_out']  ?>','<?php echo $row['cover_die_per']  ?>','<?php echo $row['cover_die_max']  ?>','<?php echo $row['productid']  ?>', '<?php echo $row['insure_type']  ?>');"><i class="fa fa-search" style="color:blue" aria-hidden="true"></i></a>

                                                                </td>
                                                            </tr>
                                                        <?php $i++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        <script src="./vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="./js/plugins/jquery-ui-init.js"></script>
        <script src="./vendor/validator/jquery.validate.js"></script>
        <script src="./vendor/validator/validator-init.js"></script>
        <script src="./js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });


            function edit_product(car_submodel, suppliername,
                insure_prince,
                insure_cover,
                insure_name,
                insure_year,
                car_brand,
                car_model,
                claim1,
                claim1_old,
                claim1_dis,
                claim2,
                claim2_old,
                claim2_dis,
                promotion,
                first_price,
                person_plan,
                cover_fire_sneaker,
                cover_water,
                cover_person,
                cover_hospital,
                insure_driver,
                cover_person_out,
                cover_die_per,
                cover_die_max,
                productid,
                insure_type) {

                if (suppliername != "") {
                    $.ajax({
                        url: "view_change.php",
                        type: "post",
                        data: {
                            suppliername: suppliername
                        },
                        success: function(response) {
                            $('.supplier').html(response);
                        },
                    });
                }

                if (insure_type != "") {
                    $.ajax({
                        url: "view_change.php",
                        type: "post",
                        data: {
                            insure_type: insure_type
                        },
                        success: function(response) {
                            $('.insure_type').html(response);
                        },
                    });
                }

                if (insure_year != "") {
                    $.ajax({
                        url: "view_change.php",
                        type: "post",
                        data: {
                            insure_year: insure_year
                        },
                        success: function(response) {
                            $('.insure_year').html(response);
                        },
                    });
                }

                if (car_brand != "") {
                    $.ajax({
                        url: "view_change.php",
                        type: "post",
                        data: {
                            car_brand: car_brand
                        },
                        success: function(response) {
                            $('.car_brand').html(response);
                        },
                    });
                }


                $('#car_submodel').val(car_submodel)
                $('#car_model').val(car_model)
                $('#insure_prince').val(insure_prince)
                $('#insure_cover').val(insure_cover)
                $('#insure_name').val(insure_name)
                $('#promotion').val(promotion)
                $('#first_price').val(first_price)
                $('#person_plan').val(person_plan)
                $('#cover_fire_sneaker').val(cover_fire_sneaker)
                $('#cover_water').val(cover_water)
                $('#cover_person').val(cover_person)
                $('#cover_hospital').val(cover_hospital)
                $('#insure_driver').val(insure_driver)
                $('#cover_person_out').val(cover_person_out)
                $('#cover_die_per').val(cover_die_per)
                $('#cover_die_max').val(cover_die_max)
                if (claim1 != "") {
                    $('#claim1').prop('checked', true);
                }
                if (claim2 != "") {
                    $('#claim2').prop('checked', true);
                }
                $('#claim1_old').val(claim1_old)
                $('#claim1_dis').val(claim1_dis)
                $('#claim2_old').val(claim2_old)
                $('#claim2_dis').val(claim2_dis)
                $('#productid').val(productid)

            }

            function save_product() {
                $.ajax({
                    url: "view_update.php",
                    type: "post",
                    data: $('#update_product').serialize(),
                    success: function(response) {
                        if (response == 'success') {
                            alert('บันทึกรายการสำเร็จ')
                            window.location = "view_product.php"
                        } else {
                            alert('บันทึกรายการไม่สำเร็จ')
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

            function delete_product() {
                const r = confirm("คุณต้องการลบใช่ไหม");
                if (r === true) {
                    $.ajax({
                        url: "view_delete.php",
                        type: "post",
                        data: $('#productid').serialize(),
                        success: function(response) {
                            if (response == 'success') {
                                alert('บันทึกรายการสำเร็จ')
                                window.location = "view_product.php"
                            } else {
                                alert('บันทึกรายการไม่สำเร็จ')
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                }
            }

            $('.car_brand ,#car_brand').change(function() {
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
        </script>
    </body>

    </html>
<?php } ?>