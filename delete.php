<?php
  $id = $_GET["id"];
  $mysqli = new mysqli("localhost", "root", "", "db");
  $mysqli->query("DELETE FROM `comments` WHERE id='$id'");
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
