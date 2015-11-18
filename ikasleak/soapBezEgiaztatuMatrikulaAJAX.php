<?php 
	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	//new nusoap_client
	//
	//new soap_server
	$soapclient = new nusoap_client('http://wsrosaas.hol.es/webZerbitzuak/egiaztatuMatrikula.php?wsdl', true);
	$result = $soapclient->call('egiaztatu', array('x'=>$_GET['email']));
	
	
	if($result=='EZ'){
		echo 'Ez zaude irakasgaian matrikulatuta <input type = "hidden" id="matri" value="BAI"/>';
	}else if ($result=='BAI'){
		echo 'dfasdf<input type = "hidden" id="matri" value="EZ"/>';
	}


?>