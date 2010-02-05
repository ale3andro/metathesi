<?php
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['AArea']['description'] . " - " . $year;
	$this->set('title', $title);
	
	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	

	
	if ($pointsRange[0]!=$pointsRange[1])
		$text = "από " . $pointsRange[0] . " έως " . $pointsRange[1] . " μόρια";
	else
		$text = $pointsRange[0] . " μόρια";
	
	echo  $this->element("waplText", array( "text" => "Τα σχολεία της περιοχής δίνουν " .  $text) );	
	
	echo  $this->element("waplText", array( "text" => "[h2]Διαθέσιμες Χρονιές:[/h2]") );	
	$text  = "[list]";
	foreach($years as $ayear)
		$text .= "[*]" . (($year==$ayear['ABasis']['year'])?("$year"):
				("[url=" . $this->webroot . "a_bases/show/" . $areaId . "/" . $ayear['ABasis']['year'] ."]" . 
				$ayear['ABasis']['year'] . "[/url]")) . "[/*]";
	$text .= "[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
	
	foreach ($a_specialties as $a_specialty)
	{
			$aspec[$a_specialty['ASpecialty']['id']]['id'] = $a_specialty['ASpecialty']['id'];
			$aspec[$a_specialty['ASpecialty']['id']]['code'] = $a_specialty['ASpecialty']['code'];
			$aspec[$a_specialty['ASpecialty']['id']]['description'] = $a_specialty['ASpecialty']['description'];
	}
	$text = "[list]";
	foreach ($bases as $base)
	{
			$text .= "[*]" . $aspec[$base['ABasis']['specialty_id']]['code'] . " - " . 
				"[url=" . $this->webroot . "a_bases/fromSpecialty/" . $aspec[$base['ABasis']['specialty_id']]['id']
				. "/" . $areaId . "]" . $aspec[$base['ABasis']['specialty_id']]['description'] . "[/url]" . 
				" : " . $base['ABasis']['points'] . " " . 
				(($base['ABasis']['how_many_in']!=0)?("(" . $base['ABasis']['how_many_in'] . ")"):"") . "[/*]";
	}
	$text .= "[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
	
	$text = "* Εμφανίζονται μόνοι οι ειδικότητες για τις οποίες υπάρχει βάση τη δεδομένη χρονιά...";
	echo  $this->element("waplText", array( "text" => $text) );	
?>
