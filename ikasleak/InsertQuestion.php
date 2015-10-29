<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$xml = simplexml_load_file('galderak.xml');
	
	if((isset($_POST['kon']))&&(isset($_POST['emaila']))&&(isset($_POST['galdera']))&&(isset($_POST['erantzuna']))&&(isset($_POST['zailtasuna']))){
		
		
		$sql="INSERT INTO galdera(Eposta, Gtestua, Gerantzuna, Zailtasuna) VALUES ('$_POST[emaila]','$_POST[galdera]','$_POST[erantzuna]','$_POST[zailtasuna]')";
		if(!mysql_query($sql)){
			die('Errorea:  '.mysql_error());
		}
		$id = mysql_query("select Kid from konexioak where Eposta='$_POST[emaila]' AND Kordua='$_POST[kon]'");
		if($gordekod=mysql_fetch_array($id)){
			ini_set('date.timezone', 'Europe/Berlin');
			$time1 = date('H:i:s',time());
			$ekin="INSERT INTO ekintzak(Kid, Eposta, Emota, Eordua, Kip)VALUES('$gordekod[Kid]','$_POST[emaila]', 'galdera txertatu', '$time1', '')";
			if(!mysql_query($ekin)){
				die('Errorea:  '.mysql_error());
			}
			mysql_close();
			
			$assessmentItem = $xml->addChild('assessmentItem');
			$assessmentItem->addAttribute('konplexutasuna', $_POST['zailtasuna']);
			$assessmentItem->addAttribute('subject', 'gaia');
			$itemBody=$assessmentItem->addChild('itemBody');
			$itemBody->addChild('p', $_POST['galdera']);
			$correctResponse=$assessmentItem->addChild('correctResponse');
			$correctResponse->addChild('value',$_POST['erantzuna']);
			$xml->asXML('galderak.xml');
				
			echo '<script> alert("Ondo gorde da");</script>';
			
			header("Location: InsertQuestion.php?eposta=".$_POST['emaila']."&konexioa=".$_POST['kon']);
			exit;
		}
		
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
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
		<title>Insert question</title>
		
	</head>
	<body>
		<br/>
		<div class="container-fluid inner" >
			<form id="erregistro" name="erregistro" method="POST" action="InsertQuestion.php" enctype="multipart/form-data">
				<input type="hidden" name="emaila" id="emaila" value="<?php echo $_GET['eposta']?>"/>
				<input type="hidden" name="kon" id="kon" value="<?php echo $_GET['konexioa']?>"/>
				Galdera(*): <input type="text" name="galdera" id="galdera" required placeholder="Galdera" /><br/><br/>
				Erantzuna(*): <input type="text" name="erantzuna" id="erantzuna" required placeholder="erantzun laburra"  pattern="[a-zA-Z0-9]([a-zA-Z0-9]|\s[a-zA-Z0-9])*"/><br/><br/>
				
				<label>Zailtasun maila(*):</label>
				<input type="radio" name="zailtasuna" value="1" checked>1
				<input type="radio" name="zailtasuna" value="2">2
				<input type="radio" name="zailtasuna" value="3">3
				<input type="radio" name="zailtasuna" value="4">4
				<input type="radio" name="zailtasuna" value="5">5<br/><br/>
				<input type="submit" value="Sortu galdera" onclick="javascript:alert('ondo gorde da');"/>
			</form>
			<br/>
			<a  id="seeXMLQuestions" href='seeXMLQuestions.php'>See XML questions</a><br/>
			<a  id="home" href='layout.php'>Hasiera</a>
		</div>
	</body>
</html>
