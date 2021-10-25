<?php 

//define class
class Directories {
    
    function addClearNames() {
    /*SET THE VALUE OF OUTPUT TO EMPTY STRING SO NOTHING SHOWS WHEN THE PAGE FIRST LOADS*/
    $output = "";
    /*IF THE SUBMIT BUTTON IS CLICKED DO THE FOLLOWING. */

    //if add button is clicked
    if(isset($_POST['submitButton'])){
      
      $newDirName= "{$_POST["enterDirName"]}";
      echo "Dir name is: "."{$_POST["enterDirName"]}";
      $newTextForFile= "{$_POST["textForFile"]}";
      echo "File text is: "."{$_POST["textForFile"]}";
      
      $this->addName($this->formatName($newName));
      $this->sortNames();
      
      $output = $this->showNames();
    
      //if clear button is clicked
    } else if (isset($_POST['clearButton'])){
        
        $this->clearNames();
    }
        return $output;

    }

     function createDirectory ($dirName) {
        $message="";

        if (is_dir($dirName)) {
            $message = "A directory already exists with that name";
        }
        else {
            mkdir(directories/$dirName);
            echo "empty file created in ".$dirName." directory";
            touch('readme.txt');
            $message = "Path were file is located";
            
        }

        return $message; 
    }



    function makeFile ($fileText) {
        file_put_contents("readme.txt", $fileText);
     }
      
      
      
      
     //   $nameFile = 'names.txt';
      //$currentList = file_get_contents($nameFile);
      //$currentList .= $name."\n";
      //file_put_contents($nameFile, $currentList);




    

     function clearNames() {
      file_put_contents("names.txt", "");
    }

     function showNames() {
      $nameFile = 'names.txt';
      $currentList = file_get_contents($nameFile);
      

      return $currentList;

    } 

    function sortNames() {
      $file = file('names.txt');
      sort($file);
      file_put_contents("names.txt", $file);
    }

}

?>