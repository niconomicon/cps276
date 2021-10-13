<?php
/*Assignment 4 Instructions
Create a form like shown in the screenshot.
When a first and last name, separated by a space are entered and the "Add Name"
button is clicked. The script will output in the text area the lastname comma first name
of each name entered. As more names are added the script will sort all the names and
display them as lastname comma firstname in the text area.
When the clear name button is clicked all the names will be cleared from the textarea.
NOTE: In this application we will assume the user will enter the firstname with a space
and the lastname.
We are not worried about names with multiple capital letters like "McDonald" or
apostrophes like "O'brian".
You are to write a class that that changes the name format, adds the name and clears
the name. You will have a separate file that contains the form and buttons, the class
will determine what to do based upon what button is clicked. On the file that has the
form all you will have is the following code above the doctype. The code shown is from
the solution, you don't have to use it verbatim but it should be similar. You can name
your class and methods whatever you want.
if(count($_POST) > 0){
 require_once 'addNameProc.php';
 $addName = new AddNamesProc();
 $output = $addName->addClearNames();
}
You will have an additional PHP block added that will put the names into the textarea as
shown.
<textarea style="height: 500px;" class="form-control"
id="namelist" name="namelist"><?php echo $output ?></textarea>
NOTE: New line characters are written as "\n" in a textarea box. Huge hint you can
input all your names as one big string separated by \n. Make sure that they are in
double quotes or the \n will not work.
See video for how application should work. */


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
    <?php  ?>
</body>
</html>
