<?php

	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	
	$ns = "egiaztatuPasahitza.php?wsdl";
	$server = new soap_server;
	$server->configureWSDL('pasahitza',$ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	
	$server->register('pasahitza', 
	array('x'=>'xsd:string'), 
	array('z'=>'xsd:string'),
	$ns);
	
	function pasahitza($x){
		return $x;
	}

	$HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>