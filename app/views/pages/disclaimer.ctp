<!-- File: /app/views/provinces/pages/disclaimer.ctp -->
<?php
	echo  $this->element("header", array( "activeTab" => 4) );
	$this->set('title_for_layout', 'Disclaimer');
?>

<div id="wrapper">
<div class="btm">
	<div id="page">
		<div id="contentBIG" style="float:left">
			<div class="post">
				<h1 class="title">Disclaimer</h1>
				<div class="entry">
					<p>
						Τα δεδομένα του <a href="http://metathesi.gr">metathesi.gr</a> έχουν συγκεντρωθεί από <a href="http://metathesi.gr/blog/%CE%B4%CE%B5%CE%B4%CE%BF%CE%BC%CE%AD%CE%BD%CE%B1/">
							διάφορες πηγές<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a> στο internet. Όπως είναι λογικό για τα περισσότερα
							από αυτά δεν είχα τη δυνατότητα διασταύρωσης ενώ δεν μπορώ να αποκλείσω την πιθανότητα να έγιναν και κάποια λάθη κατά τη διάρκεια της επεξεργασίας
							τους. 
							<br />
							Ειδικά σε ότι αφορά τα σχολεία, αν και προσπαθώ να κρατάω τη βάση ενημερωμένη βάσει των δελτίων τύπου του ΥΠΕΠΘ (όπως αυτά ανακοινώνονται στο 
							<a href="http://www.esos.gr">esos.gr<?php echo $html->image('external_link.gif', array('class'=>'external')); ?></a> - το μοναδικό portal 
							εκπαιδευτικής επικαιρότητας που προσφέρει feed), είναι σχεδόν σίγουρο ότι θα υπάρχουν λάθη (πχ καινούργια σχολεία ή σχολεία που έχουν 
							κλείσει/συγχωνευτεί).
							<br />
							Με αυτό το σκεπτικό παρακαλώ να χρησιμοποιούνται τα δεδομένα του <a href="http://metathesi.gr">metathesi.gr</a> ως 
							<span style="text-decoration:underline">ενδεικτικά</span> και μόνο. 
							<br />
							Τέλος, δεδομένου ότι το <a href="http://metathesi.gr">metathesi.gr</a> είναι ένα project <?php echo $html->link("ανοιχτού κώδικα", "opensource"); ?>, 
							η όποια βοήθεια σας για την επικαιροποίηση των δεδομένων του επιστρέφει σε όλους μας! Από αυτούς που το χρησιμοποιούν με την υπάρχουσα μορφή του 
							μέχρι αυτούς που θα κατεβάσουν απλά τη βάση δεδομένων του και θα φτιάξουν τη δική τους εφαρμογή ή ερωτήματα για να πάρουν τις πληροφορίες που 
							χρειάζονται...											
					</p>
				</div>
			</div>			
		</div>
		<!-- end #content -->
		<div style="clear: both;">&nbsp;</div>
	</div>
</div>





		
