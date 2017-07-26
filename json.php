<?php
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $comment = $_POST["comment"];
  $name = htmlspecialchars($name);
  $comment = htmlspecialchars($comment);
  $mail = htmlspecialchars($mail);
  $mysqli = new mysqli("localhost", "root", "", "db");
  $mysqli->query("INSERT INTO `comments` (`name`, `comment`, `mail`) VALUES ('$name', '$comment', '$mail')");
  $mysqli = new Mysqli('localhost', 'root', '', 'db');
  $mysqli->query("SET NAMES utf8");
  $result = $mysqli->query("SELECT * FROM `comments` WHERE 1");
  $r = array();
  while($row = $result->fetch_assoc()) {
   $r[] = $row;
  }
   echo json_encode($r);
  
?>