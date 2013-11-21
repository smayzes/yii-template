<?php

class CModelHelper
{
	public function getModels($exclude = array()) {
		$models = array();
		$models_dir = Yii::getPathOfAlias("application.models");
		$dh = opendir($models_dir);
		if ( $dh !== false ) {
		    $matches = array();
		    while ( ($model_file_name = readdir($dh)) !== false) {
		    	if ( !in_array(str_replace('.php', '', $model_file_name), $exclude) ) {
			        if ( preg_match("/^([A-Za-z0-9]+)\.php$/", $model_file_name, $matches) )
			            $models[$matches[1]] = $matches[1];
				}
		    }
		    closedir($dh);
		}
		return $models;
	}
	
	public function getActionMethods($model_name) {
		$result = array();
		$declaredClasses = get_declared_classes();
		$controller = Yii::getPathOfAlias('application.controllers') . "/".ucfirst($model_name)."Controller.php";
		$class = basename($controller, ".php");
		if (!in_array($class, $declaredClasses))
		    Yii::import("application.controllers." . $class, true);
  		$reflection = new ReflectionClass($class); 
  		$methods = $reflection->getMethods();
  		
  		foreach ( $methods as $method ) {
  			if ( strpos($method->name, 'action') === 0 && $method->name != 'actions' ) {
	  			$name =  str_replace('action', '', $method->name);
		  		$result[] = $name;
		  	}
		}
		return $result;
	}
}