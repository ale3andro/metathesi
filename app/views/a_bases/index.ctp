<!-- File: /app/views/a_bases/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1) );
	$title = "Αναζήτηση Βάσεων Α/θμιας Εκπαίδευσης";
	$this->set('title', $title);
?>
<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title"><?php echo $title; ?></h1>
				<div class="entry">
					<p>
						<?php
							echo $form->create('ABasis', array('action' => 'index'));
							echo "Περιοχή:<br />";
							echo $areas_select_box . "<br />";
							echo "Χρονιά:<br />";
							echo $years_select_box . "<br />";
							echo "Ειδικότητα:<br />";
							echo $specialties_select_box . "<br />";
							echo $form->end('Αναζήτηση');			
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

