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