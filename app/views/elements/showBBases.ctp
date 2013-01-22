<!-- Input 
	$b_bases  - ο πινακας των βάσεων
	$b_specialties - ο πίνακας των ειδικοτήτων των εκπαιδευτικών
	$b_areas_list - ο πίνακας των περιοχών εκπαίδευσης
-->
<?php

	foreach ($b_specialties as $b_specialty)
	{		
		$bspec[$b_specialty['BSpecialty']['id']]['code'] = $b_specialty['BSpecialty']['code'];
		$bspec[$b_specialty['BSpecialty']['id']]['description'] = $b_specialty['BSpecialty']['description'];
	}
									
	echo $html->css("../app/webroot/css/table_design.css");
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<table summary=\"b_bases_per_year\">";
	echo "	<thead>
				<tr>
					<th scope=\"col\" class=\"narrow\">Ειδικότητα</th>					
					<th scope=\"col\">Περιοχή (Έτος)</th>
					<th scope=\"col\" class=\"narrow\">Βάση</th>
					<th scope=\"col\" class=\"narrow\">Πόσοι μπήκαν</th>
				</tr>
			</thead>
			<tbody>";
	
	foreach ($b_bases as $base)
	{
		$specialtyDescription = $bspec[$base['BBasis']['specialty_id']]['description'];
		echo "<tr>";
		echo "<td><span title=\"" . $specialtyDescription . "\">" . $bspec[$base['BBasis']['specialty_id']]['code'] . "</span></td>";
		echo "<td>" . $b_areas_list[$base['BBasis']['area_code']]['prefix'] . " " . 
					$b_areas_list[$base['BBasis']['area_code']]['descr'] . " (" . $base['BBasis']['year'] . ")</td>";
		echo "<td>" . $base['BBasis']['points'] . "</td>";
		echo "<td>" . $base['BBasis']['how_many_in'] . "</td>";
		echo "</tr>";							
	}
														
	echo "</tbody></table>";
					
	echo "<br />" . $html->link('Νέα αναζήτηση', '/b_bases/search') . "<br />";
							
	$paginator->options(array('url' => $this->passedArgs));
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<p style=\"text-align:center\">";
	echo $paginator->numbers() . "<br />";
	echo $paginator->prev('« Προηγούμενη ');
	if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['BBasis']['pageCount']) )
		echo " : ";
	echo $paginator->next(' Επόμενη »');
?>
