<?php
	foreach ($b_specialties as $b_specialty)
	{
		$bspec[$b_specialty['BSpecialty']['id']]['code'] = $b_specialty['BSpecialty']['code'];
		$bspec[$b_specialty['BSpecialty']['id']]['description'] = $b_specialty['BSpecialty']['description'];
	}
	
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['BArea']['description'] . " - Ειδικότητα " . 
		$bspec[$specialtyId]['code'];
	$this->set('title', $title);
	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	
	
	$text = $bspec[$specialtyId]['code'] . " " . $bspec[$specialtyId]['description'];
	echo  $this->element("waplText", array( "text" => $text) );	
							
	$text = "[list]";
	for ($i=0; $i<count($availableYears); $i++)
	{
		$values[$i]['year'] = $availableYears[$i]['BBasis']['year'];
		$values[$i]['points'] = 0;
		$values[$i]['how_many_in'] = 0;		
	} 
	$i=0;
	foreach ($bases as $base)
	{
		$index=-1;
		for ($j=0; $j<count($values); $j++)
		{
			if ($values[$j]['year'] == $base['BBasis']['year'])
			$index=$j;
		}
		$values[$index]['points'] = $base['BBasis']['points'];
		$values[$index]['how_many_in'] = $base['BBasis']['how_many_in'];
								
		$text .= "[*]" . $base['BBasis']['year'] . ": " . $base['BBasis']['points'] . " " . 
					(($base['BBasis']['how_many_in']!=0)?("(" . $base['BBasis']['how_many_in'] . ")"):"") . "[/*]";				
	}
	$text .= "[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
?>
