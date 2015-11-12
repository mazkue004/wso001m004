<?php

	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	
	$ns = "egiaztatuPasahitza.php?wsdl";
	$server = new nusoap_server();
	$server->configureWSDL('pass',$ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	
	$server->register('pass', 
	array('x'=>'xsd:string'), 
	array('z'=>'xsd:string'),
	$ns);
	
	function pass($x){
		return $x;
	}
	
	$HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>