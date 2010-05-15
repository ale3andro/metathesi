<!-- File: /app/views/b_bases/year.ctp -->
<?php
	foreach ($b_specialties as $b_specialty)
	{
		$bspec[$b_specialty['BSpecialty']['id']]['code'] = $b_specialty['BSpecialty']['code'];
		$bspec[$b_specialty['BSpecialty']['id']]['description'] = $b_specialty['BSpecialty']['description'];
	}
	
	echo  $this->element("header", array( "activeTab" => 2));
	$title = "Βάσεις Β/θμιας Εκπαίδευσης - Έτος " . $year;
	$this->set('title_for_layout', $title);
?>
<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title"><?php echo $title; ?></h1>
				<div class="entry">
					<p>
						<?php
							echo $html->css("../app/webroot/css/table_design.css");
							echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
							echo "<table summary=\"b_bases_per_year\">";
							echo "<thead>
										<tr>
											<th scope=\"col\" class=\"narrow\">Ειδικότητα</th>					
											<th scope=\"col\">Περιοχή</th>
											<th scope=\"col\" class=\"narrow\">Βάση</th>
											<th scope=\"col\" class=\"narrow\">Πόσοι μπήκαν</th>
										</tr>
									</thead>
									<tbody>";
							foreach ($bases as $base)
							{
								$specialtyDescription = $bspec[$base['BBasis']['specialty_id']]['description'];
								echo "<tr>";
								echo "<td><span title=\"" . $specialtyDescription . "\">" . $bspec[$base['BBasis']['specialty_id']]['code'] . "</span></td>";
								echo "<td>" . $b_areas_list[$base['BBasis']['area_code']]['prefix'] . " " . 
											$b_areas_list[$base['BBasis']['area_code']]['descr'] . "</td>";
								echo "<td>" . $base['BBasis']['points'] . "</td>";
								echo "<td>" . $base['BBasis']['how_many_in'] . "</td>";
								echo "</tr>";							
							}
														
							echo "</tbody></table>";
							
							$paginator->options(array('url' => $this->passedArgs));
							echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
							echo "<p style=\"text-align:center\">";
							echo $paginator->numbers() . "<br />";
							echo $paginator->prev('« Προηγούμενη ');
							if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['BBasis']['pageCount']) )
								echo " : ";
							echo $paginator->next(' Επόμενη »'); 
						?>
												
						

					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php
		/*
		echo $this->element("sidemenub",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"b_areas" => $b_areas,
							"region" => $region));
		*/
?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

