<!-- File: /app/views/regions/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => -1));
	$title = "Οι Περιφερειακές Διευθύνσεις Εκπαίδευσης";
	$this->set('title_for_layout', $title);
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content">
			<div class="post">
				<h1 class="title"><?php echo $title; ?></h1>
				<div class="entry">
					<p>
						<?php
							echo $html->css("../app/webroot/css/table_design.css");
							echo "<table summary=\"regions\">";
							echo "<thead>
										<tr>
											<th scope=\"col\" class=\"narrow\">Α/Α</th>
											<th scope=\"col\">Περιγραφή</th>					
											<th scope=\"col\">Ιστοσελίδα</th>
											<th scope=\"col\">Τηλ.</th>
											<th scope=\"col\">Fax</th>
										</tr>
									</thead>
									<tbody>";
							foreach ($regions as $region)
							{
								echo "<tr>";
								echo "<td>" . $region['Region']['id'] . "</td>";
								echo "<td>" . $region['Region']['description'] . "</td>";
								echo "<td>" . $html->link($region['Region']['url'], $region['Region']['url']) . "</td>";
								echo "<td>" . $region['Region']['telephone'] . "</td>";
								echo "<td>" . $region['Region']['fax'] . "</td>";
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
