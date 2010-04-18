<!-- File: /app/views/a_schools/search.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1) );
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
						echo $form->create('ASchool', array('action' => 'search'));
						echo $form->input('description', array('label' => 'Περιγραφή:'));
						echo "Μόρια Σχολείου" . $this->element("moreLess", array("selectName" => "moreLess")) . 
							$this->element("selectMoriaA", array("selectName" => "data[ASchool][points]")) . "<br />";
						echo "Περιοχή Μετάθεσης:" . $a_areas_select . "<br />";
						echo $form->end('Αναζήτηση');
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
