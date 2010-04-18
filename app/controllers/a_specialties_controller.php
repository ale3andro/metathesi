<?php
	class ASpecialtiesController extends AppController
	{
		var $name = "ASpecialties";
		var $paginate = array('limit' => 25, 'order' => array('ASpecialty.code' => 'asc',));
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->ASpecialty->find('all', array('order' => array('ASpecialty.code')));
			$this->set('title', "Ειδικότητες Εκπαιδευτικών Α/θμιας Εκπ/σης");		
			$this->set('data', $this->paginate());	
		}
		
		function getSelectBox($selectName)
		{
			$specialties = $this->requestAction("a_specialties");
			$retVal = "<select name=\"" . $selectName . "\">";
			$retVal .= "<option value=\"-1\">Όλες</option>";
			for ($i=0; $i<count($specialties); $i++)
				$retVal .= "<option value=\"" . $specialties[$i]['ASpecialty']['id'] . "\">" .  
									$specialties[$i]['ASpecialty']['code'] . "</option>";
			
			$retVal .= "</select>";
			return $retVal;
		}
	}
?>
