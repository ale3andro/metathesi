<?php
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['BArea']['description'] . " - " . $year;
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
		$text .= "[*]" . (($year==$ayear['BBasis']['year'])?("$year"):
				("[url=" . $this->webroot . "b_bases/show/" . $areaId . "/" . $ayear['BBasis']['year'] ."]" . 
				$ayear['BBasis']['year'] . "[/url]")) . "[/*]";
	$text .= "[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
	
	foreach ($b_specialties as $b_specialty)
	{
		$bspec[$b_specialty['BSpecialty']['id']]['id'] = $b_specialty['BSpecialty']['id'];
		$bspec[$b_specialty['BSpecialty']['id']]['code'] = $b_specialty['BSpecialty']['code'];
		$bspec[$b_specialty['BSpecialty']['id']]['description'] = $b_specialty['BSpecialty']['description'];
	}
	
	$text = "[list]";
	foreach ($bases as $base)
	{
			$text .= "[*]" . $bspec[$base['BBasis']['specialty_id']]['code'] . " - " . 
				"[url=" . $this->webroot . "b_bases/fromSpecialty/" . $bspec[$base['BBasis']['specialty_id']]['id']
				 . "/" . $areaId . "]" . str_replace("&", "κ.", $bspec[$base['BBasis']['specialty_id']]['description']) . "[/url]" .
				" : " . $base['BBasis']['points'] . " " . 
				(($base['BBasis']['how_many_in']!=0)?("(" . $base['BBasis']['how_many_in'] . ")"):"") . "[/*]";
			
	}
	$text .= "[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
	
	
	$paginator->options(array('url' => $this->passedArgs));
	$text = $paginator->counter(array('format' => 'Σελίδα %page% από %pages%'));
	
	$text .= $paginator->prev('« Προηγούμενη ');
	if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['BSpecialty']['pageCount']) )
		$text .= " : ";
	$text .= $paginator->next(' Επόμενη »'); 
	echo  $this->element("waplText", array( "text" => $text) );	
	
	$text = "* Εμφανίζονται μόνοι οι ειδικότητες για τις οποίες υπάρχει βάση τη δεδομένη χρονιά...";
	echo  $this->element("waplText", array( "text" => $text) );	
?>
