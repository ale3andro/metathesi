<!-- File: /app/views/a_school_types/index.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 0) );
	$this->set('title', 'Τύποι Σχολείων Α/θμιας Εκπαίδευσης');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="content" style="float:left">
			<div class="post">
				<h1 class="title">Τύποι Σχολείων Α/θμιας Εκπαίδευσης</h1>
				<div class="entry">
					<p>
						<?php
								echo "<ol>";
								foreach ($ASchoolTypes as $ASchoolType)
									echo "<li>" . $ASchoolType["ASchoolType"]["description"] . "</li>";
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
