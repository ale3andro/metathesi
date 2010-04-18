<!-- File: /app/views/b_schools/show_results.ctp -->
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
						if (count($schools)==0)
							echo "Δεν βρέθηκαν σχολεία για τα δεδομένα κριτήρια...<br />";
						else
							echo $this->element("showBSchoolsFull",
								array(	"areas" => $b_areas,
									"schoolTypes" => $b_school_types,
									"schools" => $schools,
									"provinces" => $provinces));
						
						echo $html->link('Νέα αναζήτηση', "/b_schools/search");
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
