<?php
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
	  $con = mysqli_connect("localhost", "root", "root", "TO");	
	} else {
		$con = mysqli_connect("mysql05.citynetwork.se", "110023-dv14493", "phputvecklare2012", "110023-lisa");	
	}
?>