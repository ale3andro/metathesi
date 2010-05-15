<!-- File: /app/views/a_schools/get_from_dipe_id.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1) );
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<?php
					$title = "Όλα τα σχολεία της Πρωτοβάθμιας Εκπαίδευσης";
					$this->set('title_for_layout', $title);
				?>
				<h1 class="title"><?php echo $title?></h1>
				<div class="entry">
					<p>
						<?php 	echo $this->element("showASchools",
										array(	"a_areas" => $a_areas,
										"schoolTypes" => $a_school_types,
										"schools" => $schools));
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php 
	/*
	echo $this->element("sidemenua",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"region" => $region)); 
		*/
?>
							
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
