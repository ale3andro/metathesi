<!-- File: /app/views/provinces/pages/about.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 4) );
	$this->set('title_for_layout', 'Άδειες Template, εικόνων');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="contentBIG" style="float:left">
			<div class="post">
				<h1 class="title">Άδειες Template, εικόνων</h1>
				<div class="entry">
					<p>
						Όλες οι εικόνες και τα εικονίδια που χρησιμοποιούνται στο <a href="http://metathesi.gr">metathesi.gr</a>
						 έχουν άδεια <a href="http://www.creativecommons.org">Creative Commons<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>. Πιο συγκεκριμένα:
						<ol>
							<li>Το template του metathesi.gr είναι το <a href="http://www.freecsstemplates.org/preview/compromise">Compromise<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>
							</li>
							<li>Ο χάρτης της Ελλάδας που χρησιμοποιείται στην κεντρική σελίδα (μαζί με την άδεια του) βρέθηκε
									<a href="http://commons.wikimedia.org/wiki/File:Greece_prefectures_map.png">εδώ<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>.
							</li>
							<li>Το εικονίδιο του εξωτερικού συνδέσμου (external link) βρέθηκε 
									<a href="http://commons.wikimedia.org/wiki/File:Icon_External_Link.png">εδώ<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>.
							</li>
							<li>Τα δεδομένα των Περιφερειακών Ενοτήτων, Δήμων, Κοινοτήτων κλπ με το βάση το πρόγραμμα "Καλλικράτης", είναι από την εξαιρετική σημαντική πρωτοβουλία Ανοιχτά Δεδομένα
									και μπορείτε να τα βρείτε <a href="http://www.geodata.gov.gr/geodata/index.php?option=com_sobi2&sobi2Task=sobi2Details&catid=21&sobi2Id=198&Itemid=" target="_blank">εδώ 
									<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a>
							</li>
						</ol>
					</p>
				</div>
				
			</div>
			
			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
