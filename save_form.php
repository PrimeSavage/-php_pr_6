<?php
$link = mysqli_connect("localhost", "root", "", "Library_db");
$id = mysqli_real_escape_string($link, $_REQUEST['id']);
$author = mysqli_real_escape_string($link, $_REQUEST['author']);
$bookname = mysqli_real_escape_string($link, $_REQUEST['bookname']);
$abstractname = mysqli_real_escape_string($link, $_REQUEST['abstractname']);
$isbn = mysqli_real_escape_string($link, $_REQUEST['isbn']);
$review = mysqli_real_escape_string($link, $_REQUEST['review']);
 
$sql = "INSERT INTO Library_table (id, author, bookname, abstractname, isbn, review) VALUES ('$id', '$author', '$bookname', '$abstractname', '$isbn', '$review')";
 if(mysqli_query($link, $sql)){
    header('Location: php_pr6.php');
    exit;
} else{
    echo "Error $sql. " . mysqli_error($link);
} 
 
mysqli_close($link);
?>