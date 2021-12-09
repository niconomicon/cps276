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
  "address"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"123 Someplace ",
    "action"=>"required",
    "regex"=>"address"
  ],
  "city"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"Anywhere",
    "action"=>"notRequired",
    "regex"=>"city"
  ],
  "state"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"select",
    "options"=>["mi"=>"Michigan","oh"=>"Ohio","pa"=>"Pennslyvania","tx"=>"Texas"],
		"selected"=>"oh",
    "action"=>"required",
		"regex"=>"state"
	],
	"phone"=>[
		"errorMessage"=>"<span style='color: red; margin-left: 15px;'>Phone cannot be blank and must be a valid phone number</span>",
    "errorOutput"=>"",
    "type"=>"text",
		"value"=>"999.999.9999",
    "action"=>"required",
		"regex"=>"phone"
  ],
  "email"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"sshaper@test.com",
    "action"=>"required",
    "regex"=>"email"
    
  ],
  "dob"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"date",
    "value"=>"12/25/1999",
    "action"=>"required",
    "regex"=>"dob"
    
  ],
  "updates"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"checkbox",
    "action"=>"required",
    "status"=>["Newsletter"=>"", "Email"=>"", "Text"=>""]
  ],
  "ageRange"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"radio",
    "action"=>"required",
    "value"=>["10-18"=>"", "19-30"=>"", "31-50"=>"","51+"=>""]
  ]
];


/*THIS FUNCTION CAN BE CALLED TO ADD DATA TO THE DATABASE */
function addData($post){
  global $elementsArr;  
  /* IF EVERYTHING WORKS ADD THE DATA HERE TO THE DATABASE HERE USING THE $_POST SUPER GLOBAL ARRAY */
      //print_r($_POST);
      require_once('classes/Pdo_methods.php');

      $pdo = new PdoMethods();

      $sql = "INSERT INTO contacts (name, address, city, state, phone, email, dob) VALUES (:name, :address, :city, :state, :phone, :email, :dob)";

      // THIS TAKE THE ARRAY OF CHECK BOXES AND PUT THE VALUES INTO A STRING SEPERATED BY COMMAS  
     /* if(isset($_POST['updates'])){
        $updates = "";
        foreach($post['updates'] as $v){
          $updates .= $v.",";
        }
        // REMOVE THE LAST COMMA FROM THE CONTACTS 
        $updates = substr($updates, 0, -1);
      }

      if(isset($_POST['ageRange'])){
        $ageRange = $_POST['ageRange'];
      }
      else {
        $ageRange = "";
      } */


      $bindings = [
        [':name',$post['name'],'str'],
        [':address',$post['address'],'str'],
        [':city',$post['city'],'str'],
        [':state',$post['state'],'str'],
        [':phone',$post['phone'],'str'],
        [':email',$post['email'],'str'],
        [':dob',$post['dob'],'str']

      ];

      $result = $pdo->otherBinded($sql, $bindings);

      if($result == "error"){
        return getForm("<p>There was a problem processing your form</p>", $elementsArr);
      }
      else {
        return getForm("<p>Contact Information Added</p>", $elementsArr);
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
      <label for="address">Address (just # and street) {$elementsArr['address']['errorOutput']}</label>
      <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}" >
    </div>
    <div class="form-group">
      <label for="city">City  {$elementsArr['city']['errorOutput']}</label>
      <input type="text" class="form-control" id="city" name="city" value="{$elementsArr['city']['value']}" >
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <select class="form-control" id="state" name="state">
        $options
      </select>
    </div>
    <div class="form-group">
      <label for="phone">Phone (format 999.999.9999) {$elementsArr['phone']['errorOutput']}</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
    </div>
    

    <p>Please check all contact types you would like (optional):{$elementsArr['updates']['errorOutput']}</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="updates[]" id="updates1" value="cash" {$elementsArr['updates']['status']['Newsletter']}>
      <label class="form-check-label" for="updates1">Newsletter</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="updates[]" id="updates2" value="check" {$elementsArr['updates']['status']['Email']}>
      <label class="form-check-label" for="updates2">Email</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="updates[]" id="updates3" value="credit" {$elementsArr['updates']['status']['Text']}>
      <label class="form-check-label" for="updates3">Text</label>
    </div>
        

    <p>Please select an age range (you must select one):</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="ageRange" id="ageRange1" value="10-18"  {$elementsArr['ageRange']['value']['10-18']}>
      <label class="form-check-label" for="ageRange1">10-18</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="ageRange" id="ageRange2" value="19-30"  {$elementsArr['ageRange']['value']['19-30']}>
      <label class="form-check-label" for="ageRange2">19-30</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="ageRange" id="ageRange3" value="31-50"  {$elementsArr['ageRange']['value']['31-50']}>
      <label class="form-check-label" for="ageRange3">31-50</label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="ageRange" id="ageRange4" value="51+"  {$elementsArr['ageRange']['value']['51+']}>
      <label class="form-check-label" for="ageRange4">51+</label>
    </div>
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

HTML;

/* HERE I RETURN AN ARRAY THAT CONTAINS AN ACKNOWLEDGEMENT AND THE FORM.  THIS IS DISPLAYED ON THE INDEX PAGE. */
return [$acknowledgement, $form];

}

?>