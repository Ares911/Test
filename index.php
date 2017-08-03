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
          //  console.log(data[i].name, data[i].comment); 
				var li = $('<li/>') 
				.addClass('ui-menu-item')
				.appendTo(cList);
				var bbb = $('<button/>')
				.addClass('delete')
				.attr('id', 'id')
				.text('delete')
				.data('index', i)
				.appendTo(li); 
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
			    aaa = $('<hr/>')
				.addClass('ui')
				.appendTo(li);
             }
			  $('#formx')[0].reset();
		}
        });
		}

	});
	
$(document).on('click', '.delete', function(){  
           var id=$(this).attr("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                       //   fetch_data();  
                     }  
                });  
           }  
      });  
    });

 
</script> 

</body>

</html>