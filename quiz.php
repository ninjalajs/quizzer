<?php
/* SELECT * FROM questions WHERE quiz_id = 1

SELECT * FROM quizzes WHERE id = 1 */

include 'settings.php';

$quiz_id = $_GET['quiz_id'];	
$sql = "SELECT * FROM quizzes WHERE id = $quiz_id";

$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
$name = $row['name'];	

?>
<!doctype html>
<html>
<h1>Välkommen till 
<?php echo $name ?>
</h1>
<form method="post" action="results.php">
<ol>
	<?php
	  $res = mysqli_query($con, "SELECT * FROM questions WHERE quiz_id = $quiz_id");

	  while ($row = mysqli_fetch_assoc($res)) {
	  	$filename = $row['filename'];
	    echo "<li>";
	    echo "<img src='uploads/$filename'>";
	    echo $row['question'];
	    echo '<input type="text" name="answers[]">';
	    echo "</li>";
	  }
	?>
</ol>
<input type='hidden' name='quiz_id' value='<?php echo $quiz_id ?>'>
<input type="submit" value="Klar">
</form>
</html>