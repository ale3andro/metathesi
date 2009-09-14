<!-- File: /app/views/provinces/pages/dipes.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1) );
	$this->set('title', 'metathesi.gr - Διευθύνσεις Πρωτοβάθμιας Εκπαίδευσης');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Διευθύνσεις Πρωτοβάθμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
						Διευθύνσεις Πρωτοβάθμιας Εκπαίδευσης
						<ul>
							<li><?php echo $html->link("Α' Αθήνας", "/provinces/show/1"); ?></li>
							<li><?php echo $html->link("Β' Αθήνας", "/provinces/show/9"); ?></li>
							<li><?php echo $html->link("Γ' Αθήνας", "/provinces/show/12"); ?></li>
							<li><?php echo $html->link("Δ' Αθήνας", "/provinces/show/13"); ?></li>
							<li><?php echo $html->link("Ανατολικής Αττικής", "/provinces/show/3"); ?></li>
							<li><?php echo $html->link("Δυτικής Αττικής", "/provinces/show/16"); ?></li>
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





		
