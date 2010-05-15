	<!-- File: /app/views/a_bases/view.ctp -->
<?php
	foreach ($a_specialties as $a_specialty)
	{
		$aspec[$a_specialty['ASpecialty']['id']]['code'] = $a_specialty['ASpecialty']['code'];
		$aspec[$a_specialty['ASpecialty']['id']]['description'] = $a_specialty['ASpecialty']['description'];
	}
	
	echo  $this->element("header", array( "activeTab" => 1 ) );
	$title = "Αποτελέσματα Αναζήτησης Βάσεων";
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
							if (count($bases)==0)
							{
								echo "Δεν βρέθηκαν αποτελέσματα...";
								echo "<br />" . $html->link('Νέα αναζήτηση', '/a_bases') . "<br />";
							}
							else
							{
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
								foreach ($bases as $base)
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
							
								echo "<br />" . $html->link('Νέα αναζήτηση', '/a_bases') . "<br />";
							
								$paginator->options(array('url' => $this->passedArgs));
								echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
								echo "<p style=\"text-align:center\">";
								echo $paginator->numbers() . "<br />";
								echo $paginator->prev('« Προηγούμενη ');
								if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['ABasis']['pageCount']) )
									echo " : ";
								echo $paginator->next(' Επόμενη »');
							}
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php
		
?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

