<?php 
	
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$email=$_GET['eposta'];
	
	$sql1="SELECT COUNT(Gzenb) from galdera ";
	$sql2="SELECT COUNT(Gzenb) from galdera where Eposta = '$email' ";
	$guztira=mysql_fetch_array(mysql_query($sql1));
	$nireak=mysql_fetch_array(mysql_query($sql2));
	echo "Nire galderak/Galderak guztira DB: ".$nireak[0]."/".$guztira[0];
	echo "<br/><br/><br/>". date("h:i:sa");
	mysql_close();
		
?>