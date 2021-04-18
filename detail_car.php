<?php
include 'db.php';

$makecode = $_POST['makecode'];
$familycode = $_POST['familycode'];
$year = $_POST['caryear'];
$sql = "SELECT VEHICLEID,
						VEHICLEKEY,
						Description,
						VehicleTypeCode,
						YEARGROUP AS YEARGROUP,
						EngineDescription,
						BadgeDescription,
						submodelname,
						BadgeSecondaryDescription,
						BodyConfigDescription,
						ExtraIdentification,
						Series,
						GearTypeDescription,
						DriveDescription,
						BodyStyleDescription,
						NewPrice,
						DoorNum,
						ReleaseYear,
						IF( Locate('Manual', GearTypeDescription)>0, 'Manual', IF(Locate('Independent', GearTypeDescription)>0, 'Manual', 'Auto')) AS CarGear,
						IF (Locate('(',	Description	) > 0,CONCAT(' ', SUBSTRING(Description, Locate('(', Description))), '') AS CarOptions 
				 FROM	cp080869_sosprakan.rbvehicle
				 WHERE	FAMILYCODE = '$familycode'
				 AND 	YEARGROUP =  '$year'
				 AND    MakeCode = '$makecode'
				 ORDER BY CarGear, EngineDescription, BadgeDescription, BadgeSecondaryDescription, DoorNum, NewPrice";

$q = $pdo->query($sql);
?>
<select name='carsub_model' id='carsub_model' class="form-control" style="display: none;">
    <option value="-">เลือกรุ่นย่อย (เกียร์ / ซีซี / รุ่น / ประตู / ราคาซื้อ)</option>
    <?php
    while ($result = $q->fetch()) { ?>
        <option value="<?php echo $result['CarGear'] . ' / ' . number_format($result['EngineDescription'], 1) . " / " . ($result['BadgeDescription'] ? $result['BadgeDescription'] . ($result['BadgeSecondaryDescription'] ? " " . $result['BadgeSecondaryDescription'] : "") : "") . (($result['VehicleTypeCode'] == 'LC' || $result['VehicleTypeCode'] == "PU") ? " " . $result['BodyConfigDescription'] : "") . ($result['DriveDescription'] == '4  Wheel Drive' && $result['VehicleTypeCode'] != 'PS' ? ' 4WD' : '') . ($result['CarOptions'] ? " " . $result['CarOptions'] : "") . ' / ' . $result['DoorNum'] . 'dr / ' . number_format($result['NewPrice']) ?>">
            <?php echo $result['CarGear'] . ' / ' . number_format($result['EngineDescription'], 1) . " / " . ($result['BadgeDescription'] ? $result['BadgeDescription'] . ($result['BadgeSecondaryDescription'] ? " " . $result['BadgeSecondaryDescription'] : "") : "") . (($result['VehicleTypeCode'] == 'LC' || $result['VehicleTypeCode'] == "PU") ? " " . $result['BodyConfigDescription'] : "") . ($result['DriveDescription'] == '4  Wheel Drive' && $result['VehicleTypeCode'] != 'PS' ? ' 4WD' : '') . ($result['CarOptions'] ? " " . $result['CarOptions'] : "") . ' / ' . $result['DoorNum'] . 'dr / ' . number_format($result['NewPrice']) ?>
        </option>

    <?php } ?>
</select>


<?php
$sql = "SELECT VEHICLEID,
VEHICLEKEY,
Description,
VehicleTypeCode,
YEARGROUP AS YEARGROUP,
EngineDescription,
BadgeDescription,
submodelname,
BadgeSecondaryDescription,
BodyConfigDescription,
ExtraIdentification,
Series,
GearTypeDescription,
DriveDescription,
BodyStyleDescription,
NewPrice,
DoorNum,
ReleaseYear,
IF( Locate('Manual', GearTypeDescription)>0, 'Manual', IF(Locate('Independent', GearTypeDescription)>0, 'Manual', 'Auto')) AS CarGear,
IF (Locate('(',	Description	) > 0,CONCAT(' ', SUBSTRING(Description, Locate('(', Description))), '') AS CarOptions 
FROM	cp080869_sosprakan.rbvehicle
WHERE	FAMILYCODE = '$familycode'
AND 	YEARGROUP =  '$year'
AND    MakeCode = '$makecode'
ORDER BY CarGear, EngineDescription, BadgeDescription, BadgeSecondaryDescription, DoorNum, NewPrice";

$q = $pdo->query($sql);

$q2 = $pdo->query($sql);

?>
<div class="nice-select form-control" tabindex="0"><span class="current">-- เลือกรุ่นย่อย (เกียร์ / ซีซี / รุ่น / ประตู / ราคาซื้อ) --</span>
    <ul class="list">
	<?php 
		if(empty($q->fetch())){
			echo '<li data-value="" data-display="ไม่พบรุ่นย่อย" class="option selected">ไม่พบรุ่นย่อย</li>';
		}else{
			echo '<li data-value="" data-display="เลือกรุ่นย่อย (เกียร์ / ซีซี / รุ่น / ประตู / ราคาซื้อ)"class="option selected">เลือกรุ่นย่อย (เกียร์ / ซีซี / รุ่น / ประตู / ราคาซื้อ)</li>';
		}
	?>
        
        <?php
        while ($result = $q->fetch()) { ?>

            <li class="option" data-value="<?php echo $result['CarGear'] . ' / ' . number_format($result['EngineDescription'], 1) . " / " . ($result['BadgeDescription'] ? $result['BadgeDescription'] . ($result['BadgeSecondaryDescription'] ? " " . $result['BadgeSecondaryDescription'] : "") : "") . (($result['VehicleTypeCode'] == 'LC' || $result['VehicleTypeCode'] == "PU") ? " " . $result['BodyConfigDescription'] : "") . ($result['DriveDescription'] == '4  Wheel Drive' && $result['VehicleTypeCode'] != 'PS' ? ' 4WD' : '') . ($result['CarOptions'] ? " " . $result['CarOptions'] : "") . ' / ' . $result['DoorNum'] . 'dr / ' . number_format($result['NewPrice']) ?>"><?php echo $result['CarGear'] . ' / ' . number_format($result['EngineDescription'], 1) . " / " . ($result['BadgeDescription'] ? $result['BadgeDescription'] . ($result['BadgeSecondaryDescription'] ? " " . $result['BadgeSecondaryDescription'] : "") : "") . (($result['VehicleTypeCode'] == 'LC' || $result['VehicleTypeCode'] == "PU") ? " " . $result['BodyConfigDescription'] : "") . ($result['DriveDescription'] == '4  Wheel Drive' && $result['VehicleTypeCode'] != 'PS' ? ' 4WD' : '') . ($result['CarOptions'] ? " " . $result['CarOptions'] : "") . ' / ' . $result['DoorNum'] . 'dr / ' . number_format($result['NewPrice']) //.' <--- '.$result['ReleaseYear']//submodelname
                                                                                                                                                                                                ?></li>

        <?php } ?>
    </ul>
</div>