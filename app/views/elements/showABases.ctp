<!-- Input 
	$a_bases  - ο πινακας των βάσεων
	$a_specialties - ο πίνακας των ειδικοτήτων των εκπαιδευτικών
	$a_areas_list - ο πίνακας των περιοχών εκπαίδευσης
-->
<?php

	foreach ($a_specialties as $a_specialty)
	{
		$aspec[$a_specialty['ASpecialty']['id']]['code'] = $a_specialty['ASpecialty']['code'];
		$aspec[$a_specialty['ASpecialty']['id']]['description'] = $a_specialty['ASpecialty']['description'];
	}
										
	echo $html->css("../app/webroot/css/table_design.css");
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<table summary=\"b_bases_per_year\">";
	echo "<thead>
				<tr>
					<th scope=\"col\" class=\"narrow\">Ειδικότητα</th>					
					<th scope=\"col\">Περιοχή (Έτος)</th>
					<th scope=\"col\" class=\"narrow\">Βάση</th>
					<th scope=\"col\" class=\"narrow\">Πόσοι μπήκαν</th>
				</tr>
			</thead>
			<tbody>";
	foreach ($a_bases as $base)
	{
		$specialtyDescription = $aspec[$base['ABasis']['specialty_id']]['description'];
		echo "<tr>";
		echo "<td><span title=\"" . $specialtyDescription . "\">" . $aspec[$base['ABasis']['specialty_id']]['code'] . "</span></td>";
		echo "<td>" . $a_areas_list[$base['ABasis']['area_code']]['prefix'] . " " . 
					$a_areas_list[$base['ABasis']['area_code']]['descr'] . " (" . $base['ABasis']['year'] . ")</td>";
		echo "<td>" . $base['ABasis']['points'] . "</td>";
		echo "<td>" . $base['ABasis']['how_many_in'] . "</td>";
		echo "</tr>";							
	}
										
	echo "</tbody></table>";
				
	echo "<br />" . $html->link('Νέα αναζήτηση', '/a_bases/search') . "<br />";
					
	$paginator->options(array('url' => $this->passedArgs));
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<p style=\"text-align:center\">";
	echo $paginator->numbers() . "<br />";
	echo $paginator->prev('« Προηγούμενη ');
	if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['ABasis']['pageCount']) )
		echo " : ";
	echo $paginator->next(' Επόμενη »');
?>
