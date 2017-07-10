<?php
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $text_comment = $_POST["text_comment"];
  $name = htmlspecialchars($name);
  $text_comment = htmlspecialchars($text_comment);
  $mail = htmlspecialchars($mail);
  $mysqli = new mysqli("localhost", "root", "", "db");
  $mysqli->query("INSERT INTO `comments` (`name`, `text_comment`, `mail`) VALUES ('$name', '$text_comment', '$mail')");
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
