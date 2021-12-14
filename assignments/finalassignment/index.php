<?php
/*
Final Project Instructions
Workflow
When the application first loads the user will be taken to a login page where they will
login with their email and password (user must already have an account). 

The user will have a status assigned to them of staff or admin. 

If they are staff, then they can only add and delete contacts. If they are an admin they can also add and delete other
admins. 

Their status will be stored in a database.

When they successfully login they will be taken to a welcome page that will state
"Welcome and then their name", they will also see links to the pages they can access.

If they select the "Add Contact Information" link they will be taken to a form where they
can add a contact. 

When they click the submit button on the add contact information form each text field will be validated. 

The validation will check for proper formatting and if the field is blank (no fields can be blank). 

If a form field value is valid then no error message is shown, if a from field value is not valid then an error message 
will be shown above the field entry box. 

If there is an error for any of the form fields, all the from fields entries will be preserved.

Also, for the checkboxes, dropdown select box, and radio buttons their state
(checked/selected or not checked/not selected) will be preserved. 
If the user does not
select an age range, they will get a message stating that they must select an age range.

The checkboxes are optional and can be selected or not.

If there are no errors, then the form field data will be put into a database and a message
will appear at the top of the form reading, "Contact Information added". If there is a
problem with adding the record but all form field validation is done, then a message will
display reading, " There was an error adding the record".

If they click the link "Delete contact(s)" they will be taken to a page that will display all
the records in the datbase. If there are no records in the database, then a message will
appear stating "There are no records to display"

These records will be displayed in a tabular format. There will be a checkbox at the end
of each row. If the user checks one or more checkboxes and clicks the delete button
records checked will be deleted and a message will display reading "Contact(s)
deleted". If the application was not able to delete the records then a message will be
displayed "Could not delete the contacts" If the user does not check the checkboxes but
clicks the delete button the page will reload but nothing will be deleted.

If they click the logout link, they will be taken to the index page where the login form is

If the user has admin status, then they will be given two more-page links add admin and
delete admin(s). Both those pages will work just as the contacts pages but with
different fields as shown in the video.
Project Specifications and Requirements

You are to create a form and display records page that look like the video (Yes you
must use Bootstrap).

You are to create two tables. 
One will be called contacts and hold the contactinformation. 
The other will be called admins and hold the admin information. 

You will need to evaluate certain patterns on the fields as shown.

Name – alpha characters (upper and lower case), hyphens, apostrophes, spaces only
(cannot be blank).

Address – start with a number, then alpha characters, spaces, hyphens, and periods
(cannot be blank).

City – Must be alpha characters only.

Phone – Must be in the format 999.999.9999, where 9 is a digit of 0 to 9 (cannot be
blank).

Email address – Valid email address (cannot be blank).

DOB – mm/dd/yyyy should format to a proper date (cannot be blank).

Password – will take letters, numbers and special characters.

In addition, for the add contact form, you will create one select drop down box that will
contain 5 states. It must be sticky as well so if the user selects a state and there is an
error on the form that selection will remain.

Also, for the add contact form, you will create three checkboxes and four radio buttons.

If a radio button is not selected, then after the submit button is clicked a message will
appear displaying the following text “You must select an age range”.

The regular expressions for phone can accept all zeros or other bad combinations. If
you want to write a regular expression better that what is expected that is fine. Also,
feel free to look the regular expressions up on the Internet, you do not have to write
them from scratch.

The status filed in the add admin page will be a dropdown with two options (staff and
admin).

All pages will appear in the index.php page. Basically, the index.php page is a holding
page for all the other pages. The actual page and other logic will be in a folder named
“pages".

You will have a routes.php page that will control all the routing for bringing in the content
of the other pages. You will pass the page name though the URL.
russet.wccnet.edu/~your username/path to your index
page/index.php?page=addContact

If you enter the URL to just the index page (without the parameter) or to the wrong
parameter, the user will be redirected to the form page
You will need to do the following:
• Update the Validation Class (adding regular expressions).
• If the person tries to enter the URL to a page, they do not have access to then
they will be redirected to the login page. For example, a user with the status of
staff cannot enter addAdmin to the link and get into the addAdmin page. Or a
user cannot bypass the login by entering the URL. You can accomplish this
using sessions.
• You must use the files and folders I show in the video no extras and no
omissions.
//
• When adding admins you will check for duplicate emails before adding a admin.
No two admins can have the same email.
//
• Write all the code for the required pages. Please see my examples on GitHub as
a start. You need to use the database and pdo classes I provided or write your
own. If you use my StickyForm class, you must make sure to write the
associative array correctly. Please refer to the example found on my github site
as a start for how to do this project.
https://github.com/sshaper/cps276_examples/tree/master/php-form-validationmod. If you create your own database classes, you must use PDO.
• When submitting this please make sure to have some test information hardcoded
in each text field of each page. Failure to do so will result in the loss of 10% to
your grade.
• All pages of this application must work completely. No partial credit.
• IMPORTANT NOTE: This is not an AJAX assignment no JavaScript will be used
in this project. Doing so will result on a failing grade.
Please see my video to see how the application will function.

*/
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

/* THIS ENTIRE PAGE IS JUST A PLACEHOLDER PAGE WHICH THE FORM WILL BE INJECTED INTO */
/*I REQUIRE IN THE ROUTES PAGE WHICH IS ACTUALLY DOES THE WORK FOR GETTING THE PAGES.*/ 
require_once('pages/routes.php');

/* require_once 'classes/Page.php';
$page = new Page();
echo $page->head("Encrypted Login - Login Page");

$output = "";

if(isset($_POST['login'])){
  require_once 'classes/Admin.php';
  $admin = new Admin();
  $output = $admin->login($_POST);
  if($output === 'success'){
    header('Location: home.php');
  }
} */



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Final Assignment</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
	</head>

	<body class="container">
	<div> 
        <?php
			//THIS IS THE PHP PAGE 
			
            //echo $output;
			// THE ACKNOWLEDGEMENT GOES HERE AS THE FIRST INDEX OF THE ARRAY  
			echo $result[0]; 

			// THE FORM GOES HERE.  LOOK AT THE FORM.PHP PAGE TO SEE HOW THE RETURN IN DONE. 
			echo $result[1]; 
            
		?>
    </div>
        <!--<h1>Login</h1>    
    <form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="sshaper@test.com">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>-->

	</body>
</html> 



