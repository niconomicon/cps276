<?php
require_once 'PdoMethods.php';
class File {

    public function addFile() {

        if (isset( $_POST["submit"])){
            processFile();
        }
        else {
            $output = "";
        }

    }
    function processFile(){
        
        
        //I HAD TO MAKE $OUTPUT A GLOBAL VARIBLE SO IT COULD BE USED INSIDE AND OUTSIDE THIS FUNCTION
        global $output;
    
        
        
        //CHECK TO SEE IF A FILE WAS UPLOADED.  ERROR EQUALS 4 MEANS THERE WAS NO FILE UPLOADED
        if ($_FILES["file"]["error"] == 4){
            $output = "No file was uploaded. Make sure you choose a file to upload.";
            
        }
    
        /*MAKE SURE THE FILE SIZE IS LESS THAN 1000000 BYTES.  THE ERROR EQUALS ONE MEANS THE FILE WAS TOO BIG ACCORDING TO THE SETINGS IN
        post_max_size LOCATED IN THE PHP INI FILE.*/
        elseif($_FILES["file"]["size"] > 1000000 || $_FILES["file"]["error"] == 1){
            $output = "The file is too large";
        }
    
        //CHECK TO MAKE SURE IT IS THE CORRECT FILE TYPE 
        elseif ($_FILES["file"]["type"] != "application/pdf") {
    
            $output = "<p>PDFs only, thanks!</p>";
        }
    
        //IF ALL GOES WELL MOVE FILE FROM TEMP LCOATION TO THE FILES DIRECTORY 
        elseif (!move_uploaded_file( $_FILES["file"]["tmp_name"], "files/".$_POST['fileName'])){
                echo "filename of uploaded file: ".$_FILES["file"]["tmp_name"]."<br>";
                echo "destination of the moved file: "."files/".$_POST['fileName']."<br>";
                $output = "<p>Sorry, there was a problem uploading that file.</p>";
                echo "Not uploaded because of error #".$_FILES["file"]["error"];

                //ADD FILE TO DATABASE
                $this->addDBFile(); 
                
        }
        else {
            //IF ALL GOES WELL CALL DISPLAY THANKS METHOD	
            
            $output = displayMessage();
        }
    
    }

    

    function displayMessage() {

      
        /*NOTICE I USE THE POST SUPERGLOBAL ARRAY TO GET THE NAME AND NOT
        THE FLES SUPERGLOBAL ARRAY.  ALL FILES USE $_FILES ALL TEXT ENTERIES USE $_POST
        */
        
        return "Thanks for uploading your file: ".$_POST['fileName']."!";
            //<p>Here's your photo:</p>
            //<p><img src="files/{$_FILES['file']['name']}" alt="File"></p>
        
       
            
        }

    

    public function addDBFile() {


        
	
            $pdo = new PdoMethods();

            $filePath="files/".$_POST['fileName'];
            $fileName=$_POST['fileName'];
            
    
            /* HERE I CREATE THE SQL STATEMENT I AM BINDING THE PARAMETERS */
            $sql = "INSERT INTO filesTable (filename, filepath) VALUES ('$fileName', '$filePath')";
            
            
    
                 
            /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
            $bindings = [
                [':fileName',$_POST['fileName'],'str'],
                ['$filePath',$filePath,'str'],
            ];
    
            /* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
            $result = $pdo->otherBinded($sql, $bindings);
    
            /* HERE I AM RETURNING EITHER AN ERROR STRING OR A SUCCESS STRING */
            if($result === 'error'){
                return 'There was an error adding the file';
            }
            else {
                return 'File has been added';
            }
        


    }

    /*public function getCustomers(){
        $pdo = new PdoMethods();
        
        $sql = "SELECT * FROM customers";

        $records = $pdo->selectNotBinded($sql);

        // IF THERE WAS AN ERROR DISPLAY MESSAGE 
        if($records == 'error'){
            return 'There has been and error processing your request';
        }
        else {
            if(count($records) != 0){
                return $this->makeTable($records);	
            }
            else {
                return 'no customers found';
            }
        }
    } */

    public function getFiles(){
        $pdo = new PdoMethods();
        
        $sql = "SELECT * FROM filesTable";

        $records = $pdo->selectNotBinded($sql);

        // IF THERE WAS AN ERROR DISPLAY MESSAGE 
        if($records == 'error'){
            return 'There has been and error processing your request';
        }
        else {
            if(count($records) != 0){
                return $this->makeList($records);	
            }
            else {
                return 'no files found';
            }
        }
    }


   /* private function makeTable($records){
        $output = "<table class='table table-bordered table-striped'><thead><tr>";
		$output .= "<th>Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Country</th><th>Contact</th><th>Email</th></tr><tbody>";
		foreach ($records as $row){
            $output .= "<tr><td>{$row['cust_name']}</td>";
            
            $output .= "<td>{$row['cust_address']}</td>";

            $output .= "<td>{$row['cust_city']}</td>";

            $output .= "<td>{$row['cust_state']}</td>";

            $output .= "<td>{$row['cust_zip']}</td>";

            $output .= "<td>{$row['cust_country']}</td>";

            $output .= "<td>{$row['cust_contact']}</td>";

            $output .= "<td>{$row['cust_email']}</td></tr>";
		}
		
		$output .= "</tbody></table></form>";
		return $output;
    } */

    private function makeList($records){
        $output = "<ul>";
       
		foreach ($records as $row){
            $output .= "<li><a target='_blank' href='files/".$_POST['fileName']."'>{$row['filename']}</a></li>";
		}
		$output .= "</ul>";
		return $output;
    }
} 

?>