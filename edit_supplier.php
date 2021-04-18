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
            position: static;
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
                        <li><a href="set_product_step1.php" data-toggle="tooltip" data-placement="right" title="Setting"  class="active">
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

                                <!-- Modal Edit -->
                                <form method="post" id="supplier_edit">
                                    <div class="modal fade" id="myModal_edit" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">คุณต้องการแก้ไข</h5>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" class="form-group">
                                                        <div class="col-md-3">
                                                            รหัส:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" name="supplier_code_edit" class="form-control" id="supplier_code_edit" style="width: 100%;" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            ชื่อบริษัท:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" name="supplier_name_edit" id="supplier_name_edit" class="form-control" style="width: 100%;" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            อัพโหลดรูป:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="file" id="supplier_img_edit" style="width: 100%;" class="form-control" name="supplier_img_edit" required>
                                                        </div>

                                                        <input type="hidden" name="supplier_id_edit" id="supplier_id_edit">
                                                    </div>

                                                    <input type="hidden" name="type" id="type" value="edit">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                    <button type="button" class="btn btn-primary" onclick="save_supplier()">ตกลง</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <!-- Modal Add -->
                                <form method="post" id="supplier_add">
                                    <div class="modal fade" id="myModal_add" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">คุณต้องการเพิ่ม</h5>

                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            รหัส:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="supplier_code_add" style="width: 100%;text-transform:uppercase" class="form-control" name="supplier_code_add" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            ชื่อบริษัท:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="text" id="supplier_name_add" style="width: 100%;" class="form-control" name="supplier_name_add" required>
                                                        </div>

                                                        <div class="col-md-3">
                                                            อัพโหลดรูป:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <input type="file" id="supplier_img_add" style="width: 100%;" class="form-control" name="supplier_img_add" required>
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="type" id="type" value="add">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                    <button type="button" class="btn btn-primary" onclick="save_supplier()">ตกลง</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                <!-- Modal Delete -->
                                <div class="modal fade" id="myModal_delete" tabindex="1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">คุณต้องการลบ</h5>

                                            </div>
                                            <div class="modal-body">
                                                <span id="company"></span>
                                                <input type="hidden" name="supplier_id" id="supplier_id">
                                                <input type="hidden" name="supplier" id="supplier">
                                                <input type="hidden" name="type" id="type" value="delete">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                                                <button type="button" class="btn btn-primary" onclick="save_supplier()">ตกลง</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">แก้ไขบริษัทประกัน &nbsp;&nbsp;&nbsp;<span style="background-color: green;color:white;cursor:pointer; font-size:15px;padding:5px;" data-toggle="modal" data-target="#myModal_add" onclick="add_sup('add');">เพิ่ม</span></h4>
                                            <span style="cursor: pointer;" onclick="click_product()"> เพิ่ม Product ประกัน</span>
                                        </div>
                                        <div class="card-body">

                                            <table class="display" id="example">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">รูป</th>
                                                        <th scope="col">รหัส</th>
                                                        <th scope="col">ชื่อบริษัท</th>
                                                        <th scope="col">แก้ไข</th>
                                                        <th scope="col">ลบ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $stmt = $pdo->query('SELECT IMGS,SUPPLIERID,SUPPLIERCODE, SNAME from supplier WHERE active = 1 ORDER BY SUPPLIERCODE');
                                                    $i = 1;
                                                    while ($row = $stmt->fetch()) {
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $i ?></th>
                                                            <td><img src="images/supplier/<?php echo $row['IMGS']; ?>" alt="" style="max-width: 80px;"></td>
                                                            <td><?php echo $row['SUPPLIERCODE']; ?></td>
                                                            <td><?php echo $row['SNAME']; ?></td>
                                                            <td>
                                                                <a href="" style="justify-content: center;display:flex" data-toggle="modal" data-target="#myModal_edit" onclick="edit_sup('<?php echo $row['SUPPLIERID']; ?>','<?php echo $row['SUPPLIERCODE']; ?>','<?php echo $row['SNAME']; ?>','edit');"><i class="fa fa-file" aria-hidden="true"></i></a>

                                                            <td> <a href="" style="justify-content: center;display:flex;" data-toggle="modal" data-target="#myModal_delete" onclick="delete_sup('<?php echo $row['SUPPLIERID']; ?>','<?php echo $row['SUPPLIERCODE']; ?>','<?php echo $row['SNAME']; ?>','delete');"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
            // $('#myModal').on('show.bs.modal', function(e) {
            //     alert(1)
            // })

            $(document).ready(function() {
                $('#example').DataTable();
            });

            function delete_sup(id, code, name, type) {
                $('#supplier_id').val(id)
                $('#company').text(name);
                $('#supplier').val(code);
                $('#type').val(type)
            }

            function edit_sup(id, code, name, type) {
                $('#supplier_id_edit').val(id)
                $('#supplier_code_edit').val(code);
                $('#supplier_name_edit').val(name);
                $('#type').val(type)
            }

            function add_sup(type) {
                $('#type').val(type)
            }

            function save_supplier() {
                if ($('#type').val() == 'edit') {
                    if ($('#supplier_code').val() == '') {
                        alert('กรุณากรอกข้อมูลให้ครบ')
                        return false;
                    }
                    if ($('#supplier_name').val() == '') {
                        alert('กรุณากรอกข้อมูลให้ครบ')
                        return false;
                    }

                    var data_edit = new FormData(document.getElementById("supplier_edit"))

                    $.ajax({
                        url: "edit_supplier_sub.php",
                        type: "post",
                        processData: false,
                        contentType: false,
                        data: data_edit,
                        success: function(response) {
                            if (response == 'success') {
                                alert('บันทึกรายการสำเร็จ')
                                window.location = "edit_supplier.php"
                            } else {
                                alert('บันทึกรายการไม่สำเร็จ')

                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                } else if ($('#type').val() == 'delete') {
                    $.ajax({
                        url: "edit_supplier_sub.php",
                        type: "post",
                        data: {
                            supplier_id: $('#supplier_id').val(),
                            type: $('#type').val()
                        },
                        success: function(response) {
                            if (response == 'success') {
                                alert('บันทึกรายการสำเร็จ')
                                window.location = "edit_supplier.php"
                            } else {
                                alert('บันทึกรายการไม่สำเร็จ')
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
                } else if ($('#type').val() == 'add') {
                    if ($('#supplier_code_add').val() == '') {
                        alert('กรุณากรอกข้อมูลให้ครบ')
                        return false;
                    }
                    if ($('#supplier_name_add').val() == '') {
                        alert('กรุณากรอกข้อมูลให้ครบ')
                        return false;
                    }
                    var data_add = new FormData(document.getElementById("supplier_add"))
                    $.ajax({
                        url: "edit_supplier_sub.php",
                        type: "post",
                        processData: false,
                        contentType: false,
                        data: data_add,
                        success: function(response) {
                            if (response == 'success') {
                                alert('บันทึกรายการสำเร็จ')
                                window.location = "edit_supplier.php"
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

            function click_product() {
                window.location = 'set_product_step1.php';
            }
        </script>
    </body>

    </html>
<?php } ?>