<?php
session_start();
if($_SESSION['PERMISSION'] == 'A')
{ 
include 'db.php';

if ($_POST['suppliername']) {
    $stmt = $pdo->prepare('SELECT SNAME from supplier WHERE SNAME=:SNAME and active = 1');
    $stmt->execute(['SNAME' => $_POST['suppliername']]);
    $row = $stmt->fetch();
    if (count($row) > 0) {
?>
        <select name='suppliername' id='suppliername' class="form-control" style="display: none;">
            <option value="<?php echo $row['SNAME']; ?>"><?php echo $row['SNAME']; ?></option>
            <?php
            $stmt = $pdo->query('SELECT SNAME from supplier WHERE active = 1 and SNAME <> "' . $_POST['suppliername'] . '"');
            while ($row = $stmt->fetch()) {
            ?>
                <option value="<?php echo $row['SNAME']; ?>"><?php echo $row['SNAME']; ?></option>
            <?php
            } ?>
        </select>

        <?php
        $stmt = $pdo->prepare('SELECT SNAME from supplier WHERE SNAME=:SNAME and active = 1');
        $stmt->execute(['SNAME' => $_POST['suppliername']]);
        $row = $stmt->fetch();
        ?>
        <div class="nice-select form-control" tabindex="0"><span class="current"><?php echo $row['SNAME']; ?></span>
            <ul class="list">
                <li data-value="<?php echo $row['SNAME']; ?>" data-display="<?php echo $row['SNAME']; ?>" class="option selected"><?php echo $row['SNAME']; ?></li>
                <?php
                $stmt = $pdo->query('SELECT SNAME from supplier WHERE active = 1 and SNAME <> "' . $_POST['suppliername'] . '"');
                while ($row = $stmt->fetch()) {
                ?>
                    <li data-value="<?php echo $row['SNAME']; ?>" class="option"><?php echo $row['SNAME']; ?></li>
                <?php
                } ?>
            </ul>
        </div>
    <?php
    }
}

if ($_POST['insure_type']) {
    ?>
    <select name="insure_type" id="insure_type" class="form-control" style="display: none;">
        <option value="<?php echo str_replace("plus","+",$_POST['insure_type']); ?>" selected><?php echo str_replace("plus","+",$_POST['insure_type']); ?></option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="2plus">2+</option>
        <option value="3">3</option>
        <option value="3plus">3+</option>
    </select>
    <div class="nice-select form-control" tabindex="0"><span class="current"><?php echo str_replace("plus","+",$_POST['insure_type']); ?></span>
        <ul class="list">
            <li data-value="<?php echo str_replace("plus","+",$_POST['insure_type']); ?>" data-display="<?php echo str_replace("plus","+",$_POST['insure_type']); ?>" class="option selected"><?php echo str_replace("plus","+",$_POST['insure_type']); ?></li>

            <li data-value="1" class="option">1</li>
            <li data-value="2" class="option">2</li>
            <li data-value="2plus" class="option">2+</li>
            <li data-value="3" class="option">3</li>
            <li data-value="3plus" class="option">3+</li>
        </ul>
    </div>
<?php
}
if ($_POST['insure_year']) {
?>
    <select name='insure_year' id="car_year" class="form-control" style="display: none;">
        <option value="<?php echo $_POST['insure_year']; ?>"><?php echo $_POST['insure_year']; ?></option>
        <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--) { ?>
            <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
        <?php  } ?>
    </select>

    <div class="nice-select form-control" tabindex="0"><span class="current"><?php echo $_POST['insure_year']; ?></span>
        <ul class="list">
            <li data-value="<?php echo $_POST['insure_year']; ?>" data-display="<?php echo $_POST['insure_year']; ?>" class="option selected"><?php echo $_POST['insure_year']; ?></li>
            <?php for ($i = date('Y'); $i >= date('Y') - 50; $i--) { ?>
                <li data-value="<?php echo  $i ?>" class="option"><?php echo  $i ?></li>
            <?php  } ?>
        </ul>
    </div>
<?php
}
if ($_POST['car_brand']) {
?>
    <select name='car_brand' id="car_brand" class="form-control" style="display: none;">
        <option  value="<?php echo $_POST['car_brand']; ?>"><?php echo $_POST['car_brand']; ?></option>
        <?php
        $stmt = $pdo->query('SELECT MakeCode, Description FROM car_brand where MakeCode <> "'.$_POST['car_brand'].'"');
        while ($row = $stmt->fetch()) {
        ?>
            <option value="<?php echo $row['MakeCode']; ?>"><?php echo $row['Description']; ?></option>
        <?php } ?>
    </select>

    <div class="nice-select form-control" tabindex="0"><span class="current"><?php echo $_POST['car_brand']; ?></span>
        <ul class="list">
            <li data-value="<?php echo $_POST['car_brand']; ?>" data-display="<?php echo $_POST['car_brand']; ?>" class="option selected"><?php echo $_POST['car_brand']; ?></li>
            <?php
            $stmt = $pdo->query('SELECT MakeCode, Description FROM car_brand where MakeCode <> "'.$_POST['car_brand'].'"');
            while ($row = $stmt->fetch()) {
            ?>
                <li data-value="<?php echo $row['MakeCode']; ?>" class="option"><?php echo $row['Description']; ?></li>
            <?php
            } ?>
        </ul>
    </div>
<?php
}
}
?>