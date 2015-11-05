<?php 

mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("quiz") or die(mysql_error());
	/*mysql_connect("mysql.hostinger.es","u875011436_mazk","123456") or die(mysql_error());
	mysql_select_db("u875011436_quiz") or die(mysql_error());*/
	
	$galdera=mysql_query("select * from galdera");
	
	echo '<div class="container-fluid inner"><table class="tableizer-table">';
	echo '<tr class="tableizer-firstrow"><th> Galdera </th><th> Erantzuna </th><th> Zailtasuna </th></tr>';
	while( $row = mysql_fetch_array( $galdera) ) {
				
			echo '<tr><td>'.$row['Gtestua'].'</td> <td>'. $row['Gerantzuna'].'</td> <td>'.$row['Zailtasuna'].'</td></tr>';
		
	}
	echo '</table></div>';
			


?>