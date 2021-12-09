<?php 
require_once 'PdoMethods.php';
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

class Date_time {

    function checkSubmit() {
        
           

        if (isset( $_POST["submit"])){
            $this->addNote();
        }        else {
        $output= "...";
    }
        

    }

    function addNote() {

        $notes = "";
        $pdo = new PdoMethods();

            $date=$_POST['date'];
            echo$_POST['date'];
            $note=$_POST['note'];
            echo$_POST['note'];
            
    
            /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
            $sql = "INSERT INTO timeTable (datetime, note) VALUES ('$date', '$note')";
            
            
    
                 
            /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
            $bindings = [
                [':date',$_POST['date'],'str'],
                [':note',$_POST['note'],'str'],
            ];
    
            /* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
            $result = $pdo->otherBinded($sql, $bindings);
    
            /* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
            if($result === 'error'){
                $notes = 'There was an error adding the note';
            }
            else {
                $notes = 'Note has been added';
            }
            return $notes;
        

    }

    function getNotes(){
        $notes ="";

        
    }

    function showNotes(){
        
        $notes ="";
        
        $pdo = new PdoMethods();
        
        $sql = "SELECT * FROM timeTable";

        $records = $pdo->selectNotBinded($sql);

        // IF THERE WAS AN ERROR DISPLAY MESSAGE 
        if($records == 'error'){
            $notes = 'There has been and error processing your request';
        }
        else {
            if(count($records) != 0){
                $notes = $this->makeTable($records);	
            }
            else {
                $notes = 'no files found';
            }
        }

        return $notes;

        

    }

    private function makeTable($records){

        /*
        $output .= "<input class='btn btn-success' type='submit' name='update' value='Update'>";
		$output .= "<input class='btn btn-danger' type='submit' name='delete' value='Delete'>";
		$output .= "<table class='table table-bordered table-striped'><thead><tr>";
		$output .= "<th>First Name</th><th>Last Name</th><th>Eye Color</th><th>Gender</th><th>State</th><th>Update/Delete</th><tbody>";
		foreach ($records as $row){
			$output .= "<tr><td><input type='text' class='form-control' name='fname^^{$row['id']}' value='{$row['first_name']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='lname^^{$row['id']}' value='{$row['last_name']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='color^^{$row['id']}' value='{$row['eye_color']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='gender^^{$row['id']}' value='{$row['gender']}'></td>";

			$output .= "<td><input type='text' class='form-control' name='state^^{$row['id']}' value='{$row['state']}'></td>";

			$output .= "<td><input type='checkbox' name='inputDeleteChk[]' value='{$row['id']}'></td></tr>";
		}
		
		$output .= "</tbody></table>




        private function makeList($records){
        $output = "<ul>";
		foreach ($records as $row){
            $output .= "<li><a target='_blank' href='files/newsletterform1.pdf'>{$row['filename']}</a></li>";
		}
		$output .= "</ul>";
		return $output;
    }
    
        */

       /* if (isset( $_POST["get"])){
            

        $begin=$_POST['beginDate'];
        $end=$_POST['endDate'];
        */
        $output = "<table class='table table-bordered table-striped'><thead><tr>";
		$output .= "<th>Date & Time</th><th>Note</th><tbody>";
        
            foreach ($records as $row){
                //$timestamp=$row['datetime'];
                //if (preg_match("[$begin-$end]", $timestamp)) {

                $output .= "<tr><td>{$row['datetime']}</td>";
                $output .= "<td>{$row['note']}</td></tr>";
    
                
            //}
        }
		
		$output .= "</tbody></table>";

        /*

        }else {
            $output= "no post is set for the dates";
        }*/
        
		return $output;
    }
} 




?>