<?php
/*Exercise 1
Write a script that will take a set of TWO numbers and output them as a nested list (see
screenshot for exercise 1). ONE number is for the main list items and the other will be
the sub list items. Refer to the block level list elements lesson for creating a nested list.
You need to write all the PHP functionality above the doctype and display the resulting
HTML string via a variable in the echo statement within the body element of the
webpage. */

function myFunction($outsideListNum,$insideListNum) {
    echo "<ul>";
    for ($i = 1; $i <= $outsideListNum; $i++){ 
        echo "<li>".$i ."</li>";
        echo "<ul>";
        for ($j = 1; $j <= $insideListNum; $j++){
             echo "&nbsp;&nbsp;&nbsp;&nbsp;<li>".$j."</li>"; 
        }
        echo "</ul>";
    }
    echo "</ul>";      
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Exercise 1</title>
</head>
<body>
    <?php echo myFunction(4,5); ?>
</body>
</html>
