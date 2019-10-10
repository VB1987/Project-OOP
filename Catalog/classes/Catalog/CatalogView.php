<?php
namespace Catalog;

	class CatalogView extends AbstractView implements ViewInterface {
		
		public function showProduct(){
			$vocabulary = $this->_model->getVocabulary();
			$style = $this->_model->getStylesheet();
			$lang = $_COOKIE['lang'];
			
			$title = $vocabulary['title'];
			$header = '<h1>'.$vocabulary['header'].'</h1>';
			$footer = '<span>'.$vocabulary['footer'].'</span>';
			
			$data = '<div id="singleProduct">';
			$data .= '<h5><a href="index.php">Terug...</a></h5>';
			$data .= '<article class="singleProduct">';
			$data .= '<h2 class="name">'.$this->_model->getData()['name'].'</h2>'; 
			$data .= '<p class="price"><strong>&euro; '.$this->_model->getData()['price'].'</strong></p>';
			$data .= '<p class="description">'.$this->_model->getData()['description'].'</p>';
			$data .= '<img class="image" src=images/'.$this->_model->getData()['image'].' alt="'.$this->_model->getData()['name'].'">';
			$data .= '</article>';
			$data .= '</div>';
			
			require_once($this->_model->getTemplate());
		}
		
		public function showAllProducts() {
			$vocabulary = $this->_model->getVocabulary();
			$style = $this->_model->getStylesheet();
			$lang = $_COOKIE['lang'];
			
			$title = $vocabulary['title'];
			$header = '<h1>'.$vocabulary['header'].'</h1>';
			$footer = '<span>'.$vocabulary['footer'].'</span>';
			
			$data = '<div id="multipleProducts">';
			foreach($this->_model->getData() as $key => $value) {
				$data .= '<article class="multipleProducts">';
				$data .= '<h2 class="name"><a href="?action=product&id='.$this->_model->getData()[$key]['id'].'">'.$this->_model->getData()[$key]['name'].'</a></h2>';
				$data .= '<p class="price"><strong>&euro; '.$this->_model->getData()[$key]['price'].'</strong></p>';
				$data .= '<p class="description">'.substr($this->_model->getData()[$key]['description'], 0, 200).'...</p>';
				$data .= '<a href="?action=product&id='.$this->_model->getData()[$key]['id'].'"><img class="image" src=images/'.$this->_model->getData()[$key]['image'].' alt="'.$this->_model->getData()[$key]['name'].'"></a>';
				$data .= '</article>';
			}
			$data .= '</div>';
			require_once($this->_model->getTemplate());
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