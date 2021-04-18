<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login where  username = '$username' and password = '$password' ";
$q = $pdo->query($sql);
$r = $q->fetch();

if(!empty($r)){
      
    if($r['active']=='ADMIN'){
        $_SESSION['ADMIN'] = 'ADMIN';
    }
    $_SESSION['PERMISSION'] = 'A';
    header("Location: set_product_step1.php");
}else{
    echo "<script type='text/javascript'>alert('username or password incorrect!!');window.location = 'signin.php'</script>";
    // header("Location: signin.php");
   
}

?>