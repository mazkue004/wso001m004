<?php 
	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	//new nusoap_client
	//
	//new soap_server
	$soapclient = new nusoap_client('http://localhost:1234/wso001m004/ikasleak/egiaztatuPasahitza.php?wsdl', true);
	$result = $soapclient->call('pasahitza', array('x'=>$_GET['pass']));
	
	
	echo "Pasahitza: ".$result;


?>