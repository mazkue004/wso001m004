<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	
	
	$erabiltzaile = mysql_query("select * from erabiltzaile");
	echo '<table border=1><tr><th> IZENA </th><th> 1. ABIZENA </th><th> 2. ABIZENA </th><th> EPOSTA </th><th> TELEFONOA </th><th> ESPEZIALITATEA </th><th> ERREMINTAK </th><th> ARGAZKIA </th></tr>';
	while( $row = mysql_fetch_array( $erabiltzaile) ) {
		echo '<tr><td>'.$row['Izena'].'</td> <td>'. $row['Abizena1'].'</td> <td>'.$row['Abizena2'].'</td><td>'.$row['Eposta'].'</td><td>'.$row['Telefonoa'].'</td><td>'.$row['Espezialitatea'].'</td><td>'.$row['Erremintak'].'</td><td>'.$row['Argazkia'].'</td></tr>';
	}
	echo '</table>';
	
?>

<!DOCTYPE html>

<html>
	<head>	
		<title>Erregistratu</title>
		<meta name="generator"
		content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet" type="text/css">
		<style>
			body {
			font: 400 16px 'Muli', sans-serif !important;
			margin: 0;
			padding: 0;
			}
		</style>
	</head>
	<body>
	</body>
</html>