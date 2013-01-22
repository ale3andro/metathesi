<?php
	class BAreasController extends AppController
	{
		var $name = "BAreas";
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->BArea->find("all");
			else
				$this->redirect('/provinces/viewAll/1', null, true);
		}
		
		function getSelectBox($selectName, $selectedId = -1)
		{
			if (isset($this->params['requested']))
			{
				$allProvinces = $this->requestAction("/provinces/getAll");
				$allAreas = $this->BArea->find("all");
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['BArea']['dide_id'] == $province['Province']['id'])
						{
							$final[$counter]['id'] = $allAreas[$i]['BArea']['id'];
							$final[$counter]['descr'] = $province['Province']['description'];
							$temp = explode(" ", $final[$counter]['descr']);
							if ( (count($temp) != 1) && ($temp[1]!="Αττικής") )
								$final[$counter]['descr'] = $temp[0];
							$final[$counter]['prefix'] = $allAreas[$i]['BArea']['description'];
							$counter++;	
						}
					}
				}			
				
				$retVal = "<select name=\"" . $selectName . "\">";
				$retVal .= "<option value=\"-1\">Όλες</option>";
				for ($i=0; $i<count($final); $i++)
					$retVal .= "<option value=\"" . $final[$i]['id'] . "\"" . 
						(($selectedId==$final[$i]['id'])?" selected=\"selected\"":"") . ">" .  $final[$i]['descr'] .
							" " . $final[$i]['prefix'] . "</option>";
				$retVal .= "</select>";
				return $retVal;				
			}
			
		}
		
		function getFromDideId($id, $old=0)
		{	
			# Αν $old=0 δεν παρουσιάζω τις παλιές περιοχές, 
			# Αν $old=1 τότε επιστρέφω τις παλιές περιοχές
			# Αν $old=2 τότε επιστρέφω και παλιές και νέες περιοχές		
			switch ($old) 
			{
				case 0:
					$conditions = array('BArea.dide_id' => $id, 'BArea.id <' => 1000);
					break;
				case 1:
					$conditions = array('BArea.dide_id' => $id, 'BArea.id >' => 1000);
					break;
				default:
					$conditions = array('BArea.dide_id' => $id);
					break;
			}
			$results = $this->BArea->find("all", array('conditions' => $conditions));
			
			if (isset($this->params['requested']))
				return $results;
			$this->set("areas", $results);
		}
		function getDescriptionFromAreaId($id)
		{
			if (isset($this->params['requested']))
				return $this->BArea->findById($id);		
		}
		function getProvinceFromAreaId($id)
		{
			if (isset($this->params['requested']))				
			{
				$dide = $this->BArea->findById($id); 				
				return $this->requestAction("/provinces/getDideAll/" . $dide['BArea']['dide_id']);
			}
		}
		
		function getDescriptionList()
		{
			$allProvinces = $this->requestAction("/provinces/getAll");
			$allAreas = $this->BArea->find("all");
			foreach ($allProvinces as $province)
			{
				for ($i=0; $i<count($allAreas); $i++)
				{
					if ($allAreas[$i]['BArea']['dide_id'] == $province['Province']['id'])
					{
						$final[$allAreas[$i]['BArea']['id']]['id'] = $allAreas[$i]['BArea']['id'];
						$final[$allAreas[$i]['BArea']['id']]['descr'] = $province['Province']['description'];
						$final[$allAreas[$i]['BArea']['id']]['prefix'] = $allAreas[$i]['BArea']['description'];
						if ($final[$allAreas[$i]['BArea']['id']]['id'] == 3)
						{
							$final[$allAreas[$i]['BArea']['id']]['descr'] = "Θεσσαλονίκης";
							$final[$allAreas[$i]['BArea']['id']]['prefix'] = "Α";
						}
						if ($final[$allAreas[$i]['BArea']['id']]['id'] == 4)
						{
							$final[$allAreas[$i]['BArea']['id']]['descr'] = "Θεσσαλονίκης";
							$final[$allAreas[$i]['BArea']['id']]['prefix'] = "Β";
						}
					}
				}
			}			
			if (isset($this->params['requested']))
				return $final;			
			else
			{
				$this->set("title", "Όλες οι περιοχές μετάθεσης Δευτεροβάθμιας Εκπαίδευσης");
				$this->set("data", $final);
			}
		}
	}
?>
