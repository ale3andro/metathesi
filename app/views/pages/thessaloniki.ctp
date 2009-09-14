<!-- File: /app/views/provinces/pages/thessaloniki.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 3) );
	$this->set('title', 'metathesi.gr - Νομός Θεσσαλονίκης');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Νομός Θεσσαλονίκης</h1>
				<div class="entry">
					<p>
						Ο Νομός Θεσσαλονίκης διαιρείται σε 2 ΠΥΣΔΕ / ΠΥΣΠΕ:
						<ul>
							<li><?php echo $html->link("Α' Θεσσαλονίκης", "/provinces/show/7"); ?> (κέντρο και Ανατολική Θεσσαλονίκη)</li>
							<li><?php echo $html->link("Β' Θεσσαλονίκης", "/provinces/show/11"); ?> (Δυτική Θεσσαλονίκη και υπόλοιπο νομού)</li>							
						</ul>
					</p>
				</div>
				<p class="meta">Posted by <a href="#">ale3andro</a> on March 10, 2008
					&nbsp;&bull;&nbsp;
				</p>
			</div>
			
			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>





		
