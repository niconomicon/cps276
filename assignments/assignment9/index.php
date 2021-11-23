<?php

ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
/*Date Time Assignment
Workflow:
On the add note page user will enter a date and time in the date time selection box.
Then they will enter some text in the note field. When they click "Add Note", the note
will be added to the database.
If a date is not entered or a note is not entered the then a message will appear above
the data time label stating that they must enter a date, time and note.
On the display notes page, the user will select a beginning and ending date. When they
click "Get Notes", a query will be sent to the database grabbing all dates and notes
within the given date range. A table will appear listing the date and time the note was
created and the contents of the note. If there are no notes for that date range, then a
message will appear informing the user of such.
Specifications:
You will need to create a database that will contain a table with two fields. One will hold
a timestamp the other will hold the note contents. You have to convert what is selected
in the box (on the add note page) to a timestamp and (when displaying the notes,
display notes page) convert the timestamp back to a readable date time of mm/dd/yyyy
HH:MM AM/PM. Also, the database will display them in descending order with the most
recent date first.
The date-time field (displayed on the add note page) can be created as follows:
The date only field (displayed on the display notes page) can be created as follows (I
am showing the code for both beginning date and ending date):
IMPORTANT NOTE: The datetime-local field does not work in all browsers so build this
application in Chrome, as Chrome supports it.
<input type="datetime-local" class="form-control" id="dataTime" name="dateTime">
<input type="date" class="form-control" id="begDate" name="begDate">
<input type="date" class="form-control" id="endDate" name="endDate">
You are to write very little PHP on the pages the user will be interacting with. You are to
create one class that will do all operations for adding and displaying notes. All you
should do on either page is require the class, initiate it, and call the starting method and
of course the HTML. Also have one spot on each page where messages and/or tables
will appear. Below is what I did for the solution you should be similar but can have
different class names.
Also, you will be using PDO and some class to do the database connection. You can
use what I have provided in the examples and notes or write your own. If you write your
own, you must use they PDO library.

<?php
require_once 'Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit();
?>
	
} */


require 'Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Assignment 9</title>
    
  </head>
  <body>
    <main class="container">
      <h1>Add Note</h1>
      
		<p>
			<a href="displayNotes.php">Display Notes</a>
		</p>

      <form action="index.php" method="post" enctype="multipart/form-data">
      	<div class="form-group">
      		<label for="date">Date & Time</label>
      		<input type="datetime-local" class="form-control" name="date" id="date">
      	</div>
      	<div class="form-group">
            <label for="note">Note</label>
            <textarea style="height: 500px;" class="form-control" id="note" name="note" ></textarea>
      	</div>
      	<div class="form-group">
      		<input type="submit" class="btn btn-primary" name="submit" value="Add Note" />
      	</div>
		</form>

		<div> <?php echo $notes; ?></div>
        
    </main>
    <script src="public/js/main.js"></script>
</body>
</html>