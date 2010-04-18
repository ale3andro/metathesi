<!-- File: /app/views/a_schools/show_results.ctp -->
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
						if (count($schools)==0)
							echo "Δεν βρέθηκαν σχολεία για τα δεδομένα κριτήρια...<br />";
						else
							echo $this->element("showASchoolsFull",
								array(	"areas" => $a_areas,
								"schoolTypes" => $a_school_types,
								"schools" => $schools,
								"provinces" => $provinces));
						
						echo $html->link('Νέα αναζήτηση', "/a_schools/search");
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
