<!-- File: /app/views/b_schools/get_from_area_id.ctp --> 
<?php
	echo  $this->element("header", array( "activeTab" => 2,
							"provinceId" => $theProvince['Province']['id'] ) );
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<div class="post">
			<?php
				$title = "Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης " . $theProvince['Province']['description']; 
				$this->set('title_for_layout', $title);
			?>
				<h1 class="title"><?php echo $title; ?></h1>
				<div class="entry">
					<p>Όλα τα σχολεία της περιοχής <?php echo $b_area['BArea']['description']; ?></p>
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
		
<?php echo $this->element("sidemenub",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"b_areas" => $b_areas,
							"region" => $region)); ?>
							
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
