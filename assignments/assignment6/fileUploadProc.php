<?php
/*You will have a PHP file that is the form and another file named "fileUploadProc.php"
that will do all the file uploading and inserting the data into the data base. 

All the form should have are two PHP blocks. 

One requires the "fileUploadProc.php" file and one that displays the output. 

You are to use the Pdo_methods and Db_conn classes I have provided in my notes, or you can create your own. 

You must create or use classes for
the PDO operations and Database connections.*/ 

//will do all the file uploading and inserting the data into the data base. 
require 'File.php';


function fileUpload() {

    $fileFunc = new File();
    $output = $fileFunc->addFile();

}?>