<?php

	$title = "Νομός " . $theProvince['Province']['description'];
	if ($theProvince['Province']['id'] == 1)
		$title = "Περιοχή Α' Αθήνας";
	if ($theProvince['Province']['id'] == 9)
		$title = "Περιοχή Β' Αθήνας";
	if ($theProvince['Province']['id'] == 12)
		$title = "Περιοχή Γ' Αθήνας";
	if ($theProvince['Province']['id'] == 13)
		$title = "Περιοχή Δ' Αθήνας";
	if ($theProvince['Province']['id'] == 3)
		$title = "Περιοχή Ανατολικής Αττικής";
	if ($theProvince['Province']['id'] == 16)
		$title = "Περιοχή Δυτικής Αττικής";
	if ($theProvince['Province']['id'] == 7)
		$title = "Περιοχή Α' Θεσσαλονίκης";
	if ($theProvince['Province']['id'] == 11)
		$title = "Περιοχή Β' Θεσσαλονίκης";
	if ($theProvince['Province']['id'] == 46)
		$title = "Περιοχή Πειραιά";
		
	if ($ab==1)
		$title .= " - Πρωτοβάθμια Εκπάιδευση";
	if ($ab==2)
		$title .= " - Δευτεροβάθμια Εκπαίδευση";
	
	$this->set('title', $title);
		
	if ($ab!=1 && $ab!=2)
	{
		
		
		echo  $this->element("waplLink", array( "label" => "Πρωτοβάθμια Εκπαίδευση",
											"url" => $this->webroot . "provinces/show/" . $theProvince['Province']['id'] . "/1" ) );
		echo  $this->element("waplLink", array( "label" => "Δευτεροβάθμια Εκπαίδευση",
											"url" => $this->webroot . "provinces/show/" . $theProvince['Province']['id'] . "/2" ) );
	}
	else
	{
		if ($ab==1)
		{
			echo  $this->element("waplText", array( "text" => "[h2]Σχολεία[/h2]") );	
			echo  $this->element("waplLink", array( "label" => "Νηπιαγωγεία",
										"url" => "a_schools/getSchoolsOfTypeFromDipeId/" . $theProvince['Province']['id'] . "/2" ) );
			echo  $this->element("waplLink", array( "label" => "Δημοτικά",
										"url" => "a_schools/getSchoolsOfTypeFromDipeId/" . $theProvince['Province']['id'] . "/1" ) );
			echo  $this->element("waplText", array( "text" => "Συνολικά: " . count($a_schools) . ((count($a_schools)==1)?" σχολείο ":" σχολεία ")) );	
			
			echo  $this->element("waplText", array( "text" => "[h2]Βάσεις Μετάθεσης[/h2]") );										
			
			$i=0;
			foreach ($a_areas as $a_area)
			{
				echo  $this->element("waplLink", array( "label" => "Περιοχή " . $a_area['AArea']['description'],
										"url" => "/a_bases/show/" . $a_area['AArea']['id'] ));
				
				if ($a_points_range[$i][0] != $a_points_range[$i][1])
					echo  $this->element("waplText", array( "text" => " (" . $a_points_range[$i][0] . " - " . $a_points_range[$i][1] . " μόρια)") );
				else
					echo  $this->element("waplText", array( "text" => " (" . $a_points_range[$i][0] . " μόρια)") );
						
				$i++; 
			}
			
			echo  $this->element("waplLink", array( "label" => "Ιστοσελίδα ΔΙΠΕ (εξωτερικός σύνδεσμος)",
										"url" => $theProvince['Province']['A_url'] ) );
		}
		if ($ab==2)
		{
			echo  $this->element("waplText", array( "text" => "[h2]Σχολεία[/h2]") );	
			echo  $this->element("waplLink", array( "label" => "Γυμνάσια",
										"url" => "b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/1" ) );
			echo  $this->element("waplLink", array( "label" => "Λύκεια",
										"url" => "b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/2" ) );
			echo  $this->element("waplLink", array( "label" => "ΕΠΑΛ",
										"url" => "b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/3" ) );
			echo  $this->element("waplLink", array( "label" => "ΕΠΑΣ",
										"url" => "b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/4" ) );
										
			echo  $this->element("waplText", array( "text" => "Συνολικά: " . count($b_schools) . ((count($b_schools)==1)?" σχολείο ":" σχολεία ")) );	
			
			echo  $this->element("waplText", array( "text" => "[h2]Βάσεις Μετάθεσης[/h2]") );	
			
			$i=0;
			foreach ($b_areas as $b_area)
			{
				echo  $this->element("waplLink", array( "label" => "Περιοχή " . $b_area['BArea']['description'],
										"url" => "/b_bases/show/" . $b_area['BArea']['id'] ));
				
				if ($b_points_range[$i][0] != $b_points_range[$i][1])
					echo  $this->element("waplText", array( "text" => " (" . $b_points_range[$i][0] . " - " . $b_points_range[$i][1] . " μόρια)") );
				else
					echo  $this->element("waplText", array( "text" => " (" . $b_points_range[$i][0] . " μόρια)") );
						
				$i++; 
			}
			echo  $this->element("waplLink", array( "label" => "Ιστοσελίδα ΔΙΔΕ (εξωτερικός σύνδεσμος)",
										"url" => $theProvince['Province']['B_url'] ) );
		}
	}
	echo  $this->element("waplText", array( "text" => "[h2]Γειτονικές Περιοχές (στην ίδια ΠΔΕ)[/h2]") );	
	
	foreach ($neighboors as $neighboor)
		echo  $this->element("waplLink", array( "label" => $neighboor['Province']['description'],
											"url" => "/provinces/show/" . $neighboor['Province']['id'] ) );	
?> 
