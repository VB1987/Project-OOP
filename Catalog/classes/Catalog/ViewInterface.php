<?php
namespace Catalog;

	interface ViewInterface {
		/*
			De constructor moet de model en controller inladen en zetten in
			de properties, zoals gebruikelijk in een MVC setup.
		*/
		public function __construct($controller, $model);
		
		
		/*		
			Allereerst moet hier de getStylesheet() method worden aangeroepen om
			de in de model gekozen stylesheet op te slaan in een variabele. Deze variabele
			kan rechtstreeks gebruikt worden in het <style> element van je template.
			
			Ook moet hier de inhoud van de array met de juiste vertalingen opgehaald worden dmv.
			de getVocabulary() method uit de model. De inhoud van de titel wordt opgeslagen in
			een variabele, die rechtstreeks in het <title> element van je template geplaatst kan
			worden. De inhoud van de footertekst wordt ook opgeslagen in een variabele, die ook
			rechtstreeks in een <span> binnen je <footer> geplaatst kan worden.
			
			Ga vervolgens één lange $data string opstellen. Deze zal de volledige inhoud
			van het contentblok <main> moeten bevatten. Sla eerst de tekst van het kopje
			op in een <h1> element binnen $data. Voeg alles wat er nu bij gaat komen toe
			met de verkorte notatie "$data .= ....".
			
			Gebruik vervolgens een foreach loop om door al je producten heen te loopen.
			Deze kan je opvragen dmv. $this->_model->getData(). Zorg ervoor dat elk product
			in een <article> element wordt geplaatst. Laat van elk product de naam, de prijs,
			de omschrijving en de afbeelding zien. Zorg wel dat je de afbeelding kleiner maakt
			dmv. de width en height attributen van HTML, anders ziet het er niet netjes uit.
			
			Bepaal zelf hoe je dit overzichtelijk kan weergeven: je kan ervoor kiezen om alle
			producten onder elkaar te tonen, maar je kan er ook voor kiezen om alle artikelen
			in rijen onder te verdelen dmv. floats.
						
			Nadat je de $style, $title, $footertext en $data variabelen hebt voorbereid,
			kan je met de method getTemplate() de template inladen met require_once().
		*/
		public function showAllProducts();		
	}

?>