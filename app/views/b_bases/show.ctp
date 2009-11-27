	<!-- File: /app/views/b_bases/show.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2,
					"provinceId" => $theProvince['Province']['id'] ) );
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['BArea']['description'] . " - " . $year;
	$this->set('title', $title);
?>
<div id="wrapper">
<div class="btm">
	<div id="page">
	
		<div id="content">
			<div class="post">
				<h1 class="title">
					<?php 
						echo $title;
						if ($pointsRange[0]!=$pointsRange[1])
							echo " (από " . $pointsRange[0] . " έως " . $pointsRange[1] . " μόρια)";
						else
							echo " (" . $pointsRange[0] . " μόρια)";
					?>
				</h1>
				<div class="entry">
					<p>
						<?php
							echo "<ul class=\"yearMenu\">";
							echo "<li>Διαθέσιμες Χρονιές: </li>";
							foreach($years as $ayear)
								echo "<li>" . (($year==$ayear['BBasis']['year'])?("$year"):
												($html->link($ayear['BBasis']['year'], "/b_bases/show/" . $areaId . "/" . $ayear['BBasis']['year']))) .
												 "</li>";
							echo "</ul>";
							echo "<ul>";
							foreach ($b_specialties as $b_specialty)
							{
								$bspec[$b_specialty['BSpecialty']['id']]['id'] = $b_specialty['BSpecialty']['id'];
								$bspec[$b_specialty['BSpecialty']['id']]['code'] = $b_specialty['BSpecialty']['code'];
								$bspec[$b_specialty['BSpecialty']['id']]['description'] = $b_specialty['BSpecialty']['description'];
							}
							foreach ($bases as $base)
							{
						
								echo "<li>" . $bspec[$base['BBasis']['specialty_id']]['code'] . " - " . 
											$html->link($bspec[$base['BBasis']['specialty_id']]['description'],
												"/b_bases/fromSpecialty/" . $bspec[$base['BBasis']['specialty_id']]['id']
												. "/" . $areaId) . " : " . $base['BBasis']['points'] . " " . 
											(($base['BBasis']['how_many_in']!=0)?("(" . $base['BBasis']['how_many_in'] . ")"):"") . "</li>";
							}
							echo "</ul>";
							
							$paginator->options(array('url' => $this->passedArgs));
							echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
							echo "<p style=\"text-align:center\">";
							echo $paginator->numbers() . "<br />";
							echo $paginator->prev('« Προηγούμενη ');
							if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['BSpecialty']['pageCount']) )
								echo " : ";
							echo $paginator->next(' Επόμενη »'); 
							echo "</p>";
							echo "<br />* Εμφανίζονται μόνοι οι ειδικότητες για τις οποίες υπάρχει βάση τη δεδομένη χρονιά...";
						?>
							
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php
		echo $this->element("sidemenub",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"b_areas" => $b_areas,
							"region" => $region));
?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

