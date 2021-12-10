<?php

/* HERE I REQUIRE AND USE THE STICKYFORM CLASS THAT DOES ALL THE VALIDATION AND CREATES THE STICKY FORM.  THE STICKY FORM CLASS USES THE VALIDATION CLASS TO DO THE VALIDATION WORK.*/
require_once('classes/StickyForm.php');
require_once('pages/routes.php');
echo $nav; 
$stickyForm = new StickyForm();

/*THE INIT FUNCTION IS WRITTEN TO START EVERYTHING OFF IT IS CALLED FROM THE INDEX.PHP PAGE */
function init(){
  global $elementsArr, $stickyForm;

  /* IF THE FORM WAS SUBMITTED DO THE FOLLOWING  */
  if(isset($_POST['submit'])){

    /*THIS METHODS TAKE THE POST ARRAY AND THE ELEMENTS ARRAY (SEE BELOW) AND PASSES THEM TO THE VALIDATION FORM METHOD OF THE STICKY FORM CLASS.  IT UPDATES THE ELEMENTS ARRAY AND RETURNS IT, THIS IS STORED IN THE $postArr VARIABLE */
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);
//
    //I HAD TO MAKE $OUTPUT A GLOBAL VARIBLE SO IT COULD BE USED INSIDE AND OUTSIDE THIS FUNCTION
    global $output;
    
        
        
    //CHECK TO SEE IF A FILE WAS UPLOADED.  ERROR EQUALS 4 MEANS THERE WAS NO FILE UPLOADED
    if ($_POST["name"]!==null){
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
//

  //CHECKS
    if ($post['name']) {
      
    }
    /* THE ELEMENTS ARRAY HAS A MASTER STATUS AREA. IF THERE ARE ANY ERRORS FOUND THE STATUS IS CHANGED TO "ERRORS" FROM THE DEFAULT OF "NOERRORS".  DEPENDING ON WHAT IS RETURNED DEPENDS ON WHAT HAPPENS NEXT.  IN THIS CASE THE RETURN MESSAGE HAS "NO ERRORS" SO WE HAVE NO PROBLEMS WITH OUR VALIDATION AND WE CAN SUBMIT THE FORM */
    if($postArr['masterStatus']['status'] == "noerrors"){
      
      /*addData() IS THE METHOD TO CALL TO ADD THE FORM INFORMATION TO THE DATABASE (NOT WRITTEN IN THIS EXAMPLE) THEN WE CALL THE GETFORM METHOD WHICH RETURNS AND ACKNOWLEDGEMENT AND THE ORGINAL ARRAY (NOT MODIFIED). THE ACKNOWLEDGEMENT IS THE FIRST PARAMETER THE ELEMENTS ARRAY IS THE ELEMENTS ARRAY WE CREATE (AGAIN SEE BELOW) */
      return addData($_POST);

    }
    else{
      /* IF THERE WAS A PROBLEM WITH THE FORM VALIDATION THEN THE MODIFIED ARRAY ($postArr) WILL BE SENT AS THE SECOND PARAMETER.  THIS MODIFIED ARRAY IS THE SAME AS THE ELEMENTS ARRAY BUT ERROR MESSAGES AND VALUES HAVE BEEN ADDED TO DISPLAY ERRORS AND MAKE IT STICKY */
      return getForm("",$postArr);
    }



    
  }

  /* THIS CREATES THE FORM BASED ON THE ORIGINAL ARRAY THIS IS CALLED WHEN THE PAGE FIRST LOADS BEFORE A FORM HAS BEEN SUBMITTED */
  else {
      return getForm("", $elementsArr);
  } 
}

/* THIS IS THE DATA OF THE FORM.  IT IS A MULTI-DIMENTIONAL ASSOCIATIVE ARRAY THAT IS USED TO CONTAIN FORM DATA AND ERROR MESSAGES.   EACH SUB ARRAY IS NAMED BASED UPON WHAT FORM FIELD IT IS ATTACHED TO. FOR EXAMPLE, "NAME" GOES TO THE TEXT FIELDS WITH THE NAME ATTRIBUTE THAT HAS THE VALUE OF "NAME". NOTICE THE TYPE IS "TEXT" FOR TEXT FIELD.  DEPENDING ON WHAT HAPPENS THIS ASSOCIATE ARRAY IS UPDATED.*/
$elementsArr = [
  "masterStatus"=>[
    "status"=>"noerrors",
    "type"=>"masterStatus"
  ],
	"name"=>[
	  "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"Scott",
		"regex"=>"name"
	],
  "email"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"sshaper@test.com",
    "action"=>"required",
    "regex"=>"email"
    
  ],
  "password"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"password",
    "action"=>"required",
    "regex"=>"dob"
    
  ],
  "status"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"dropdown",
    "action"=>"required",
    "status"=>["admin"=>"", "staff"=>""]
  ],
  
];


/*THIS FUNCTION CAN BE CALLED TO ADD DATA TO THE DATABASE */
function addData($post){
  global $elementsArr;  
  /* IF EVERYTHING WORKS ADD THE DATA HERE TO THE DATABASE HERE USING THE $_POST SUPER GLOBAL ARRAY */
      //print_r($_POST);
      require_once('classes/PdoMethods.php');

      $pdo = new PdoMethods();

      $sql = "INSERT INTO contacts (name, email, password, status) VALUES (:name, :email, :password, :status)";

      // THIS TAKE THE ARRAY OF CHECK BOXES AND PUT THE VALUES INTO A STRING SEPERATED BY COMMAS  
     /* if(isset($_POST['updates'])){
        $updates = "";
        foreach($post['updates'] as $v){
          $updates .= $v.",";
        }
        // REMOVE THE LAST COMMA FROM THE CONTACTS 
        $updates = substr($updates, 0, -1);
      }
*/
      if(isset($_POST['status'])){
        $status = $_POST['status'];
      }
      else {
        $status = "";
      } 


      $bindings = [
        [':name',$post['name'],'str'],
        [':email',$post['email'],'str'],
        [':password',$post['password'],'str'],
        [':status',$status['status'],'str']

      ];

      $result = $pdo->otherBinded($sql, $bindings);

      if($result == "error"){
        return getForm("<p>There was a problem processing your form</p>", $elementsArr);
      }
      else {
        return getForm("<p>Admin Information Added</p>", $elementsArr);
      }
      
}
   

/*THIS IS THEGET FROM FUCTION WHICH WILL BUILD THE FORM BASED UPON UPON THE (UNMODIFIED OF MODIFIED) ELEMENTS ARRAY. */
function getForm($acknowledgement, $elementsArr){

global $stickyForm;
$options = $stickyForm->createOptions($elementsArr['state']);

/* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
$form = <<<HTML
    <form method="post" action="index.php?page=addContact">
    <div class="form-group">
      <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
      <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
      <label for="address">Email {$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}" >
    </div>
    <div class="form-group">
      <label for="city">Password  {$elementsArr['password']['errorOutput']}</label>
      <input type="password" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}" >
    </div>
    <div class="form-group">
      <label for="city">Password  {$elementsArr['password']['errorOutput']}</label>
      <input type="dropdown" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}" >
    </div>
  </form>

HTML;

/* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
return [$acknowledgement, $form];

}

?>