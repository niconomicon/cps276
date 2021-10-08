<?php
/*
Create a calculator class that will add, subtract, multiply, and divide two numbers. 

It will have a method that will accept three arguments consisting of a string and two numbers
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
//define class
class Calculator {

    //create calc method
    public static function calc ($string, $num1, $num2) {
        $output="";
        //echo $string;
        //echo $num1;
        //echo $num2;


        if ($string=="+"||"-"||"*"||"/") {
            //echo "operator found";
            switch ($string) {
                case "-":
                    echo "<br>The difference of the numbers is: ".($num1 - $num2); break;
                case "*":
                    echo "<br>The product of the numbers is: ".($num1 * $num2); break;
                case "/":
                    if ($num2!==0) { 
                        echo "<br>The division of the numbers is: ".($num1 / $num2); break;
                    } else {
                    echo "<br>Cannot divide by 0"; break;
                    }
                default:
                    echo "<br>The sum of the numbers is: ".($num1 + $num2); break;
            } 

        } else {
            echo "<br>operator unknown";
        }

    }
         
}


?>