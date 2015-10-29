<?php 
	mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	
	$galdera=mysql_query("select * from galdera");
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
		<title>Quizzes</title>
		<link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
		<link rel='stylesheet' 
		type='text/css' 
		media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		href='stylesPWS/wide.css' />
		<link rel='stylesheet' 
		type='text/css' 
		media='only screen and (max-width: 480px)'
		href='stylesPWS/smartphone.css' />
		<style>
			body {
			font: 400 16px 'Muli', sans-serif !important;
			margin: 0;
			padding: 0;
			}
		</style>
		<script>
		function gald(){
			document.getElementById("s1").innerHTML='<div><table><tr><td><strong> Galdera </strong></td><td><strong> Zailtasuna </strong></td></tr><?php while ($row = mysql_fetch_array($galdera)){echo '<tr><td>'.$row['Gtestua'].'</td> <td>'. $row['Zailtasuna'].'</td> </tr>';} mysql_close();?></table></div>';
		}
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
