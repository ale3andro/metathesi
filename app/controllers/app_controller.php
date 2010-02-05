<?php
	class AppController extends Controller 
	{
		var $components = array('MobileDetection');
		
		function beforeFilter()
		{
			$this->MobileDetection->startup($this);
			$this->MobileDetection->detect(); 
		}
	}
?>
