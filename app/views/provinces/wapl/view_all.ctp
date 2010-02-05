<?php
	$activeTab = $ab;
	if ($ab==1)
		$title = "Διευθύνσεις Πρωτοβάθμιας Εκπαίδευσης";
	if ($ab==2)
		$title = "Διευθύνσεις Δευτεροβάθμιας Εκπαίδευσης";
	if ($ab==0)
		$title = "Όλες οι Διευθύνσεις Εκπαίδευσης της χώρας";
	$this->set('title', $title);

	foreach ($data as $entry)
	{
		if ($ab==0)
		{
			
			echo  $this->element("waplText", array( "text" => "[h2]" . $entry['Province']['description'] . "[/h2]") );	
			echo  $this->element("waplLink", array( "label" => "Πρωτοβάθμια Εκπαίδευση",
											"url" => $this->webroot . "provinces/show/" . $entry['Province']['id'] . "/1" ) );
			echo  $this->element("waplLink", array( "label" => "Δευτεροβάθμια Εκπαίδευση",
											"url" => $this->webroot . "provinces/show/" . $entry['Province']['id'] . "/2" ) );
		}
		else
			echo  $this->element("waplLink", array( "label" => $entry['Province']['description'],
											"url" => $this->webroot . "/provinces/show/" . 
												$entry['Province']['id'] . "/" . $ab ) );
	}
?>
