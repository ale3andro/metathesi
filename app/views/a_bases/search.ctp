<!-- File: /app/views/a_bases/search.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1) );
	$title = "Αναζήτηση Βάσεων Α/θμιας Εκπαίδευσης";
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
							if (!isset($a_bases))
							{
								echo "<p>";
								echo $form->create('ABasis', array('action' => 'search/r', 'class' => 'cssform'));
								echo "<label>Περιοχή:</label>" . $areas_select_box . "<br /><br />";
								echo "<label>Χρονιά:</label>" . $years_select_box . "<br /><br />";
								echo "<label>Ειδικότητα:</label>" . $specialties_select_box . "<br /><br />";
								echo $form->end('Αναζήτηση');			
								echo "</p>";
							}
							else
							{
								if (count($a_bases)==0)
								{
									echo "Δεν βρέθηκαν αποτελέσματα...";
									echo "<br />" . $html->link('Νέα αναζήτηση', '/a_bases/search') . "<br />";
								}
								else
								{
									echo $this->element("showABases", array("a_bases" => $a_bases,
																"a_specialties" => $a_specialties,
																"a_areas_list" => $a_areas_list));
								}
							}
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

