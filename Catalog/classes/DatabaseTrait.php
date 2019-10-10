<?php

	trait DatabaseTrait {
		
		public static function makeConnection() {
			$user = 'root';
			$password = '';
			$database = 't07m91';
			$host = 'localhost';
			
			try {
			$db = new \PDO('mysql:host='.$host.';dbname='.$database.'', $user, $password);
			$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			return $db;
			} catch(PDOException $e) {echo $e->getMessage();}
		}
		
	}