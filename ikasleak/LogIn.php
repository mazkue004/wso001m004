<?php
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	//Eposta eta pasahitza emaitza emateko
	$em = -1;
	
	
	//Eposta konprobatu
	if(isset($_POST['eposta']) && isset($_POST['pass'])){
		if(!filter_var($_POST['eposta'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-zA-Z]+[0-9]{3}\@ikasle\.ehu\.eu?s/"))) === false){
			$erab = mysql_query("select Eposta,Pasahitza,Rola from erabiltzaile where Eposta='$_POST[eposta]'");
			if($erabiltzaile=mysql_fetch_array($erab)){
				$pasahitza = $erabiltzaile['Pasahitza'];
				$rola = $erabiltzaile['Rola'];
				if($_POST['pass'] == $pasahitza){
					//Korreoa eta pasahitza egokiak
					$em=0;
					} else{
					//Korreoa egokia eta pasahitza desegokia
					$em=1;
					
				}
			}else{
				//Korreo formato egokia, baina erregistratu gabe
				$em=3;
			}
			//mysql_close();
		}else{
			//Korreo formato desegokia
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
				Eposta elektronikoa(*): <input type="text" name="eposta" id="eposta" value="<?php if(!empty($_POST['eposta'])) echo htmlentities($_POST['eposta']);?>" required placeholder="ehu001@ikasle.ehu.es"/> <br/><br/>
				Password(*): <input type="password" name="pass" id="pass" required /> <br/><br/>
				<input type="submit" value="Log in"/>
			</form>
			<?php 
				if ($em == 0){
				
					
					echo '<br/><label id="loginOndo">Log in ondo egin da</label><br/>';
					
					if($rola=='ikasle'){
						ini_set('date.timezone', 'Europe/Berlin');
						$time1 = date('H:i:s',time());
						$konex ="INSERT INTO konexioak(Eposta, Kordua) VALUES ('$_POST[eposta]','$time1')";
						if(!mysql_query($konex)){
							die('Errorea:  '.mysql_error());
						}
						echo 'Ondo gorde da<br/>';
						mysql_close();
						//header("Location: InsertQuestion.php?eposta=".$_POST['eposta']."&konexioa=".$time1);
						header("Location: handlingQuizzes.php?eposta=".$_POST['eposta']."&konexioa=".$time1);
						exit;
					}else{
						header("Location: getUserInform.html");
						exit;
					}
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
			<a  id="home" href='layout.php'>Hasiera</a>
		</div>
	</body>
</html>