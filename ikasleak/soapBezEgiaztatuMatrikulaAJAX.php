<?php 
	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	//new nusoap_client
	//
	//new soap_server
	$soapclient = new nusoap_client('http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', true);
	$result = $soapclient->call('Matriculas', $_GET['email']);
	echo $result;


?>