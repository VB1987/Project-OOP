<html>
	<head>
		<title><?=$title?></title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="<?=$style?>">
	</head>
	<body>
		<div id="container">
			<header>
				
				<!-- Zorg hier voor een keuzemogelijkheid om een taal te kiezen. -->
				<div class="flags">
					<a href="?lang=nl"><img src="images/nl.png"></a>
					<a href="?lang=en"><img src="images/gb.png"></a>
				</div>
				<!-- Zorg hier voor een keuzemogelijkheid om de hoeveelheid weer
				te geven producten te kiezen. -->
				<form method="GET" action="?limit=<?=$_SERVER['REQUEST_URI'];?>">
					<select id="select" name="limit">
						<option value="2">2</option>
						<option value="4">4</option>
						<option value="6">6</option>
						<option value="8">8</option>
						<option value="10">10</option>
						<option value="12">12</option>
					</select>
					<input type="submit" value="Ga">
				</form>
				<?=$header;?>
			</header>
			<main>
				<?=$data;?>
			</main>
			<footer>
				<?=$footer;?>
			</footer>
		</div>
	</body>
</html>
