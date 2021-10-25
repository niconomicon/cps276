<?php
/*File and Directory Instructions
User will enter a directory name and some textual content for a file. When user clicks
"Submit" a directory will be created inside of the "directories" directory, with the name
the user entered. Just use alpha characters for the directory name with no spaces or
special characters, no need to check for it as we will assume the user does this
correctly.
A file named "readme.txt" will be inserted into the directory that was just created. The
text of that file will be whatever the user wrote.
Upon successful completion of the file and directory being created. A link will display at
the top of the form that will say "Path were file is located" if the user clicks on that link
the readme.txt file will be displayed in the browser window.
You must create two files. One will be a file which will contain your form and a little bit
of PHP code above the doctype which will call a class named “Directories” that
directories class will contain a method that will create the directory and the file.
In addition, the class will check the following and respond accordingly:
• If the directory already exists then a message will be displayed saying, "A
directory already exists with that name".
• An error message will be displayed if the directory or file cannot be created.
All error messages will be displayed on the form page a shown in the screenshots.
NOTE: For this project you will need to first create the "directories" directory on the
server (no need to write PHP code to create it).
NOTE: Make sure to have 777 permissions on the "directories" directory.
See screenshots for how the forms should look at various stages. */

require_once 'Directories.php';
  $dirDisplay = new Directories();
  $output = $dirDisplay->addFilesDirectories();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>File and Directory Assignment</title>
</head>
<body>
<main class="container">
      <h1>File and Directory Assignment</h1>
      
      <p>Enter a folder name and the contents of a file: <br>
      <?php echo $output; ?></p>
      
      <form action="index.php" method="post">  
        
        <div class="form-group">
          <label for="enterDirName">Folder Name</label>
          <input type="text" class="form-control" name="enterDirName" id="enterDirName">
          <small>Folder names should contain alpha numeric characters only</small>
        </div>
        
        <div class="form-group">
          <label for="textForFile">File Content</label>
          <textarea style="height: 300px;" class="form-control" id="textForFile" name="textForFile" ></textarea>
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Submit" />
        <!--<input type="submit" class="btn btn-primary" name="clearButton" id="clearDirs"value="Clear Directories"/>-->
</div>

        
      </form>
      
      </main>
    
</body>
</html>
