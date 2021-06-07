<?php
$query ="SELECT * FROM Library_table";
$link = mysqli_connect("localhost", "root", "", "Library_db");
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result);
     
    echo "<table border='1'><tr><th>Id</th><th>Автор</th><th>Название</th><th>Аннотация</th><th>ISBN</th><th>Отзыв</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     

    mysqli_free_result($result);
}
?>
