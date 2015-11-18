<?php 
	session_start();
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	
	
	ini_set('date.timezone', 'Europe/Berlin');
	$time1 = date('H:i:s',time());
	$ekin="INSERT INTO ekintzak(Eposta, Emota, Eordua, Kip)VALUES('$_SESSION[eposta]','galdera kontsultatu', '$time1', '')";
	if(!mysql_query($ekin)){
		die('Errorea:  '.mysql_error());
	}
	echo '<form id="galdEd" name="galdEd" method="POST" action="galderaEditatu.php"><div class="container-fluid inner"><table class="tableizer-table">';
	echo '<tr class="tableizer-firstrow"><th>  </th><th> Erabiltzailea </th><th> Galdera </th><th> Erantzuna </th><th> Konplexutasuna </th></tr>';
	$galdera="select * from galdera";
	$galde1=mysql_query($galdera);
	while ($row = mysql_fetch_array($galde1)){
		echo '<tr>'.'<td><input type="radio" value='.$row['Gzenb'].' name="auk" checked></td><td>'.$row['Eposta'].'</td>'.'<td>'.$row['Gtestua'].'</td>'.'<td>'.$row['Gerantzuna'].'</td>'.'<td>'. $row['Zailtasuna'].'</td> </tr>';
	}
	
	$galde=mysql_query($galdera);
	$gald=mysql_fetch_array($galde);
	if((!isset($gald[0])) || ($_SESSION['rola']!='irakasle')){
		echo '</table></div><input type="submit" value="Galdera editatu" disabled/></form>';
	}else{
		echo '</table></div><input type="submit" value="Galdera editatu"/></form>';
	}
	
	mysql_close();
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
	<!--<input type="button" value="Atzera" onclick="history.back()"/>-->
	<a id="home" href="layout.php">Logout</a>
	</body>
</html>