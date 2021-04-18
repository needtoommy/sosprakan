<?php
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';

$type = $_POST['type'];

if ($type == 'edit') {

    $newfilename = strtoupper($_POST['supplier_code_edit']);

    if (isset($_FILES['supplier_img_edit'])) {
        $errors = array();
        $file_name = $_FILES['supplier_img_edit']['name'];
        $file_size = $_FILES['supplier_img_edit']['size'];
        $file_tmp = $_FILES['supplier_img_edit']['tmp_name'];
        $file_type = $_FILES['supplier_img_edit']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['supplier_img_edit']['name'])));

        $expensions = array("jpeg", "jpg", "png", "gif");

        $stmt = $pdo->prepare("SELECT SUPPLIERCODE FROM supplier WHERE suppliercode=:SUPPLIERCODE AND active = 1  limit 1");
        $stmt->execute(['SUPPLIERCODE' => $newfilename]);

        $row = $stmt->fetch();
        // if ($row != false) {
        //     $errors[] = "ชื่อรหัสบริษัทนี้มีในฐานข้อมูลแล้ว!";
        // }
        // if (file_exists("images/supplier/" . $newfilename . "." . $file_ext)) {
        //     $errors[] = "ชื่อรหัสบริษัทนี้มีในอัลบัมแล้ว!";
        // }
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "กรุณาอัพโหลดเฉพาะรูปภาพสกุลไฟล์ JPEG or PNG file.";
        }



        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/supplier/" . $newfilename . "." . $file_ext);


            $stmt = $pdo->prepare("UPDATE supplier SET  SUPPLIERCODE=:SUPPLIERCODE, SNAME=:SNAME, IMGS=:IMGS WHERE SUPPLIERID=:SUPPLIERID");
            $stmt->execute(['SUPPLIERCODE' => $_POST['supplier_code_edit'], 'SNAME' => $_POST['supplier_name_edit'], 'SUPPLIERID' => $_POST['supplier_id_edit'], 'IMGS' => $newfilename . "." . $file_ext]);
            echo "success";
            exit;
        } else {
            print_r($errors);
            exit;
        }
    }
} else if ($type == 'delete') {
    $stmt = $pdo->prepare("UPDATE supplier SET  active=:active WHERE SUPPLIERID=:SUPPLIERID");
    $stmt->execute(['active' => 0, 'SUPPLIERID' => $_POST['supplier_id']]);
    echo "success";
} else if ($type == 'add') {

    $newfilename = strtoupper($_POST['supplier_code_add']);

    if (isset($_FILES['supplier_img_add'])) {
        $errors = array();
        $file_name = $_FILES['supplier_img_add']['name'];
        $file_size = $_FILES['supplier_img_add']['size'];
        $file_tmp = $_FILES['supplier_img_add']['tmp_name'];
        $file_type = $_FILES['supplier_img_add']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['supplier_img_add']['name'])));

        $expensions = array("jpeg", "jpg", "png", "gif");

        $stmt = $pdo->prepare("SELECT SUPPLIERCODE FROM supplier WHERE suppliercode=:SUPPLIERCODE AND active = 1  limit 1");
        $stmt->execute(['SUPPLIERCODE' => $newfilename]);

        $row = $stmt->fetch();
        if ($row != false) {
            $errors[] = "ชื่อรหัสบริษัทนี้มีในฐานข้อมูลแล้ว!";
        }


        // if (file_exists("images/supplier/" . $newfilename . "." . $file_ext)) {
        //     $errors[] = "ชื่อรหัสบริษัทนี้มีในอัลบัมแล้ว!";
        // }
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "กรุณาอัพโหลดเฉพาะรูปภาพสกุลไฟล์ JPEG or PNG file.";
        }



        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "images/supplier/" . $newfilename . "." . $file_ext);

            $stmt = $pdo->prepare("INSERT INTO supplier (SUPPLIERCODE, SNAME, IMGS, ACTIVE) VALUES (:SUPPLIERCODE, :SNAME, :IMGS, 1)");
            $stmt->execute(['SUPPLIERCODE' => $newfilename, 'SNAME' => $_POST['supplier_name_add'], 'IMGS' => $newfilename . "." . $file_ext]);
            echo "success";
            exit;
        } else {
            print_r($errors);
            exit;
        }
    }
}
}