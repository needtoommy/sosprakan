<?php

session_start();

if ($_SESSION['ADMIN'] == 'ADMIN') {
    include 'connect/db.php';
    $db = new DB();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if($_GET['type']==1){
        $sql = "DELETE FROM login where id=".$_GET['id']."";
        if($db->Execute($sql)){
            echo '<script>alert("ลบรายการนี้สำเร็จ"); window.location="role.php"</script>';
            exit;
        }
    }
    $sql = "INSERT INTO login (username,password,active) VALUES ('$username','$password','$role')";
    // echo $sql;
    if($db->Execute($sql)){
        echo '<script>alert("เพิ่มสิทธิสำเร็จ"); window.location="role.php"</script>';
    }

}
