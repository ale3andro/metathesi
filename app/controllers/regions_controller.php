<?php
	class RegionsController extends AppController
	{
		var $name="Regions";
		
		function index()
		{
			if (isset($this->params['requested']))
				return $this->Region->find("all");
			$this->set("regions", $this->Region->find("all"));	
		}
		function getRegionFromId($id)
		{
			return $this->Region->findById($id);
		}
	}
?>
