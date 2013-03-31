<!-- File: /app/views/provinces/pages/thessaloniki.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 3) );
	$this->set('title_for_layout', 'metathesi.gr - Νομός Θεσσαλονίκης');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="contentBIG" style="float:left">
			<div class="post">
				<h1 class="gamma">Νομός Θεσσαλονίκης</h1>
				<div class="entry epsilon">
					<p>
						Ο Νομός Θεσσαλονίκης διαιρείται σε 2 ΠΥΣΔΕ / ΠΥΣΠΕ:
						<ul>
							<li><?php echo $html->link("Ανατολικής Θεσσαλονίκης", "/provinces/show/7"); ?> (Περιοχή μετάθεσης Α' Θεσσαλονίκης)</li>
							<li><?php echo $html->link("Δυτικής Θεσσαλονίκης", "/provinces/show/11"); ?> (Περιοχή μετάθεσης Β' Θεσσαλονίκης)</li>							
						</ul>
					</p>
				</div>
			</div>
			
			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>





		
