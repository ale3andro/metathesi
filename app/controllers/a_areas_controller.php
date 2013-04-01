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
				$allAreas = $this->AArea->find("all", array('conditions'=> array('AArea.id <' => 1000)));
				$counter=0;
				foreach ($allProvinces as $province)
				{
					for ($i=0; $i<count($allAreas); $i++)
					{
						if ($allAreas[$i]['AArea']['dipe_id'] == $province['Province']['id'])
						{
							$final[$counter]['id'] = $allAreas[$i]['AArea']['id'];
							$final[$counter]['descr'] = $province['Province']['description'];
							$final[$counter]['prefix'] = $allAreas[$i]['AArea']['description'];
							$tmp2 = explode(" ", $province['Province']['description']);
							if ($allAreas[$i]['AArea']['full_name']!="null")
							{
								$tmp = explode(" ", $allAreas[$i]['AArea']['full_name']);
								$final[$counter]['prefix'] = trim($tmp[0]);
								$final[$counter]['descr'] = trim($tmp[1]);
							}
							if ((count($tmp2)!=1) && $final[$counter]['prefix']=="" )
							{
								$final[$counter]['prefix'] = trim($tmp2[0]);
								$final[$counter]['descr'] = trim($tmp2[1]);
							}
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
		
		/* 
		 * Η συνάρτηση αυτή παίρνει μια λίστα περιοχών από την συνάρτηση getDescriptionList()
		 * και την σορτάρει με αλφαβητική σειρά
		 */
		function aAreasList()
		{
			$fArray = $this->requestAction("/a_areas/getDescriptionList");
					
			print "<pre>";
			print_r($fArray);
			print "</pre>";
			die('1');
				
			function alxSort($a, $b)
			{
				$bad = array('ά', 'έ', 'ή', 'ί', 'ό', 'ύ', 'ώ');
				$good = array('α', 'ε', 'η', 'ι'. 'ο', 'υ', 'ω');
				return strcmp(str_replace($bad, $good, $a), str_replace($bad, $good, $b));
			}
			usort($fArray['description'], "alxSort");
			print "<pre>";
			print_r($fArray);
			print "</pre>";
			die('1');
			$this->set("data", $fArray);
		}
		
		function getDescriptionList()
		{
			$allProvinces = $this->requestAction("/provinces/getAll");
			$allAreas = $this->AArea->find("all", array('conditions' => array('AArea.id <' => 1000)));
			
			foreach ($allProvinces as $province)
			{
				for ($i=0; $i<count($allAreas); $i++)
				{
					if ($allAreas[$i]['AArea']['dipe_id'] == $province['Province']['id'])
					{
						$final[$allAreas[$i]['AArea']['id']]['id'] = $allAreas[$i]['AArea']['id'];
						$final[$allAreas[$i]['AArea']['id']]['prefix'] = $allAreas[$i]['AArea']['description'];
						$final[$allAreas[$i]['AArea']['id']]['descr'] = $province['Province']['description'];
						$final[$allAreas[$i]['AArea']['id']]['ypepth_code'] = $allAreas[$i]['AArea']['ypepth_code'];
						$tmp2 = explode(" ", $province['Province']['description']);
						if ($allAreas[$i]['AArea']['full_name']!="null")
						{
							$tmp = explode(" ", $allAreas[$i]['AArea']['full_name']);
							$final[$allAreas[$i]['AArea']['id']]['prefix'] = trim($tmp[0]);
							$final[$allAreas[$i]['AArea']['id']]['descr'] = trim($tmp[1]);
						}
						if ((count($tmp2)!=1) && $final[$allAreas[$i]['AArea']['id']]['prefix']=="" && strlen(trim($tmp2[0]))<=2)
						{
							$final[$allAreas[$i]['AArea']['id']]['prefix'] = trim($tmp2[0]);
							$final[$allAreas[$i]['AArea']['id']]['descr'] = trim($tmp2[1]);
						}
					}
				}
			}
			/*
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
				$this->set("title", "Όλες οι περιοχές μετάθεσης Πρωτοβάθμιας Εκπαίδευσης");
				$this->set("data", $final);
			}
		}
	}
?>
