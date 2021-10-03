<?php
/* 
Exercise 3
Write a script that will output a TABLE where the rows and cells are labeled (see
screenshot for exercise 3). The script should be versatile, so one could easily change
the number of rows and cells the script should output. For this exercise have the script
create a table with 15 rows and 5 cells. Refer to the tables lesson for information on
how to create a table. You need to write all the PHP functionality above the doctype and
display the resulting HTML string via a variable in the echo statement within the body
element.*/

function tableFunction($rows,$cells) {
        echo "<table border=\"1\">";
    for ($i=1; $i <= $rows; $i++) {
        
        echo "<tr>";
        for ($j=1; $j<= $cells; $j++) {
            
            echo "<td> Row ".$i." Cell ".$j."</td>";
        }
        echo "</tr>";    
    }
    echo "</table>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exercise 3</title>
    <?php echo tableFunction(15,5)?>
</head>
<body>
</body>
</html>