<?php 

$con = mysqli_connect("localhost", "root", "root", "TO");
$quiz_id = $_POST['quiz_id'];
$res = mysqli_query($con, "SELECT * FROM questions WHERE quiz_id = $quiz_id");

/* while ($row = mysqli_fetch_assoc($res)) {
	echo $row['answer'] == 'minigris';
} */

$correct = 0;
$total = 0;

foreach($_POST['answers'] as $answer) {
	$row = mysqli_fetch_assoc($res);
	if ($answer == $row['answer']) {
		$correct++;
	}
	$total++;
}

?>
<!doctype html>
<html>
<head>
<h1> GRATTIS DU HADE <?php echo "$correct/$total" ?></h1>
</head>
<body>
<form method="post" action="quizes.php">
<input type="submit" value="Gör ett nytt quiz">
</form>
</form>
</body>
</htmL>