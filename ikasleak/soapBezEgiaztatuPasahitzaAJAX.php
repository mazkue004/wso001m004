<?php 
	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	//new nusoap_client
	//
	//new soap_server
	$soapclient = new nusoap_client('egiaztatuPasahitza.php?wsdl', true);
	$result = $soapclient->call('pasahitza', array('x'=>'$_GET[pass]'));
	
	
	echo $result."kaixo";


?>