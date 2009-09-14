<!-- File : app/views/elements/sidemenuspecialties.ctp -->
<div id="sidebar">
	<ul>
		<li>
			<h2>Ειδικότητες</h2>
			<p>Αρχική &#187; Ειδικότητες Β/θμιας</p>
		</li>
		<li>
			<h2>Ειδικότητες Εκπαιδευτικών</h2>
			<ul>
				<li><?php echo $html->link("Α/θμιας Εκπαίδευσης", "/a_specialties"); ?>
					<span>Ειδικότητες Εκπ/κών Α/θμιας Εκπ/σης</span></li>
				<li><?php echo $html->link("Β/θμιας Εκπαίδευσης", "/b_specialties"); ?>
					<span>Ειδικότητες Εκπ/κών Β/θμιας Εκπ/σης</span></li>
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
