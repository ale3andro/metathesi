<!-- File: /app/views/a_bases/from_specialty.ctp -->
<?php
	foreach ($a_specialties as $a_specialty)
	{
		$aspec[$a_specialty['ASpecialty']['id']]['code'] = $a_specialty['ASpecialty']['code'];
		$aspec[$a_specialty['ASpecialty']['id']]['description'] = $a_specialty['ASpecialty']['description'];
	}
	echo  $this->element("header", array( "activeTab" => 1));
	$title = $theProvince['Province']['description'] . " - Περιοχή " . $area['AArea']['description'] . " - Ειδικότητα " . 
		$aspec[$specialtyId]['code'];
	$this->set('title', $title);
	echo $javascript->link('MochiKit/MochiKit.js');
	echo $javascript->link('PlotKit/excanvas.js');
	echo $javascript->link('PlotKit/Base.js');
	echo $javascript->link('PlotKit/Layout.js');
	echo $javascript->link('PlotKit/Canvas.js');
	echo $javascript->link('PlotKit/SweetCanvas.js');
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
							echo $aspec[$specialtyId]['code'] . " " . $aspec[$specialtyId]['description'];
							echo "<ul>";
							for ($i=0; $i<count($availableYears); $i++)
							{
								$values[$i]['year'] = $availableYears[$i]['ABasis']['year'];
								$values[$i]['points'] = 0;
								$values[$i]['how_many_in'] = 0;
							} 
							$i=0;
							foreach ($bases as $base)
							{
								$index=-1;
								for ($j=0; $j<count($values); $j++)
								{
									if ($values[$j]['year'] == $base['ABasis']['year'])
										$index=$j;
								}
								$values[$index]['points'] = $base['ABasis']['points'];
								$values[$index]['how_many_in'] = $base['ABasis']['how_many_in'];
								echo "<li>" . $base['ABasis']['year'] . ": " . $base['ABasis']['points'] . " " . 
											(($base['ABasis']['how_many_in']!=0)?("(" . $base['ABasis']['how_many_in'] . ")"):"") . 
								"</li>";							
							}
							echo "</ul>";
						?>
						
						<table id="values" class="data" style="display:none">
							<thead>
								<tr><td>x</td><td>y1</td><td>y2</td></tr>
							</thead>
							<tbody>
								<?php
									for ($j=0; $j<count($values); $j++)
										echo "<tr><td>" . $j . "</td><td>" . $values[$j]['points'] . "</td><td>" . 
												$values[$j]['how_many_in'] . "</td></tr>";
								?>            
							</tbody>
						</table>
						
						<br />
						<h3>Διακύμανση Βάσης Μετάθεσης</h3>
						<br />
						<br />
						<div><canvas id="graph1" height="300" width="550"></canvas></div>
						<br />
						<br />
						<h3>Διακύμανση Αριθμού Εισακτέων</h3>
						<br />
						<br />
						<div><canvas id="graph2" height="300" width="550"></canvas></div>
						<script type="text/javascript">
						
								var options = {
										"colorScheme": PlotKit.Base.palette(PlotKit.Base.baseColors()[0]),
										"padding": {left: 0, right: 0, top: 10, bottom: 30},
									<?php
										echo "\"xTicks\": [";
										for ($j=0; $j<count($values); $j++)
											echo "{v:" . $j . ", label:\"" . $values[$j]['year'] . "\"}" . 
															(($j!=(count($values)-1))?", ":"");
										echo "],";
												
										echo "\"drawYAxis\": false
											};";
									?>
						
								var layout = new PlotKit.Layout("line", options);
								layout.addDatasetFromTable("dataset1", $("values"), xcol = 0, ycol = 1);
								layout.evaluate();
								var plotter = new PlotKit.SweetCanvasRenderer($("graph1"), layout);
								plotter.render();
								
								var layout = new PlotKit.Layout("line", options);
								layout.addDatasetFromTable("dataset1", $("values"), xcol = 0, ycol = 2);
								layout.evaluate();
								var plotter = new PlotKit.SweetCanvasRenderer($("graph2"), layout);
								plotter.render();
						</script>
							
					</p>
				</div>
			</div>
		</div>
		<!-- end #content -->
		
<?php
		echo $this->element("sidemenua",
					array("province" => $theProvince['Province']['description'],
							"provinceId" => $theProvince['Province']['id'],
							"a_areas" => $a_areas,
							"region" => $region));
?>
	
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>

