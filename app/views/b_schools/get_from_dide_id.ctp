<!-- File: /app/views/b_schools/get_from_dide_id.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2,
							"provinceId" => $theProvince['Province']['id'] ) );
	$this->set("title_for_layout", "Όλα τα σχολεία της Διεύθυνσης");
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<div class="post">
				<h1 class="title">Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης <?php echo $theProvince['Province']['description']; ?></h1>
				<div class="entry">
					<p>Όλα τα σχολεία της Διεύθυνσης</p>
					<p>
						<?php 
							echo $this->element("showBSchools",
										array("areas" => $b_areas,
											"schoolTypes" => $b_school_types,
											"schools" => $schools));
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php echo $this->element("sidemenub",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"b_areas" => $b_areas,
							"region" => $region)); ?>
							
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
