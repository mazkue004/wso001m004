<?php  
	
	session_start();
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$galdera=mysql_query("select * from galdera where Gzenb='$_POST[auk]'");
	$row = mysql_fetch_array($galdera);
	mysql_close();

	
?>
<html>
	<head>	
		<title>Galdera editatu</title>
		<meta name="generator"
		content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet" type="text/css">
		<link rel='stylesheet' type='text/css' href='stylesPWS/credits.css' />
		<style>
			body {
			font: 400 16px 'Muli', sans-serif !important;
			margin: 0;
			padding: 0;
			}
		</style>
		<script>
		function editatuGaldera(){
		XMLHttpRequestObject = new XMLHttpRequest();
			XMLHttpRequestObject.onreadystatechange = function(){
				//alert(XMLHttpRequestObject.readyState);
				if((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){
					document.getElementById("galderak").innerHTML=XMLHttpRequestObject.responseText;
				}
			}
			var ida= document.getElementById("ida");
			var galdera= document.getElementById("Gtestua");
			var erantzuna= document.getElementById("Gerantzuna");
			var zailtasuna= document.getElementById("Zailtasuna");
			
				XMLHttpRequestObject.open("GET", "galderaEditatuGorde.php?ida="+ida.value+"&galdera="+galdera.value+"&erantzuna="+erantzuna.value+"&zailtasuna="+zailtasuna.value, true);
				XMLHttpRequestObject.send();
			
		}
		</script>
	</head>
	<body>
		<div class="container-fluid inner">
		<input type="hidden" id="ida" value="<?php echo $row['Gzenb']?>">
		<table class="tableizer-table">
			<tr class="tableizer-firstrow"><th> Erabiltzailea </th><th> Galdera </th><th> Erantzuna </th><th> Konplexutasuna </th></tr>
			<tr><td><?php echo $row['Eposta']?></td><td><input type="text" id="Gtestua" value='<?php echo $row['Gtestua']?>'></td><td><input type="text" id="Gerantzuna" value='<?php echo $row['Gerantzuna']?>'></td><td><input type="text" id="Zailtasuna" value='<?php echo $row['Zailtasuna']?>'></td> </tr>
		</table>
		<input type="button" value="Galdera editatu" onclick="editatuGaldera()"/>		
		<input type="button" value="Atzera" href="reviewingQuizzes.php"/>		
		</div>
		<div id="galderak" class="container-fluid inner"/>
		
	</body>
</html>