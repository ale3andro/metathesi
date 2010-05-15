<!-- File : app/views/elements/sidemenu.ctp -->
<div id="sidebar">
<?php
	if ( ( $provinceId == 1 ) || ( $provinceId == 9 ) || ( $provinceId == 12 ) || ( $provinceId == 13 ) || ( $provinceId == 3) || ( $provinceId == 16) ||
			( $provinceId == 46 ) )
		$province = "Αττικής";
	if ( ( $provinceId == 7 ) || ( $provinceId == 11) )
		$province = "Θεσσαλονίκης";
	$title = "Νομός " . $province;	
?>
	<ul>
		<li>
			<h2><?php echo $title; ?></h2>
			<p>Περιφερειακή Δ/νση Εκπ/σης <a href="<?php echo $region['Region']['url']; ?>">
					<?php echo $region['Region']['description']; ?><?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>
			</p>
		</li>
		<li>
			<h2>Σχολεία</h2>
			<ul>
				<li><?php echo $html->link('Α/θμια Εκπαίδευσης', "/a_schools/getFromDipeId/" . $theProvince['Province']['id']); ?>
						<span><?php echo count($a_areas) . (count($a_areas)==1?" περιοχή - ":"  περιοχές - ") . $numSchoolsA; ?> σχολεία</span></li>
				<li><?php echo $html->link('Β/θμια Εκπαίδευσης', "/b_schools/getFromDideId/" . $theProvince['Province']['id']); ?>
						<span><?php echo count($b_areas); ?> περιοχές - <?php echo $numSchoolsB; ?> σχολεία</span></li>
				<li><?php echo $html->link("Αναζήτηση Σχολείων Α/θμιας", "/a_schools/search/"); ?></li>
				<li><?php echo $html->link("Αναζήτηση Σχολείων Β/θμιας", "/b_schools/search/"); ?></li>
			</ul>
		</li>
		<li>
			<h2>Βάσεις Μετάθεσης</h2>
			<ul>
				<?php 	
						if ($provinceId == 46)
							$province = "Πειραιά";
						foreach ($a_areas as $a_area)
							echo "<li>" . $html->link("Α - " . $a_area['AArea']['description'] . ((count($a_areas)!=1)?"' ":"") . $province,
											"/a_bases/show/" . $a_area['AArea']['id']) . 
											"<span>Α/θμια Εκπαίδευση - " . $a_area['AArea']['description'] . ((count($a_areas)!=1)?"' ":"") . $province . "</span></li>";
						echo "<li>" . $html->link("Αναζήτηση Βάσεων Α/θμιας", "/a_bases/search") . "</li>"; 
						foreach ($b_areas as $b_area)
							echo "<li>" . $html->link("Β -  " . $b_area['BArea']['description'] . "' " . $province, 
											"/b_bases/show/" . $b_area['BArea']['id']) . 
											"<span>Β/θμια Εκπαίδευση - " . $b_area['BArea']['description'] . "' $province</span></li>";
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
