<?php
/*You will have a PHP file that is the form and another file named "fileUploadProc.php"
that will do all the file uploading and inserting the data into the data base. 

All the form
should have are two PHP blocks. 

One requires the "fileUploadProc.php" file and one
that displays the output. 

You are to use the Pdo_methods and Db_conn classes I have
provided in my notes, or you can create your own. 

You must create or use classes for
the PDO operations and Database connections.*/

if (isset( $_POST["sendFile"])){
	processFile();
}
else {
	$output = "";
}



function processFile(){
	// I PUT THE PHOTO INTO A DIRECTORY NAMED PHOTOS WHICH IS ALREADY ON THE SERVER AND HAS 777 FILE PERMISSIONS
	
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

	//CHECK TO MAKE SURE IT IS THE CORRECT FILE TYPE IN THIS CASE JPEG OR PNG
	elseif ($_FILES["file"]["type"] != "application/pdf") {

		$output = "<p>PDFs only, thanks!</p>";
	}

	//IF ALL GOES WELL MOVE FILE FROM TEMP LCOATION TO THE PHOTOS DIRECTORY 
	elseif (!move_uploaded_file( $_FILES["file"]["tmp_name"], "files/".$_FILES["file"]["name"])){
            echo "filename of uploaded file: ".$_FILES["file"]["tmp_name"]."<br>";
            echo "destination of the moved file: "."files/". $_FILES["file"]["name"]."<br>";
			$output = "<p>Sorry, there was a problem uploading that file.</p>";
            echo "Not uploaded because of error #".$_FILES["file"]["error"];
            
	}
	else {
		//IF ALL GOES WELL CALL DISPLAY THANKS METHOD	
        
		$output = displayThanks();
	}

}

function displayThanks() {

/*
NOTICE I USE THE POST SUPERGLOBAL ARRAY TO GET THE NAME AND NOT
THE FLES SUPERGLOBAL ARRAY.  ALL FILES USE $_FILES ALL TEXT ENTERIES USE $_POST
*/

return <<<HTML
	<h1>Thank You!</h1>
	
	<p>Thanks  {$_POST['visitorName']} for uploading your photo!</p>
	<p>Here's your photo:</p>
	<p><img src="files/{$_FILES['file']['name']}" alt="File"></p>

HTML;
	
}

?>