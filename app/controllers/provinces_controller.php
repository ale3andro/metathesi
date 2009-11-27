<?php
	class ProvincesController extends AppController
	{
		var $name="Provinces";
		function index()
		{
			$this->pageTitle = "Οι περιοχές της Ελληνικής Εκπαίδευσης";
			if (isset($this->params['requested']))
				return $this->Province->find("all");
			else
				$this->redirect('/provinces/viewAll', null, true);
		}
		
		function getAll()
		{
			if (isset($this->params['requested']))
				return $this->Province->find("all", array('order' => array('Province.description')));
		}
		function getDideAll($id)
		{
			return $this->Province->findById($id);
		}
		function getProvinceFromId($id)
		{
			return $this->Province->findById($id);
		}
		function getRegionIdFromProvinceId($id)
		{
			$province = $this->Province->findById($id);
				return $province['Province']['pde_id'];
		}
		function show($id, $ab = 0)
		{
			if (!isset($id) || (!is_numeric($id)))
				$this->redirect('/provinces/viewAll', null, true);
			/*
			  	$ab = 0 δείξε Πρωτοβάθμια και Δευτεροβάθμια
			  	 	= 1 δείξε μόνο Πρωτοβάθμια
			  	 	= 2 δείξε μόνο Δευτεροβάθμια
			*/
			if ( ($ab!=1) && ($ab!=2) )
				$ab = 0;
			$province = $this->Province->findById($id); 			
			if ($province == false)
				$this->flash('Δεν υπάρχει περιοχή με αυτό το id...', '/provinces/viewAll', 3);
			else
			{
				$this->set("ab", $ab);
				$this->set("theProvince", $province);
			
				$a_areas = $this->requestAction("/a_areas/getFromDipeId/" . $province['Province']['id']);
				$this->set("a_areas", $a_areas);
				$i=0;
				foreach ($a_areas as $a_area)
					$aPointsRange[$i++] = $this->requestAction("/a_schools/getPointRange/" . $a_area['AArea']['id']);
				$this->set("a_points_range", $aPointsRange);
				$this->set("a_schools", $this->requestAction("/a_schools/getFromDipeId/" . $province['Province']['id']));	
				$b_areas = $this->requestAction("/b_areas/getFromDideId/" . $province['Province']['id']);
				$this->set("b_areas", $b_areas);
				$i=0;
				foreach ($b_areas as $b_area)
					$bPointsRange[$i++] = $this->requestAction("/b_schools/getPointRange/" . $b_area['BArea']['id']);
				$this->set("b_points_range", $bPointsRange);
				$this->set("b_schools", $this->requestAction("/b_schools/getFromDideId/" . $province['Province']['id']));
				$this->set("region", $this->requestAction("/regions/getRegionFromId/" . $province['Province']['pde_id']));				
				$this->set("mapLink", $province['Province']['map_link']);
				$this->set("neighboors", $this->Province->find("all", array(
						'conditions' => array('Province.pde_id' => $province['Province']['pde_id'],
												'Province.id !=' => $id)
						)));
			}
		}
		function viewAll($ab=0)
		{
			/*
			  	$ab = 0 δείξε Πρωτοβάθμια και Δευτεροβάθμια
			  	 	= 1 δείξε μόνο Πρωτοβάθμια
			  	 	= 2 δείξε μόνο Δευτεροβάθμια
			*/
			if ($ab<0 || $ab>2)
				$ab=0;
			$data = $this->requestAction("/provinces/getAll");
			$this->set("data", $data);
			$this->set("ab", $ab);
		}	
	}
?>
