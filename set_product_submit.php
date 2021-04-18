<?php
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';

$insure_type =  $_POST['insure_type'];
$insure_prince = $_POST['insure_prince'];
$insure_cover = $_POST['insure_cover'];
$insure_name = $_POST['insure_name'];
$insure_year = $_POST['insure_year'];
$car_brand = $_POST['car_brand'];
$car_model = $_POST['car_model'];
$claim1 =  $_POST['claim1'];
$claim1_old = $_POST['claim1_old'];
$claim1_dis = $_POST['claim1_dis'];
$claim2 =  $_POST['claim2'];
$claim2_old = $_POST['claim2_old'];
$claim2_dis = $_POST['claim2_dis'];
$promotion = $_POST['promotion'];
$first_price = $_POST['first_price'];
$person_plan = $_POST['person_plan'];
$cover_fire_sneaker = $_POST['cover_fire_sneaker'];
$cover_water = $_POST['cover_water'];
$cover_person = $_POST['cover_person'];
$cover_hospital = $_POST['cover_hospital'];
$insure_driver = $_POST['insure_driver'];
$cover_person_out = $_POST['cover_person_out'];
$cover_die_per = $_POST['cover_die_per'];
$cover_die_max = $_POST['cover_die_max'];
$suppliername = $_POST['suppliername'];
$img = $_POST['img'];
$carsub_model = $_POST['carsub_model'];

$stmt = $pdo->prepare("INSERT INTO product (
                            insure_type,
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
                            create_datetime,
                            status,
                            suppliername,
                            img,
                            car_submodel

                        ) VALUES (
                            :insure_type,
                            :insure_prince,
                            :insure_cover,
                            :insure_name,
                            :insure_year,
                            :car_brand,
                            :car_model,
                            :claim1,
                            :claim1_old,
                            :claim1_dis,
                            :claim2,
                            :claim2_old,
                            :claim2_dis,
                            :promotion,
                            :first_price,
                            :person_plan,
                            :cover_fire_sneaker, 
                            :cover_water,
                            :cover_person,
                            :cover_hospital,
                            :insure_driver,
                            :cover_person_out,
                            :cover_die_per,
                            :cover_die_max,
                            :create_datetime,
                            :status,
                            :suppliername,
                            :img,
                            :carsub_model

                        )");

                 
$stmt->execute(
    [
        'insure_type' => $insure_type,
        'insure_prince' => $insure_prince,
        'insure_cover' => $insure_cover,
        'insure_name' => $insure_name,
        'insure_year' => $insure_year,
        'car_brand' => $car_brand,
        'car_model' => $car_model,
        'claim1' => $claim1!=''?'T':'',
        'claim1_old' => $claim1_old,
        'claim1_dis' => $claim1_dis,
        'claim2' => $claim2!=''?'T':'',
        'claim2_old' => $claim2_old,
        'claim2_dis' => $claim2_dis,
        'promotion' => $promotion,
        'first_price' => $first_price,
        'person_plan' => $person_plan,
        'cover_fire_sneaker' => $cover_fire_sneaker,
        'cover_water' => $cover_water,
        'cover_person' => $cover_person,
        'cover_hospital' => $cover_hospital,
        'insure_driver' => $insure_driver,
        'cover_person_out' => $cover_person_out,
        'cover_die_per' => $cover_die_per,
        'cover_die_max' => $cover_die_max,
        'create_datetime' => date('d-m-Y'),
        'status' => 'A',
        'suppliername' => $suppliername,
        'img' => $img,
        'carsub_model' => $carsub_model
    ]
);

echo "success";
}