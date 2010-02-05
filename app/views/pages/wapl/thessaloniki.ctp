<?php
	$title = 'metathesi.gr - Νομός Θεσσαλονίκης';
	$this->set('title', $title);

	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	
	$text = "Ο Νομός Θεσσαλονίκης υποδιαιρείται σε 2 ΠΥΣΔΕ /ΠΥΣΠΕ:";
	echo  $this->element("waplText", array( "text" => $text) );	
	
	echo  $this->element("waplLink", array( "label" => "Α' Θεσσαλονίκης (κέντρο και Ανατολική Θεσσαλονίκη)",
						"url" => $this->webroot . "provinces/show/7") );
	echo  $this->element("waplLink", array( "label" => "Β' Θεσσαλονίκης (Δυτική Θεσσαλονίκη και υπόλοιπο νομού)",
						"url" => $this->webroot . "provinces/show/11") );
	
?>






		
