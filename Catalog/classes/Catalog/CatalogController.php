<?php
namespace Catalog;

	class CatalogController implements ControllerInterface {
		private $_model;
		
		public function __construct($model) {
			$this->_model = $model;
			
			if(isset($_GET['lang']) && !empty($_GET['lang'])) {
				$this->_model->setLang($_GET['lang']);
			} elseif(isset($_COOKIE['lang'])) {
				$this->_model->setLang($_COOKIE['lang']);
			} else {$this->_model->setLang('nl');}
			
			if(isset($_GET['limit']) && !empty($_GET['limit'])) {
				$this->_model->setLimit($_GET['limit']);
			} else {$this->_model->setLimit('12');}
		}
		
		public function allProducts() {
			$this->_model->findAllProducts();
		}
		
		public function product() {
			if(isset($_GET['id']) && !empty($_GET['id'])) {
				$this->_model->findProduct($_GET['id']);
			} else {
				$this->_model->findProduct('1');
			}
		}
		
		public function __call($method,$args) {
			return 'De methodUser::'.$method.' is niet gedeclareerd';
		}
		
		public function __set($property, $value) {
			return 'Kan geen waarde toekennen aan onbestaande property $'.$property.'.';
		}
		
		public function __get($property) {
			if(isset($this->_data[$property])) {
				return $this->_data[$property];
			}
		}
		
		public function __isset($property) {
			return isset($this->_data[$property]);
		}
		
		public function __unset($name) {
			return '__unset is aangeroepenvoor"'.$name.'"';
		}
		
	}

?>