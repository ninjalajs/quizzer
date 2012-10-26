<?php

	//$img_data = file_get_contents($_FILES['image']['tmp_name']);
	//$filename = md5(uniqid(rand()));
	//move_uploaded_file($_FILES['image']['tmp_name'], "/Applications/MAMP/htdocs/uploads/" . $filename);
	//$con = mysqli_connect("localhost", "root", "root", "TO");
	//$img_data = mysqli_real_escape_string($con, $img_data);
	//$sql = "INSERT INTO questions (question, quiz_id, image) VALUES ('Ko?', 1, '$img_data')";
	//echo $sql;
	//mysqli_query($con, $sql);
	//die();




	$con = mysqli_connect("localhost", "root", "root", "TO");

	$name = $_POST['name'];

  $sql = "INSERT INTO quizzes (name) VALUES ('$name')";
  mysqli_query($con, $sql);

  $res = mysqli_query($con, "SELECT MAX(id) AS id FROM quizzes");
  $quiz_id = mysqli_fetch_assoc($res)['id'];

  $i = 0;
	foreach($_POST['questions'] as $question) {
		$answer = $_POST['answers'][$i];
		if ($question != '' && $answer != '') {
			$sql = "INSERT INTO questions (question, answer, quiz_id) VALUES ('$question', '$answer', $quiz_id)";
			mysqli_query($con, $sql);
			$i++;
		}

		//$row = mysqli_fetch_assoc($res);
		//if ($answer == $row['answer']) {
		//	$correct++;
		//}
		//$total++;
	}

?>

<!doctype html>
<html>
<head>
<h1>Nu har du skapat ett quiz!</h1>
</head>
<body>
<form method="post" action="quizes.php">
<input type="submit" value="Gör quiz">
</form>
</body>
</html>