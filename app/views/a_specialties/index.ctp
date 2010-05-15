<!-- File: /app/views/a_specialties/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 1));
	$this->set('title_for_layout', "Ειδικότητες Εκπαιδευτικών Α/θμιας Εκπ/σης");		
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<div class="post">
				<h1 class="title">Ειδικότητες Εκπαιδευτικών Πρωτοβάθμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
						<?php
							echo $html->css("../app/webroot/css/table_design.css");
							echo "<table summary=\"a_specialties\">";
							echo "<thead>
										<tr>
											<th scope=\"col\" class=\"narrow\">Κωδικός</th>					
											<th scope=\"col\">Λεκτικό</th>
										</tr>
									</thead>
									<tbody>";
							foreach ($data as $adata)
							{
								echo "<tr>";
								echo "<td>" . $adata['ASpecialty']['code'] . "</td>";
								echo "<td>" . $adata['ASpecialty']['description'] . "</td>";
								echo "</tr>";							
							}
							echo "</tbody></table>";
						?>
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->

<?php echo $this->element("sidemenuspecialties"); ?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
