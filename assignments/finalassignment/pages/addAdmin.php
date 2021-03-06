<?php
echo $nav;
/* HERE I REQUIRE AND USE THE STICKYFORM CLASS THAT DOES ALL THE VALIDATION AND CREATES THE STICKY FORM.  THE STICKY FORM CLASS USES THE VALIDATION CLASS TO DO THE VALIDATION WORK.*/
require_once('classes/StickyForm.php');
require_once('pages/routes.php');
//echo $nav; 
$stickyForm = new StickyForm();

/*THE INIT FUNCTION IS WRITTEN TO START EVERYTHING OFF IT IS CALLED FROM THE INDEX.PHP PAGE */
function init(){
    
  global $elementsArr, $stickyForm;

  /* IF THE FORM WAS SUBMITTED DO THE FOLLOWING  */
  if(isset($_POST['submit'])){

    /*THIS METHODS TAKE THE POST ARRAY AND THE ELEMENTS ARRAY (SEE BELOW) AND PASSES THEM TO THE VALIDATION FORM METHOD OF THE STICKY FORM CLASS.  IT UPDATES THE ELEMENTS ARRAY AND RETURNS IT, THIS IS STORED IN THE $postArr VARIABLE */
    $postArr = $stickyForm->validateForm($_POST, $elementsArr);

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
  "pwd"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must enter a password</span>",
    "errorOutput"=>"",
    "type"=>"text",
    "value"=>"password",
    "action"=>"required",
    "regex"=>"pwd"
    
  ],
  "status"=>[
    "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one updates option</span>",
    "errorOutput"=>"",
    "type"=>"dropdown",
    "action"=>"required",
    "value"=>["Admin"=>"","Staff"=>""]
  ],
  
];


/*THIS FUNCTION CAN BE CALLED TO ADD DATA TO THE DATABASE */
function addData($post){
  global $elementsArr;  
  /* IF EVERYTHING WORKS ADD THE DATA HERE TO THE DATABASE HERE USING THE $_POST SUPER GLOBAL ARRAY */
      //print_r($_POST);
      require_once('classes/PdoMethods.php');

      $pdo = new PdoMethods();

      $sql = "INSERT INTO admin (name, email, pwd, status) VALUES (:name, :email, :pwd, :status)";

      // THIS TAKE THE ARRAY OF CHECK BOXES AND PUT THE VALUES INTO A STRING SEPERATED BY COMMAS  
     /* if(isset($_POST['status'])){
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
//

      $bindings = [
        [':name',$post['name'],'str'],
        [':email',$post['email'],'str'],
        [':pwd',$post['pwd'],'str'],
        [':status',$post['status'],'str']

      ];

      
    $sqlEmail = "SELECT * FROM admin";

    $records = $pdo->selectNotBinded($sqlEmail);


   $result="";



    foreach($records as $row){
        $email = $row['email'];
        if ($email == $post['email']) {
            $result = "error";
            //echo "An admin with that email already exists!"."<br>";
            break;
        }    
    }
    


    if ($result!=="error") {
        $result = $pdo->otherBinded($sql, $bindings);
    } else {
        $result.="1";
    }




    /*
    $sqlEmail = "SELECT * FROM admin";

    $records = $pdo->selectNotBinded($sqlEmail);

    if(count($records) === 0){
        $output = "<p>There are no records to display</p>";
        return [$output,""];
    }
    else {
    foreach($records as $row){
        $email = {$row['email']};
        if ($email == ':email') {
            echo "An admin with that email already exists!";

        } else {
            $result = $pdo->otherBinded($sql, $bindings);
        }


    }

    if(isset($error)){
        if($error){
            $msg = "<p>Could not delete the admin(s)</p>";
        }
        else {
            $msg = "<p>Admin(s) deleted</p>";
        }
    }
    else {
        $msg="";
    }




    $sqlEmail = "SELECT * FROM admin";

    $records = $pdo->selectNotBinded($sqlEmail);

    if(count($records) === 0){
        $output = "<p>There are no records to display</p>";
        return [$output,""];
    }
    else {
    foreach($records as $row){
        
        $email = $row['email'];
        echo $email;
        echo $row['email'];
        echo ':email:';

        if ($email == ':email') {
            echo "An admin with that email already exists!<br>";
            return [$output,""];

        } else {
            echo "added to the database (but not really)<br>";
           // $result = $pdo->otherBinded($sql, $bindings);
        }


    }
}

    */






    
    
      //$result = $pdo->otherBinded($sql, $bindings);

      if($result == "error"){
        return getForm("<p>There was a problem processing your form</p>", $elementsArr);
      } else if ($result == "error1") {
        return getForm("<p>An admin with that email already exists!</p>", $elementsArr);
      } else {
        return getForm("<p>Admin Information Added</p>", $elementsArr);
      }
      
}

   

/*THIS IS THEGET FROM FUCTION WHICH WILL BUILD THE FORM BASED UPON UPON THE (UNMODIFIED OF MODIFIED) ELEMENTS ARRAY. */
function getForm($acknowledgement, $elementsArr){

global $stickyForm;
//$options = $stickyForm->createOptions($elementsArr['status']);

/* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
$form = <<<HTML
    <form method="post" action="index.php?page=addAdmin">
    <div class="form-group">
      <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
      <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
      <label for="email">Email {$elementsArr['email']['errorOutput']}</label>
      <input type="text" class="form-control" id="email" name="email" value="{$elementsArr['email']['value']}" >
    </div>
    <div class="form-group">
      <label for="city">Password  {$elementsArr['pwd']['errorOutput']}</label>
      <input type="pwd" class="form-control" id="pwd" name="pwd" value="{$elementsArr['pwd']['value']}" >
    </div>
    <div class="form-group">
      <label for="status">Status  {$elementsArr['status']['errorOutput']}</label>
      <select class="form-control" name="status" >
            <option name="status" id="status1" value="admin" {$elementsArr['status']['value']['Admin']}>Admin</option>
            <option name="status" id="status2"value="staff" {$elementsArr['status']['value']['Staff']}>Staff</option>
    </select>
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