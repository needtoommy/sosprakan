<?php
include 'db.php';
$stmt = $pdo->prepare("SELECT * FROM location where province =  :PROVINCEID and area = :AMPHURID");
$stmt->execute(['PROVINCEID' => $_POST['province'], 'AMPHURID' => $_POST['amphur']]);
?>
<select name='district' id='district' class="form-control" style="display: none;">
    <option value="">-- เลือกแขวง --</option>
    <?php
    while ($row = $stmt->fetch()) {
    ?>
        <option value="<?php echo $row['district']; ?>"><?php echo $row['district']; ?></option>
    <?php
    } ?>
</select>


<?php
$stmt = $pdo->prepare("SELECT * FROM location where province =  :PROVINCEID and area = :AMPHURID");
$stmt->execute(['PROVINCEID' => $_POST['province'], 'AMPHURID' => $_POST['amphur']]);
$row = $stmt->fetch();
?>
<div class="nice-select form-control" tabindex="0"><span class="current">-- เลือกเขต --</span>
    <ul class="list">
        <li data-value="" data-display="-- เลือกเขต --" class="option selected">-- เลือกเขต --</li>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <li data-value="<?php echo $row['district']; ?>" class="option"><?php echo $row['district']; ?></li>
        <?php
        } ?>
    </ul>
</div>
