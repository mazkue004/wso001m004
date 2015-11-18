<?php
	session_start();
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	if($_SESSION['rola'] == 'irakasle'){
		$galdera="update galdera set Gtestua='$_GET[galdera]', Gerantzuna='$_GET[erantzuna]', Zailtasuna='$_GET[zailtasuna]' where Gzenb='$_GET[ida]'";
		if(!mysql_query($galdera)){
			die('Errorea:  '.mysql_error());
		}
		else echo 'Ondo gorde da galdera';
	}
	
	mysql_close();
	
	
	
?>