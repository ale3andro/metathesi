<!-- File: /app/views/provinces/viewAllctp -->
<?php
	$activeTab = $ab;
	if ($ab==0)
		$activeTab = 3;
	echo  $this->element("header", array( "activeTab" => $activeTab));
	if ($ab==1)
		$title = "Διευθύνσεις Πρωτοβάθμιας Εκπαίδευσης";
	if ($ab==2)
		$title = "Διευθύνσεις Δευτεροβάθμιας Εκπαίδευσης";
	if ($ab==0)
		$title = "Όλες οι Διευθύνσεις Εκπαίδευσης της χώρας";
	$this->set('title_for_layout', $title);
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
	
		<div id="contentBIG" style="float:left">
			<div class="post">
				<h1 class="gamma"><?php echo $title; ?></h1>
				<div class="entry epsilon">
					<p>
						<?php
							$i=0;
							foreach ($data as $entry)
							{
								if ($ab==0)
								{
									echo "<div class=\"province\"><span class=\"big\">" . $entry['Province']['description'] . "</span><br />" .
										$html->link("Πρωτοβάθμια Εκπαίδευση", "/provinces/show/" . 
										$entry['Province']['id'] . "/1") ."<br />" . 
										$html->link("Δευτεροβάθμια Εκπαίδευση", "/provinces/show/" . 
										$entry['Province']['id'] . "/2") . "</div>";
								}
								else
								{
									$url = (($ab==1)?($entry['Province']['A_url']):($entry['Province']['B_url']));
									echo "<div class=\"province\"><span class=\"big\">" . 
													$html->link($entry['Province']['description'], "/provinces/show/" . 
											$entry['Province']['id'] . "/" . $ab) . "</span><br /></div>";
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

