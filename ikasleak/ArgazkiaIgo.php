<?php
echo "kaixo";
echo'<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="container-fluid inner" >
		<form id="erregistro" name="erregistro" method="POST" action="ErregistratuArgazkiakin.php" onsubmit="return ikusBalioak()" enctype="multipart/form-data">
		    <input type="file" name="argazkia" id="argazkia" onclick="argazkiaErakutsi()"/><br/><br/> <img id="target" width="150px" height="150px" /> <br/><br/> 
			<input type="textarea" id="testua">
			<input type="submit" value="Igo argazkia"/>
		</form>
			
	</div>
</div>';
?>
   