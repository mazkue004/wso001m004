<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	/*$route='argazkiak/';
		$gordetzekoArgazkia = $route . basename($_FILES['argazkia']['name']);
		if(move_uploaded_file($_FILES['argazkia']['tmp_name'], $gordetzekoArgazkia)){
		echo "File is valid";
		} else{
		echo "Possible error";
		}
	$pic = ($_FILES['argazkia']['name']);*/
	
	//Argazkia
	$argazkiEdukia =null;
	if($_FILES['argazkia']['size'] > 0)
	{
		$argazki = $_FILES['argazkia']['name'];
		$argazkiarenIzena  = $_FILES['argazkia']['tmp_name'];
		$argazkiaIriki      = fopen($argazkiarenIzena, 'r');
		$argazkiEdukia = fread($argazkiaIriki, filesize($argazkiarenIzena));
		$argazkiEdukia = addslashes($argazkiEdukia);
		fclose($argazkiaIriki);
		if(!get_magic_quotes_gpc())
		{
			$argazki = addslashes($argazki);
		}
	}
	
	//Besterik eremua aukeratzen bada
	if(isset($_POST['espezialitatea'])){
		$espezialitatea=$_POST['espezialitatea'];
		if(($espezialitatea == 'bestea')&&(isset($_POST['besteEspezialitatea']))){
			$espezialitatea = $_POST['besteEspezialitatea'];	
		}
	}
	
	if((isset($_POST['izena'])) &&(isset($_POST['abizena1'])) && (isset($_POST['abizena2'])) && (isset($_POST['eposta'])) &&(isset($_POST['pass'])) && (isset($_POST['pass1'])) && (isset($_POST['telefonoa']))){
		if((!filter_var($_POST['izena'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[A-Z]([a-zA-Z]|\s[a-zA-Z])*/"))) === false) &&
		(!filter_var($_POST['abizena1'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z]([a-zA-Z]|\s[a-zA-Z])*/"))) === false) &&
		(!filter_var($_POST['abizena2'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z]([a-zA-Z]|\s[a-zA-Z])*/"))) === false) &&
		(!filter_var($_POST['eposta'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.eu?s/"))) === false) &&
		(!filter_var($_POST['pass'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/.{6,}/"))) === false) &&
		($_POST['pass'] == $_POST['pass1']) &&
		(!filter_var($_POST['telefonoa'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(6|7|9)[0-9]{8}/"))) === false)){
			
			$erabepost = mysql_query("select Eposta from erabiltzaile where Eposta='$_POST[eposta]'");
			if(mysql_fetch_array($erabepost)){
				echo 'Eposta existitzen da, aldatu.';
				}else{
				$sql="INSERT INTO erabiltzaile(Izena, Abizena1, Abizena2, Eposta, Pasahitza, Telefonoa, Espezialitatea, Erremintak, Argazkia) VALUES ('$_POST[izena]','$_POST[abizena1]','$_POST[abizena2]','$_POST[eposta]','$_POST[pass]','$_POST[telefonoa]','$espezialitatea','$_POST[interesak]','$argazkiEdukia')";
				if(!mysql_query($sql)){
					die('Errorea:  '.mysql_error());
				}
				echo 'Ondo gorde da<br/>';
				echo '<a  id="ikusi" href="IkusiErabiltzaileakArgazkiekin.php">Ikusi erabiltzaileak</a>';
				mysql_close();
			}
			} else{
			echo 'Arazo bat egon da, ez da erabiltzailea gorde';
		}
		} else{
		echo 'Zuriunerenbat utzi duzu';
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