<?php
include 'db.php';
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
    <link rel="stylesheet" href="./vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<style>
    /* @font-face {
  font-family: 'ThaiSansNeue-Light';
  src: url('information/font/test/ThaiSansNeue-Light.woff2') format('woff2'),
       url('information/font/test/ThaiSansNeue-Light.woff') format('woff'),
       url('information/font/test/ThaiSansNeue-Light.ttf')  format('truetype');
}

body {
  font-family: 'ThaiSansNeue-Light', sans-serif;
} */
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
                                <a class="navbar-brand" href="index.html"><img src="./icons/logo.jpg" alt="logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link" href="#">หน้าหลัก
                                            </a>

                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="" style="width: 100px;">เกี่ยวกับเรา</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="" style="width: 130px;">ประกันรถยนต์</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="" style="width: 100px;">สมัครงาน
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="" style="width: 100px;">ติดต่อเรา
                                            </a>
                                        </li>
                                        <?php if ($_SESSION['Permission'] === 'administrator') { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="./dashboard.html">Dashboard</a>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>

                                <div class="signin-btn">
                                    <a class="btn btn-primary" href="./signin.html">Sign in</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="intro" style="padding: 50px 0px;">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-6 col-12">
                        <div class="intro-content">
                            <h1>ประกันรถยนต์<img src="./icons/logo.jpg" alt="logo"> <br> ค้นหาประกันรถยนต์ หรือ พ.ร.บ. จากบริษัทประกันชั้นนำ
                            </h1>
                            <p>การันตีราคาถูก เจอถูกกว่าคืนเงินทันที</p>
                        </div>

                        <div class="intro-btn">
                            <a href="#" class="btn btn-primary">เช็คเบี้ยประกันฟรี</a>
                            <!-- <a href="#" class="btn btn-outline-primary"></a> -->
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-12">
                        <div class="intro-form-exchange">
                            <form method="post" name="myform" class="currency_validate">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">ยี่ห้อรถยนต์</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
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
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">ปีรถ</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="-- เลือกปีรถ --" value="">-- เลือกปีรถ --</option>
                                                <?php for ($i = 2021; $i >= 1971; $i--) { ?>
                                                    <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">รุ่นรถยนต์</label>
                                    </div>
                                    <div class="col-sm-8 ">
                                        <div class="input-group mb-3 car_model">
                                            <select name='car_model' id='car_model' class="form-control">
                                                <option data-display="-- เลือกรุ่นรถยนต์ --" value="">-- เลือกรุ่นรถยนต์ --
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">กล้อง CCTV</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="-- เลือกกล้อง CCTV--" value="">-- เลือกกล้อง CCTV--</option>
                                                <option value="1">มี</option>
                                                <option value="2">ไม่มี</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">ประกันหมดอายุ</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="วัน" value="">วัน</option>
                                                <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="เดือน" value="">เดือน</option>
                                                <option value="01">มกราคม</option>
                                                <option value="02">กุมภาพันธ์</option>
                                                <option value="03">มีนาคม</option>
                                                <option value="04">เมษายน</option>
                                                <option value="05">พฤษภาคม</option>
                                                <option value="06">มิถุนายน</option>
                                                <option value="07">กรกฎาคม</option>
                                                <option value="08">สิงหาคม</option>
                                                <option value="09">กันยายน</option>
                                                <option value="10">ตุลาคม</option>
                                                <option value="11">พฤศจิกายน</option>
                                                <option value="12">ธันวาคม</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <select name='currency' class="form-control">
                                                <option data-display="ปี" value="">ปี</option>
                                                <option value="litecoin">Litecoin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <label class="mr-sm-2">เบอร์โทรศัพท์</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="กรอกเบอร์โทรศัพท์">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-block">
                                    เช็คราคา
                                    <i class="la la-arrow-right"></i>
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="price-grid section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <h1 style="text-align: center; color:#514dd9"><span style="color:#08e5de; font-size:70px;">“</span> ค้นพบข้อเสนอโดนๆให้คุณซื้อประกันออนไลน์แบบไร้กังวล</h1>
                            <h1 style="text-align: center; color:#514dd9"> และได้รับความคุ้มครองตามที่ได้ระบุไว้ในกรมธรรม์ <span style="color:#08e5de;font-size:70px;">”</span></h1>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="./icons/logo.jpg" alt="logo" width="100%">
                    </div>
                    <div class="col-md-7">
                        <img src="./icons/logo.jpg" width="70" alt="logo">คือแพลตฟอร์มอินชัวร์เทค(InsurTech) แห่งแรกของประเทศไทย โดยเรานำเสนอแพลตฟอร์มเทียบแผนประกันชั้นนำที่มาปฏิวัติอุตสาหกรรมประกันภัย โดนการรวมเทคโนโลยีและความชำนาญในธุรกิจประกันภัย จนได้แพลจฟอร์มประกันภัยออนไลน์ที่ใช้ง่าย ใช้สะดวกในทุกขั้นตอน ตั้งแต่เลือกซื้อประกันจนถึงการชำระเงิน พร้อมให้บริการลูกค้า ด้วยการค้นหาแผนประกันที่หลากหลาย สะดวกและรวดเร็ว ผ่านช่องทางการซื้อที่ปลอดภัย มั่นใจได้
                    </div>
                    <div class="col-md-12" style="margin-top: 40px;">
                        <img src="./information/state_insurance.jpg" alt="logo" width="100%">
                    </div>

                </div>
            </div>
        </div>

        <div class="getstart section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title">
                            <h2>Get started in a few minutes</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="getstart-content">
                            <span><i class="la la-user-plus"></i></span>
                            <h3>Create an account</h3>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="getstart-content">
                            <span><i class="la la-bank"></i></span>
                            <h3>Link your bank account</h3>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="getstart-content">
                            <span><i class="la la-exchange"></i></span>
                            <h3>Start buying & selling</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="portfolio section-padding" data-scroll-index="2">
            <div class="container">
                <div class="row py-lg-5 justify-content-center">
                    <div class="col-xl-7">
                        <div class="section-title text-center">
                            <h2>Create your cryptocurrency portfolio today</h2>
                            <p>Tradix has a variety of features that make it the best place to start trading</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-6">
                        <div class="portfolio_list">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="media">
                                        <span class="port-icon"> <i class="la la-bar-chart"></i></span>
                                        <div class="media-body">
                                            <h4>Manage your portfolio</h4>
                                            <p>Buy and sell popular digital currencies, keep track of them in the one
                                                place.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="media">
                                        <span class="port-icon"> <i class="la la-calendar-check-o"></i></span>
                                        <div class="media-body">
                                            <h4>Recurring buys</h4>
                                            <p>Invest in cryptocurrency slowly over time by scheduling buys daily,
                                                weekly,
                                                or monthly.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="media">
                                        <span class="port-icon"> <i class="la la-lock"></i></span>
                                        <div class="media-body">
                                            <h4>Vault protection</h4>
                                            <p>For added security, store your funds in a vault with time delayed
                                                withdrawals.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="media">
                                        <span class="port-icon"> <i class="la la-mobile"></i></span>
                                        <div class="media-body">
                                            <h4>Mobile apps</h4>
                                            <p>Stay on top of the markets with the Tradix app for <a href="#">Android</a>
                                                or
                                                <a href="#">iOS</a>.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="portfolio_img">
                            <img src="./images/portfolio.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="trade-app section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title text-center">
                            <h2>Trade. Anywhere</h2>
                            <p> All of our products are ready to go, easy to use and offer great value to any kind of
                                business
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card trade-app-content">
                            <div class="card-body">
                                <span><i class="la la-mobile"></i></span>
                                <h4 class="card-title">Mobile</h4>
                                <p>All the power of Tradix's cryptocurrency exchange, in the palm of your hand. Download
                                    the
                                    Tradix mobile crypto trading app today</p>

                                <a href="#"> Know More <i class="la la-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card trade-app-content">
                            <div class="card-body">
                                <span><i class="la la-desktop"></i></span>
                                <h4 class="card-title">Desktop</h4>
                                <p>Powerful crypto trading platform for those who mean business. The Tradix crypto
                                    trading
                                    experience, tailor-made for your Windows or MacOS device.</p>

                                <a href="#"> Know More <i class="la la-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card trade-app-content">
                            <div class="card-body">
                                <span><i class="la la-connectdevelop"></i></span>
                                <h4 class="card-title">API</h4>
                                <p>The Tradix API is designed to provide an easy and efficient way to integrate your
                                    trading
                                    application into our platform.</p>

                                <a href="#"> Know More <i class="la la-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-5">
                    <div class="col-xl-12">
                        <div class="trusted-business py-5 text-center">
                            <h3>Trusted by Our <strong>Partners & Investors</strong></h3>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="trusted-logo">
                                    <a href="#"><img class="img-fluid" src="./images/brand/1.webp" alt=""></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="trusted-logo">
                                    <a href="#"><img class="img-fluid" src="./images/brand/2.webp" alt=""></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="trusted-logo">
                                    <a href="#"><img class="img-fluid" src="./images/brand/3.webp" alt=""></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="trusted-logo">
                                    <a href="#"><img class="img-fluid" src="./images/brand/4.webp" alt=""></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="trusted-logo">
                                    <a href="#"><img class="img-fluid" src="./images/brand/5.webp" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="testimonial section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title">
                            <h2>What our customer says</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="testimonial-content">
                            <div class="testimonial1 owl-carousel owl-theme">
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="customer-img">
                                            <img class="img-fluid" src="./images/testimonial/1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="customer-review">
                                            <img class="img-fluid" src="./images/brand/2.webp" alt="">
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi voluptas
                                                dignissimos similique quas molestiae doloribus recusandae voluptatem et
                                                repudiandae veritatis.</p>
                                            <div class="customer-info">
                                                <h6>Mr John Doe</h6>
                                                <p>CEO, Example Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="customer-img">
                                            <img class="img-fluid" src="./images/testimonial/2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="customer-review">
                                            <img class="img-fluid" src="./images/brand/3.webp" alt="">
                                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nisi voluptas
                                                dignissimos similique quas molestiae doloribus recusandae voluptatem et
                                                repudiandae veritatis.</p>
                                            <div class="customer-info">
                                                <h6>Mr Abraham</h6>
                                                <p>CEO, Example Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="promo section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8">
                        <div class="section-title text-center">
                            <h2>The most trusted cryptocurrency platform</h2>
                            <p> Here are a few reasons why you should choose Tradix
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center py-5">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="promo-content">
                            <div class="promo-content-img">
                                <img class="img-fluid" src="./images/svg/protect.svg" alt="">
                            </div>
                            <h3>Secure storage </h3>
                            <p>We store the vast majority of the digital assets in secure offline storage.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="promo-content">
                            <div class="promo-content-img">
                                <img class="img-fluid" src="./images/svg/cyber.svg" alt="">
                            </div>
                            <h3>Protected by insurance</h3>
                            <p>Cryptocurrency stored on our servers is covered by our insurance policy.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="promo-content">
                            <div class="promo-content-img">
                                <img class="img-fluid" src="./images/svg/finance.svg" alt="">
                            </div>
                            <h3>Industry best practices</h3>
                            <p>Tradix supports a variety of the most popular digital currencies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="appss section-padding">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="appss-content">
                            <h2>The secure app to store crypto yourself</h2>
                            <ul>
                                <li><i class="la la-check"></i> All your digital assets in one place</li>
                                <li><i class="la la-check"></i> Use Decentralized Apps</li>
                                <li><i class="la la-check"></i> Pay friends, not addresses</li>
                            </ul>
                            <div class="mt-4">
                                <a href="#" class="btn btn-primary my-1 waves-effect">
                                    <img src="./images/android.svg" alt="">
                                </a>
                                <a href="#" class="btn btn-primary my-1 waves-effect">
                                    <img src="./images/apple.svg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="appss-img">
                            <img class="img-fluid" src="./images/app.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title text-center">
                            <h2>Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="blog-grid">
                            <div class="card">
                                <img class="img-fluid" src="./images/blog/1.jpg" alt="">
                                <div class="card-body">
                                    <a href="blog-single.html">
                                        <h4 class="card-title">Why does Litecoin need MimbleWimble?</h4>
                                    </a>
                                    <p class="card-text">Cras chinwag brown bread Eaton cracking goal so I said a load
                                        of
                                        old tosh baking cakes.!</p>
                                </div>
                                <div class="card-footer">
                                    <div class="meta-info">
                                        <a href="#" class="author"><img src="./images/avatar/5.jpg" alt=""> Admin</a>
                                        <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July, 2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="blog-grid">
                            <div class="card">
                                <img class="img-fluid" src="./images/blog/2.jpg" alt="">
                                <div class="card-body">
                                    <a href="blog-single.html">
                                        <h4 class="card-title">How to securely store your HD wallet seeds?</h4>
                                    </a>
                                    <p class="card-text">Cras chinwag brown bread Eaton cracking goal so I said a load
                                        of
                                        old tosh baking cakes.!</p>
                                </div>
                                <div class="card-footer">
                                    <div class="meta-info">
                                        <a href="#" class="author"><img src="./images/avatar/6.jpg" alt=""> Admin</a>
                                        <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July, 2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="blog-grid">
                            <div class="card">
                                <img class="img-fluid" src="./images/blog/3.jpg" alt="">
                                <div class="card-body">
                                    <a href="blog-single.html">
                                        <h4 class="card-title">Exclusive Interview With Xinxi Wang Of Litecoin</h4>
                                    </a>
                                    <p class="card-text">Cras chinwag brown bread Eaton cracking goal so I said a load
                                        of
                                        old tosh baking cakes.!</p>
                                </div>
                                <div class="card-footer">
                                    <div class="meta-info">
                                        <a href="#" class="author"><img src="./images/avatar/7.jpg" alt=""> Admin</a>
                                        <a href="#" class="post-date"><i class="la la-calendar"></i> 31 July, 2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="get-touch section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="section-title">
                            <h2>Get in touch. Stay in touch.</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="get-touch-content">
                            <div class="media">
                                <span><i class="fa fa-shield"></i></span>
                                <div class="media-body">
                                    <h4>24 / 7 Support</h4>
                                    <p>Got a problem? Just get in touch. Our support team is available 24/7.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="get-touch-content">
                            <div class="media">
                                <span><i class="fa fa-cubes"></i></span>
                                <div class="media-body">
                                    <h4>Tradix Blog</h4>
                                    <p>News and updates from the world’s leading cryptocurrency exchange.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="get-touch-content">
                            <div class="media">
                                <span><i class="fa fa-certificate"></i></span>
                                <div class="media-body">
                                    <h4>Careers</h4>
                                    <p>Help build the future of technology. Start your new career at Tradix.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="get-touch-content">
                            <div class="media">
                                <span><i class="fa fa-life-ring"></i></span>
                                <div class="media-body">
                                    <h4>Community</h4>
                                    <p>Tradix is global. Join the discussion in our worldwide communities.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="bottom section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="bottom-logo">
                            <img class="pb-3" src="./images/logo-white.png" alt="">

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="bottom-widget">
                            <h4 class="widget-title">Company</h4>
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Affiliate</a></li>
                                <li><a href="#">Our Partner</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="bottom-widget">
                            <h4 class="widget-title">Support</h4>
                            <ul>
                                <li><a href="#">Ticket</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Helpdesk</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="bottom-widget">
                            <h4 class="widget-title">Exchange Pair</h4>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <ul>
                                        <li><a href="#">ETH to BTC</a></li>
                                        <li><a href="#">BTC to ETH</a></li>
                                        <li><a href="#">LTC to ETH</a></li>
                                        <li><a href="#">USDT to BTC</a></li>
                                    </ul>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <ul>
                                        <li><a href="#">BTC to USDT</a></li>
                                        <li><a href="#">LTC to BTC</a></li>
                                        <li><a href="#">XMR to BTC</a></li>
                                        <li><a href="#">ETC to DASH</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="copyright">
                            <p>© Copyright 2019 <a href="#">Tradix</a> I All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
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
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="./js/plugins/owl-carousel-init.js"></script>

    <script src="./vendor/apexchart/apexcharts.min.js"></script>
    <script src="./vendor/apexchart/apexchart-init.js"></script>

    <script src="./js/scripts.js"></script>
    <script>
        $('#car_brand').change(function() {
            $.ajax({
                url: "car_model.php",
                type: "post",
                data: 'MakeCode=' + $('#car_brand').val(),
                success: function(response) {

                    console.log(response)
                    $('.car_model').html(response)
                    // You will get response from your PHP page (what you echo or print)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    </script>
</body>

</html>