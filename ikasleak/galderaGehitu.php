<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$xml = simplexml_load_file('galderak.xml');
	
	$email=$_GET['eposta'];
	$konexioa=$_GET['konexioa'];
	$galdera=$_GET['galdera'];
	$erantzuna=$_GET['erantzuna'];
	$balioa=$_GET['balioa'];
	
	if((isset($konexioa))&&(isset($email))&&(isset($galdera))&&(isset($erantzuna))&&(isset($balioa))){
		$sql="INSERT INTO galdera(Eposta, Gtestua, Gerantzuna, Zailtasuna) VALUES ('$email','$galdera','$erantzuna','$balioa')";
		if(!mysql_query($sql)){
			die('Errorea:  '.mysql_error());
		}
		$id = mysql_query("select Kid from konexioak where Eposta='$email' AND Kordua='$konexioa'");
		if($gordekod=mysql_fetch_array($id)){
			ini_set('date.timezone', 'Europe/Berlin');
			$time1 = date('H:i:s',time());
			$ekin="INSERT INTO ekintzak(Kid, Eposta, Emota, Eordua, Kip)VALUES('$gordekod[Kid]','$email', 'galdera txertatu', '$time1', '')";
			if(!mysql_query($ekin)){
				die('Errorea:  '.mysql_error());
			}
			echo 'Datu basean <b>'.$galdera.'</b> ondo gorde da.<br/>';
			mysql_close();
			
			$assessmentItem = $xml->addChild('assessmentItem');
			$assessmentItem->addAttribute('konplexutasuna', $balioa);
			$assessmentItem->addAttribute('subject', 'gaia');
			$itemBody=$assessmentItem->addChild('itemBody');
			$itemBody->addChild('p', $galdera);
			$correctResponse=$assessmentItem->addChild('correctResponse');
			$correctResponse->addChild('value',$erantzuna);
			$xml->asXML('galderak.xml');
			echo 'XML fitxategian <b>'.$galdera.'</b> gorde da.<br/>';
			
			//echo '<script> alert("Ondo gorde da");</script>';
			//header("Location: InsertQuestion.php?eposta=".$_POST['emaila']."&konexioa=".$_POST['kon']);
			//exit;
		}
		
	}
?>