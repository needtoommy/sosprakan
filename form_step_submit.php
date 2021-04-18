<?php
include 'db.php';


$productid =  $_POST['productid'];
$insure_level = $_POST['insure_level'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$citizenid = $_POST['citizenid'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$addressno =  $_POST['addressno'];
$addressmoo = $_POST['addressmoo'];
$addresssoi = $_POST['addresssoi'];
$addressroad =  $_POST['addressroad'];
$province = $_POST['province'];
$amphur = $_POST['amphur'];
$district = $_POST['district'];
$zipcode = $_POST['zipcode'];
$car_year = $_POST['car_year'];
$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$car_plate_province = $_POST['car_plate_province'];
$car_plate = $_POST['car_plate'];
$car_num_body = $_POST['car_num_body'];
$policy_date = $_POST['policy_date'];
$prb = $_POST['prb'];
$carsub_model = $_POST['carsub_model'];



$stmt = $pdo->prepare("INSERT INTO `order` (
        create_datetime,
        productid,
        insure_level,
        firstname,
        lastname,
        citizenid, 
        tel,
        email,
        addressno,
        addressmoo,
        addresssoi,
        addressroad,
        province,
        amphur,
        district, 
        zipcode, 
        car_year, 
        car_brand, 
        car_model,
        car_plate_province, 
        car_plate,
        car_num_body, 
        policy_date,
        prb,
        status,
        car_sub
        
    ) VALUES (
        :create_datetime,
        :productid,
        :insure_level,
        :firstname,
        :lastname,
        :citizenid, 
        :tel,
        :email,
        :addressno,
        :addressmoo,
        :addresssoi,
        :addressroad,
        :province,
        :amphur,
        :district, 
        :zipcode, 
        :car_year, 
        :car_brand, 
        :car_model,
        :car_plate_province, 
        :car_plate,
        :car_num_body, 
        :policy_date,
        :prb,
        :status,
        :car_sub
        

    )");
$stmt->execute(
    [
        'create_datetime' => date('d-m-Y h:i:s'),
        'productid' => $productid,
        'insure_level' => $insure_level,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'citizenid' => $citizenid,
        'tel' => $tel,
        'email' => $email,
        'addressno' => $addressno,
        'addressmoo' => $addressmoo,
        'addresssoi' => $addresssoi,
        'addressroad' => $addressroad,
        'province' => $province,
        'amphur' => $amphur,
        'district' => $district,
        'zipcode' => $zipcode,
        'car_year' => $car_year,
        'car_brand' => $car_brand,
        'car_model' => $car_model,
        'car_plate_province' => $car_plate_province,
        'car_plate' => $car_plate,
        'car_num_body' => $car_num_body,
        'policy_date' => $policy_date,
        'prb' => $prb,
        'status' => 'A',
        'car_sub' => $carsub_model


    ]
);

echo "success";
