<?php	
	echo "<select name=\"eName\" id=\"eId\">";	
	foreach ($eProvinces as $aProvince)
		echo "<option value=\"" . $aProvince['Province']['id'] . "\">" . $aProvince['Province']['description'] ."</option>";
	echo "</select>";
?>	