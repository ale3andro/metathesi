<?php
	$title = 'Disclaimer';
	$this->set('title', $title);

	echo  $this->element("waplText", array( "text" => "[h2]" . $title . "[/h2]") );	
	
	$text = "Τα δεδομένα του [url=http://metathesi.gr]metathesi.gr[/url] έχουν συγκεντρωθεί από 
					[url=http://metathesi.gr/blog/%CE%B4%CE%B5%CE%B4%CE%BF%CE%BC%CE%AD%CE%BD%CE%B1/]διάφορες πηγές[/url] 
					στο internet. Όπως είναι λογικό για τα περισσότερα από αυτά δεν είχα τη δυνατότητα διασταύρωσης ενώ 
					δεν μπορώ να αποκλείσω την πιθανότητα να έγιναν και κάποια λάθη κατά τη διάρκεια της επεξεργασίας
					τους. 
				Ειδικά σε ότι αφορά τα σχολεία, αν και προσπαθώ να κρατάω τη βάση ενημερωμένη βάσει των δελτίων τύπου του 
					ΥΠΕΠΘ (όπως αυτά ανακοινώνονται στο [url=http://www.esos.gr]esos.gr[/url] - το μοναδικό portal 
					εκπαιδευτικής επικαιρότητας που προσφέρει feed), είναι σχεδόν σίγουρο ότι θα υπάρχουν λάθη (πχ καινούργια
					σχολεία ή σχολεία που έχουν κλείσει/συγχωνευτεί).
				Με αυτό το σκεπτικό παρακαλώ να χρησιμοποιούνται τα δεδομένα του [url=http://metathesi.gr]metathesi.gr[/url] ως 
					[u]ενδεικτικά[/u] και μόνο. 
				Τέλος, δεδομένου ότι το [url=http://metathesi.gr]metathesi.gr[/url] είναι ένα project [url=" . $this->webroot .
					"pages/opensource]ανοιχτού κώδικα[/url] η όποια βοήθεια σας για την επικαιροποίηση των δεδομένων του 
					επιστρέφει σε όλους μας! Από αυτούς που το χρησιμοποιούν με την υπάρχουσα μορφή του μέχρι αυτούς που θα 
					κατεβάσουν απλά τη βάση δεδομένων του και θα φτιάξουν τη δική τους εφαρμογή ή ερωτήματα για να πάρουν τις 
					πληροφορίες που χρειάζονται...";
	echo  $this->element("waplText", array( "text" => $text) );	
?>
