<?php
//require_once 'classes/PdoMethods.php';
$path = "index.php?page=login";


/*if () {
    $nav=<<<HTML

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=addContact">Add Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=addAdmin">Add Admin(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=login">Logout</a>
  </li>
</ul>
HTML;

} else {

    $nav=<<<HTML

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=addContact">Add Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=login">Logout</a>
  </li>
</ul>
HTML;

}*/

$nav=<<<HTML

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=addContact">Add Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=addAdmin">Add Admin(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=login">Logout</a>
  </li>
</ul>
HTML;

$nav2=<<<HTML

<ul class="nav">
  <li class="nav-item">
    <a class="nav-link active" href="index.php?page=addContact">Add Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=deleteContacts">Delete Contact(s)</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=login">Logout</a>
  </li>
</ul>
HTML;

/*$pdo = new PdoMethods();

$sql = "SELECT * FROM admin";

$records = $pdo->selectNotBinded($sql);

foreach($records as $row){

        if ($row['email']==$_POST['email']) {

            if ($row['status']=="admin") {
            $nav.='<li class="nav-item">
            <a class="nav-link" href="index.php?page=addAdmin">Add Admin(s)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a>
          </li>';
            }

        }

    }*/

    



/*if (isset( $_POST["submit"])){
    header('location: '.'pages/welcome.php');
    $result = init();

}   */


if(isset($_GET)){


    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();

    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $result = init();

    }

    else if($_GET['page'] === "deleteAdmins"){
        require_once('pages/deleteAdmins.php');
        $result = init();

    }

    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();

    }

    else {
        //header('Location: http://russet.php?page=form');
        header('location: '.$path);
    }
}

else {
    //header('Location: http://198.199.80.235/cps276/cps276_assignments/assignment10_final_project/solution/index.php?page=form');
    header('location: '.$path);
}



?>