<?php
$link = mysqli_connect("localhost", "root", "", "Library_db"); 
 
if(isset($_POST['id']) && isset($_POST['author']) && isset($_POST['bookname']) && isset($_POST['abstractname']) && isset($_POST['isbn']) && isset($_POST['review'])){
 
    $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
    $author = htmlentities(mysqli_real_escape_string($link, $_POST['author']));
    $bookname = htmlentities(mysqli_real_escape_string($link, $_POST['bookname']));
	$abstractname = htmlentities(mysqli_real_escape_string($link, $_POST['abstractname']));
	$isbn = htmlentities(mysqli_real_escape_string($link, $_POST['isbn']));
	$review = htmlentities(mysqli_real_escape_string($link, $_POST['review']));
     
    $query ="UPDATE Library_table SET author='$author', bookname='$bookname', abstractname='$abstractname', isbn='$isbn', review='$review' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
	echo '<script>location.replace("php_pr6.php");</script>'; exit;
}
if(isset($_GET['idEdit']))
{   
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['idEdit']));
     
    $query ="SELECT * FROM Library_table WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result);
        $author = $row[1];
        $bookname = $row[2];
		$abstractname = $row[3];
		$isbn = $row[4];
		$review = $row[5];
         
        echo "<h2>Редактировать</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id'>
            <p>Автор:<br> 
            <input type='text' name='author' value='$author'></p>
            <p>Наименование: <br> 
            <input type='text' name='bookname' value='$bookname'></p>
			<p>Аннотация: <br> 
            <input type='text' name='abstractname' value='$abstractname'></p>
			<p>ISBN: <br> 
            <input type='text' name='isbn' value='$isbn'></p>
			<p>Отзыв: <br> 
            <input type='text' name='review' value='$review'></p>
            <input type='submit' value='Сохранить'>
            </form>";
         
        mysqli_free_result($result);
    }
}
mysqli_close($link);

?>
