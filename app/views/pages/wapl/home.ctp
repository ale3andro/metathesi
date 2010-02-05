<?php
	$title = "Καλώς ορίσατε στο metathesi.gr (mobile edition)";
	$this->set("title", $title);
	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	

	$text = "Καλώς ορίσατε στο [b]metathesi.gr[/b], ένα site αφιερωμένο στο μεγαλύτερο - μετά τον διορισμό - βάσανο 
				των εκπαιδευτικών: τις [b]μεταθέσεις[/b]... Για περισσότερες πληροφορίες σχετικά με το metathesi.gr
				επισκεφθείτε [url=" . $html->webroot . "pages/about]αυτή τη σελίδα[/url].";
	echo  $this->element("waplText", array( "text" => $text) );	

	$disclaimer = "[url=" . $html->webroot . "pages/disclaimer]Disclaimer[/url]";
	echo  $this->element("waplText", array( "text" => $disclaimer) );	
	
	$start = "Ξεκινήστε επιλέγοντας [url=" . $html->webroot . "provinces/viewAll]περιοχή[/url].";
	echo  $this->element("waplText", array( "text" => $start) );	
?>	
		
