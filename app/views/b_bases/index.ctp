<!-- File: /app/views/b_bases/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2) );
	$title = "Αναζήτηση Βάσεων Β/θμιας Εκπαίδευσης";
	$this->set('title_for_layout', $title);
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
							echo $form->create('BBasis', array('action' => 'index'));
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
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

