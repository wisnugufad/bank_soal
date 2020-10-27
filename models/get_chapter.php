<?php 

include './connection.php';

$subject_id = $_POST['subject_id'];

$sqlChapter = "SELECT a.* FROM chapter as a
JOIN subject as b ON b.id = a.subject_id WHERE b.id = '$subject_id' ";
$queryChapter = MYSQLI_QUERY($connect,$sqlChapter);

while ($row = mysqli_fetch_assoc($queryChapter)) {
  echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
}

?>