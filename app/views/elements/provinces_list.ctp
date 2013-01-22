<?php	
	$i = 0;	
	foreach ($eProvinces as $aProvince)
		echo (++$i) . ". " . $aProvince['Province']['description'] . ": " . $html->link("προβολή", "/provinces/show/" . $aProvince['Province']['id']) . "<br />";	
		
?>
