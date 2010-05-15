<!-- File: /app/views/a_schools/search.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1) );
	$this->set('title_for_layout', "Αναζήτηση Σχολείων Α/θμιας Εκπαίδευσης");
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Αναζήτηση Σχολείων Α/θμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
					<?php
						if (!isset($schools))
						{
							echo "<p>";
							echo $form->create('ASchool', array('action' => 'search/r', 'class' => 'cssform'));
							echo $form->input('description', array('label' => 'Περιγραφή:')) . "<br />";
							echo "<label>Μόρια Σχολείου:</label>" . $this->element("moreLess", array("selectName" => "moreLess")) . 
								$this->element("selectMoriaA", array("selectName" => "data[ASchool][points]")) . "<br /><br />";
							echo "<label>Περιοχή Μετάθεσης:</label>" . $a_areas_select . "<br /><br />";
							echo $form->end('Αναζήτηση');
							echo "</p>";
						}
						else
						{
							if (count($schools)==0)
								echo "Δεν βρέθηκαν σχολεία για τα δεδομένα κριτήρια...<br />";
							else
								echo $this->element("showASchoolsFull",
									array(	"areas" => $a_areas,
									"schoolTypes" => $a_school_types,
									"schools" => $schools,
									"provinces" => $provinces));
						
							echo $html->link('Νέα αναζήτηση', "/a_schools/search");
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
