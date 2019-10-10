<?php
	
	spl_autoload_register(function($classname) {
		$filename = 'classes/'.str_replace('\\', '/', $classname).'.php';
		if (file_exists($filename)) {require_once $filename;}
	});

	$model = new Catalog\CatalogModel();
	$controller = new Catalog\CatalogController($model);
	$view = new Catalog\CatalogView($controller, $model);
	
	if(isset($_GET['action']) && !empty($_GET['action'])) {
		$controller->{$_GET['action']} ();
		echo $view->showProduct();
	} else {
		$controller->allProducts();
		echo $view->showAllProducts();
	}
	
?>