<?php
	$xml=simplexml_load_file("galderak.xml")or die("Error: Cannot create object");;
	
	echo "<div class='container-fluid inner'>
			<table class='tableizer-table'>
				<tr class='tableizer-firstrow'><th>Enuntziatua</th><th>Konplexutasuna</th><th>Gaia</th></tr>";
	foreach($xml->children() as $assessmentItem){
			echo "<tr><td>".$assessmentItem->children()->children()->p."</td><td>".$assessmentItem['konplexutasuna']."</td><td>".$assessmentItem['subject']."</td></tr>";	
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Credits</title>
		<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet" type="text/css">
		<link rel='stylesheet' type='text/css' href='stylesPWS/credits.css' />
	</head>
	<body>
	</body>
</html>