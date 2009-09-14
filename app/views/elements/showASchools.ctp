<!-- Input 
	$areas  - ο πινακας των περιοχών της διεύθυνσης
	$schoolTypes - ο πίνακας των τύπων των σχολείων
	$schools - ο πίνακας των προς εκτύπωση σχολείων
-->
<?php
	echo $html->css("../app/webroot/css/table_design.css");
	echo "<table summary=\"schools\">";
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<thead>
				<tr>
					<th scope=\"col\">Α/Α</th>				
					<th scope=\"col\">Τύπος σχολείου</th>
					<th scope=\"col\">Όνομα σχολείου</th>
					<th scope=\"col\">Μόρια Μετάθεσης</th>					
					<th scope=\"col\">Περ. Μεταθ.</th>
					<th scope=\"col\">Κωδ. ΥΠΕΠΘ</th>				
				</tr>
			</thead>
			<tbody>";
	$i=0;
	for ($j=0; $j<count($a_areas); $j++)
	{
		$myArea[$a_areas[$j]['AArea']['id']][0] = $a_areas[$j]['AArea']['description'];
		$myArea[$a_areas[$j]['AArea']['id']][1] = $a_areas[$j]['AArea']['ypepth_code'];
	}
	
	
	foreach ($schools as $aSchool)
	{
		echo "<tr" . ((($i%2)!=0) ?" class=\"odd\" ":"") . ">";
			$resultNum = ($paginator->current()-1)*($paginator->params['paging']['ASchool']['options']['limit']) + (++$i);
			echo "<th scope=\"row\"	id=\"id" . $i . "\">" . ($resultNum) . "</th>";
			echo "<td>" . $schoolTypes[$aSchool['ASchool']['type']] ."</td>";
			echo "<td>" . $aSchool['ASchool']['description'] ."</td>";
			echo "<td>" . $aSchool['ASchool']['points'] . "</td>";
			echo "<td>" . $myArea[$aSchool['ASchool']['area_id']][0] . "</td>";
			echo "<td>" . $myArea[$aSchool['ASchool']['area_id']][1] . "</td>";
		echo "</tr>";		
	}
	
	echo "</tbody>
			</table>";
 
	$paginator->options(array('url' => $this->passedArgs));
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<p style=\"text-align:center\">";
	echo $paginator->numbers() . "<br />";
	echo $paginator->prev('« Προηγούμενη ');
	if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['ASchool']['pageCount']) )
		echo " : ";
	echo $paginator->next(' Επόμενη »'); 
	echo "</p>";
?>
