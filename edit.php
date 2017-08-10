<?php  
 $mysqli = new mysqli("localhost", "root", "", "db");
 $id = $_POST["id"];
 $comment = $_POST["comment"];    
 if($mysqli->query("UPDATE `comments` SET `comment`= '$comment' WHERE id='$id'"))  
 {  
      echo 'Коментар відредаговано';  
 }  
 ?>