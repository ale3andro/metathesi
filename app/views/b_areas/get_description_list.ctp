<!-- File: /app/views/b_areas/get_description_list.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 2));
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="contentBIG" style="float:left">
			<div class="post">
				<?php
					$title = "Περιοχές μετάθεσης Β/θμιας Εκπαίδευσης";
					$this->set('title_for_layout', $title);
				?>
				<h1 class="gamma"><?php echo $title?></h1>
				<div class="entry epsilon">
				<?php
					foreach($data as $item)
					{
						$description = trim($item['prefix'] . " " . $item['descr']);
						echo $html->link($description, '/provinces/show/' . $item['dide_id'] . '/2') . "<br />";
					}
				?>
				</div>
			</div>
		</div>
		<!-- end #content -->
<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
