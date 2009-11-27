<!-- File: /app/views/a_bases/show.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1,
					"provinceId" => $theProvince['Province']['id'] ) );
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['AArea']['description'] . " - " . $year;
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
								echo "<li>" . (($year==$ayear['ABasis']['year'])?("$year"):
												($html->link($ayear['ABasis']['year'], "/a_bases/show/" . $areaId . "/" . $ayear['ABasis']['year']))) .
												 "</li>";
							echo "</ul>";
							echo "<ul>";
							foreach ($a_specialties as $a_specialty)
							{
								$aspec[$a_specialty['ASpecialty']['id']]['id'] = $a_specialty['ASpecialty']['id'];
								$aspec[$a_specialty['ASpecialty']['id']]['code'] = $a_specialty['ASpecialty']['code'];
								$aspec[$a_specialty['ASpecialty']['id']]['description'] = $a_specialty['ASpecialty']['description'];
							}
							foreach ($bases as $base)
							{
						
								echo "<li>" . $aspec[$base['ABasis']['specialty_id']]['code'] . " - " . 
											$html->link($aspec[$base['ABasis']['specialty_id']]['description'],
												"/a_bases/fromSpecialty/" . $aspec[$base['ABasis']['specialty_id']]['id']
												. "/" . $areaId) . " : " . $base['ABasis']['points'] . " " . 
											(($base['ABasis']['how_many_in']!=0)?("(" . $base['ABasis']['how_many_in'] . ")"):"") . "</li>";
							}
							echo "</ul>";
							echo "<br />* Εμφανίζονται μόνοι οι ειδικότητες για τις οποίες υπάρχει βάση τη δεδομένη χρονιά...";
							?>							
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php
		echo $this->element("sidemenua",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"a_areas" => $a_areas,
							"region" => $region));
?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

