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
    
    public static function calc ($string, $num1="n", $num2="n") {
        //test number parameters
        try {   

            if (is_int($num2)==false||is_int($num1)==false) {
                throw new Exception("You must enter a string and two numbers<br>");
            } else {
                //test string operator parameter
                try {

                    switch ($string) {

                        case "+":
                            echo "The sum of the numbers is ".($num1 + $num2)."<br>"; break;
                        case "-":
                            echo "The difference of the numbers is ".($num1 - $num2) ."<br>"; break;
                        case "*":
                            echo "The product of the numbers is ".($num1 * $num2)."<br>"; break;
                        case "/":
                            try {
                                if ($num2!==0) { 
                                    echo "The division of the numbers is ".($num1 / $num2)."<br>"; break;
                                } else {
                                //echo "Cannot divide by 0<br>"; break;
                                throw new Exception("Cannot divide by zero<br>"); 
                                }
                            } catch (Exception $e){
                                echo $e->getMessage(); break;
                            }
                        default:
                        //echo "operator unknown 1<br>";
                        throw new Exception("The operator entered is unknown<br>");
                    } 
                } catch (Exception $e){
                    echo $e->getMessage();
                }
       
            }
        } catch (Exception $e){
            echo $e->getMessage();
        }


    }
} 

  



?>