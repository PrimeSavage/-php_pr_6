<!DOCTYPE html>
<html>
    <head>
<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style_6.css">
	<meta charset="utf-8">
        <title>Laba 6</title>
    </head>
	<body>
<script language="javascript">
function sendform() {
if (document.forms[0].id.value == "" || document.forms[0].author.value == "" || document.forms[0].bookname.value == "" || document.forms[0].abstractname.value == "" || 
document.forms[0].isbn.value == "" || document.forms[0].review.value == "") {
alert('Пожалуйста, заполните все поля');
return false;
}
else
{return true;}
}
</script>
	<?php
	$link = mysqli_connect("localhost", "root", "", "Library_db");
$dbname = "Library_table";
mysqli_select_db($link,$dbname);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());}
	?>
	<div class="main">
	 <div class="input">
	  <form action="save_form.php" method="post" onsubmit="return sendform();">
	   <p>Id: <input type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="id"></p>
	   <p>Автор: <input type="text" name="author"></p>
	   <p>Название: <input type="text" name="bookname"></p>
	   <p>Аннотация: <input type="text" name="abstractname"></p>
	   <p>ISBN: <input type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="isbn"></p>
	   <p>Отзыв: <input type="text" name="review"></p>
	   <p><input type="submit"></p>
	  </form>
	 </div>
	 <div class="output">
	   <?php require 'view_data.php'; ?>
	 </div>
	 <div class="edit">
	  <form method="get">
		<p><input type="text" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" name="idEdit">
		<input type="submit" name="delete" formaction="del_data.php" value="Удалить">
		<input type="submit" name="edit" formaction="update_data.php" value="Редактировать"></p>
	  </form>
	 </div>
	</div>
	</body>
</html>