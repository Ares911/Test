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
<body>
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
</div>

	<div class="www">
	</div>
	<ul id="list">
	</ul>
	

  <script src="jquery-3.2.1.min.js"></script>

 
<script>

//var com = [];
 $(document).ready(function() {
/* 	function validate (commen){
		if (commen.name.length < 3){
		return true ;
		};
		if (commen.comment.length < 1){
		return true;
		};
		return false;
	}	 */ 
	$("#demo").click(function() {
		
		$.ajax({
      type: 'POST',
        url: 'json.php',
		dataType: 'json',
        success: function(data) {
			var cList = $('ul#list');
		      // cList.empty();
			 for (var i = 0; i < data.length; i++) {
          //  alert(data[i].name, data[i].comment); 
				var li = $('<li/>')
				.addClass('ui-menu-item')
				.appendTo(cList);
				var aaa = $('<div/>')
				.addClass('ui-all')
				.text(data[i].name)
				.appendTo(li);
				aaa = $('<div/>')
				.addClass('ui-al')
				.text(data[i].mail)
				.appendTo(li);
				aaa = $('<div/>')
				.addClass('ui-a')
				.text(data[i].comment)
				.appendTo(li);
           }
		}
	

			
			/* if (validate(commen)){alert('Некоректно заповнені поля')}
			else{com.push(commen);} */
		
        
		
  });
		 
	
	});
	/*  function renderComment(comment, container){
			var aaa = $('<div/>')
				.addClass('ui-all')
				.text(comment.name)
				.appendTo(container);
			aaa = $('<div/>')
				.addClass('ui-al')
				.text(comment.mail)
				.appendTo(container);
			aaa = $('<div/>')
				.addClass('ui-a')
				.text(comment.comment)
				.appendTo(container);
	}
	
	function drawList() {
		var cList = $('ul#list');
		cList.empty();
		for (var i = 0; i < com.length; i++){
			var li = $('<li/>')
				.addClass('ui-menu-item')
				.appendTo(cList);
				renderComment(com[i], li);
			var bbb = $('<button/>')
				.addClass('delete')
				.text('delete')
				.data('index', i)
				.appendTo(li);
			var edit = $('<button/>')
				.addClass('edit')
				.text('edit')
				.data('index', i)
				.appendTo(li);
		}	
	} */
	/* $("ul#list").on('click', '.edit', function() {
		var i = $(this).data('index');
		var edit = prompt('comment',com[i].c);		
		if (edit !== null){		
		if (edit.length < 1){alert('Некоректно заповнені поля')}
			else{com[i].c = edit}	
		}
		
		drawList();
		
		});
	$("ul#list").on('click', '.delete', function() {
		var i = $(this).data('index');
		com.splice(i, 1);
		drawList();
	});  */
 
}); 
 
</script> 
</form>

</body>

</html>