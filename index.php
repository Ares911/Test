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
button.edit{
	float: left;
	width: 4em;
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
<form method="POST" id="formx" action="">
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
</form>
	<ul id="list">
	</ul>

<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script type="text/javascript" language="javascript">
var com = [];
 $(document).ready(function() {
	function validate (commen){
		if (commen.name.length < 3){
		return true ;
		};
		if (commen.comment.length < 1){
		return true;
		};
		return false;
	}	
	function fetch_data(){ 
	var commen = {
		 name: $("#name").val(),
		 mail: $("#mail").val(),
		 comment: $("#comment").val()
		};
	$.ajax({
        type: 'POST',
        url: 'get_comments.php',
		dataType: 'json',
		data: commen,
        success: function(data) {
			var cList = $('ul#list');
		       cList.empty();
			 for (var i = 0; i < data.length; i++) {
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
				var bbb = $('<button/>')
				.addClass('delete')
				.text('delete')
				.attr("name","delete")
				.data('id', data[i].id)
				.appendTo(li);
				var ccc = $('<button/>')
				.addClass('edit')
				.text('edit')
				.attr("name","edit")
				.data('id', data[i].id)
				.appendTo(li);
             }
			  $('#formx')[0].reset();
		}
        });		
		
 }
 fetch_data();
	$("#demo").click(function(e) {
		 e.preventDefault();
		var commen = {
		 name: $("#name").val(),
		 mail: $("#mail").val(),
		 comment: $("#comment").val()
		};
		if (validate (commen)){
			alert('Некоректно заповнені поля');
		}else{	
		$.ajax({
        type: 'POST',
        url: 'json.php',
		dataType: 'json',
		data: commen,
        success: function(data) {
			var cList = $('ul#list');
		       cList.empty();
			 for (var i = 0; i < data.length; i++) {
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
				var bbb = $('<button/>')
				.addClass('delete')
				.text('delete')
				.attr("name","delete")
				.data('id', data[i].id)
				.appendTo(li);
				var ccc = $('<button/>')
				.addClass('edit')
				.text('edit')
				.attr("name","edit")
				.data('id', data[i].id)
				.appendTo(li);
			  
             }
			  $('#formx')[0].reset();
		}
        });		
		}

	});
	
$(document).on('click', '.delete', function(){  
           var id=$(this).data('id');  
           if(confirm("Ви впевнені, що хочете це видалити?"))  
           {  
                $.ajax({   
                     url:"delete.php",  
                     type:"POST",  
                     data:{'id':id},
					 dataType: 'text',
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
	  $(document).on('click', '.edit', function(){  
           var id=$(this).data('id'); 		   
           var n = prompt();  
           {  
                $.ajax({   
                     url:"edit.php",  
                     type:"POST",  
                     data:{'id':id, 'comment':n},
					 dataType: 'text',
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
    });
 
</script> 

</body>

</html>