<?php
namespace Catalog;

	class CatalogModel implements ModelInterface {
		private $_dbh; 				// De actieve databaseconnectie
		private $_data;				// De opgehaalde data
		private $_template; 		// De template die ingeladen moet worden
		private $_stylesheet; 		// De stylesheet die ingeladen moet worden
		private $_limit; 			// Het aantal producten dat getoond moet worden (opgehaald uit de $_POST of $_GET)
		private $_lang; 			// De taal waarin de tekst moet verschijnen (opgehaald uit de $_POST of $_GET)
		private $_vocabulary; 		// De opgehaalde tekst uit de language file die bij de huidige taal hoort
		
		use \DatabaseTrait;
		
		public function __construct() {
			$this->_dbh = \DatabaseTrait::makeConnection();
			$this->_template = 'templates/template.php';
			
			$day = \date('d');
			$month = \date('m');
			if($day == 25 || $day == 26 && $month == 12) {
				$this->_stylesheet = 'css/styleChristmas.css';
			} else {$this->_stylesheet = 'css/style.css';}
		}
		
		public function findAllProducts() {
			$limit = $this->_limit;
			try {
				$ps = $this->_dbh->query("SELECT * FROM products LEFT JOIN descriptions_$this->_lang ON products.id = descriptions_$this->_lang.id LIMIT $limit");
				$ps->setFetchMode(\PDO::FETCH_ASSOC);
				$data = [];
				while($row = $ps->fetch()) {
					$row['name'] = $row['name'];
					$data[] = $row;
				}
				$this->_data = $data;
			}
			catch(PDOException $e) {echo $e->getMessage();}
		}
		
		public function findProduct($id) {
			try {
				$ps = $this->_dbh->prepare("SELECT * FROM products LEFT JOIN descriptions_$this->_lang ON products.id = descriptions_$this->_lang.id WHERE products.id=?");
				$ps->bindParam(1,$id);
				$ps->execute();
				$ps->setFetchMode(\PDO::FETCH_ASSOC);
				$this->_data = $ps->fetch();
			}
			catch(PDOException $e) {echo $e->getMessage();}
		}
		
		public function setLang($lang) {
			$this->_lang = $lang;
			if(file_exists('xml/vocabulary.xml')) {
				$vocabulary = [];
				$xml = simplexml_load_file('xml/vocabulary.xml');
				$vocabulary['title'] = $xml->title->$lang;
				$vocabulary['header'] = $xml->header->$lang;
				$vocabulary['footer'] = $xml->footer->$lang;
				$this->_vocabulary = $vocabulary;
			} elseif(file_exists('languages/'.$this->_lang.'.php')) {
				require_once 'languages/'.$this->_lang.'.php';
				$this->_vocabulary = $vocabulary;
			} else {require_once 'languages/nl.php';}
			setcookie('lang', $this->_lang);
		}
		
		public function setLimit($limit) {
			$this->_limit = $limit;
			setcookie('limit', $this->_limit);
		}
		
		public function getTemplate() {
			return $this->_template;
		}
		
		public function getStylesheet() {
			return $this->_stylesheet;
		}
		
		public function getData() {
			return $this->_data;
		}
		
		public function getVocabulary() {
			return $this->_vocabulary;
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
		
		public function __destruct() {
			$this->_dbh = null;
			return 'Destroying: this object.';
		}
		
		public function __debugInfo() {
			$info = [];
			foreach( $this->_data as $key => $value) {
				$info[] = $key.' = '.$value;
			}
			return $info;
		}
		
		
	
	}

?>