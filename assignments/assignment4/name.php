<?php 

//define class
class Name {
    
    function addClearNames() {
    /*SET THE VALUE OF OUTPUT TO EMPTY STRING SO NOTHING SHOWS WHEN THE PAGE FIRST LOADS*/
    $output = "";
    /*IF THE SUBMIT BUTTON IS CLICKED DO THE FOLLOWING. */

    //if add button is clicked
    if(isset($_POST['submitButton'])){
      
      $newName= "{$_POST["enterName"]}";
      
      $this->addName($this->formatName($newName));
      
      $output = $this->showNames();
    
      //if clear button is clicked
    } else if (isset($_POST['clearButton'])){
        
        $this->clearNames();
    }
        return $output;

    }

     function formatName ($plainName) {
      $firstName="";
      $lastName="";
      $formalName="";
        //find first name
      for ($i=0; $i < strlen($plainName); $i++) {
          
        if ($plainName[$i]!==" ") {
          $firstName .= $plainName[$i];

        } else {
            //save index # of space
          $nameSpace=$i;

            //find last name
          for ($j=0; $j < strlen(substr($plainName,$nameSpace)); $j++) {

            $lastName .= substr($plainName,$nameSpace)[$j];
            //format name
            $formalName=$lastName.", ".$firstName;
          }
          $i=strlen($plainName);  
        }
      }
      return $formalName;
    }

     function addName($name) {
      $nameFile = 'names.txt';
      $currentList = file_get_contents($nameFile);
      $currentList .= $name."\n";
      file_put_contents($nameFile, $currentList);
    }

     function clearNames() {
      file_put_contents("names.txt", "");
    }

     function showNames() {
      $nameFile = 'names.txt';
      $currentList = file_get_contents($nameFile);
      return $currentList;

    } 

}

?>