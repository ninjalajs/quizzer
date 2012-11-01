<?php



if (isset ($_POST['pass'])) {
	$con = mysqli_connect("localhost", "root", "root", "TO");


	$username = $_POST['user'];
	$password= $_POST['pass'];
	$user = mysqli_real_escape_string($con, $username);
	$sql = "SELECT pass from users WHERE username = '$user' LIMIT 1";

	$res = mysqli_query($con, $sql);

	if ($row = mysqli_fetch_assoc($res)) {
		//$salt = substr($row['pass'], 0, 64);
		//$hash = $salt . $password; 
		//for ( $i = 0; $i < 100000; $i ++ ) {
	  //		$hash = hash('sha256', $hash);
		//}
	} else {
		echo "Finns ingen användare med detta namn.";
		die();
	}

	if ($row['pass'] == $password) {
		echo "Inloggad!";
	} else {
		echo 'Fel lösenord';
		die();
	}
/*
	if ($salt.$hash == $row['pass'] )
		{
			echo "korrekt!";	
		}
	else
		{
			echo "Ej korrekt!";	
			die();
		}
*/

}
?>



<!doctype html>

<html>
<head>
</head>
</html>
<body>

<h1>SKAPA PROV</h1>

<form method="post" action="admin2.php" enctype="multipart/form-data">

	Namn: <input type="text" name="name">

	<h2>SKAPA FRÅGOR</h2>


	Fråga 1: <input type="text" name="questions[]"><br>
	Svar 1: <input type="text" name="answers[]"><br><br>
	Bild 1: <input type="file" name="image[]"><br><br><br>

	Fråga 2: <input type="text" name="questions[]"><br>
	Svar 2: <input type="text" name="answers[]"><br><br>
	Bild 2: <input type="file" name="image[]"><br><br><br>

	Fråga 3: <input type="text" name="questions[]"><br>
	Svar 3: <input type="text" name="answers[]"><br><br>
	Bild 3: <input type="file" name="image[]"><br><br><br>

	Fråga 4: <input type="text" name="questions[]"><br>
	Svar 4: <input type="text" name="answers[]"><br><br>
	Bild 4: <input type="file" name="image[]"><br><br><br>

	Fråga 5: <input type="text" name="questions[]"><br>
	Svar 5: <input type="text" name="answers[]"><br>
	Bild 5: <input type="file" name="image[]"><br><br><br>

	<input type="submit">

</form>
</body>
</htmL>
