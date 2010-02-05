<?php
	$title = 'Άδειες Template, εικόνων';
	$this->set('title', $title);

	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	

	$text = "Όλες οι εικόνες και τα εικονίδια που χρησιμοποιούνται στο [url=http://metathesi.gr]metathesi.gr[/url]
				έχουν άδεια [url=http://www.creativecommons.org]Creative Commons[/url]. Πιο συγκεκριμένα:
						[list]
							[*]Το template του metathesi.gr είναι το [url=http://www.freecsstemplates.org/preview/compromise]
								Compromise[/url].
							[/*]
							[*]Ο χάρτης της Ελλάδας που χρησιμοποιείται στην κεντρική σελίδα (μαζί με την άδεια του) βρέθηκε
									[url=http://commons.wikimedia.org/wiki/File:Greece_prefectures_map.png]εδώ[/url].
							[/*]
							[*]Το εικονίδιο του εξωτερικού συνδέσμου (external link) βρέθηκε 
									[url=http://commons.wikimedia.org/wiki/File:Icon_External_Link.png]εδώ[/url].
							[/*]
						[/list]";
	echo  $this->element("waplText", array( "text" => $text) );	
?>
