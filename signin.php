<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tradix </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
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
            <div class="container h-20">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-xl-5 col-md-6">
                            <div class="mini-logo text-center my-5">
                                <img src="./icons/logo.jpg" alt="">
                            </div>
                        <div class="auth-form card">
                            <div class="card-header justify-content-center">
                                <h4 class="card-title">เข้าสู่ระบบ</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" name="myform" class="signin_validate" action="signin_check.php">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" placeholder="Username"
                                            name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password">
                                    </div>
                                    <p style="text-align: right;"> <a href="index.php">กลับหน้าหลัก</a></p>
                                   
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block">Sign in</button>
                                    </div>
                                </form>
                               
                            </div>
                        </div>
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
</body>

</html>