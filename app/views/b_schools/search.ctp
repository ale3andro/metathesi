<!-- File: /app/views/b_schools/search.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2) );
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
						echo $form->create('BSchool', array('action' => 'search'));
						echo $form->input('municipality', array('label' => 'Δήμος:'));
						echo "Μόρια Σχολείου" . $this->element("moreLess", array("selectName" => "moreLess")) . 
							$this->element("selectMoriaB", array("selectName" => "data[BSchool][points]")) . "<br />";
						echo "Περιοχή Μετάθεσης:" . $b_areas_select . "<br />";
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
