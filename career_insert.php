<?php

session_start();
include 'connect/db.php';
$db = new DB();

$request_position = '';
for ($i = 1; $i <= 12; $i++) {
    if ($i == 1) {
        $request_position .= $_POST['c' . $i];
    } else {
        if ($_POST['c' . $i]) {
            $request_position .=  " " . $_POST['c' . $i];
        }
    }
}

$namethai = $_POST['namethai'];
$nameeng = $_POST['nameeng'];
$nickname = $_POST['nickname'];
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$address = $_POST['address'];
$email = $_POST['email'];
$facebook = $_POST['facebook'];
$line = $_POST['line'];
$tel = $_POST['tel'];
$edu = $_POST['edu'];
$salary = $_POST['salary'];
$experince = $_POST['experince'];
$position = $_POST['position'];
$positive = $_POST['positive'];
$activity = $_POST['activity'];
$propjob = $_POST['propjob'];
$sex = $_POST['sex'];
$now = date('d-m-Y h:i:s');

$target_file = 'images/job/' . date('Ymdhis') . rand(0, 1000);
$imageFileType = strtolower(pathinfo(basename($_FILES["img"]["name"]), PATHINFO_EXTENSION));
move_uploaded_file($_FILES["img"]["tmp_name"], $target_file . '.' . $imageFileType);

$db_img = $target_file . '.' . $imageFileType;
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$sql = "INSERT INTO job 
(namethai, nameeng, nickname, age,height,weight,sex,address,email,facebook,line,tel,experince,edu,salary,position,propjob,positive,activity,img,request_position,create_datetime)
 VALUES ('$namethai', '$nameeng', '$nickname', '$age','$height','$weight','$sex','$address','$email','$facebook','$line','$tel','$experince','$edu','$salary','$position','$propjob','$positive','$activity','$db_img','$request_position','$now')";


if($db->Execute($sql)){
    echo "<script type='text/javascript'>alert('สมัครงานสำเร็จ'); window.location='career.php'</script>";
}else{
    echo "<script type='text/javascript'>alert('บันทึกไม่สำเร็จ กรุณาลองอีกครั้ง'); window.location='career.php'</script>";
}

//  echo $sql;
