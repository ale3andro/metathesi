<?php
	class ASchoolsController extends AppController
	{
		var $name = "ASchools";
		var $paginate = array('limit' => 25, 'order' => array('ASchool.type' => 'asc', 
							'ASchool.description' => 'asc', 'ASchool.number' => 'asc'));
								
		function index()
		{			
			$this->pageTitle = "Όλα σχολεία της Πρωτοβάθμιας Εκπαίδευσης";			
			$this->set("schools", $this->paginate());
			$this->set("a_areas", $this->requestAction("/a_areas"));
			$this->set("a_school_types", $this->requestAction("/a_school_types/getDescriptions"));
		}
		
		function getSchoolsOfTypeFromDipeId($dipeId, $typeId)
		{
			if (!isset($dipeId) || (!is_numeric($dipeId)))
				$this->redirect('/a_schools/', null, true);
			
			if (!isset($typeId) || (!is_numeric($typeId)))
				$this->redirect('/a_schools/getFromDipeId/' . $dipeId, null, true);
			
			$conditions = array("ASchool.dipe_id" => $dipeId,
									"ASchool.type" => $typeId);
			if (isset($this->params['requested']))
				return $this->ASchool->findAll($conditions);
			$this->set("theProvince", $this->requestAction("/provinces/getProvinceFromId/" . $dipeId));
			$this->set("a_areas", $this->requestAction("/a_areas/getFromDipeId/" . $dipeId));
			$this->set("a_school_types", $this->requestAction("/a_school_types/getDescriptions"));
			$this->set("schoolType", $typeId);
			$schools = $this->paginate('ASchool', array('ASchool.dipe_id =' => $dipeId, 'ASchool.type =' => $typeId));
			$this->set("schools", $schools);
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $dipeId);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}

		function getFromDipeId($id)
		{			
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/a_schools/', null, true);
			
			if (isset($this->params['requested']))
				return $this->ASchool->findAllByDipeId($id);
			$this->set("theProvince", $this->requestAction("/provinces/getProvinceFromId/" . $id));
			$this->set("a_areas", $this->requestAction("/a_areas/getFromDipeId/" . $id));
			$this->set("a_school_types", $this->requestAction("/a_school_types/getDescriptions"));
			$schools = $this->paginate('ASchool', array('ASchool.dipe_id =' => $id));
			$this->set("schools", $schools);	
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $id);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
			$this->set("title", "Όλα τα σχολεία της Διεύθυνσης");
		}
		
		function getFromAreaId($id)
		{
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/a_schools/', null, true);
			
			if (isset($this->params['requested']))
				return $this->ASchool->findAllByAreaId($id);
			$theProvince = $this->requestAction("/a_areas/getProvinceFromAreaId/" . $id);
			$this->set("theProvince", $theProvince);
			$this->set("a_areas", $this->requestAction("/a_areas/getFromDipeId/" . $theProvince['Province']['id']));
			$this->set("a_area", $this->requestAction("/a_areas/getDescriptionFromAreaId/" . $id));		
			$this->set("a_school_types", $this->requestAction("/a_school_types/getDescriptions"));			
			$this->set("schools", $this->paginate('ASchool', array('ASchool.area_id =' => $id)));
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $theProvince['Province']['id']);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}
		
		function showResults($description, $points, $moreLess, $area_id)
		{
			$values = array('=', '>=', '<=');
			
			if ( (!isset($description)) || (!isset($points)) || (!isset($moreLess)) || (!isset($area_id)) )
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος...', '/a_schools/search', 3);
			elseif (!in_array($moreLess, $values))
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος..,', '/a_schools/search', 3);
			else
			{
				$this->set('title', "Αποτελέσματα Αναζήτησης Σχολείων");
				
				if ($description != "-1")
					$conditions['ASchool.description LIKE'] = $description . "%";
				
				$conditions['ASchool.points ' . $moreLess] = $points;
			
				if ($area_id != "-1")
					$conditions['ASchool.area_id'] = $area_id;
		
				$this->set("schools", $this->paginate('ASchool', $conditions));
				$this->set("a_school_types", $this->requestAction("/a_school_types/getDescriptions"));
				$this->set("a_areas", $this->requestAction("/a_areas/"));
				$this->set("provinces", $this->requestAction("/provinces/"));
			}
		}
		
		function search()
		{
			if (!isset($this->data))
			{
				$this->set('title', "Αναζήτηση Σχολείων Α/θμιας Εκπαίδευσης");
				$selectName = "data[ASchool][area_id]";
				$this->set("a_areas_select", $this->requestAction("/a_areas/getSelectBox/" . $selectName));
			}
			else
			{
				if ($this->data['ASchool']['description']=='')
					$this->data['ASchool']['description'] = -1;
					
				$this->redirect("/a_schools/showResults/" . $this->data['ASchool']['description'] . "/" . $this->data['ASchool']['points'] . "/" . 
									$_REQUEST['moreLess'] . "/" . $this->data['ASchool']['area_id']);
			}
		}
		
		function getPointRange($areaId)
		{
			if (isset($this->params['requested']))				
			{
				$resultMax = $this->ASchool->query('SELECT MAX(points) as max FROM a_schools WHERE area_id=' . $areaId);
				$ret[1] = $resultMax[0][0]['max'];
				$resultMin = $this->ASchool->query('SELECT MIN(points) as min FROM a_schools WHERE area_id=' . $areaId);
				$ret[0] = $resultMin[0][0]['min'];
				return $ret;
			}
		}	
	}
?>
