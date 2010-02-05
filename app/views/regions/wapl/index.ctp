<?php

	$title = "Οι Περιφερειακές Διευθύνσεις Εκπαίδευσης";
	$this->pageTitle = $title;

	echo  $this->element("waplText", array( "text" => "[h2]Περιφερειακές Διευθύνσεις Εκπαίδευσης[/h2]") );	
	foreach ($regions as $region)
	{
		echo  $this->element("waplText", array( "text" => $region['Region']['description']) );	
		echo  $this->element("waplLink", array( "label" => "Ιστοσελίδα",
											"url" => $html->link($region['Region']['url']) ));								
	}
?>
