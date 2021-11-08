<?php
/*PDO Instructions
Workflow
The user will enter a file name in the text box provided on the form and upload a PDF
file. The application will check to make sure the PDF file is under 100000 bytes and it is
a PDF mime type. If either of those conditions are wrong, then an appropriate error
message is displayed.
If the file is the right size and right mime type, then the file will be placed in a directory
named "files". The file path and the file name will be stored in a single table database
that you will create. The file itself is not to be stored in the database, it is to be stored
on the server. The database will only contain the file name the user entered and the
path to where the file is stored on the server.
Specifications
You will have a PHP file that is the form and another file named "fileUploadProc.php"
that will do all the file uploading and inserting the data into the data base. All the form
should have are two PHP blocks. One requires the "fileUploadProc.php" file and one
that displays the output. You are to use the Pdo_methods and Db_conn classes I have
provided in my notes, or you can create your own. You must create or use classes for
the PDO operations and Database connections. Remember you will need to change the
database name in the Db_conn class to whatever your database name is.
NOTE: If you choose to have the fileUploadProc.php file to be a class then I realize you
will have some more PHP code to the PHP form file.
You will also build a PHP file that will display a list of links to the uploaded PDF files.
When the user clicks on a link the PDF will open in a new tab. To do this use
target="_blank" in your anchor element. Below is an example from the solution:

<li><a target='_blank' href='files/newsletterorform1.pdf'>

That file will require another file named "listFilesProc.php" which will do all the
processing needed to display a list of the files. The actual page that displays the file
links will have two PHP blocks. One that requires the file and the other that outputs the
list of links.
NOTE: If you choose to have the “listFilesProc.php” file to be a class then I realize you
will have some more PHP code to the PHP form file.

*/

  //$output = $dirDisplay->addFilesDirectories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>List Files</title>
</head>
<body>
<main class="container">
      <h1>File Upload</h1>
      
      <p><a href="index.php">Add File</a><br> 
      <div>
      <?php echo $output; ?></p>
        </div>
      
      </main>
    
</body>
</html>

