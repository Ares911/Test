<?php
   $id = $_POST["id"];
  $mysqli = new mysqli("localhost", "root", "", "db");
  if ($mysqli->query("DELETE FROM `comments` WHERE id ='$id'") === TRUE) {
    echo "Запис видалено";
} else {
    echo "Error deleting record: " . $mysqli->error;
}
?>