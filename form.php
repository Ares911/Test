<html>
	<head>
	<title>Форма</title>
	</head>
	<style type="text/css">
body{
	font-size:20px;
	font-family:sans-serif;
	width: 10em;
	margin: 2em auto;
}
button.demo{
	float: right;
	width: 4em;
}
button.delete{
	float: right;
	width: 4em;
}
a#ui-all{
	width: 4em;
}
input.comment{
	width: 8em;	
}
#list li {
	clear: both;
}
</style>
<body>

	<form name="comment" action="comment.php" method="post">
  <p>
    <label>Ім'я:</label>
    <input type="text" name="name" />
  </p>
	<label>Пошта:</label>
    <input type="text" name="mail" />
  <p>
    <label>Коментар:</label>
    <br />
    <textarea name="text_comment" cols="30" rows="10"></textarea>
  </p>
  <p>
    <input type="submit" value="Отправить" />
  </p>
  <?php
  $mysqli = new mysqli("localhost", "root", "", "db");
  $strSQL = "SELECT * FROM `comments`";
  $result = $mysqli->query($strSQL);
  if ($result) {
	  while ($row = $result->fetch_assoc()) { ?>
		<li><?php echo $row['name'] ?>
		<?php echo $row['mail'] ?>
		<?php echo $row['text_comment'] ?></li> 
		<?php echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>"; ?>
	  <?php }
  }
?>
</form>
</body>
</html>