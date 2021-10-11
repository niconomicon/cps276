<?php
/*
Create a calculator class that will add, subtract, multiply, and divide two numbers. It will
have a method that will accept three arguments consisting of a string and two numbers
example ("+", 4, 5) where the string is the operator, and the numbers are what will be
used in the calculation.

The class must check for a correct operator (+,*,-,/), and a number (integer) for the
second and third argument entered. The calculator cannot divide by zero that will be an
error.

Separate error messages will be displayed for all errors. Also, separate success
messages will be displayed with each successful answer. This script will run using a
browser. The output of the script will display after the web address is entered into the
browser navigation window. There will be a separate file that will require the class.
That file will be used to instantiate the class and call the appropriate method, while the
class will do the heavy lifting.

You will have two files (both files must be in the same folder)

One will be the file that is your class.

The other will be a file that requires your class and calls the appropriate method. This is
the file you will provide the web address for. */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Assignment 3</title>
</head>
<body>
    <?php

        require_once "Calculator.php";
        $Calculator = new Calculator();
        echo $Calculator->calc("/", 10, 0); //will output Cannot divide by zero
        echo $Calculator->calc("*", 10, 2); //will output The product of the numbers is 20
        echo $Calculator->calc("/", 10, 2); //will output The division of the numbers is 5
        echo $Calculator->calc("-", 10, 2); //will output The difference of the numbers is 8
        echo $Calculator->calc("+", 10, 2); //will output The sum of the numbers is 12
        echo $Calculator->calc("*", 10); //will output You must enter a string and two numbers
        echo $Calculator->calc("*", 10); //will output You must enter a string and two numbers 
    ?>
</body>
</html>
