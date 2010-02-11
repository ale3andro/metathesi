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
		$title .= " - Πρωτοβάθμια Εκπάιδευση";
	if ($ab==2)
		$title .= " - Δευτεροβάθμια Εκπαίδευση";
		
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
									echo "<p><h3>Σχολεία</h3>";
									echo "<ul>";
									echo "<li>" . $html->link("Νηπιαγωγεία", "/a_schools/getSchoolsOfTypeFromDipeId/" . $theProvince['Province']['id'] . "/2") . "</li>";
									echo "<li>" . $html->link("Δημοτικά", "/a_schools/getSchoolsOfTypeFromDipeId/" . $theProvince['Province']['id'] . "/1") . "</li>";
									echo "</ul>";
									echo "Συνολικά: " . count($a_schools) . ((count($a_schools)==1)?" σχολείο ":" σχολεία ");
									
									echo "<p><h3>Βάσεις Μετάθεσης</h3>";
									echo "<ul>";
									$i=0;
									foreach ($a_areas as $a_area)
									{
										echo "<li>";
										echo $html->link("Περιοχή " . $a_area['AArea']['description'], 
													"/a_bases/show/" . $a_area['AArea']['id']);
										if ($a_points_range[$i][0] != $a_points_range[$i][1])
											echo " (" . $a_points_range[$i][0] . " - " . $a_points_range[$i][1] . " μόρια)";
										else
											echo " (" . $a_points_range[$i][0] . " μόρια)";
										echo "</li>";
										$i++; 
									}
									echo "</ul>";
									echo "<br />Τηλέφωνο: " . $theProvince['Province']['A_telephone'];
									echo "<br />Fax: " . $theProvince['Province']['A_fax'];
									echo "<br /><a href=\"" . $theProvince['Province']['A_url'] . "\">Ιστοσελίδα ΔΙΠΕ (εξωτερικός σύνδεσμος)" . 
												$html->image("external_link.gif", array('class' => 'external')) . "</a><br />";
								}
								if ($ab==2)
								{
									echo "<p><h3>Σχολεία</h3>";
									echo "<ul>";
									echo "<li>" . $html->link("Γυμνάσια", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/1") . "</li>";
									echo "<li>" . $html->link("Λύκεια", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/2") . "</li>";
									echo "<li>" . $html->link("ΕΠΑΛ", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/3") . "</li>";
									echo "<li>" . $html->link("ΕΠΑΣ", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/4") . "</li>";
									echo "</ul>";
									echo "Συνολικά: " . count($b_schools) . ((count($b_schools)==1)?" σχολείο ":" σχολεία ");
									
									echo "<p><h3>Βάσεις Μετάθεσης</h3>";
									echo "<ul>";
									$i=0;
									foreach ($b_areas as $b_area)
									{
										echo "<li>";
										echo $html->link("Περιοχή " . $b_area['BArea']['description'], 
														"/b_bases/show/" . $b_area['BArea']['id']);
										if ($b_points_range[$i][0] != $b_points_range[$i][1])
											echo " (" . $b_points_range[$i][0] . " - " . $b_points_range[$i][1] . " μόρια)";
										else
											echo " (" . $b_points_range[$i][0] . " μόρια)";
										echo "</li>";
										$i++;
									}
									echo "</ul>";
									
									echo "<br />Τηλέφωνο: " . $theProvince['Province']['B_telephone'];
									echo "<br />Fax: " . $theProvince['Province']['B_fax'];
									echo "<br /><a href=\"" . $theProvince['Province']['B_url'] . "\">Ιστοσελίδα ΔΙΔΕ (εξωτερικός σύνδεσμος)" . 
											$html->image("external_link.gif", array('class' => 'external')) . "</a><br />";
								}
							}
							echo "<p><h3>Γειτονικές Περιοχές (στην ίδια ΠΔΕ)</h3>";
							echo "<ul>";
							foreach ($neighboors as $neighboor)
								echo "<li>" . $html->link($neighboor['Province']['description'], "/provinces/show/" . $neighboor['Province']['id']) . "</li>";
							echo "</ul>";
							echo "</p>";
							
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php
	if ($ab==0)
		echo  $this->element("sidemenuprovince", 
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"numSchoolsA" => count($a_schools), 
							"a_areas" => $a_areas,
							"numSchoolsB" => count($b_schools),
							"b_areas" => $b_areas,
							"region" => $region));
	if ($ab==1)
		echo $this->element("sidemenua",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id']));
	if ($ab==2)
		echo $this->element("sidemenub",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id']));
?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

