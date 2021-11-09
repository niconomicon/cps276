<?php

/*You will also build a PHP file that will display a list of links to the uploaded PDF files.
When the user clicks on a link the PDF will open in a new tab. To do this use
target="_blank" in your anchor element. Below is an example from the solution:

<li><a target='_blank' href='files/newsletterorform1.pdf'>

That file will require another file named "listFilesProc.php" which will do all the
processing needed to display a list of the files. 

 <ul>
            <li><a target='_blank' href='files/newsletterorform1.pdf'>1</li>
            </ul>  

The actual page that displays the file links will have two PHP blocks. One that requires the file and the other that outputs the
list of links.*/

 function listOfLinks(){

    require_once 'File.php';
    $fileFunc = new File();
    $output = $fileFunc->getFiles();
   return $output;
 }


?>