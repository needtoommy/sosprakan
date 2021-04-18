<?php
session_start();
include 'db.php';
if ($_SESSION['PERMISSION'] == 'A') { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ดูติดต่อเรา </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
        <!-- Custom Stylesheet -->
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

                        <li><a href="contact_list.php" data-toggle="tooltip" data-placement="right" title="Contact" class="active">
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
                        <li><a href="set_product_step1.php" data-toggle="tooltip" data-placement="right" title="Setting">
                                <span><i class="la la-tools"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>



            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-xl-12 col-md-12">
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">ดูข้อมูลผู้ติดต่อเรา</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="display" id="example" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">ชื่อเต็ม</th>
                                                            <th scope="col">เมลล์</th>
                                                            <th scope="col">รายละเอียด</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $stmt = $pdo->query('SELECT * from contact');
                                                        $i = 1;
                                                        while ($row = $stmt->fetch()) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i ?></th>
                                                                <td>
                                                                    <?php echo $row['fullname'] ?>
                                                                </td>
                                                                <td> <?php echo $row['email'] ?></td>
                                                                <td> <?php echo $row['detail'] ?></td>
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


            function select_product(link) {
                window.location = 'set_product_step2.php?supliername=' + link

            }
        </script>
    </body>

    </html>
<?php } ?>