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
				$allAreas = $this->BArea->find("all", array('conditions'=> array('BArea.id <' => 1000)));
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['BArea']['dide_id'] == $province['Province']['id'])
						{
							$final[$counter]['id'] = $allAreas[$i]['BArea']['id'];
							$final[$counter]['descr'] = $province['Province']['description'];
							$final[$counter]['prefix'] = $allAreas[$i]['BArea']['description'];
							
							$counter++;	
						}
					}
				}			
				for ($i=0; $i<count($final); $i++)
					$names[$i] = $final[$i]['descr'];
				array_multisort($names, SORT_ASC, $final);
				
				$retVal = "<select name=\"" . $selectName . "\">";
				$retVal .= "<option value=\"-1\">Όλες</option>";
				for ($i=0; $i<count($final); $i++)
					$retVal .= "<option value=\"" . $final[$i]['id'] . "\"" . 
						(($selectedId==$final[$i]['id'])?" selected=\"selected\"":"") . ">" .  $final[$i]['prefix'] .
							" " . $final[$i]['descr'] . "</option>";
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
			$allAreas = $this->BArea->find("all", array('conditions' => array('BArea.id <' => 1000)));
			foreach ($allProvinces as $province)
			{
				for ($i=0; $i<count($allAreas); $i++)
				{
					if ($allAreas[$i]['BArea']['dide_id'] == $province['Province']['id'])
					{
						$final[$allAreas[$i]['BArea']['id']]['id'] = $allAreas[$i]['BArea']['id'];
						$final[$allAreas[$i]['BArea']['id']]['dide_id'] = $allAreas[$i]['BArea']['dide_id'];
						$final[$allAreas[$i]['BArea']['id']]['descr'] = $province['Province']['description'];
						$final[$allAreas[$i]['BArea']['id']]['prefix'] = $allAreas[$i]['BArea']['description'];
						$final[$allAreas[$i]['BArea']['id']]['ypepth_code'] = $allAreas[$i]['BArea']['ypepth_code'];
						$tmp2 = explode(" ", $province['Province']['description']);
						if ($allAreas[$i]['BArea']['full_name']!="null")
						{
							$tmp = explode(" ", $allAreas[$i]['BArea']['full_name']);
							$final[$allAreas[$i]['BArea']['id']]['prefix'] = trim($tmp[0]);
							$final[$allAreas[$i]['BArea']['id']]['descr'] = trim($tmp[1]);
						}
						/* Το παρακάτω είναι για πιάσω τις περιοχές μετάθεσης Α-Δ Αθήνας και Δυτικής Αττικής */
						if ((count($tmp2)!=1) && $final[$allAreas[$i]['BArea']['id']]['prefix']=="" && strlen(trim($tmp2[0]))<=2)
						{
							$final[$allAreas[$i]['BArea']['id']]['prefix'] = trim($tmp2[0]);
							$final[$allAreas[$i]['BArea']['id']]['descr'] = trim($tmp2[1]);
						}
					}
				}
			}
			$bad = array('ά', 'έ', 'ή', 'ί', 'ό', 'ύ', 'ώ', 'Έ');
			$good = array('α', 'ε', 'η', 'ι'. 'ο', 'υ', 'ω', 'Ε');
			foreach ($final as $row)
			{
				$description = str_replace($bad, $good, $row['descr']);
				$prefix = str_replace($bad, $good, $row['prefix']);
				$names[] = $description . " " . $prefix;
			}
			array_multisort($names, SORT_ASC, $final);
			
			/*
			print "<pre>";
			print_r($final);
			print "</pre>";
			die('1');
			*/
						
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
