<!-- File: /app/views/b_schools/search.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2) );
	$this->set('title_for_layout', "Αναζήτηση Σχολείων Β/θμιας Εκπαίδευσης");
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Αναζήτηση Σχολείων Β/θμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
					<?php
						if (!isset($schools))
						{
							echo $form->create('BSchool', array('action' => 'search/r', 'class' => 'cssform'));
							echo "<p>";
							echo $form->input('municipality', array('label' => 'Δήμος:')) . "<br />";
							echo "<label>Μόρια Σχολείου:</label>" . $this->element("moreLess", array("selectName" => "moreLess")) . 
								$this->element("selectMoriaB", array("selectName" => "data[BSchool][points]")) . "<br /><br />";
							echo "<label>Περιοχή Μετάθεσης:</label>" . $b_areas_select . "<br /><br />";
							echo $form->end('Αναζήτηση');
							echo "</p>";
						}
						else
						{
							if (count($schools)==0)
								echo "Δεν βρέθηκαν σχολεία για τα δεδομένα κριτήρια...<br />";
							else
								echo $this->element("showBSchoolsFull",
									array("areas" => $b_areas,
										"schoolTypes" => $b_school_types,
										"schools" => $schools,
										"provinces" => $provinces));
						
							echo $html->link('Νέα αναζήτηση', "/b_schools/search");
						}
					?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
