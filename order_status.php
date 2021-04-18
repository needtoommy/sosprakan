<?php
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';
$status = $_POST['status'];


$stmt = $pdo->query("SELECT o.create_datetime as order_date ,o.*,p.* from `order` o, product p where o.productid = p.productid and o.status = '$status'");
$i = 1;

while ($row = $stmt->fetch()) {


    $txt = "";
    $color = "";
    if ($status == 'A') {
        $txt = "เปิดบิล";
        $color = "hsl(204deg 92% 63%)";
    } else if ($status == 'B') {
        $txt = "ติดตาม";
        $color = "hsl(174deg 82% 45%)";
    } else if ($status == 'C') {
        $txt = "รอชำระ";
        $color = "hsl(22deg 98% 64%)";
    } else if ($status == 'D') {
        $txt = "ส่งออก";
        $color = "hsl(1deg 89% 64%)";
    } else if ($status == 'E') {
        $txt = "เสร็จสิ้น";
        $color = "hsl(176deg 95% 25%)";
    }
?>
    <tr>
        <td align="center"><?php echo explode(" ", $row['order_date'])[0] ?></td>
        <td align="center"><?php echo $row['id'] ?></td>
        <td align="center"><?php echo $row['suppliername'] ?></td>
        <td align="center"><?php echo $row['car_model'] ?></td>
        <td align="center"><?php echo $row['firstname'] . " " . $row['lastname'] ?></td>
        <td align="center"><?php echo $row['addressno'] . " " . $row['addressmoo'] . " " . $row['addresssoi'] . " " . $row['addressroad'] ?></td>
        <td align="center"><?php echo $row['tel'] ?></td>
        <td align="center"><?php echo $row['insure_prince'] ?></td>
        <td align="center"><span style="font-size: 14px;padding:5px; background-color:<?php echo $color; ?>; color:white;border-radius:3px;"><?php echo $txt; ?></span></td>
        <td align="center"><a href="order_detail.php?orderid=<?php echo $row['id'] ?>"><i class="fa fa-file" aria-hidden="true"></i></a> &nbsp; <a href="order_delete.php?orderid=<?php echo $row['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>
<?php

}
}
?>