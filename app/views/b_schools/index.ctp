<!-- File: /app/views/b_schools/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2) );
	$this->set('title_for_layout', 'Όλα σχολεία της Δευτεροβάθμιας Εκπαίδευσης');			
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Όλα τα σχολεία της Δευτεροβάθμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
						<?php 
							echo $this->element("showBSchools",
										array(	"areas" => $b_areas,
											"schoolTypes" => $b_school_types,
											"schools" => $schools));
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
