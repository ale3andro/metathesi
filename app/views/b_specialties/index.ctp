<!-- File: /app/views/b_specialties/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2));
	$this->set('title_for_layout', "Ειδικότητες Εκπαιδευτικών Β/θμιας Εκπ/σης");
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="contentBIG" style="float:left">
			<div class="post">
				<h1 class="gamma">Ειδικότητες Εκπαιδευτικών Δευτεροβάθμιας Εκπαίδευσης</h1>
				<div class="entry epsilon">
					<p>
						<?php
							echo $html->css("../app/webroot/css/table_design.css");
							echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
							echo "<table summary=\"b_specialties\">";
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
								echo "<td>" . $adata['BSpecialty']['code'] . "</td>";
								echo "<td>" . $adata['BSpecialty']['description'] . "</td>";
								echo "</tr>";							
							}
							echo "</tbody></table>";
	
							$paginator->options(array('url' => $this->passedArgs));
							echo "<p style=\"text-align:right\">" . $paginator->counter(array('format' => 'Σελίδα %page% από %pages%')) . "</p>";
							echo "<p style=\"text-align:center\">";
							echo $paginator->numbers() . "<br />";
							echo $paginator->prev('« Προηγούμενη ');
							if ( ($paginator->counter() != 1) && ($paginator->counter() != $paginator->params['paging']['BSpecialty']['pageCount']) )
								echo " : ";
							echo $paginator->next(' Επόμενη »'); 
							echo "</p>";
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
