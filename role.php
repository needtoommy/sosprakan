<?php

session_start();
include 'db.php';
if ($_SESSION['ADMIN'] == 'ADMIN') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>เพิ่มสิทธิ </title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="./vendor/waves/waves.min.css">
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

            <div class="authincation">
                <div class="container-fluid h-10 row">

                    <div class="col-md-4">
                        <!-- <div class="mini-logo text-center my-5">
                                <img src="./icons/logo.jpg" alt="">
                            </div> -->
                        <div class="auth-form card">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">เพิ่มสิทธิเข้าถึง</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name="myform" class="signin_validate" action="role_insert.php">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>สิทธิ</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="ADMIN">แอดมิน</option>
                                            <option value="USER">ทั่วไป</option>
                                        </select>
                                    </div>
                                    <p style="text-align: right;"> <a href="index.php">กลับหน้าหลัก</a></p>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block">ยืนยัน</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="display" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center;width: 30px;">#</th>
                                        <th scope="col" style="text-align: center;width: 200px;">Username</th>
                                        <th scope="col" style="text-align: center;width: 80px;">Password</th>
                                        <th scope="col" style="text-align: center;width: 400px;">Permission</th>
                                        <th scope="col" style="text-align: center;">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $stmt = $pdo->query('SELECT * from login');
                                    $i = 1;
                                    while ($row = $stmt->fetch()) {
                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $i ?></td>
                                            <td align="center">
                                                <?php echo $row['username'] ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row['password'] ?>
                                            </td>
                                            <td align="center">
                                                <?php echo $row['active'] ?>
                                            </td>
                                            <td align="center">
                                                <a style="cursor: pointer;font-size:20px;color:blue;" onclick="delete_role('<?php echo $row['id']; ?>',1)"><i class="la la-trash" aria-hidden="true"></i></a>
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


        <script src="./js/global.js"></script>

        <script src="./vendor/waves/waves.min.js"></script>

        <script src="./vendor/validator/jquery.validate.js"></script>
        <script src="./vendor/validator/validator-init.js"></script>

        <script src="./js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });

            function delete_role(id, role){
                window.location = 'role_insert.php?id=' + id + '&type=' + role 
            }
        </script>
    </body>

    </html>
<?php
} else {
    header("Location: signin.php");
}
