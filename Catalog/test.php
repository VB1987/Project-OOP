<?php

	$buildInClasses = get_declared_classes();
	
	spl_autoload_register(function($classname) {
		$filename = 'classes/'.str_replace('\\', '/', $classname).'.php';
		if (file_exists($filename)) {require_once $filename;}
	});

	echo '<hr>';

	$model = new Catalog\CatalogModel();
	$controller = new Catalog\CatalogController($model);
	$view = new Catalog\CatalogView($controller, $model);
	
	$allClasses = get_declared_classes();
	$resultClasses = array_diff($allClasses, $buildInClasses);
	echo '<pre>';
	print_r($resultClasses);
	echo '</pre>';
	
	if(class_exists('Catalog\CatalogModel')) {
		$vars = get_class_vars(get_class($model));
		foreach($vars as $vars_name ) {
			echo $vars.' : '.$vars_name.'<br>';
		}
		
		$method = get_class_methods('Catalog\CatalogModel');
		$method = get_class_methods(new Catalog\CatalogModel);
		foreach($method as $method_name) {
			echo $method_name.'<br>';
		}
	}
	
	echo '<hr>';
	
	if(class_exists('Catalog\CatalogView')) {
		$vars = get_class_vars(get_class($view));
		foreach($vars as $vars_name ) {
			echo $vars.' : '.$vars_name.'<br>';
		}
		
		$method = get_class_methods('Catalog\CatalogView');
		$method = get_class_methods(new Catalog\CatalogView($controller, $model));
		foreach($method as $method_name) {
			echo $method_name.'<br>';
		}
	}
	
	echo '<hr>';
	
	if(class_exists('Catalog\CatalogController')) {
		$vars = get_class_vars(get_class($view));
		foreach($vars as $vars_name ) {
			echo $vars.' : '.$vars_name.'<br>';
		}
		
		$method = get_class_methods('Catalog\CatalogController');
		$method = get_class_methods(new Catalog\CatalogController($model));
		foreach($method as $method_name) {
			echo $method_name.'<br>';
		}
	}