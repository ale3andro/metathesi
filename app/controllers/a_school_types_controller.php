<?php
	class ASchoolTypesController extends AppController
	{
		var $name = "ASchoolTypes";
		var $data = null;
		
		function index()
		{			
			$this->pageTitle = "Τύποι Σχολείων Πρωτοβάθμιας Εκπάιδευσης";			
			if (isset($this->params['requested']))
				return $this->ASchoolType->find("all");			
			$this->set("ASchoolTypes", $this->ASchoolType->find("all"));
		}
		
		function getDescriptions()
		{
			$typeData = $this->ASchoolType->find("all");
			foreach ($typeData as $aType)
				$retVal[$aType['ASchoolType']['id']] = $aType['ASchoolType']['description'];	
			return $retVal;			
		}
	}
?>
