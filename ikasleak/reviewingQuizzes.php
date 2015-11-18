<?php 
	session_start();
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$galdera=mysql_query("select * from galdera");
	
	
	ini_set('date.timezone', 'Europe/Berlin');
	$time1 = date('H:i:s',time());
	$ekin="INSERT INTO ekintzak(Kid, Eposta, Emota, Eordua, Kip)VALUES('000','$_SESSION[eposta]','galdera kontsultatu', '$time1', '')";
	if(!mysql_query($ekin)){
		die('Errorea:  '.mysql_error());
	}
	echo '<form id="galdEd" name="galdEd" method="POST" action="galderaEditatu.php"><div class="container-fluid inner"><table class="tableizer-table">';
	echo '<tr class="tableizer-firstrow"><th>  </th><th> Erabiltzailea </th><th> Galdera </th><th> Erantzuna </th><th> Konplexutasuna </th></tr>';
	while ($row = mysql_fetch_array($galdera)){
		echo '<tr>'.'<td><input type="radio" value='.$row['Gzenb'].' name="auk"></td><td>'.$row['Eposta'].'</td>'.'<td>'.$row['Gtestua'].'</td>'.'<td>'.$row['Gerantzuna'].'</td>'.'<td>'. $row['Zailtasuna'].'</td> </tr>';
	}
	mysql_close();
	echo '</table></div><input type="submit" value="Galdera editatu"/></form>';
?>

<html>
	<head>	
		<title>Irakasle</title>
		<meta name="generator"
		content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet" type="text/css">
		<link rel='stylesheet' type='text/css' href='stylesPWS/credits.css' />
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