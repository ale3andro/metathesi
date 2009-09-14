<!-- Input 
	$areas  - ο πινακας των περιοχών της διεύθυνσης
	$schoolTypes - ο πίνακας των τύπων των σχολείων
	$schools - ο πίνακας των προς εκτύπωση σχολείων
-->
<?php
	echo $html->css("../app/webroot/css/table_design.css");
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<table summary=\"schools\">";
	echo "<thead>
				<tr>
					<th scope=\"col\" class=\"narrow\">Α/Α</th>
					<th scope=\"col\" class=\"narrow\">Αριθμός</th>					
					<th scope=\"col\" class=\"narrow\">Τύπος σχολείου</th>
					<th scope=\"col\">Δήμος</th>
					<th scope=\"col\" class=\"narrow\">Mόρια Μεταθ.</th>
					<th scope=\"col\" class=\"narrow\">Ειδ. Τύπου</th>
					<th scope=\"col\" class=\"narrow\">Περ. Μεταθ.</th>
					<th scope=\"col\" class=\"narrow\">Δ/νση Εκπ/σης</th>				
				</tr>
			</thead>
			<tbody>";
	$i=0;
	for ($j=0; $j<count($b_areas); $j++)
	{
		$myArea[$b_areas[$j]['BArea']['id']][0] = $b_areas[$j]['BArea']['description'];
		$myArea[$b_areas[$j]['BArea']['id']][1] = $b_areas[$j]['BArea']['ypepth_code'];
	}
	for ($j=0; $j<count($provinces); $j++)
		$myProvinces[$provinces[$j]['Province']['id']] = $provinces[$j]['Province']['description'];
		
	
	foreach ($schools as $aSchool)
	{
		echo "<tr" . ((($i%2)!=0) ?" class=\"odd\" ":"") . ">";
			$resultNum = ($paginator->current()-1)*($paginator->params['paging']['BSchool']['options']['limit']) + (++$i);
			echo "<th scope=\"row\"	id=\"id" . $i . "\">" . ($resultNum) . "</th>";
			echo "<td>" . $aSchool['BSchool']['number'] ."</td>";
			echo "<td>" . $schoolTypes[$aSchool['BSchool']['type']] ."</td>";
			echo "<td>" . $aSchool['BSchool']['municipality'] . "</td>";
			echo "<td>" . $aSchool['BSchool']['points'] . "</td>";
			
			echo "<td>";
			$title ="";
			if ($aSchool['BSchool']['esperino']==1)
				$title .= "Εσπερινό";
			if ($aSchool['BSchool']['peiramatiko']==1)
				$title .= (($title=="")?"":"-") . "Πειραματικό";
			if ($aSchool['BSchool']['mousiko']==1)
				$title .= (($title=="")?"":"-") . "Μουσικό";
			if ($aSchool['BSchool']['lykeiakes_ta3eis']==1)
				$title .= (($title=="")?"":"-") . "Λυκ. Τάξεις";
			if ($aSchool['BSchool']['gymnasiako_parartima']==1)
				$title .= (($title=="")?"":"-") . "Γυμν. Παράρτημα";
			if ($aSchool['BSchool']['anaphrwn']==1)
				$title .= (($title=="")?"":"-") . "Αναπήρων";
			if ($aSchool['BSchool']['pallinostountwn']==1)
				$title .= (($title=="")?"":"-") . "Παλλινοστούντων";
			if ($aSchool['BSchool']['kwfalalwn']==1)
				$title .= (($title=="")?"":"-") . "Κωφάλαλων";
			if ($aSchool['BSchool']['eeeek']==1)
				$title .= (($title=="")?"":"-") . "ΕΕΕΕΚ";
			if ($aSchool['BSchool']['ekklhsiastiko']==1)
				$title .= (($title=="")?"":"-") . "Εκκλησιαστικό";
			if ($aSchool['BSchool']['diapolitismiko']==1)
				$title .= (($title=="")?"":"-") . "Διαπολιτισμικό";				
			if ($aSchool['BSchool']['a8lhtiko']==1)
				$title .= (($title=="")?"":"-") . "Αθλητικό";
			if ($aSchool['BSchool']['kallitexniko']==1)
				$title .= (($title=="")?"":"-") . "Καλλιτεχνικό";
			if ($title!="")
				echo ($html->image('../app/webroot/images/more.png',array('alt'=>'Ειδ. Τύπου',
								'title' => $title)));
			else
				echo "-";
			echo "</td>";
			
			echo "<td>" . $myArea[$aSchool['BSchool']['area_id']][0] . "</td>";
			echo "<td>" . $myProvinces[$aSchool['BSchool']['dide_id']] . "</td>";
		echo "</tr>";		
	}
	
	echo "</tbody></table>";
	
	$paginator->options(array('url' => $this->passedArgs));
	echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
	echo "<p style=\"text-align:center\">";
	echo $paginator->numbers() . "<br />";
	echo $paginator->prev('« Προηγούμενη ');
	if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['BSchool']['pageCount']) )
		echo " : ";
	echo $paginator->next(' Επόμενη »'); 
	echo "</p>";
?>
