<!doctype html>
<html>
<h1>Här är quiz du kan göra:</h1>

<ul>
	<?php
	$con = mysqli_connect("localhost", "root", "root", "TO");

	$sql = "SELECT * FROM quizzes";

	$res = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($res)) {
    echo '<li><a href="quiz.php?quiz_id=' . $row['id'] . '">' . $row['name'] . '</a></li>';
	  //echo $row['name'];
  }
	?>
</ul>
</html>
