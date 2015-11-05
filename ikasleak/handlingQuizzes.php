<!DOCTYPE html>
<html>
	<head>
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
		<title>Insert question</title>
		<script type="text/javascript" language="javascript">
			
			XMLHttpRequestObject = new XMLHttpRequest();
			XMLHttpRequestObject.onreadystatechange = function(){
				//alert(XMLHttpRequestObject.readyState);
				if((XMLHttpRequestObject.readyState==4)&&(XMLHttpRequestObject.status==200)){
					document.getElementById("galderak").innerHTML=XMLHttpRequestObject.responseText;
				}
			}
			
			
			function sortuGaldera(){
				var email= document.getElementById("emaila");
				var konexi=document.getElementById("kon");
				var gald=document.getElementById("galdera");
				var eran=document.getElementById("erantzuna");
				var balioa;
				if (document.getElementById('r1').checked) {
					balioa = document.getElementById('r1').value;
					}else if (document.getElementById('r2').checked) {
					balioa = document.getElementById('r2').value;
					}else if (document.getElementById('r3').checked) {
					balioa = document.getElementById('r3').value;
					}else  if(document.getElementById('r4').checked){
					balioa = document.getElementById('r4').value;
					}else{
					balioa = document.getElementById('r5').value;
					}
				XMLHttpRequestObject.open("GET", "galderaGehitu.php?eposta="+email.value+"&konexioa="+konexi.value+"&galdera="+gald.value+"&erantzuna="+eran.value+"&balioa="+balioa, true);
				XMLHttpRequestObject.send(null);
				//XMLHttpRequestObject.getAllResponseHeaders();
				
			}
			
			function galderakIkusi(){
				var email= document.getElementById("emaila");
				XMLHttpRequestObject.open("GET", "galderakIkusi.php?eposta="+email.value, true);
				XMLHttpRequestObject.send();
			}
			
			
			
		</script>
	</head>
	<body>
		<br/>
		
		
		
		<div class="container-fluid inner" >
			<form id="erregistro" name="erregistro" method="POST" action="InsertQuestion.php" enctype="multipart/form-data">
				<input type="hidden" name="emaila" id="emaila" value="<?php echo $_GET['eposta']?>"/>
				<input type="hidden" name="kon" id="kon" value="<?php echo $_GET['konexioa']?>"/>
				Galdera(*): <input type="text" name="galdera" id="galdera" required placeholder="Galdera" /><br/><br/>
				Erantzuna(*): <input type="text" name="erantzuna" id="erantzuna" required placeholder="erantzun laburra"  pattern="[a-zA-Z0-9]([a-zA-Z0-9]|\s[a-zA-Z0-9])*"/><br/><br/>
				
				<label>Zailtasun maila(*):</label>
				<input type="radio" name="zailtasuna" id="r1" value="1" checked>1
				<input type="radio" name="zailtasuna" id="r2" value="2">2
				<input type="radio" name="zailtasuna" id="r3" value="3">3
				<input type="radio" name="zailtasuna" id="r4" value="4">4
				<input type="radio" name="zailtasuna" id="r5" value="5">5
				<br/><br/>
				<input type="button" value="Sortu galdera" onclick="sortuGaldera()"/>
				<input type="button" value="Galderak ikusi" onclick="galderakIkusi()"/>
			</form>
			<br/>
			<a  id="seeXMLQuestions" href='seeXMLQuestions.php'>See XML questions</a><br/>
			<a  id="home" href='layout.php'>Hasiera</a>
		</div>
		
		<div id="galderak" class="container-fluid inner">
			
		</div>
		
		
	</html>
