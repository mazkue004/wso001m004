<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	//Besterik eremua aukeratzen bada
	$espezialitatea=$_POST['espezialitatea'];
	if($espezialitatea == 'bestea'){
		$espezialitatea = $_POST['besteEspezialitatea'];	
	}
	
	$erabepost = mysql_query("select Eposta from erabiltzaile where Eposta='$_POST[eposta]'");
	if(mysql_fetch_array($erabepost)){
		echo 'Eposta existitzen da, aldatu.';
		}else{
		$sql="INSERT INTO erabiltzaile(Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Erremintak, Argazkia) VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[eposta]','$_POST[pass]','$_POST[telefonoa]','$espezialitatea','$_POST[interesak]','$_POST[argazkia]')";
		if(!mysql_query($sql)){
			die('Errorea:  '.mysql_error());
		}
		echo 'Ondo gorde da';
		echo '<a  id="ikusi" href="IkusiErabiltzaileak.php">Ikusi erabiltzaileak</a>';
		mysql_close();
	}
	
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