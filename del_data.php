<?php
if(isset($_POST['id'])){
 
$link = mysqli_connect("localhost", "root", "", "Library_db") 
            or die("Ошибка " . mysqli_error($link)); 
    $id = mysqli_real_escape_string($link, $_POST['id']);
     
    $query ="DELETE FROM Library_table WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    mysqli_close($link);
    echo '<script>location.replace("laba6.php");</script>'; exit;
}
 
if(isset($_GET['idEdit']))
{   
    $id = htmlentities($_GET['idEdit']);
    echo "<h2>Удалить книгу?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
        </form>";
}
?>