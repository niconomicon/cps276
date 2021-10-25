<?php 

//define class
class Directories {
    
    function addFilesDirectories() {

    $output="";
    
    /*IF THE SUBMIT BUTTON IS CLICKED DO THE FOLLOWING. */

    //if add button is clicked
    if(isset($_POST['submitButton'])){
      
      $newDirName="{$_POST["enterDirName"]}";
      
      $newTextForFile="{$_POST["textForFile"]}";
      

      $output = $this->createDirectory($newDirName,$newTextForFile);
      
     
      //if clear button is clicked
    } /* else if (isset($_POST['clearButton'])){
        
        $this->rrmdir("directories");
        $output="<br>Directories cleared successfully";
    }*/
        return $output;

    }

     function createDirectory ($dirName,$fileText) {
        $message="<br>";
        $fileDirPath="directories/".$dirName;
        if ($dirName!=="") {
          
          if (is_dir($fileDirPath)) {
              
              $message .= "A directory already exists with that name";
          }
          else {
                  //make directory
                  mkdir($fileDirPath, 0777);
                  //make file
                  $this->makeFile ($fileText, $dirName);
                  $message .= ('File and directory were created<br>
                  <a href="'.$fileDirPath.'/readme.txt">Path where file is located</a>');  
          }
          
        } else {
          $message .= 'A directory cannot be created with that name';
        }

        return $message; 
    }



    function makeFile ($fileText, $dirName) {
        $fileDirPath="directories/".$dirName;
        touch($fileDirPath."/readme.txt",0777, true);
        file_put_contents($fileDirPath."/readme.txt", $fileText);
     }
      /*
      //remove all directories and sub-directories within a directory
      function rrmdir($dir) {
        if (is_dir($dir)) {
          $objects = scandir($dir);
          foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
              if (filetype($dir."/".$object) == "dir") 
                 $this->rrmdir($dir."/".$object); 
              else unlink   ($dir."/".$object);
            }
          }
          reset($objects);
          //rmdir($dir);
          
          $this->removeObjects($dir);
          
        }
       }

 
       //remove all directories within a single directory
          function removeObjects($dir) {
            array_map( 'rmdir', array_filter((array) glob($dir."/*") ) );
  }
        
*/
    

}

?>