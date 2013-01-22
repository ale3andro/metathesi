<?php
	class BSchoolTypesController extends AppController
	{
		var $name = "BSchoolTypes";
		var $data = null;
		
		function index()
		{			
			$this->pageTitle = "Τύποι Σχολείων Δευτεροβάθμιας Εκπάιδευσης";			
			if (isset($this->params['requested']))
				return $this->BSchoolType->find("all");			
			$this->set("BSchoolTypes", $this->BSchoolType->find("all"));
		}
		
		function getDescriptions()
		{
			$typeData = $this->BSchoolType->find("all");
			foreach ($typeData as $aType)
				$retVal[$aType['BSchoolType']['id']] = $aType['BSchoolType']['description'];	
			return $retVal;			
		}
	}
?>
