<?php 
	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	//new nusoap_client
	//
	//new soap_server
	$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', true);
	$result = $soapclient->call('comprobar', array('x'=>'$_GET[email]'));
	
	
	if($result=="NO"){
		echo 'Ez zaude irakasgaian matrikulatuta <input type = "hidden" id="matri" value="BAI"/>';
	}else if ($result=="SI"){
		echo '<input type = "hidden" id="matri" value="EZ"/>';
	}


?>