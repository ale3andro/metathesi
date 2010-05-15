<!-- File: /app/views/provinces/pages/diafora.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 4) );
	$this->set('title_for_layout', 'Διάφορα');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Διάφορα</h1>
				<div class="entry">
					<p>
						<ul>
							<li><?php echo $html->link("Περιφερειακές Διευθύνσεις Εκπαίδευσης", "/regions"); ?></li>
							<li><?php echo $html->link("Ειδικότητες Εκπαιδετικών Α/θμιας", "/a_specialties"); ?></li>
							<li><?php echo $html->link("Ειδικότητες Εκπαιδετικών Β/θμιας", "/b_specialties"); ?></li>
							<li><?php echo $html->link("Αναζήτηση Σχολείων Α/θμιας", "/a_schools/search"); ?></li>
							<li><?php echo $html->link("Αναζήτηση Σχολείων Β/θμιας", "/b_schools/search"); ?></li>
							<li><?php echo $html->link("Αναζήτηση Bάσεων Α/θμιας", "/a_bases"); ?></li>
							<li><?php echo $html->link("Αναζήτηση Βάσεων Β/θμιας", "/b_bases"); ?></li>
							<li><?php echo $html->link("Άδειες Template, Εικόνων", "license"); ?></li>
							<li><?php echo $html->link("Disclaimer", "disclaimer"); ?></li>
							<li><a href="http://github.com/ale3andro/metathesi">Η σελίδα του project<?php echo $html->image('external_link.gif', array('class'=>'external')); ?>
								</a> στο github.</li>
							<li><?php echo $html->link("Σχετικά με το metathesi.gr", "about"); ?></li>
						</ul>
					</p>
				</div>
			</div>			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>





		
