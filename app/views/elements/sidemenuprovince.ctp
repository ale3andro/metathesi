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
			<h2>Περιοχές Μετάθεσης</h2>
			<ul>
				<li>Α/θμια Εκπαίδευση
						<span><?php echo count($a_areas) . (count($a_areas)==1?" περιοχή ":"  περιοχές ") ?>μετάθεσης.</span></li>
				<li>Β/θμια Εκπαίδευση
						<span><?php echo count($b_areas) . (count($b_areas)==1?" περιοχή ":"  περιοχές ") ?>μετάθεσης.</span></li>
				<li>Παλιές περιοχές μετάθεσης TODO</li>
			</ul>
		</li>
		<li>
			<h2>Δήμοι Περιοχής</h2>
			<ul>
				<li>Foo TODO</li>
				<li>Foo TODO</li>
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
