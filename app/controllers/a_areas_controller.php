<?php
	class AAreasController extends AppController
	{
		var $name = "AAreas";
		
		function index()
		{			
			if (isset($this->params['requested']))
				return $this->AArea->find("all");
			else
				$this->redirect('/provinces/viewAll/2', null, true);
		}
		
		function getFromDipeId($id, $old=0)
		{			
			# Αν $old=0 δεν παρουσιάζω τις παλιές περιοχές, 
			# Αν $old=1 τότε επιστρέφω τις παλιές περιοχές
			# Αν $old=2 τότε επιστρέφω και παλιές και νέες περιοχές		
			switch ($old) 
			{
				case 0:
					$conditions = array('AArea.dipe_id' => $id, 'AArea.id <' => 1000);
					break;
				case 1:
					$conditions = array('AArea.dipe_id' => $id, 'AArea.id >' => 1000);
					break;
				default:
					$conditions = array('AArea.dipe_id' => $id);
					break;
			}
			$results = $this->AArea->find("all", array('conditions' => $conditions));
			if (isset($this->params['requested']))
				return $results;
			
			$this->set("a_areas", $results);	
		}
		
		function getDescriptionFromAreaId($id)
		{
			if (isset($this->params['requested']))
				return $this->AArea->findById($id);		
		}
		
		function getProvinceFromAreaId($id)
		{
			if (isset($this->params['requested']))				
			{
				$theProvince = $this->AArea->findById($id); 				
				return $this->requestAction("/provinces/getDideAll/" . $theProvince['AArea']['dipe_id']);
			}
		}
		
		function getSelectBox($selectName, $selectedId = -1)
		{
			if (isset($this->params['requested']))
			{
				$allProvinces = $this->requestAction("/provinces/getAll");
				$allAreas = $this->AArea->find("all");
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['AArea']['dipe_id'] == $province['Province']['id'])
						{
							$final[$counter]['id'] = $allAreas[$i]['AArea']['id'];
							$final[$counter]['descr'] = $province['Province']['description'];
							$temp = explode(" ", $final[$counter]['descr']);
							
							if (count($temp) != 1)
							{
								if ($temp[1]!="Αττικής")
									$final[$counter]['descr'] = $temp[0];
								if ($temp[0]=='Αθήνας')
									$final[$counter]['descr'] = $temp[0] . " " . $temp[1];
							}
							
							$final[$counter]['prefix'] = $allAreas[$i]['AArea']['description'];
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
		
		function getDescriptionList()
		{
			$allProvinces = $this->requestAction("/provinces/getAll");
			$allAreas = $this->AArea->find("all");
			foreach ($allProvinces as $province)
			{
				for ($i=0; $i<count($allAreas); $i++)
				{
					if ($allAreas[$i]['AArea']['dipe_id'] == $province['Province']['id'])
					{
						$final[$allAreas[$i]['AArea']['id']]['id'] = $allAreas[$i]['AArea']['id'];
						$final[$allAreas[$i]['AArea']['id']]['prefix'] = $allAreas[$i]['AArea']['description'];
						$final[$allAreas[$i]['AArea']['id']]['descr'] = $province['Province']['description'];
						if ($final[$allAreas[$i]['AArea']['id']]['id'] == 3)
						{
							$final[$allAreas[$i]['AArea']['id']]['descr'] = "Θεσσαλονίκης";
							$final[$allAreas[$i]['AArea']['id']]['prefix'] = "Α";
						}
						if ($final[$allAreas[$i]['AArea']['id']]['id'] == 	4)
						{
							$final[$allAreas[$i]['AArea']['id']]['descr'] = "Θεσσαλονίκης";
							$final[$allAreas[$i]['AArea']['id']]['prefix'] = "Β";
						}
					}
				}
			}			
			if (isset($this->params['requested']))
				return $final;			
			else
			{
				$this->set("title", "Όλες οι περιοχές μετάθεσης Πρωτοβάθμιας Εκπαίδευσης");
				$this->set("data", $final);
			}
		}
	}
?>
