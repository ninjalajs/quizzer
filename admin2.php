<?php
	
	include 'settings.php';

	$name = $_POST['name'];

  $sql = "INSERT INTO quizzes (name) VALUES ('$name')";
  mysqli_query($con, $sql);


  $res = mysqli_query($con, "SELECT MAX(id) AS id FROM quizzes");
  $row = mysqli_fetch_assoc($res);
  $quiz_id = $row['id'];

  $i = 0;
	foreach($_POST['questions'] as $question) {
		$answer = $_POST['answers'][$i];

		if ($question != '' && $answer != '') {
			$filename = md5(uniqid(rand()));
			move_uploaded_file($_FILES['image']['tmp_name'][$i], getcwd() . "/uploads/" . $filename);

			$sql = "INSERT INTO questions (question, answer, quiz_id, filename) VALUES ('$question', '$answer', $quiz_id, '$filename')";
			mysqli_query($con, $sql);
			$i++;
		}

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