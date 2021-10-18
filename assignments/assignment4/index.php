<?php

/*Assignment 4 Instructions
Create a form like shown in the screenshot.

When a first and last name, separated by a space are entered and the "Add Name"button is clicked, the script will output in the text area the lastname comma first name
of each name entered. 

As more names are added the script will sort all the names and
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



You will have an additional PHP block added that will put the names into the textarea as
shown.

<textarea style="height: 500px;" class="form-control"
id="namelist" name="namelist"><?php echo $output ?></textarea>

NOTE: New line characters are written as "\n" in a textarea box. Huge hint you can
input all your names as one big string separated by \n. Make sure that they are in
double quotes or the \n will not work.
See video for how application should work. */



/*if(count($_POST) > 0){
  require_once 'Name.php';
  $addName = new Name();
  $output = $addName->showNames();
 }*/
 

 
//class stuff

/*


$output = "";
        
require_once 'names.txt';
require_once 'index.php';







if(isset($_POST['submitButton'])){

  $newName= "{$_POST["enterName"]}";
  
  addName(formatName($newName));
  
  
  $output = showNames();




} else if (isset($_POST['clearButton'])){
  clearNames();
}



function formatName ($plainName) {
  $firstName="";
  $lastName="";
  $formalName="";
  //FIRST NAME
  for ($i=0; $i < strlen($plainName); $i++) {

    if ($plainName[$i]!==" ") {
      //echo "Current letter is: ".$plainName[$i]."<br>";
      $firstName .= $plainName[$i];
      //echo "First Name is: ".$plainName."<br>";
    } else {
      //echo "Found a space";
      $nameSpace=$i;
      for ($j=0; $j < strlen(substr($plainName,$nameSpace)); $j++) {
        //echo "Current letter is: ".substr($plainName,$nameSpace)[$j]."<br>";
        $lastName .= substr($plainName,$nameSpace)[$j];
        //echo "Last Name is: ".$lastName."<br>";
        $formalName=$lastName.", ".$firstName;
        //echo $formalName;
      
      }
      $i=strlen($plainName);
      //echo $firstName;
      //echo $lastName;

    }
    
  }
  return $formalName;




}



function addName($name) {
  $nameFile = 'names.txt';
  $currentList = file_get_contents($nameFile);
  $currentList .= $name."\n";
  file_put_contents($nameFile, $currentList);

  //echo "Added ".$name." to Names List";

}


function clearNames() {
  file_put_contents("names.txt", "");
  
}



function showNames() {
  //$nameList = "";
  $nameFile = 'names.txt';
  $currentList = file_get_contents($nameFile);

  return $currentList;

}

*/
   


  require_once 'name.php';
  $nameDisplay = new Name();
  $output = $nameDisplay->addClearNames();

        

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Assignment 4</title>
    <style>
      input[type="radio"]{margin: 0 10px 0 0;}
    </style>
  </head>
  <body>
    <main class="container">
      <h1>Add Names</h1>
      <form action="index.php" method="post">  
        <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Add Name" />
        <input type="submit" class="btn btn-primary" name="clearButton" id="clearNames"value="Clear Names"/>
</div>
          
        <div class="form-group">
          <label for="enterName">Enter Name:</label>
          <input type="text" class="form-control" name="enterName" id="enterName">
        </div>
        <div class="form-group">
          <label for="listOfNames">List of Names</label>
          <textarea style="height: 500px;" class="form-control" id="namelist" name="nameList" > <?php echo $output ?>
        </textarea>
        </div>

        
      </form>
        <?php  
        //require_once "Names.txt"; 
        //require_once "Calculator.php";
        //echo $output  ?>
      </main>
    </body>
</html>
