<!-- File: /app/views/b_bases/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2) );
	$title = "Βάσεις Β/θμιας Εκπαίδευσης";
	$this->set('title', $title);
?>
<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<div class="post">
				<h1 class="title"><?php echo $title; ?></h1>
				<div class="entry">
					<p>
						<?php
							echo "Περιοχή:<br />";
							echo $areas_select_box . "<br />";
							echo "Χρονιά:<br />";
							echo $years_select_box . "<br />";
							echo "Ειδικότητα:<br />";
							echo $specialties_select_box;				
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

