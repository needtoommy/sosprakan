<?php
include 'db.php';

$stmt = $pdo->prepare("SELECT zipcode FROM location where province =  :province and area = :area and district = :district");
$stmt->execute(['province' => $_POST['province'], 'area' => $_POST['amphur'],'district' => $_POST['district']]);
$row = $stmt->fetch();
?>
<input type="text" class="form-control" name="zipcode" id="zipcode" value="<?php echo $row['zipcode']; ?>">