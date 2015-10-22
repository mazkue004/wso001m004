

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
		
	</head>
	<body>
		<br/>
		<div class="container-fluid inner" >
		<form id="erregistro" name="erregistro" method="POST" action="ErregistratuArgazkiakin.php" onsubmit="return ikusBalioak()" enctype="multipart/form-data">
			<input type="hidden" name="eposta" id="eposta" value="<?php echo $_GET['eposta'];?>"/>
			Galdera(*): <input type="text" name="galdera" id="galdera" required placeholder="Galdera" /><br/><br/>
			Erantzuna(*): <input type="text" name="erantzuna" id="erantzuna" required placeholder="erantzun laburra"  pattern="[a-zA-Z0-9]([a-zA-Z0-9]|\s[a-zA-Z0-9])*"/><br/><br/>
			
			<?php echo $_POST['eposta']?>
			<label>Zailtasun maila(*):</label>
			<input type="radio" name="zailtasuna" value="1" checked>1
			<input type="radio" name="zailtasuna" value="2">2
			<input type="radio" name="zailtasuna" value="3">3
			<input type="radio" name="zailtasuna" value="4">4
			<input type="radio" name="zailtasuna" value="5">5<br/><br/>
			<input type="submit" value="Sortu galdera"/>
		</form>
		<br/>
		<a  id="home" href='layout.html'>Home</a>
		</div>
	</body>
	</html>
