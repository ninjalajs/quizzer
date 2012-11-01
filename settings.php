<?php
	if ($_SERVER['HTTP_HOST'] == 'localhost') {
	  $con = mysqli_connect("localhost", "root", "root", "TO");	
	} else {
		$con = mysqli_connect("localhost", "root", "root", "TO");	
	}
?>