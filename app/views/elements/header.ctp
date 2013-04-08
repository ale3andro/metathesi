<!-- File : app/views/elements/header.ctp -->
<div id="menu">
	<ul>
		<li <?php echo (($activeTab==0)?" class=\"first\"":"") ?>><a href="<?php echo $html->webroot ?>">Αρχική</a></li>
	    <li <?php echo (($activeTab==1)?" class=\"first\"":"") ?>>
	    		<?php 	if (isset($provinceId))
	    					echo $html->link("Α/θμια Εκπ/ση","/provinces/show/" . $provinceId . "/1"); 
	    				else
	    					echo $html->link("A/θμια Εκπ/ση","/provinces/viewAll/1"); 
	    		?>
	    </li>
	    <li <?php echo (($activeTab==2)?" class=\"first\"":"") ?>>
	    	<?php 	if (isset($provinceId))
	    				echo $html->link("Β/θμια Εκπ/ση","/provinces/show/" . $provinceId . "/2");
	    			else
	    				echo $html->link("Β/θμια Εκπ/ση","/provinces/viewAll/2"); 
	    	?>
	    </li>
	    <li <?php echo (($activeTab==3)?" class=\"first\"":"") ?>>
	    	<?php 	if (isset($provinceId))
	    				echo $html->link("Αρχική Περιοχής", "/provinces/show/" . $provinceId);
	    			else
	    					echo $html->link("Διευθύνσεις","/provinces/viewAll"); 
	    	?>
	    </li>
	    <li <?php echo (($activeTab==4)?" class=\"first\"":"") ?>>
			<?php
				echo $html->link("Διάφορα", "/pages/diafora"); ?>
		</li>
	    <li <?php echo (($activeTab==5)?" class=\"first\"":"") ?>>
			<?php
				echo $html->link("Ανοιχτός Κώδικας", "/pages/opensource"); ?>
		</li>
		<li><a href="http://metathesi.gr/blog">Ιστολόγιο<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a></li>
		
	</ul>
</div>
