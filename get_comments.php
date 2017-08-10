<?php 
   $name = $_POST["name"];
  $mail = $_POST["mail"];
  $comment = $_POST["comment"];
  $name = htmlspecialchars($name);
  $comment = htmlspecialchars($comment);
  $mail = htmlspecialchars($mail);
  $mysqli = new mysqli("localhost", "root", "", "db");
  $r = array();
  $result = $mysqli->query("SELECT * FROM `comments`");
  while($row = $result->fetch_assoc()) {
   $r[] = $row;
  }
  if(empty($r)) {
   echo "empty";
  } else {
   echo json_encode($r);
  }
?>