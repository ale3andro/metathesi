<!-- File : app/views/elements/sidemenub.ctp -->
<div id="sidebar">
	<ul>
		<li>
			<h2>Δ.Δ.Ε. Νομού <?php echo $province; ?></h2>
			<p>Περιφερειακή Δ/νση Εκπ/σης <a href="<?php echo $region['Region']['url']; ?>">
					<?php echo $region['Region']['description']; ?><?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>
			</p>
		</li>
		<li>
			<h2>Σχολεία</h2>
			<ul>
				<li><?php echo $html->link("Όλα τα σχολεία", "/b_schools/getFromDideId/" . $theProvince['Province']['id']) ?></li>
				<li><?php echo $html->link("Γυμνάσια", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/1") ?></li>
				<li><?php echo $html->link("Γενικά Λύκεια", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/2") ?></li>
				<li><?php echo $html->link("ΕΠΑΛ", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/3") ?></li>
				<li><?php echo $html->link("ΕΠΑΣ", "/b_schools/getSchoolsOfTypeFromDideId/" . $theProvince['Province']['id'] . "/4") ?></li>
				<?php
					foreach ($b_areas as $b_area)
						echo "<li>" . $html->link("Σχολεία Περιοχής " . $b_area['BArea']['description'], "/b_schools/getFromAreaId/" . $b_area['BArea']['id']) . "</li>";
				?>
				<li><?php echo $html->link("Αναζήτηση Σχολείων Β/θμιας", "/b_schools/search"); ?></li>			
			</ul>
		</li>
		<li>
			<h2>Βάσεις Μετάθεσης</h2>
			<ul>
				<?php 	foreach ($b_areas as $b_area)
							echo "<li>" . $html->link("Περιοχή " . $b_area['BArea']['description'], 
										"/b_bases/show/" . $b_area['BArea']['id']) . "</li>";
						echo "<li>" . $html->link("Αναζήτηση Βάσεων Β/θμιας", "/b_bases/search") . "</li>";
				?>
			</ul>
		</li>
		<li>
			<h2>Διάφορα</h2>
			<ul>
				<li><?php echo $html->link("Περιφερειακές Δ/νσεις Εκπ/σης", "/regions"); ?></li>
				<li><?php echo $html->link("Ειδικότητες Α/θμιας", "/a_specialties"); ?></li>
				<li><?php echo $html->link("Ειδικότητες Β/Θμιας", "/b_specialties"); ?></li>
				<li><?php echo $html->link("Σχετικά", "/pages/about"); ?><span>Σχετικά με το metathesi.gr</span></li>
			</ul>
		</li>
	</ul>
</div>		
<!-- end #sidebar -->
