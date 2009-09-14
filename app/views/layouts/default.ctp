<!-- File /app/views/layouts/default.ctp -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Compromise
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20081103

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $title_for_layout ?></title>
<?php echo $html->css("../app/webroot/css/style.css"); ?>	
</head>
<body>
	<div id="header">
		<div id="logo">
			<h1><a href="<?php echo $this->webroot; ?>">metathesi.gr</a></h1>
			<p> αυστηρά για Εκπαιδευτικούς...</p>
		</div>
	</div>
	<!-- end #header -->
	<?php echo $content_for_layout ?>
	

	<div id="footer">
		<p><a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/gr/">
		<img alt="Creative Commons License" style="border-width:0;" src="http://i.creativecommons.org/l/by-sa/3.0/gr/80x15.png" />
		</a>  Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>.		
		</p>
	</div>
	<!-- end #footer -->
</body>
</html>
