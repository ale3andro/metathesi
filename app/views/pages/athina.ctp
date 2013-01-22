<!-- File: /app/views/provinces/pages/athina.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 3) );
	$this->set('title_for_layout', 'metathesi.gr - Νομός Θεσσαλονίκης');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Νομός Αττικής</h1>
				<div class="entry">
					<p>
						Ο Νομός Αττικής υποδιαιρείται σε 6 ΠΥΣΔΕ /ΠΥΣΠΕ: 
						<ul>
							<li><?php echo $html->link("Α' Αθήνας", "/provinces/show/1"); ?></li>
							<li><?php echo $html->link("Β' Αθήνας", "/provinces/show/9"); ?></li>
							<li><?php echo $html->link("Γ' Αθήνας", "/provinces/show/12"); ?></li>
							<li><?php echo $html->link("Δ' Αθήνας", "/provinces/show/13"); ?></li>
							<li><?php echo $html->link("Ανατολικής Αττικής", "/provinces/show/3"); ?></li>
							<li><?php echo $html->link("Δυτικής Αττικής", "/provinces/show/16"); ?></li>
							<li><?php echo $html->link("Πειραιά", "/provinces/show/46"); ?></li>
						</ul>						
					</p>
				</div>
			</div>
			
			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>





		
