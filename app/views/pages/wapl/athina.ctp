<?php
	$title = 'metathesi.gr - Νομός Αττικής';
	$this->set('title', $title);

	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	
	$text = "Ο Νομός Αττικής υποδιαιρείται σε 6 ΠΥΣΔΕ /ΠΥΣΠΕ:";
	echo  $this->element("waplText", array( "text" => $text) );	
	
	echo  $this->element("waplLink", array( "label" => "Α' Αθήνας",
						"url" => $this->webroot . "provinces/show/1") );
	echo  $this->element("waplLink", array( "label" => "Β' Αθήνας",
						"url" => $this->webroot . "provinces/show/9") );
	echo  $this->element("waplLink", array( "label" => "Γ' Αθήνας",
						"url" => $this->webroot . "provinces/show/12") );
	echo  $this->element("waplLink", array( "label" => "Δ' Αθήνας",
						"url" => $this->webroot . "provinces/show/13") );
	echo  $this->element("waplLink", array( "label" => "Ανατολικής Αττικής",
						"url" => $this->webroot . "provinces/show/3") );
	echo  $this->element("waplLink", array( "label" => "Δυτικής Αττικής",
						"url" => $this->webroot . "provinces/show/16") );
	echo  $this->element("waplLink", array( "label" => "Πειραιά",
						"url" => $this->webroot . "provinces/show/46") );
?>

		
