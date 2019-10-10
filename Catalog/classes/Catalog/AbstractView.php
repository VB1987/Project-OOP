<?php
namespace Catalog;

	abstract class AbstractView {
		protected $_model;
		protected $_controller;
		
		final public function __construct($controller, $model) {
			$this->_model = $model;
			$this->_controller = $controller;
		}
	}