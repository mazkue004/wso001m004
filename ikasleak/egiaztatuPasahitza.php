<?php
	
	require_once('/lib/nusoap.php');
	require_once('/lib/class.wsdlcache.php');
	
	$ns = "http://localhost:1234/wso001m004/ikasleak/egiaztatuPasahitza.php?wsdl";
	$server = new soap_server;
	$server->configureWSDL('Pasahitza',$ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	
	$server->register('pasahitza', 
	array('x'=>'xsd:string','y'=>'xsd:string'), 
	array('z'=>'xsd:string'),
	$ns);
	
	function pasahitza($x,$y){
		$fitx = file('toppasswords.txt',true);
		$cont = count($fitx);
		$emaitza = 'ez';
		
		for($lerro = 0; $lerro != $cont; $lerro++){
			if(trim($fitx[$lerro]) == $x){ //trim-->karaktere txarrak kentzeko
				$emaitza='bai';
			}
		}
		if(($y!="") &&($x!= $y)){
			$emaitza='ezez';
		}
		return $emaitza;
		
	}
	
	$HTTP_RAW_POST_DATA = isset ($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?>