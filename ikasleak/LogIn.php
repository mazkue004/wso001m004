<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	//Eposta eta pasahitza emaitza emateko
	$em = -1;
	
	//Eposta konprobatu
	if(isset($_POST['eposta']) && isset($_POST['pass'])){
		if(!filter_var($_POST['eposta'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.eu?s/"))) === false){
			$erab = mysql_query("select Eposta,Pasahitza from erabiltzaile where Eposta='$_POST[eposta]'");
			if($erabiltzaile=mysql_fetch_array($erab)){
				$pasahitza = $erabiltzaile['Pasahitza'];
				if($_POST['pass'] == $pasahitza){
					$em=0;
					} else{
					$em=1;
					
				}
			}else{
				$em=3;
			}
			mysql_close();
		}else{
			$em = 2;
		}
	} 
?>

<!DOCTYPE html>

<html>
	<head>	
		<title>Log in</title>
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
			#loginGaizki{
			color:red;
			}
		</style>
	</head>
	<body>
		<br/>
		<div class="container-fluid inner" >
			<form id="erregistro" name="erregistro" method="POST" action="LogIn.php">
				Eposta elektronikoa(*): <input type="text" name="eposta" id="eposta" required placeholder="ehu001@ikasle.ehu.es"/> <br/><br/>
				Password(*): <input type="password" name="pass" id="pass" required /> <br/><br/>
				<input type="submit" value="Log in"/>
			</form>
			<?php 
				if ($em == 0){
					echo '<br/><label id="loginOndo">Log in ondo egin da</label><br/>';
					echo '<a  id="home" href="layout.html">Quiz</a><br/>';
					} else if($em == 1){
					echo '<br/><label id="loginGaizki">Pasahitza okerra</label><br/>';
				} 
				if($em == 2){
					echo '<br/><label id="loginGaizki">Eposta formatua okerra</label><br/>';
				}
				if($em == 3){
					echo '<br/><label id="loginGaizki">Emaila egokia da baina ez dago gordeta</label><br/>';
				}
			?>
			<br/>
			<a  id="home" href='layout.html'>Home</a>
		</div>
	</body>
</html>