<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>
<style type="text/css">
body{
	font-size:20px;
	font-family:sans-serif;
	width: 12em;
	margin: 2em auto;
}
button.demo{
	float: right;
	
}
button.delete{
	float: right;
	width: 8em;
}
a#ui-all{
	width: 8em;
}
input{
	float: right;
	width: 10em;	
}
textarea{
	float: left;
	
}
#list li {
	clear: both;
li.comments {
  border: 1px solid green;
  width: 300px;
  text-align: center;
  border-radius: 5px;
  margin: 0 auto 10px;
}
}
</style>
<body onload="getComments();">

<form name="comment" action="comment.php" method="post">
<div class="data">
	<div>
	Name:
	<input id="name" name="name" type="text" />
	</div>
	<div>
	Mail:
	<input id="mail" name="mail" type="text" />
	</div>
	<div>
	Comment:
	</br>
	<textarea id="comment" name="comment" cols="31" rows="5"></textarea>
	</div>
	<button id="demo">Додати:</button>

  <script src="jquery-3.2.1.min.js"></script>

 
<script>
  var button = document.getElementById('demo'),
      xmlhttp = new XMLHttpRequest();
  button.addEventListener('click', function() {
   var name = document.getElementById('name').value.replace(/<[^>]+>/g,''),
	   mail = document.getElementById('mail').value.replace(/<[^>]+>/g,''),
       comment = document.getElementById('comment').value.replace(/<[^>]+>/g,'');
  });
  function getComments(count = 0) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open('post', 'get_comments.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send('count=' + count);
    xmlhttp.onreadystatechange = function() {
     if(xmlhttp.readyState == 4) {
      if(xmlhttp.status == 200) {
       var data = xmlhttp.responseText;
       if(data != 'empty') {
        data = JSON.parse(data);
        for(var i = 0; i < data.length; i++) {
        var parent = document.getElementsByTagName('body')[0];
         var elem = document.createElement('li');
         elem.className = 'comments';
         parent = parent.appendChild(elem);
         var text = data[i].name;
         var textNode = document.createTextNode(text);
         elem.appendChild(textNode);
	   	 elem = document.createElement('div');
         elem.className = 'mail';
         parent.appendChild(elem);
         text = data[i].mail;
         textNode = document.createTextNode(text);
         elem.appendChild(textNode);
         elem = document.createElement('div');
         elem.className = 'comment';
         parent.appendChild(elem);
         text = data[i].comment;
         textNode = document.createTextNode(text);
         elem.appendChild(textNode);
		
         var max = data[i].id;
        }
        count = max;
       }
      }
     }
    };
   } 

</script> 

</form>
</body>

</html>