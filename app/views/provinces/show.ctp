<!-- File: /app/views/provinces/show.ctp -->
<?php
	$activeTab = $ab;
	if ($ab==0)
		$activeTab = 3;
	echo  $this->element("header", array( "activeTab" => $activeTab,
											"provinceId" => $theProvince['Province']['id'] ) );
	$title = "Νομός " . $theProvince['Province']['description'];
	if ($theProvince['Province']['id'] == 1)
		$title = "Περιοχή Α' Αθήνας";
	if ($theProvince['Province']['id'] == 9)
		$title = "Περιοχή Β' Αθήνας";
	if ($theProvince['Province']['id'] == 12)
		$title = "Περιοχή Γ' Αθήνας";
	if ($theProvince['Province']['id'] == 13)
		$title = "Περιοχή Δ' Αθήνας";
	if ($theProvince['Province']['id'] == 3)
		$title = "Περιοχή Ανατολικής Αττικής";
	if ($theProvince['Province']['id'] == 16)
		$title = "Περιοχή Δυτικής Αττικής";
	if ($theProvince['Province']['id'] == 7)
		$title = "Περιοχή Α' Θεσσαλονίκης";
	if ($theProvince['Province']['id'] == 11)
		$title = "Περιοχή Β' Θεσσαλονίκης";
	if ($theProvince['Province']['id'] == 46)
		$title = "Περιοχή Πειραιά";
		
	if ($ab==1)
		$title .= " - Πρωτοβάθμια Εκπαίδευση";
	if ($ab==2)
		$title .= " - Δευτεροβάθμια Εκπαίδευση";
		
	$this->set('title_for_layout', $title);
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
	
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title"><?php echo $title; ?></h1>
				<div class="entry">
					<p>					
						<?php 	
							if ($ab!=1 && $ab!=2)
							{
								echo "<div class=\"province\"><span class=\"big\">" . $html->link("Πρωτοβάθμια Εκπαίδευση", "/provinces/show/" . $theProvince['Province']['id'] . "/1") . "</span></div>";
								echo "<div class=\"province\"><span class=\"big\">" . $html->link("Δευτεροβάθμια Εκπαίδευση", "/provinces/show/" . $theProvince['Province']['id'] . "/2") . "</span></div>";
								echo "<div style=\"clear:both; padding-top:20px\"></div><h3>Χάρτης Περιοχής</h3><br />" . $mapLink . "</p>";
							}
							
							else
							{
								if ($ab==1)
								{									
									echo "<p><h2>Περιοχές μετάθεσης</h2>";
									
									$i=0;
									foreach ($a_areas as $a_area)
									{
										if ($a_area['AArea']['id']<1000)
										{
											echo "<p><h3>" . trim($a_area['AArea']['description'] . " " . $theProvince['Province']['description']) . "</h3>";
											echo "Στην περιοχή ανήκουν σχολεία των παρακάτω Δήμων:<br />";
										
											foreach($a_mun[$i++] as $mun)
												echo $mun['Municipality']['description'] . "<br />";
										
											echo $html->link("Βάσεις Μετάθεσης", "/a_bases/show/" . $a_area['AArea']['id']) . "<br />";
											echo "</p>";
										}
									}
									
									echo "<br /><br />";																		
									echo "<p><h2>Βάσεις Μετάθεσης παλιών περιοχών</h2>";
									foreach ($a_areas as $a_area)
									{
										if ($a_area['AArea']['id']>1000)
										{
											echo $html->link(trim($a_area['AArea']['description'] . " " . $theProvince['Province']['description']), "/a_bases/show/" . $a_area['AArea']['id']) . "<br />";
										}
									}
									
									echo "<br /><br />";
									echo "<p><h2>Στοιχεία Επικοινωνίας Διεύθυνσης</h2>";
									echo "Τηλέφωνο: " . $theProvince['Province']['A_telephone'];
									echo "<br />Fax: " . $theProvince['Province']['A_fax'];
									echo "<br /><a href=\"" . $theProvince['Province']['A_url'] . "\">Ιστοσελίδα ΔΙΠΕ (εξωτερικός σύνδεσμος)" . 
												$html->image("external_link.gif", array('class' => 'external')) . "</a><br />";
									echo "</p>";
								}
								if ($ab==2)
								{
									echo "<p><h2>Περιοχές μετάθεσης</h2>";
									
									$i=0;	
									foreach ($b_areas as $b_area)
									{
										if ($b_area['BArea']['id']<1000)
										{
											echo "<p><h3>" . trim($b_area['BArea']['description'] . " " . $theProvince['Province']['description']) . "</h3>";
											echo "Στην περιοχή ανήκουν σχολεία των παρακάτω Δήμων:<br />";
										
											foreach($b_mun[$i++] as $mun)
												echo $mun['Municipality']['description'] . "<br />";
										
											echo $html->link("Βάσεις μετάθεσης", "/b_bases/show/" . $b_area['BArea']['id']) . "<br />";
											echo "</p>";
										}
									}
									
									echo "<br /><br />";
									echo "<p><h2>Βάσεις Μετάθεσης παλιών περιοχών</h2>";
									foreach ($b_areas as $b_area)
									{
										if ($b_area['BArea']['id']>1000)
										{
											echo $html->link(trim($b_area['BArea']['description'] . " " . $theProvince['Province']['description']), "/b_bases/show/" . $b_area['BArea']['id']) . "<br />";
										}
									}						
									
									echo "<br /><br />";								
									echo "<p><h2>Στοιχεία Επικοινωνίας Διεύθυνσης</h2>";
									echo "Τηλέφωνο: " . $theProvince['Province']['B_telephone'];
									echo "<br />Fax: " . $theProvince['Province']['B_fax'];
									echo "<br /><a href=\"" . $theProvince['Province']['B_url'] . "\">Ιστοσελίδα ΔΙΔΕ (εξωτερικός σύνδεσμος)" . 
											$html->image("external_link.gif", array('class' => 'external')) . "</a><br />";
									echo "</p>";
								}
							}
							echo "<br /><br />";
							echo "<p><h2>Γειτονικές Περιοχές (στην ίδια ΠΔΕ)</h2>";
							foreach ($neighboors as $neighboor)
								echo $html->link($neighboor['Province']['description'], "/provinces/show/" . $neighboor['Province']['id']) . "<br />";
							echo "</p>";
							
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

