<?php

include 'db.php';
session_start();


if ($_POST['type'] == 1) {
?>
    <input type="hidden" name="insure_level" value="1">
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
    <?php
    $sql_product = "SELECT * from product WHERE insure_type = '1' and status = 'A'";
    $stmt = $pdo->prepare($sql_product);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch()) {
    ?>
        <div class="row" style="background-color: #f2f6ff;margin-bottom:15px;padding-bottom:10px;">

            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="120" height="120" style="padding:8px;margin-top:15px;">
                    </div>
                    <div class="col-md-10 col-8">
                        <div class="row">
                            <div class="col-md-12 " style="margin-top: 15px;">
                                <h4><?php echo $row['insure_name']; ?> ชั้น 1</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <?php if ($row['claim1'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ประกัน</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim1_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim1_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                    <?php
                                    if ($row['claim2'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ห้าง</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim2_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim2_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-12">
                        <a class="btn btn-dark" id="compare<?php echo $row['productid'] ?>" style=" padding:10px;margin-top:10px;width:100%" onclick="compare('<?php echo $row['productid'] ?>')">เปรียบเทียบ</a>
                    </div>
                    <div class="col-6 col-md-12">
                        <a href="#" class="btn btn-primary" style=" padding:10px; margin-top:10px;width:100%;" onclick="nextPrev(1);set_productid(<?php echo $row['productid'] ?>);">สนใจ</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <span id="read-more<?php echo $i; ?>" onclick="preview(<?php echo $i; ?>)" style="display:flex;justify-content:center;cursor:pointer;">-- ดูเพิ่มเติม --</span>
            </div>
            <div class="col-md-12" id="toggle-data<?php echo $i; ?>" style="display:none;background-color: white; margin-top:20px;">
                <div class="row">
                    <div class="col-md-12">
                        <p style="background-color: white;"></p>
                    </div>
                    <div class="col-md-6" style="background-color: hsl(222deg 100% 97%);">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="80" height="80" style="padding:8px;margin-top:15px;">
                            </div>
                            <div class="col-md-9 col-9">
                                <span style="font-size:20px; color:black;margin-top:10px;"><?php echo $row['insure_name'] ?></span>
                                <br />
                                <span>ให้บริการโดย <strong><?php echo $row['suppliername'] ?></strong></span>
                            </div>



                            <div style="padding: 10px;background-color:#ffffff; margin-top:15px;" class="col-md-12">
                                <div class="col-md-12">
                                    <span style="color:hsl(3deg 94% 42%);text-align:center;font-size:30px;background-color:hsl(222deg 100% 97%); display:flex;justify-content:center;"><?php echo number_format($row['insure_prince'], 2) ?></span>
                                </div>
                                <div class="col-md-12">
                                    <p style="text-align: center;font-size:25px;">ทุนประกันภัย <?php echo number_format($row['insure_cover'], 2) ?> ฿</p>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding: 15px;background-color:hsl(268deg 79% 96%);">
                                <div style="padding: 10px;background-color:hsl(0deg 0% 100%);">
                                    <p style="text-align: center;color:black">กรอกข้อมูลเพื่อรับข้อเสนอนี้</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทร" name="phone_sp">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <input type="checkbox" name="consent" id="consent" style="width: 0;height:20px;width:20px;">&nbsp;&nbsp;
                                    <span>ยอมรับ</span><span style="color:hsl(206deg 78% 58%)">นโยบายของเรา</span>
                                </div>
                                <button type="button" class="btn btn-success waves-effect" id="confirm_sp" style="width: 100%;margin-top:10px;">ยืนยันข้อมูล</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                <br>
                                <span><?php echo $row['promotion'] ?></span>
                            </div>
                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;">
                                            <?php
                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                            if ($row['claim1'] && $row['claim2']) {
                                                echo ',';
                                            }
                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ไฟไหม้ และ โจรกรรม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันน้ำท่วม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>อุบัติเหตุส่วนบุคคล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ค่ารักษาพยาบาล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันตัวผู้ขับขี่</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                            </div>



                            <div class="col-md-12">
                                <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-8 col-8">
                                <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                            </div>
                            <div class="col-md-4 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        ?>
    <?php
        $i++;
    }
    ?>
<?php
} ?>


<?php
if ($_POST['type'] == 2) {
?>
    <input type="hidden" name="insure_level" value="2">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(1)">ชั้น1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="car_type(2)">ชั้น2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(3)">ชั้น2+</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(4)">ชั้น3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(5)">ชั้น3+</a>
        </li>
    </ul>
    <?php
    $sql_product = "SELECT * from product WHERE insure_type = '2' and status = 'A'";
    $stmt = $pdo->prepare($sql_product);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch()) {
    ?>
        <div class="row" style="background-color: #f2f6ff;margin-bottom:15px;padding-bottom:10px;">

            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="120" height="120" style="padding:8px;margin-top:15px;">
                    </div>
                    <div class="col-md-10 col-8">
                        <div class="row">
                            <div class="col-md-12 " style="margin-top: 15px;">
                                <h4><?php echo $row['insure_name']; ?> ชั้น 2</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <?php if ($row['claim1'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ประกัน</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim1_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim1_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                    <?php
                                    if ($row['claim2'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ห้าง</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim2_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim2_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-12">
                        <a class="btn btn-dark" id="compare<?php echo $row['productid'] ?>" style=" padding:10px;margin-top:10px;width:100%" onclick="compare('<?php echo $row['productid'] ?>')">เปรียบเทียบ</a>
                    </div>
                    <div class="col-6 col-md-12">
                        <a href="#" class="btn btn-primary" style=" padding:10px; margin-top:10px;width:100%;" onclick="nextPrev(1);set_productid(<?php echo $row['productid'] ?>);">สนใจ</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <span id="read-more<?php echo $i; ?>" onclick="preview(<?php echo $i; ?>)" style="display:flex;justify-content:center;cursor:pointer;">-- ดูเพิ่มเติม --</span>
            </div>
            <div class="col-md-12" id="toggle-data<?php echo $i; ?>" style="display:none;background-color: white; margin-top:20px;">
                <div class="row">
                    <div class="col-md-12">
                        <p style="background-color: white;"></p>
                    </div>
                    <div class="col-md-6" style="background-color: hsl(222deg 100% 97%);">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="80" height="80" style="padding:8px;margin-top:15px;">
                            </div>
                            <div class="col-md-9 col-9">
                                <span style="font-size:20px; color:black;margin-top:10px;"><?php echo $row['insure_name'] ?></span>
                                <br />
                                <span>ให้บริการโดย <strong><?php echo $row['suppliername'] ?></strong></span>
                            </div>



                            <div style="padding: 10px;background-color:#ffffff; margin-top:15px;" class="col-md-12">
                                <div class="col-md-12">
                                    <span style="color:hsl(3deg 94% 42%);text-align:center;font-size:30px;background-color:hsl(222deg 100% 97%); display:flex;justify-content:center;"><?php echo number_format($row['insure_prince'], 2) ?></span>
                                </div>
                                <div class="col-md-12">
                                    <p style="text-align: center;font-size:25px;">ทุนประกันภัย <?php echo number_format($row['insure_cover'], 2) ?> ฿</p>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding: 15px;background-color:hsl(268deg 79% 96%);">
                                <div style="padding: 10px;background-color:hsl(0deg 0% 100%);">
                                    <p style="text-align: center;color:black">กรอกข้อมูลเพื่อรับข้อเสนอนี้</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทร" name="phone_sp">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <input type="checkbox" name="consent" id="consent" style="width: 0;height:20px;width:20px;">&nbsp;&nbsp;
                                    <span>ยอมรับ</span><span style="color:hsl(206deg 78% 58%)">นโยบายของเรา</span>
                                </div>
                                <button type="button" class="btn btn-success waves-effect" id="confirm_sp" style="width: 100%;margin-top:10px;">ยืนยันข้อมูล</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                <br>
                                <span><?php echo $row['promotion'] ?></span>
                            </div>
                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;">
                                            <?php
                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                            if ($row['claim1'] && $row['claim2']) {
                                                echo ',';
                                            }
                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ไฟไหม้ และ โจรกรรม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันน้ำท่วม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>อุบัติเหตุส่วนบุคคล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ค่ารักษาพยาบาล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันตัวผู้ขับขี่</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                            </div>



                            <div class="col-md-12">
                                <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-8 col-8">
                                <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                            </div>
                            <div class="col-md-4 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        ?>
    <?php
        $i++;
    }
    ?>
<?php
} ?>


<?php
if ($_POST['type'] == 3) {
?>
    <input type="hidden" name="insure_level" value="2plus">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(1)">ชั้น1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(2)">ชั้น2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="car_type(3)">ชั้น2+</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(4)">ชั้น3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(5)">ชั้น3+</a>
        </li>
    </ul>
    <?php
    $sql_product = "SELECT * from product WHERE insure_type = '2plus' and status = 'A'";
    $stmt = $pdo->prepare($sql_product);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch()) {
    ?>
        <div class="row" style="background-color: #f2f6ff;margin-bottom:15px;padding-bottom:10px;">

            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="120" height="120" style="padding:8px;margin-top:15px;">
                    </div>
                    <div class="col-md-10 col-8">
                        <div class="row">
                            <div class="col-md-12 " style="margin-top: 15px;">
                                <h4><?php echo $row['insure_name']; ?> ชั้น 2+</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <?php if ($row['claim1'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ประกัน</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim1_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim1_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                    <?php
                                    if ($row['claim2'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ห้าง</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim2_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim2_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-12">
                        <a class="btn btn-dark" id="compare<?php echo $row['productid'] ?>" style=" padding:10px;margin-top:10px;width:100%" onclick="compare('<?php echo $row['productid'] ?>')">เปรียบเทียบ</a>
                    </div>
                    <div class="col-6 col-md-12">
                        <a href="#" class="btn btn-primary" style=" padding:10px; margin-top:10px;width:100%;" onclick="nextPrev(1);set_productid(<?php echo $row['productid'] ?>);">สนใจ</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <span id="read-more<?php echo $i; ?>" onclick="preview(<?php echo $i; ?>)" style="display:flex;justify-content:center;cursor:pointer;">-- ดูเพิ่มเติม --</span>
            </div>
            <div class="col-md-12" id="toggle-data<?php echo $i; ?>" style="display:none;background-color: white; margin-top:20px;">
                <div class="row">
                    <div class="col-md-12">
                        <p style="background-color: white;"></p>
                    </div>
                    <div class="col-md-6" style="background-color: hsl(222deg 100% 97%);">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="80" height="80" style="padding:8px;margin-top:15px;">
                            </div>
                            <div class="col-md-9 col-9">
                                <span style="font-size:20px; color:black;margin-top:10px;"><?php echo $row['insure_name'] ?></span>
                                <br />
                                <span>ให้บริการโดย <strong><?php echo $row['suppliername'] ?></strong></span>
                            </div>



                            <div style="padding: 10px;background-color:#ffffff; margin-top:15px;" class="col-md-12">
                                <div class="col-md-12">
                                    <span style="color:hsl(3deg 94% 42%);text-align:center;font-size:30px;background-color:hsl(222deg 100% 97%); display:flex;justify-content:center;"><?php echo number_format($row['insure_prince'], 2) ?></span>
                                </div>
                                <div class="col-md-12">
                                    <p style="text-align: center;font-size:25px;">ทุนประกันภัย <?php echo number_format($row['insure_cover'], 2) ?> ฿</p>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding: 15px;background-color:hsl(268deg 79% 96%);">
                                <div style="padding: 10px;background-color:hsl(0deg 0% 100%);">
                                    <p style="text-align: center;color:black">กรอกข้อมูลเพื่อรับข้อเสนอนี้</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทร" name="phone_sp">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <input type="checkbox" name="consent" id="consent" style="width: 0;height:20px;width:20px;">&nbsp;&nbsp;
                                    <span>ยอมรับ</span><span style="color:hsl(206deg 78% 58%)">นโยบายของเรา</span>
                                </div>
                                <button type="button" class="btn btn-success waves-effect" id="confirm_sp" style="width: 100%;margin-top:10px;">ยืนยันข้อมูล</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                <br>
                                <span><?php echo $row['promotion'] ?></span>
                            </div>
                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;">
                                            <?php
                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                            if ($row['claim1'] && $row['claim2']) {
                                                echo ',';
                                            }
                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ไฟไหม้ และ โจรกรรม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันน้ำท่วม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>อุบัติเหตุส่วนบุคคล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ค่ารักษาพยาบาล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันตัวผู้ขับขี่</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                            </div>



                            <div class="col-md-12">
                                <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-8 col-8">
                                <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                            </div>
                            <div class="col-md-4 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        ?>
    <?php
        $i++;
    }
    ?>
<?php
} ?>

<?php
if ($_POST['type'] == 4) {
?>
    <input type="hidden" name="insure_level" value="3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(1)">ชั้น1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(2)">ชั้น2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(3)">ชั้น2+</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="car_type(4)">ชั้น3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(5)">ชั้น3+</a>
        </li>
    </ul>
    <?php
    $sql_product = "SELECT * from product WHERE insure_type = '3' and status = 'A'";
    $stmt = $pdo->prepare($sql_product);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch()) {
    ?>
        <div class="row" style="background-color: #f2f6ff;margin-bottom:15px;padding-bottom:10px;">

            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="120" height="120" style="padding:8px;margin-top:15px;">
                    </div>
                    <div class="col-md-10 col-8">
                        <div class="row">
                            <div class="col-md-12 " style="margin-top: 15px;">
                                <h4><?php echo $row['insure_name']; ?> ชั้น 3</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <?php if ($row['claim1'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ประกัน</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim1_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim1_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                    <?php
                                    if ($row['claim2'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ห้าง</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim2_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim2_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-12">
                        <a class="btn btn-dark" id="compare<?php echo $row['productid'] ?>" style=" padding:10px;margin-top:10px;width:100%" onclick="compare('<?php echo $row['productid'] ?>')">เปรียบเทียบ</a>
                    </div>
                    <div class="col-6 col-md-12">
                        <a href="#" class="btn btn-primary" style=" padding:10px; margin-top:10px;width:100%;" onclick="nextPrev(1);set_productid(<?php echo $row['productid'] ?>);">สนใจ</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <span id="read-more<?php echo $i; ?>" onclick="preview(<?php echo $i; ?>)" style="display:flex;justify-content:center;cursor:pointer;">-- ดูเพิ่มเติม --</span>
            </div>
            <div class="col-md-12" id="toggle-data<?php echo $i; ?>" style="display:none;background-color: white; margin-top:20px;">
                <div class="row">
                    <div class="col-md-12">
                        <p style="background-color: white;"></p>
                    </div>
                    <div class="col-md-6" style="background-color: hsl(222deg 100% 97%);">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="80" height="80" style="padding:8px;margin-top:15px;">
                            </div>
                            <div class="col-md-9 col-9">
                                <span style="font-size:20px; color:black;margin-top:10px;"><?php echo $row['insure_name'] ?></span>
                                <br />
                                <span>ให้บริการโดย <strong><?php echo $row['suppliername'] ?></strong></span>
                            </div>



                            <div style="padding: 10px;background-color:#ffffff; margin-top:15px;" class="col-md-12">
                                <div class="col-md-12">
                                    <span style="color:hsl(3deg 94% 42%);text-align:center;font-size:30px;background-color:hsl(222deg 100% 97%); display:flex;justify-content:center;"><?php echo number_format($row['insure_prince'], 2) ?></span>
                                </div>
                                <div class="col-md-12">
                                    <p style="text-align: center;font-size:25px;">ทุนประกันภัย <?php echo number_format($row['insure_cover'], 2) ?> ฿</p>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding: 15px;background-color:hsl(268deg 79% 96%);">
                                <div style="padding: 10px;background-color:hsl(0deg 0% 100%);">
                                    <p style="text-align: center;color:black">กรอกข้อมูลเพื่อรับข้อเสนอนี้</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทร" name="phone_sp">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <input type="checkbox" name="consent" id="consent" style="width: 0;height:20px;width:20px;">&nbsp;&nbsp;
                                    <span>ยอมรับ</span><span style="color:hsl(206deg 78% 58%)">นโยบายของเรา</span>
                                </div>
                                <button type="button" class="btn btn-success waves-effect" id="confirm_sp" style="width: 100%;margin-top:10px;">ยืนยันข้อมูล</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                <br>
                                <span><?php echo $row['promotion'] ?></span>
                            </div>
                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;">
                                            <?php
                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                            if ($row['claim1'] && $row['claim2']) {
                                                echo ',';
                                            }
                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ไฟไหม้ และ โจรกรรม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันน้ำท่วม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>อุบัติเหตุส่วนบุคคล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ค่ารักษาพยาบาล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันตัวผู้ขับขี่</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                            </div>



                            <div class="col-md-12">
                                <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-8 col-8">
                                <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                            </div>
                            <div class="col-md-4 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        ?>
    <?php
        $i++;
    }
    ?>
<?php
} ?>



<?php
if ($_POST['type'] == 5) {
?>
    <input type="hidden" name="insure_level" value="3plus">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(1)">ชั้น1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(2)">ชั้น2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(3)">ชั้น2+</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="car_type(4)">ชั้น3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" onclick="car_type(5)">ชั้น3+</a>
        </li>
    </ul>
    <?php
    $sql_product = "SELECT * from product WHERE insure_type = '3plus' and status = 'A'";
    $stmt = $pdo->prepare($sql_product);
    $stmt->execute();
    $i = 1;
    while ($row = $stmt->fetch()) {
    ?>
        <div class="row" style="background-color: #f2f6ff;margin-bottom:15px;padding-bottom:10px;">

            <div class="col-md-10 col-12">
                <div class="row">
                    <div class="col-md-2 col-4">
                        <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="120" height="120" style="padding:8px;margin-top:15px;">
                    </div>
                    <div class="col-md-10 col-8">
                        <div class="row">
                            <div class="col-md-12 " style="margin-top: 15px;">
                                <h4><?php echo $row['insure_name']; ?> ชั้น 3+</h4>
                            </div>
                            <div class="col-md-10">
                                <div class="row">
                                    <?php if ($row['claim1'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ประกัน</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim1_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim1_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    } ?>

                                    <?php
                                    if ($row['claim2'] != '') {
                                    ?>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <span style="background-color:gold;color:white;padding:7px;font-size:14px;">อู่ห้าง</span>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <del><em><?php echo number_format($row['claim2_old'], 2); ?></em></del> &nbsp;&nbsp;&nbsp;
                                                    <span style="font-size:20px;color:chocolate;"><strong><?php echo number_format($row['claim2_dis'], 2); ?></strong></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="row justify-content-center align-items-center">
                    <div class="col-6 col-md-12">
                        <a class="btn btn-dark" id="compare<?php echo $row['productid'] ?>" style=" padding:10px;margin-top:10px;width:100%" onclick="compare('<?php echo $row['productid'] ?>')">เปรียบเทียบ</a>
                    </div>
                    <div class="col-6 col-md-12">
                        <a href="#" class="btn btn-primary" style=" padding:10px; margin-top:10px;width:100%;" onclick="nextPrev(1);set_productid(<?php echo $row['productid'] ?>);">สนใจ</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <span id="read-more<?php echo $i; ?>" onclick="preview(<?php echo $i; ?>)" style="display:flex;justify-content:center;cursor:pointer;">-- ดูเพิ่มเติม --</span>
            </div>
            <div class="col-md-12" id="toggle-data<?php echo $i; ?>" style="display:none;background-color: white; margin-top:20px;">
                <div class="row">
                    <div class="col-md-12">
                        <p style="background-color: white;"></p>
                    </div>
                    <div class="col-md-6" style="background-color: hsl(222deg 100% 97%);">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <img src="images/supplier/<?php echo $row['img'] ?>" alt="AII" width="80" height="80" style="padding:8px;margin-top:15px;">
                            </div>
                            <div class="col-md-9 col-9">
                                <span style="font-size:20px; color:black;margin-top:10px;"><?php echo $row['insure_name'] ?></span>
                                <br />
                                <span>ให้บริการโดย <strong><?php echo $row['suppliername'] ?></strong></span>
                            </div>



                            <div style="padding: 10px;background-color:#ffffff; margin-top:15px;" class="col-md-12">
                                <div class="col-md-12">
                                    <span style="color:hsl(3deg 94% 42%);text-align:center;font-size:30px;background-color:hsl(222deg 100% 97%); display:flex;justify-content:center;"><?php echo number_format($row['insure_prince'], 2) ?></span>
                                </div>
                                <div class="col-md-12">
                                    <p style="text-align: center;font-size:25px;">ทุนประกันภัย <?php echo number_format($row['insure_cover'], 2) ?> ฿</p>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding: 15px;background-color:hsl(268deg 79% 96%);">
                                <div style="padding: 10px;background-color:hsl(0deg 0% 100%);">
                                    <p style="text-align: center;color:black">กรอกข้อมูลเพื่อรับข้อเสนอนี้</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ชื่อ" name="name_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="นามสกุล" name="lastname_sp">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="ระบุเบอร์โทร" name="phone_sp">
                                    </div>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <input type="checkbox" name="consent" id="consent" style="width: 0;height:20px;width:20px;">&nbsp;&nbsp;
                                    <span>ยอมรับ</span><span style="color:hsl(206deg 78% 58%)">นโยบายของเรา</span>
                                </div>
                                <button type="button" class="btn btn-success waves-effect" id="confirm_sp" style="width: 100%;margin-top:10px;">ยืนยันข้อมูล</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12" style="border-radius:10px; border-style:solid;margin-bottom:10px;padding:20px;border-color:hsl(210deg 13% 91%);">
                                <span style="color:black;font-weight:bold !important"><i class="fa fa-star" aria-hidden="true" style="color:hsl(47deg 89% 52%);"></i>โปรโมชั่น</span>
                                <br>
                                <span><?php echo $row['promotion'] ?></span>
                            </div>
                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-dollar">&nbsp;&nbsp;</i>ค่าส่วนแรก</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo intval($row['first_price']) == 0 ? 'ไม่ต้องจ่าย' : number_format($row['first_price'], 2) ?></p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;อู่ซ่อม</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;">
                                            <?php
                                            echo $row['claim1'] ? 'อู่ประกัน' : '';
                                            if ($row['claim1'] && $row['claim2']) {
                                                echo ',';
                                            }
                                            echo $row['claim2'] ? 'อู่ห้าง' : '' ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div style="margin-top:5px;margin-bottom:5px;" class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;แผนผู้ขับขี่</p>
                                    </div>
                                    <div class="col-md-6 col-6" style="background-color: hsl(240deg 20% 98%);">
                                        <p style="color:blue; float:right;"><?php echo $row['person_plan'] == '' ? 'ไม่ระบุชื่อ' : $row['person_plan'] ?></p>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black;">ความคุ้มครองต่อรถยนต์สูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ไฟไหม้ และ โจรกรรม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_fire_sneaker'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันน้ำท่วม</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_water'], 2) ?> ฿</span>
                            </div>


                            <div class="col-md-12">
                                <p style="color:black">ความคุ้มครองต่อบุคคลสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-6 col-6">
                                <span>อุบัติเหตุส่วนบุคคล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ค่ารักษาพยาบาล</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_hospital'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span>ประกันตัวผู้ขับขี่</span>
                            </div>
                            <div class="col-md-6 col-6">
                                <span style="color:blue; float:right"><?php echo number_format($row['insure_driver'], 2) ?> ฿</span>
                            </div>



                            <div class="col-md-12">
                                <p style="color:black">ความรับผิดชอบต่อคู่กรณีสูงสุด</p>
                                <hr />
                            </div>
                            <div class="col-md-8 col-8">
                                <span>ความรับผิดชอบต่อทรัพสินบุคคลภายนอก</span>
                            </div>
                            <div class="col-md-4 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_person_out'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (ต่อคน)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_per'], 2) ?> ฿</span>
                            </div>
                            <div class="col-md-6 col-8">
                                <span>การเสียชีวิตของบุคคลภายนอก (สูงสุด)</span>
                            </div>
                            <div class="col-md-6 col-4">
                                <span style="color:blue; float:right"><?php echo number_format($row['cover_die_max'], 2) ?> ฿</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        ?>
    <?php
        $i++;
    }
    ?>
<?php
} ?>