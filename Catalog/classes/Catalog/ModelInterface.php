<?php
namespace Catalog;

	interface ModelInterface {
		/*
			De constructor moet een connectie leggen met de database (PDO of MySQLi),
			Zet de databaseconnectie in een try/catch blok zodat eventuele
			exceptions kunnen worden opgevangen.
			
			Ook moet de constructor de template en stylesheet opslaan in
			de properties. Deze mogen beide in eerste instantie hard coded.
			
			PLUS: maak een alternatieve stylesheet met afwijkende kleuren, bijv.
			een kerstthema. Zorg ervoor dat in één maand van het jaar automatisch deze stylesheet wordt ingeladen ipv. de andere.			
		*/
		public function __construct();
		
		
		/*
			Deze method moet één of meerdere queries uitvoeren op de database
			om alle benodigde productinformatie op te halen. Deze moet worden
			opgeslagen als een array in de $_data property.
			
			Om een goede query op te bouwen dien je gebruik te maken van
			de properties $_lang en $_limit. $_lang heb je nodig zodat je weet
			uit welke tabel je productbeschrijving moet halen, $_limit heb je
			nodig zodat je weet hoeveel producten je moet ophalen.
			
			LET OP: de data van één product is dus verdeeld over twee verschillende
			tabellen: één met de algemene informatie en één met de beschrijvende
			teksten. Gebruik hiervoor dus JOINs van SQL!
			
			Op de indexpagina is geen plek voor lange omschrijvingen. Zorg er
			dus voor dat elke productomschrijving automatisch wordt ingekort tot
			maximaal 200 tekens.			
			
			Zet het uitvoeren van de query en opslaan van de data in een try/catch
			blok zodat eventuele exceptions kunnen worden opgevangen.
		*/
		public function findAllProducts();
		
		
		/*
			Deze method moet een meegegeven taal opslaan in de $_lang property, zodat de controller deze method kan aanroepen wanneer er $_GET, $_POST en/of $_COOKIE data bekend is.
			
			Tevens moet deze method één van de taalbestanden
			(in de submap "/languages") en de inhoud daarvan opslaan in de $_vocabulary property. 
			
			Ook moet de method een cookie zetten met de gekozen taal zodat
			een eventuele taalkeuze bewaard kan blijven.
		*/
		public function setLang($lang);
		
		
		/*
			Deze method moet een meegegeven limiet opslaan in de $_limit property,
			zodat de controller deze method kan aanroepen wanneer er $_GET of
			$_POST data bekend is.
		*/
		public function setLimit($limit);		
		
		
		/*
			Deze method moet simpelweg de opgeslagen template returnen,
			zodat de View deze later kan opvragen.
		*/
		public function getTemplate();
		
		
		/*
			Deze method moet simpelweg de opgeslagen stylesheet returnen,
			zodat de View deze later kan opvragen.
		*/		
		public function getStylesheet();
		
		
		/*
			Deze method moet simpelweg de array met alle producten returnen,
			zodat de View deze later kan opvragen.
		*/		
		public function getData();
	
			
		/*
			Deze method moet simpelweg de array met alle vertalingen returnen,
			zodat de View deze later kan opvragen.
		*/				
		public function getVocabulary();
	}

?>