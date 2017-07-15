<?php 
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $comment = $_POST["comment"];
  $name = htmlspecialchars($name);
  $comment = htmlspecialchars($comment);
  $mail = htmlspecialchars($mail);
  $mysqli = new mysqli("localhost", "root", "", "db");
  $mysqli->query("INSERT INTO `comments` (`name`, `comment`, `mail`) VALUES ('$name', '$comment', '$mail')");
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
