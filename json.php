<?php
  $mysqli = new Mysqli('localhost', 'root', '', 'db');
  $mysqli->query("SET NAMES utf8");
  $result = $mysqli->query("SELECT * FROM `comments` WHERE 1");
  $r = array();
  while($row = $result->fetch_assoc()) {
   $r[] = $row;
  }
   echo json_encode($r);
  
?>