<?php
	class MunicipalitiesController extends AppController
	{
		var $name="Municipalities";
			
		function getFromAAreaId($areaId)
		{
			$conditions['Municipality.level_1'] = 5;
			$conditions['Municipality.a_area_id'] = $areaId;
			
			if (isset($this->params['requested']))
				return $this->Municipality->find('all', array('conditions'=>$conditions));
		}
		
		function getFromBAreaId($areaId)
		{
			$conditions['Municipality.level_1'] = 5;
			$conditions['Municipality.b_area_id'] = $areaId;
			
			if (isset($this->params['requested']))
				return $this->Municipality->find('all', array('conditions'=>$conditions));
		}
		
	}
	
	
?>
