<?php
include 'db.php';
$stmt = $pdo->prepare("SELECT distinct(area) FROM location where province = :province");
$stmt->execute(['province' => $_POST['province']]);
?>
<select name='amphur' id='amphur' class="form-control" style="display: none;">
    <option value="">-- เลือกเขต --</option>
    <?php
    while ($row = $stmt->fetch()) {
    ?>
        <option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option>
    <?php
    } ?>
</select>


<?php
$stmt = $pdo->prepare("SELECT distinct(area) FROM location where province = :province");
$stmt->execute(['province' => $_POST['province']]);
$row = $stmt->fetch();
?>
<div class="nice-select form-control" tabindex="0"><span class="current">-- เลือกเขต --</span>
    <ul class="list">
        <li data-value="" data-display="-- เลือกเขต --" class="option selected">-- เลือกเขต --</li>
        <?php
        while ($row = $stmt->fetch()) {
        ?>
            <li data-value="<?php echo $row['area']; ?>" class="option"><?php echo $row['area']; ?></li>
        <?php
        } ?>
    </ul>
</div>
