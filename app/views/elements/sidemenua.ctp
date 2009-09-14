<!-- File : app/views/elements/sidemenua.ctp -->
<div id="sidebar">
	<ul>
		<li>
			<h2>Δ.Π.Ε. Νομού <?php echo $province; ?></h2>
			<p>Περιφερειακή Δ/νση Εκπ/σης <a href="<?php echo $region['Region']['url']; ?>">
					<?php echo $region['Region']['description']; ?><?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>
			</p>
		</li>
		<li>
			<h2>Σχολεία</h2>
			<ul>
				<li><?php echo $html->link("Όλα τα σχολεία", "/a_schools/getFromDipeId/" . $provinceId); ?></li>
				<li><?php echo $html->link("Νηπιαγωγεία", "/a_schools/getSchoolsOfTypeFromDipeId/" . $theProvince['Province']['id'] . "/2"); ?></li>
				<li><?php echo $html->link("Δημοτικά", "/a_schools/getSchoolsOfTypeFromDipeId/" . $theProvince['Province']['id'] . "/1"); ?></li>
				<?php
					foreach ($a_areas as $a_area)
						echo "<li>" . $html->link("Σχολεία Περιοχής " . $a_area['AArea']['description'], "/a_schools/getFromAreaId/" . $a_area['AArea']['id']) . "</li>";
				?>
				<li><?php echo $html->link("Αναζήτηση Σχολείων", "/a_schools/search"); ?></li>
			</ul>
		</li>
		<li>
			<h2>Βάσεις Μετάθεσης</h2>
			<ul>
				<?php 	foreach ($a_areas as $a_area)
							echo "<li>" . $html->link("Περιοχή " . $a_area['AArea']['description'], 
										"/a_bases/show/" . $a_area['AArea']['id']) . "</li>";
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
