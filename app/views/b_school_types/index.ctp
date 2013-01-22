<!-- File: /app/views/b_school_types/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 0) );
	$this->set('title_for_layout', 'Τύποι Σχολείων Β/θμιας Εκπαίδευσης');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Τύποι Σχολείων Β/θμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
						<?php
								echo "<ol>";
								foreach ($BSchoolTypes as $BSchoolType)
									echo "<li>" . $BSchoolType["BSchoolType"]["description"] . "</li>";
								echo "</ol>";
						?>
					</p>
				</div>
				
			</div>
			
			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>
