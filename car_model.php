<?php
include 'db.php';
$stmt = $pdo->prepare('SELECT * FROM car_model where MakeCode = :MakeCode');
$stmt->execute(['MakeCode' => $_POST['MakeCode']]);
?>
<select onchange="carsub(this.value)" name='car_model' id='car_model' class="form-control" style="display: none;">
    <option value="">-- เลือกรุ่นรถยนต์ --</option>
    <?php
    while ($row = $stmt->fetch()) {
    ?>
        <option value="<?php echo $row['FamilyCode']; ?>"><?php echo $row['FamilyCode']; ?></option>
    <?php
    } ?>
</select>

<?php
$stmt = $pdo->prepare('SELECT * FROM car_model where MakeCode = :MakeCode');
$stmt->execute(['MakeCode' => $_POST['MakeCode']]);
$row = $stmt->fetch();
?>
<div class="nice-select form-control" tabindex="0"><span class="current">-- เลือกยี่ห้อรถยนต์ --</span>
    <ul class="list">
        <li data-value="" data-display="-- เลือกยี่ห้อรถยนต์ --" class="option selected">-- เลือกยี่ห้อรถยนต์ --</li>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <li data-value="<?php echo $row['FamilyCode']; ?>" class="option"><?php echo $row['FamilyCode']; ?></li>
        <?php
        } ?>
    </ul>
</div>