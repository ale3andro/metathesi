<?php
	foreach ($a_specialties as $a_specialty)
	{
		$aspec[$a_specialty['ASpecialty']['id']]['code'] = $a_specialty['ASpecialty']['code'];
		$aspec[$a_specialty['ASpecialty']['id']]['description'] = $a_specialty['ASpecialty']['description'];
	}
	
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['AArea']['description'] . " - Ειδικότητα " . 
		$aspec[$specialtyId]['code'];
	$this->set('title', $title);
	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	
	
	$text = $aspec[$specialtyId]['code'] . " " . $aspec[$specialtyId]['description'];
	echo  $this->element("waplText", array( "text" => $text) );	
							
	$text = "[list]";
	for ($i=0; $i<count($availableYears); $i++)
	{
		$values[$i]['year'] = $availableYears[$i]['ABasis']['year'];
		$values[$i]['points'] = 0;
		$values[$i]['how_many_in'] = 0;
	} 
	$i=0;
	foreach ($bases as $base)
	{
		$index=-1;
		for ($j=0; $j<count($values); $j++)
		{
			if ($values[$j]['year'] == $base['ABasis']['year'])
			$index=$j;
		}
		$values[$index]['points'] = $base['ABasis']['points'];
		$values[$index]['how_many_in'] = $base['ABasis']['how_many_in'];
	
		$text .= "[*]" . $base['ABasis']['year'] . ": " . $base['ABasis']['points'] . " " . 
						(($base['ABasis']['how_many_in']!=0)?("(" . $base['ABasis']['how_many_in'] . ")"):"") . 
						"[/*]";							
	}
	$text .= "[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
?>
