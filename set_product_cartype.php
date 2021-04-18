<link rel="stylesheet" href="./vendor/waves/waves.min.css">
        <link rel="stylesheet" href="./css/style.css">
<?php
session_start();
if ($_SESSION['PERMISSION'] == 'A') {
    if ($_POST['type'] == 1) {
?>
        <input type="hidden" name="insure_type" value="1">
        <div class="row">
            <div class="col-md-12">
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
            </div>


            <div class="form-group col-md-6">
                <span>ราคาประกันภัย</span>
                <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ทุนประกันภัย</span>
                <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0">
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
                    <select name='car_model' id='car_model' class="form-control">
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
                        <input type="number" class="form-control" id="claim1_old" name="claim1_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim1_dis" name="claim1_dis" value="0">
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
                        <input type="number" class="form-control" id="claim2_old" name="claim2_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim2_dis" name="claim2_dis" value="0">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <span>โปรโมชั่น</span>
                <input type="text" class="form-control" id="promotion" name="promotion">
            </div>


            <div class="form-group col-md-6">
                <span>ค่าส่วนแรก</span>
                <input type="number" class="form-control" id="first_price" name="first_price" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>แผนผู้ขับขี่</span>
                <input type="text" class="form-control" id="person_plan" name="person_plan">
            </div>

            <div class="form-group col-md-6">
                <span>ไฟไหม้ และ โจรกรรม</span>
                <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ประกันน้ำท่วม</span>
                <input type="number" class="form-control" id="cover_water" name="cover_water" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>อุบัติเหตุส่วนบุคคล</span>
                <input type="number" class="form-control" id="cover_person" name="cover_person" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ค่ารักษาพยาบาล</span>
                <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>ประกันตัวผู้ขับขี่</span>
                <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                </span>
                <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                </span>
                <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                </span>
                <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0">
            </div>

        </div>
    <?php
    }


    if ($_POST['type'] == 2) {

    ?>
        <input type="hidden" name="insure_type" value="2">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(1)" style="cursor: pointer;">ชั้น1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" onclick="car_type(2)" style="cursor: pointer;">ชั้น2</a>
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
            </div>


            <div class="form-group col-md-6">
                <span>ราคาประกันภัย</span>
                <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ทุนประกันภัย</span>
                <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ชื่อประกันภัย</span>
                <input type="text" class="form-control" id="insure_name" name="insure_name">
            </div>

            <div class="form-group col-md-6">
                <span>ปีรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>ยี่ห้อรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>รุ่นรถยนต์</span>
                <input type="text" class="form-control" id="">
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
                        <input type="number" class="form-control" id="claim1_old" name="claim1_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim1_dis" name="claim1_dis" value="0">
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
                        <input type="number" class="form-control" id="claim2_old" name="claim2_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim2_dis" name="claim2_dis" value="0">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <span>โปรโมชั่น</span>
                <input type="text" class="form-control" id="promotion" name="promotion">
            </div>


            <div class="form-group col-md-6">
                <span>ค่าส่วนแรก</span>
                <input type="number" class="form-control" id="first_price" name="first_price" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>แผนผู้ขับขี่</span>
                <input type="text" class="form-control" id="person_plan" name="person_plan">
            </div>

            <div class="form-group col-md-6">
                <span>ไฟไหม้ และ โจรกรรม</span>
                <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ประกันน้ำท่วม</span>
                <input type="number" class="form-control" id="cover_water" name="cover_water" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>อุบัติเหตุส่วนบุคคล</span>
                <input type="number" class="form-control" id="cover_person" name="cover_person" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ค่ารักษาพยาบาล</span>
                <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>ประกันตัวผู้ขับขี่</span>
                <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                </span>
                <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                </span>
                <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                </span>
                <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0">
            </div>

        </div>
    <?php
    }



    if ($_POST['type'] == 3) {
    ?>
        <input type="hidden" name="insure_type" value="2plus">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(1)" style="cursor: pointer;">ชั้น1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(2)" style="cursor: pointer;">ชั้น2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" onclick="car_type(3)" style="cursor: pointer;">ชั้น2+</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(4)" style="cursor: pointer;">ชั้น3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(5)" style="cursor: pointer;">ชั้น3+</a>
                    </li>
                </ul>
            </div>


            <div class="form-group col-md-6">
                <span>ราคาประกันภัย</span>
                <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ทุนประกันภัย</span>
                <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ชื่อประกันภัย</span>
                <input type="text" class="form-control" id="insure_name" name="insure_name">
            </div>

            <div class="form-group col-md-6">
                <span>ปีรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>ยี่ห้อรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>รุ่นรถยนต์</span>
                <input type="text" class="form-control" id="">
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
                        <input type="number" class="form-control" id="claim1_old" name="claim1_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim1_dis" name="claim1_dis" value="0">
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
                        <input type="number" class="form-control" id="claim2_old" name="claim2_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim2_dis" name="claim2_dis" value="0">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <span>โปรโมชั่น</span>
                <input type="text" class="form-control" id="promotion" name="promotion">
            </div>


            <div class="form-group col-md-6">
                <span>ค่าส่วนแรก</span>
                <input type="number" class="form-control" id="first_price" name="first_price" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>แผนผู้ขับขี่</span>
                <input type="text" class="form-control" id="person_plan" name="person_plan">
            </div>

            <div class="form-group col-md-6">
                <span>ไฟไหม้ และ โจรกรรม</span>
                <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ประกันน้ำท่วม</span>
                <input type="number" class="form-control" id="cover_water" name="cover_water" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>อุบัติเหตุส่วนบุคคล</span>
                <input type="number" class="form-control" id="cover_person" name="cover_person" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ค่ารักษาพยาบาล</span>
                <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>ประกันตัวผู้ขับขี่</span>
                <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                </span>
                <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                </span>
                <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                </span>
                <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0">
            </div>

        </div>
    <?php
    }



    if ($_POST['type'] == 4) {
    ?>
        <input type="hidden" name="insure_type" value="3">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(1)" style="cursor: pointer;">ชั้น1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(2)" style="cursor: pointer;">ชั้น2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(3)" style="cursor: pointer;">ชั้น2+</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" onclick="car_type(4)" style="cursor: pointer;">ชั้น3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(5)" style="cursor: pointer;">ชั้น3+</a>
                    </li>
                </ul>
            </div>


            <div class="form-group col-md-6">
                <span>ราคาประกันภัย</span>
                <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ทุนประกันภัย</span>
                <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ชื่อประกันภัย</span>
                <input type="text" class="form-control" id="insure_name" name="insure_name">
            </div>

            <div class="form-group col-md-6">
                <span>ปีรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>ยี่ห้อรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>รุ่นรถยนต์</span>
                <input type="text" class="form-control" id="">
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
                        <input type="number" class="form-control" id="claim1_old" name="claim1_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim1_dis" name="claim1_dis" value="0">
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
                        <input type="number" class="form-control" id="claim2_old" name="claim2_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim2_dis" name="claim2_dis" value="0">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <span>โปรโมชั่น</span>
                <input type="text" class="form-control" id="promotion" name="promotion">
            </div>


            <div class="form-group col-md-6">
                <span>ค่าส่วนแรก</span>
                <input type="number" class="form-control" id="first_price" name="first_price" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>แผนผู้ขับขี่</span>
                <input type="text" class="form-control" id="person_plan" name="person_plan">
            </div>

            <div class="form-group col-md-6">
                <span>ไฟไหม้ และ โจรกรรม</span>
                <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ประกันน้ำท่วม</span>
                <input type="number" class="form-control" id="cover_water" name="cover_water" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>อุบัติเหตุส่วนบุคคล</span>
                <input type="number" class="form-control" id="cover_person" name="cover_person" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ค่ารักษาพยาบาล</span>
                <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>ประกันตัวผู้ขับขี่</span>
                <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                </span>
                <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                </span>
                <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                </span>
                <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0">
            </div>

        </div>
    <?php
    }

    if ($_POST['type'] == 5) {
    ?>
        <input type="hidden" name="insure_type" value="3plus">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" onclick="car_type(1)" style="cursor: pointer;">ชั้น1</a>
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
                        <a class="nav-link active" aria-current="page" onclick="car_type(5)" style="cursor: pointer;">ชั้น3+</a>
                    </li>
                </ul>
            </div>


            <div class="form-group col-md-6">
                <span>ราคาประกันภัย</span>
                <input type="number" class="form-control" id="insure_prince" name="insure_prince" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ทุนประกันภัย</span>
                <input type="number" class="form-control" id="insure_cover" name="insure_cover" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ชื่อประกันภัย</span>
                <input type="text" class="form-control" id="insure_name" name="insure_name">
            </div>

            <div class="form-group col-md-6">
                <span>ปีรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>ยี่ห้อรถยนต์</span>
                <input type="text" class="form-control" id="">
            </div>

            <div class="form-group col-md-6">
                <span>รุ่นรถยนต์</span>
                <input type="text" class="form-control" id="">
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
                        <input type="number" class="form-control" id="claim1_old" name="claim1_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim1_dis" name="claim1_dis" value="0">
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
                        <input type="number" class="form-control" id="claim2_old" name="claim2_old" value="0">
                    </div>
                    <div class="form-group col-md-12">
                        <span>ราคาที่ลด (Discount)</span>
                        <input type="number" class="form-control" id="claim2_dis" name="claim2_dis" value="0">
                    </div>
                </div>
            </div>

            <div class="form-group col-md-6">
                <span>โปรโมชั่น</span>
                <input type="text" class="form-control" id="promotion" name="promotion">
            </div>


            <div class="form-group col-md-6">
                <span>ค่าส่วนแรก</span>
                <input type="number" class="form-control" id="first_price" name="first_price" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>แผนผู้ขับขี่</span>
                <input type="text" class="form-control" id="person_plan" name="person_plan">
            </div>

            <div class="form-group col-md-6">
                <span>ไฟไหม้ และ โจรกรรม</span>
                <input type="number" class="form-control" id="cover_fire_sneaker" name="cover_fire_sneaker" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ประกันน้ำท่วม</span>
                <input type="number" class="form-control" id="cover_water" name="cover_water" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>อุบัติเหตุส่วนบุคคล</span>
                <input type="number" class="form-control" id="cover_person" name="cover_person" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ค่ารักษาพยาบาล</span>
                <input type="number" class="form-control" id="cover_hospital" name="cover_hospital" value="0">
            </div>


            <div class="form-group col-md-6">
                <span>ประกันตัวผู้ขับขี่</span>
                <input type="number" class="form-control" id="insure_driver" name="insure_driver" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>ความรับผิดชอบต่อทรัพย์สินบุคคลภายนอก
                </span>
                <input type="number" class="form-control" id="cover_person_out" name="cover_person_out" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)
                </span>
                <input type="number" class="form-control" id="cover_die_per" name="cover_die_per" value="0">
            </div>

            <div class="form-group col-md-6">
                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)
                </span>
                <input type="number" class="form-control" id="cover_die_max" name="cover_die_max" value="0">
            </div>

        </div>
<?php
    }
}

?>

<script src="./js/global.js"></script>
        <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>
        <script src="./js/plugins/owl-carousel-init.js"></script>

        <script src="./vendor/apexchart/apexcharts.min.js"></script>
        <script src="./vendor/apexchart/apexchart-init.js"></script>
