<?php 




class Name {

    /*SET THE VALUE OF OUTPUT TO EMPTY STRING SO NOTHING SHOWS WHEN THE PAGE FIRST LOADS*/
    
        
    //require_once 'names.txt';
    //require_once 'index.php';
    
    

   


    /*IF THE SUBMIT BUTTON IS CLICKED DO THE FOLLOWING. */
    
     function addClearNames() {
    $output = "";
    
    if(isset($_POST['submitButton'])){

      $newName= "{$_POST["enterName"]}";
      $this->addName($this->formatName($newName));
      $output = $this->showNames();
    
    } else if (isset($_POST['clearButton'])){
    $this->clearNames();
    }
    return $output;

}


   
     function formatName ($plainName) {
      $firstName="";
      $lastName="";
      $formalName="";
    
      for ($i=0; $i < strlen($plainName); $i++) {

        if ($plainName[$i]!==" ") {
          
          $firstName .= $plainName[$i];
          
        } else {
          
          $nameSpace=$i;
          for ($j=0; $j < strlen(substr($plainName,$nameSpace)); $j++) {
            
            $lastName .= substr($plainName,$nameSpace)[$j];
            
            $formalName=$lastName.", ".$firstName;
           
          
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
    

}

?>