<!-- File: /app/views/b_bases/search.ctp -->
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
							if (!isset($b_bases))
							{
								echo "<p>";
								echo $form->create('BBasis', array('action' => 'search/r', 'class' => 'cssform'));
								echo "<label>Περιοχή:</label>" . $areas_select_box . "<br /><br />";
								echo "<label>Χρονιά:</label>" . $years_select_box . "<br /><br />";
								echo "<label>Ειδικότητα:</label>" . $specialties_select_box . "<br /><br />";
								echo $form->end('Αναζήτηση');		
								echo "</p>";
							}
							else
							{
								if (count($b_bases)==0)
								{
									echo "Δεν βρέθηκαν αποτελέσματα...";
									echo "<br />" . $html->link('Νέα αναζήτηση', '/b_bases/search') . "<br />";
								}
								else
								{
									echo $this->element("showBBases", array("b_bases" => $b_bases,
																"b_specialties" => $b_specialties,
																"b_areas_list" => $b_areas_list));
								}
							}
						?>
					</p>
				</div>
			</div>
		</div>
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

