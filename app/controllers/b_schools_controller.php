<?php
	class BSchoolsController extends AppController
	{
		var $name = "BSchools";
		var $paginate = array('limit' => 25, 'order' => array('BSchool.type' => 'asc', 
							'BSchool.municipality' => 'asc',
							'BSchool.number' => 'asc'));
		
		function index()
		{			
			$this->pageTitle = "Όλα σχολεία της Δευτεροβάθμιας Εκπαίδευσης";			
			$this->set("schools", $this->paginate());
			$this->set("b_areas", $this->requestAction("/b_areas"));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));
		}
		
		function getSchoolsOfTypeFromDideId($dideId, $typeId)
		{
			if (!isset($dideId) || (!is_numeric($dideId)))
				$this->redirect('/b_schools/', null, true);
			
			if (!isset($typeId) || (!is_numeric($typeId)))
				$this->redirect('/b_schools/getFromDideId/' . $dideId, null, true);			
			
			$conditions = array("BSchool.dide_id" => $dideId,
									"BSchool.type" => $typeId);
			if (isset($this->params['requested']))
				return $this->BSchool->findAll($conditions);
			$schools = $this->BSchool->findAll($conditions);
			$this->set("provinceId", $dideId);
			$schools = $this->paginate("BSchool", array('BSchool.dide_id =' => $dideId, 'BSchool.type =' => $typeId));
			$this->set("schools", $schools);
			$this->set("theProvince", $this->requestAction("/provinces/getProvinceFromId/" . $dideId));
			$this->set("b_areas", $this->requestAction("/b_areas/getFromDideId/" . $dideId));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));	
			$this->set("schoolType", $typeId);
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $dideId);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}
		
		function getFromDideId($id)
		{			
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/b_schools/', null, true);
			
			if (isset($this->params['requested']))
				return $this->BSchool->findAllByDideId($id);
			$this->set("provinceId", $id);
			$schools = $this->paginate('BSchool', array('BSchool.dide_id =' => $id));
			$this->set("schools", $schools);
			$this->set("theProvince", $this->requestAction("/provinces/getProvinceFromId/" . $id));
			$this->set("b_areas", $this->requestAction("/b_areas/getFromDideId/" . $id));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $id);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
			$this->set("title", "Όλα τα σχολεία της Διεύθυνσης");
		}
		
		function getFromAreaId($id)
		{
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/b_schools/', null, true);
			
			if (isset($this->params['requested']))
				return $this->BSchool->findAllByAreaId($id);
			$this->set("schools", $this->paginate('BSchool', array('BSchool.area_id =' => $id)));
			$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));			
			$this->set("b_area", $this->requestAction("/b_areas/getDescriptionFromAreaId/" . $id));		
			$theProvince = $this->requestAction("/b_areas/getProvinceFromAreaId/" . $id);
			$this->set("theProvince", $theProvince);
			$this->set("b_areas", $this->requestAction("/b_areas/getFromDideId/" . $theProvince['Province']['id']));
			$regionId = $this->requestAction("/provinces/getRegionIdFromProvinceId/" . $theProvince['Province']['id']);
			$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $regionId));
		}
		
		function showResults($municipality, $points, $moreLess, $area_id)
		{
			$values = array('=', '>=', '<=');
			
			if ( (!isset($municipality)) || (!isset($points)) || (!isset($moreLess)) || (!isset($area_id)) )
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος...', '/b_schools/search', 3);
			elseif (!in_array($moreLess, $values))
				$this->flash('Δεν υπάρχει η κατάλληλη είσοδος...', '/b_schools/search', 3);
			else
			{
				$this->set('title', "Αποτελέσματα Αναζήτησης Σχολείων");
				
				if ($municipality != "-1")
					$conditions['BSchool.municipality LIKE'] = $municipality . "%";
				
				$conditions['BSchool.points ' . $moreLess] = $points;
			
				if ($area_id != "-1")
					$conditions['BSchool.area_id'] = $area_id;
		
				$this->set("schools", $this->paginate('BSchool', $conditions));
				$this->set("b_school_types", $this->requestAction("/b_school_types/getDescriptions"));
				$this->set("b_areas", $this->requestAction("/b_areas/"));	
				$this->set("provinces", $this->requestAction("/provinces/"));
			}
		}
		
		function search()
		{
			if (!isset($this->data))
			{
				$this->set('title', "Αναζήτηση Σχολείων Β/θμιας Εκπαίδευσης");
				$selectName = "data[BSchool][area_id]";
				$this->set("b_areas_select", $this->requestAction("/b_areas/getSelectBox/" . $selectName));
			}
			else
			{
				if ($this->data['BSchool']['municipality']=='')
					$this->data['BSchool']['municipality'] = -1;
					
				$this->redirect("/b_schools/showResults/" . $this->data['BSchool']['municipality'] . "/" . $this->data['BSchool']['points'] . "/" . 
									$_REQUEST['moreLess'] . "/" . $this->data['BSchool']['area_id']);
			}
		}
		
		function getPointRange($areaId)
		{
			if (isset($this->params['requested']))				
			{
				$resultMax = $this->BSchool->query('SELECT MAX(points) as max FROM b_schools WHERE area_id=' . $areaId);
				$ret[1] = $resultMax[0][0]['max'];
				$resultMin = $this->BSchool->query('SELECT MIN(points) as min FROM b_schools WHERE area_id=' . $areaId);
				$ret[0] = $resultMin[0][0]['min'];
				return $ret;
			}
		}	
	}
?>
