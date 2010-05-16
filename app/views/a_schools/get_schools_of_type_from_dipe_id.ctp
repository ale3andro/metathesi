<!-- File: /app/views/a_schools/get_schools_of_type_from_dipe_id.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1,
											"provinceId" => $theProvince['Province']['id'] ) );
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<div class="post">
				<?php
					$title = "Διεύθυνση Πρωτοβάθμιας Εκπαίδευσης " . $theProvince['Province']['description'];
					$this->set('title_for_layout', $title);
				?>
				<h1 class="title"><?php echo $title?></h1>
				<div class="entry">
						<?php
							if ($schoolType==1)
								echo "<p>Δημοτικά Διεύθυνσης</p>";
							if ($schoolType==2)
								echo "<p>Νηπιαγωγεία Διεύθυνσης</p>";
					
							if (count($schools)==0)
								echo "Δεν βρέθηκαν σχολεία...";
							else
								echo $this->element("showASchools", array(	"areas" => $a_areas,
									"schoolTypes" => $a_school_types, "schools" => $schools));
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php echo $this->element("sidemenua",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"region" => $region)); ?>
							
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
