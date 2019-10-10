<?php
namespace Catalog;

	interface ControllerInterface {
		/*
			De constructor moet de model inladen en zetten in een property,
			zoals gebruikelijk in een MVC setup.
			
			In de constructor moet op de eerste plaats gekeken worden of
			er een keuze is gemaakt voor een bepaalde taal dmv. de adresbalk
			of een formulier. Als dat niet het geval is, wordt er gekeken of
			er een taal bekend is uit de cookie. Is dat ook niet het geval,
			dan wordt standaard 'nl' geselecteerd. Deze voorkeur moet vervolgens
			worden doorgegeven aan de setLang() method van de model, zodat de
			taal kan worden opgeslagen voor de rest van de applicatie.
			
			Tevens moet er gekeken worden of er een keuze is gemaakt voor een limiet.
			Is dat niet het geval, pak dan standaard 12. Dit getal moet worden meegegeven aan de setLimit() method van de model, zodat de query hier rekening mee kan houden.

			Houd rekening met de mogelijkheid dat er zowel een taal als een limiet gekozen
			moeten kunnen worden. Deze mogen uiteraard niet met elkaar conflicteren.
		*/
		public function __construct($model);
		
		
		/*
			De controller vangt 'acties' af. In ons geval hebben we maar
			één actie - de standaardweergave van de site: een overzicht van
			alle producten. Deze method wordt dan ook altijd aangeroepen
			in index.php.
			
			In ons geval hoeft deze method dus niets anders te doen dan
			de findAllProducts() method van de model aan te roepen.
		*/
		public function allProducts();		
	}

?>