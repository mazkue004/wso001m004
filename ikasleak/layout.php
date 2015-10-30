<?php 
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
		mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$galdera=mysql_query("select * from galdera");
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Quizzes</title>
		<link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli:300,400" rel="stylesheet" type="text/css">
		<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
		<link rel='stylesheet' type='text/css' media='only screen and (min-width: 530px) and (min-device-width: 481px)' href='stylesPWS/wide.css' />
		<link rel='stylesheet' type='text/css' media='only screen and (max-width: 480px)' href='stylesPWS/smartphone.css' />
		<style>
			body {
			font: 400 16px 'Muli', sans-serif !important;
			margin: 0;
			padding: 0;
			}
		</style>
		<script>
		function gald(){
			<?php
				ini_set('date.timezone', 'Europe/Berlin');
				$time1 = date('H:i:s',time());
				$ekin="INSERT INTO ekintzak(Kid, Eposta, Emota, Eordua, Kip)VALUES('000','anonimo', 'galdera kontsultatu', '$time1', '')";
				if(!mysql_query($ekin)){
					die('Errorea:  '.mysql_error());
					}
				?>
			document.getElementById("s1").innerHTML='<div><table><tr><td><strong> Galdera </strong></td><td><strong> Zailtasuna </strong></td></tr><?php while ($row = mysql_fetch_array($galdera)){echo '<tr><td>'.$row['Gtestua'].'</td> <td>'. $row['Zailtasuna'].'</td> </tr>';}mysql_close();?></table></div>';
		}
		//ini_set('date.timezone', 'Europe/Berlin');$time1 = date('H:i:s',time());$ekin="INSERT INTO ekintzak(Kid, Eposta, Emota, Eordua, Kip)VALUES('000','anonimo', 'galdera kontsultatu', '$time1', '$_SERVER[HTTP_CLIENT_IP]')";if(!mysql_query($ekin)){die('Errorea:  '.mysql_error());}
		</script>
	</head>
	<body>
		<div id='page-wrap'>
			<header class='main' id='h1'>
				<span class="right"><a href='LogIn.php'>Login</a></span>
				<span class="right"><a href='signUp5.html'>Sign up</a></span>
				<span class="right"><a href='IkusiErabiltzaileakArgazkiekin.php'>Ikusi erabiltzaileak</a></span>
				<span class="right" style="display:none;"><a href="/logout">Logout</a></span>
				<h2>Quiz: crazy questions</h2>
			</header>
			<nav class='main' id='n1' role='navigation'>
				<span><a href='layout.php'>Hasiera</a></span>
				<span><a href="javascript:gald();">Quizzes</a></span>
				<span><a href='credits.html'>Credits</a></span>
				<span><a href='seeQuestions.php'>See questions XSL</a></span>
			</nav>
			<section class="main" id="s1">
				<!--<div>
					<table>
						<tr>
							<td><strong>Galdera</strong></td><td><strong>Zailtasuna</strong></td>
						</tr>	
							
					<?php
						//while ($row = mysql_fetch_array($galdera)){
							//echo '<tr><td>'.$row['Gtestua'].'</td> <td>'. $row['Zailtasuna'].'</td> </tr>';
						//}
						//mysql_close();
					?>
					</table>
				</div>-->
			</section>
			<footer class='main' id='f1'>
				<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
				<a href='https://github.com'>Link GITHUB</a>
			</footer>
		</div>
	</body>
</html>
